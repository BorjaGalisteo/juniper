<?php


namespace StayForLong\Juniper\Application\Hotel;

use Carbon\Carbon;
use Juniper\Webservice\JP_ReadRQ;
use Juniper\Webservice\ReadBooking;
use Juniper\Webservice\JP_ReadRequest;
use Juniper\Webservice\ReadBookingResponse;
use StayForLong\Juniper\Domain\Hotel\BookingInfo;
use StayForLong\Juniper\Infrastructure\Services\WebService;
use StayForLong\Juniper\Infrastructure\Services\JuniperWebService;

class BookingDetail
{
	/**
	 * @var JuniperWebService
	 */
	private $juniperWebService;
	/** @var  */
	private $reservationLocator;

	/**
	 * BookingDetail constructor.
	 * @param JuniperWebService $juniperWebService
	 * @param $reservationLocator
	 */
	public function __construct(JuniperWebService $juniperWebService, $reservationLocator)
	{
		$this->juniperWebService  = $juniperWebService;
		$this->reservationLocator = $reservationLocator;
	}


	/**
	 * @param $reservationLocator
	 * @return ReadBookingResponse
	 */
	public function __invoke()
	{
		$readBookingRQ = new JP_ReadRQ(WebService::JUNIPER_WS_VERSION, WebService::JUNIPER_WS_VERSION);
		$readBookingRQ->setLogin($this->juniperWebService->login());
		$readBookingRQ->setReadRequest(new JP_ReadRequest($this->reservationLocator->value()));
		$readBooking = new ReadBooking($readBookingRQ);

		return $this->juniperWebService->service()->ReadBooking($readBooking);

	}
}