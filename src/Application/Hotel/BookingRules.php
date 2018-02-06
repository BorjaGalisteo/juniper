<?php

namespace StayForLong\Juniper\Application\Hotel;


use Juniper\Webservice\ArrayOfJP_RelPax;
use Juniper\Webservice\ArrayOfString5;
use Juniper\Webservice\HotelBookingRules;
use Juniper\Webservice\JP_HotelBookingRuleRQ;
use Juniper\Webservice\JP_HotelBookingRulesRequest;
use Juniper\Webservice\JP_HotelOptionBookingRules;
use Juniper\Webservice\JP_HotelOptionRequest;
use Juniper\Webservice\JP_HotelRelPaxDist;
use Juniper\Webservice\JP_HotelResultsBookingRules;
use Juniper\Webservice\JP_Pax;
use Juniper\Webservice\JP_Paxes;
use Juniper\Webservice\JP_RelPax;
use Juniper\Webservice\JP_RelPaxesDist;
use Juniper\Webservice\JP_SearchSegmentHotels;
use Juniper\Webservice\JP_SearchSegmentsHotels;
use StayForLong\Juniper\Domain\Hotel\BookingRules as BookingRulesValueObject;
use StayForLong\Juniper\Domain\Hotel\Rate;
use StayForLong\Juniper\Infrastructure\Services\JuniperWebService;
use StayForLong\Juniper\Infrastructure\Services\WebService;
use StayForLong\Juniper\Infrastructure\Transformer\BookingRulesTransformer;

/**
 * Class BookingRules
 * @package StayForLong\Juniper\Application\Hotel
 */
class BookingRules
{
	/**
	 * @var JuniperWebService
	 */
	private $juniperWebService;
	private $paxes;

	/**
	 * BookingRules constructor.
	 * @param JuniperWebService $juniperWebService
	 * @param Pax[] $paxes
	 */
	public function __construct(JuniperWebService $juniperWebService, $paxes)
	{
		$this->juniperWebService = $juniperWebService;
		$this->paxes             = $paxes;
	}

	/**
	 * @param Rate $rate
	 * @param string $hotel_code
	 * @param string $reference
	 * @param array $comments
	 * @return BookingRulesValueObject[]
	 */
	public function __invoke(Rate $rate, $hotel_code, $reference, array $comments = [])
	{
		$hotels_code = [$hotel_code];

		$searchSegmentHotels  = new JP_SearchSegmentHotels($rate->start(), $rate->end(), $OriginZone = null,
			$JPDCode = null, $DestinationZone = null);
		$searchSegmentsHotels = new JP_SearchSegmentsHotels();
		$searchSegmentsHotels->setHotelCodes($hotels_code);
		$searchSegmentsHotels->setSearchSegmentHotels($searchSegmentHotels);
		$hotelBookingRuleRQ = new JP_HotelBookingRuleRQ(WebService::JUNIPER_WS_VERSION,
			$this->juniperWebService->language());

		$relPaxesDist             = $this->getRelPaxesDist();
		$hotelBookingRulesRequest = new JP_HotelBookingRulesRequest();
		$hotelOption              = new JP_HotelOptionRequest($rate->planCode());
		$hotelBookingRulesRequest->setSearchSegmentsHotels($searchSegmentsHotels)
			->setRelPaxesDist($relPaxesDist)
			->setHotelOption($hotelOption);

		$jp_pax = [];
		foreach ($this->paxes as $key => $pax) {
			$jp_pax[$key] = new JP_Pax($pax->idPax(), $gender = null);
			$jp_pax[$key]->setAge($pax->age());
			$jp_pax[$key]->setName($pax->name());
			$jp_pax[$key]->setSurname($pax->surname());
		}

		$paxes = new JP_Paxes($AdultsFree = 0, $ChildrenFree = 0);
		$paxes->setPax($jp_pax);

		$hotelBookingRuleRQ->setLogin($this->juniperWebService->login())
			->setHotelBookingRulesRequest($hotelBookingRulesRequest)
			->setPaxes($paxes);
		$hotelBookingRules = new HotelBookingRules($hotelBookingRuleRQ);
		$response          = $this->juniperWebService->service()->HotelBookingRules($hotelBookingRules);

		if ($response->getBookingRulesRS()->getErrors()) {
			foreach ($response->getBookingRulesRS()->getErrors()->getError() as $error) {
				BookingRulesException::throwBecauseOf($error->getText());
			}

			return;
		}

		$hotelResultsBookingRules = $response->getBookingRulesRS()->getResults()->getHotelResult();

		$optionsBookingRules = [];
		/**
		 * @var JP_HotelResultsBookingRules $resultsBookingRule
		 */
		foreach ($hotelResultsBookingRules as $resultsBookingRule) {
			/**
			 * @var JP_HotelOptionBookingRules[] $optionBookingRules
			 */
			$optionBookingRules = $resultsBookingRule->getHotelOptions()->getHotelOption();
			foreach ($optionBookingRules as $bookingRules) {
				$bookingRulesTransformer = new BookingRulesTransformer(
					$bookingRules,
					$hotel_code,
					$reference,
					$comments);
				$BookingRules            = $bookingRulesTransformer->transform();
				$optionsBookingRules[]   = $BookingRules;
			}
		}

		return $optionsBookingRules;
	}

	/**
	 * @return JP_RelPaxesDist
	 */
	private function getRelPaxesDist()
	{
		$relPax = [];
		foreach ($this->paxes as $key => $pax) {
			$relPax[] = new JP_RelPax($pax->idPax());
		}

		$arrayOfJP_RelPax = new ArrayOfJP_RelPax();
		$arrayOfJP_RelPax->setRelPax($relPax);

		$relPaxDist[0] = new JP_HotelRelPaxDist();
		$relPaxDist[0]->setRelPaxes($arrayOfJP_RelPax);

		$relPaxesDist = new JP_RelPaxesDist();
		$relPaxesDist->setRelPaxDist($relPaxDist);
		return $relPaxesDist;
	}
}

final class BookingRulesException extends \Exception
{
	public static function throwBecauseOf($messages)
	{
		throw new self($messages);
	}
}