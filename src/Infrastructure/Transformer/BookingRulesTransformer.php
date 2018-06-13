<?php

namespace StayForLong\Juniper\Infrastructure\Transformer;


use Carbon\Carbon;
use Exception;
use Throwable;
use Juniper\Webservice\JP_BookingCode;
use Juniper\Webservice\JP_HotelOptionBookingRules;
use StayForLong\Juniper\Domain\Hotel\BookingRules;
use StayForLong\Juniper\Domain\Hotel\CancellationPolicy;

class BookingRulesTransformer
{
	/** @var JP_HotelOptionBookingRules */
	private $bookingRules;
	/** @var string */
	private $hotel_code;
	/** @var string */
	private $reference;
	/** @var array */
	private $comments;

	/**
	 * BookingRulesTransformer constructor.
	 * @param JP_HotelOptionBookingRules $bookingRules
	 * @param string $hotel_code
	 * @param string $reference
	 * @param array $comments
	 */
	public function __construct(
		JP_HotelOptionBookingRules $bookingRules,
		$hotel_code,
		$reference,
		$comments = []
	)
	{
		$this->bookingRules = $bookingRules;
		$this->hotel_code   = $hotel_code;
		$this->reference    = $reference;
		$this->comments     = $comments;
	}

	/**
	 * @return BookingRules
	 */
	public function transform()
	{
		$prices       = $this->bookingRules->getPriceInformation()->getPrices();
		$prices_count = $this->bookingRules->getPriceInformation()->getPrices()->count();


		$bookingCode = new JP_BookingCode(
			$this->bookingRules->getBookingCode()->get_(),
			$this->bookingRules->getBookingCode()->getExpirationDate()
		);

		$cancellationPolicies = $this->getCancellationPolicies();

		return (new BookingRules(
			$bookingCode,
			$this->hotel_code,
			$this->reference)
		)
			->setComments($this->comments)
			->setCurrency($prices->current()->getCurrency())
			->setMinPrice($prices->current()->getTotalFixAmounts()->getNett())
			->setMaxPrice($prices[$prices_count - 1]->getTotalFixAmounts()->getNett())
			->setRecommended($prices->current()->getTotalFixAmounts()->getRecommended())
			->setCancellationPolicies($cancellationPolicies);
	}

	/**
	 * @return array
	 */
	private function getCancellationPolicies(): array
	{
		$cancellationPolicies = [];
		try {
			foreach ($this->bookingRules->getCancellationPolicy()->getPolicyRules() as $cancellationPolicy) {
				$cancellationPolicies[] = new CancellationPolicy(
					Carbon::parse($cancellationPolicy->getDateFrom() . " " . $cancellationPolicy->getDateFromHour()),
					Carbon::parse($cancellationPolicy->getDateTo() . " " . $cancellationPolicy->getDateToHour()),
					$cancellationPolicy->getFixedPrice(),
					$cancellationPolicy->getPercentPrice(),
					$cancellationPolicy->getNights(),
					$this->bookingRules->getCancellationPolicy()->getCurrencyCode()
				);
			}
			return $cancellationPolicies;
		} catch (Throwable | Exception $e) {
			return $cancellationPolicies;
		}
	}
}
