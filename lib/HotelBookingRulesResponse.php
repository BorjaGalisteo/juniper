<?php

namespace Juniper\Webservice;

class HotelBookingRulesResponse
{

    /**
     * @var JP_BookingRulesRS $BookingRulesRS
     */
    protected $BookingRulesRS = null;

    /**
     * @param JP_BookingRulesRS $BookingRulesRS
     */
    public function __construct($BookingRulesRS)
    {
      $this->BookingRulesRS = $BookingRulesRS;
    }

    /**
     * @return JP_BookingRulesRS
     */
    public function getBookingRulesRS()
    {
      return $this->BookingRulesRS;
    }

    /**
     * @param JP_BookingRulesRS $BookingRulesRS
     * @return HotelBookingRulesResponse
     */
    public function setBookingRulesRS($BookingRulesRS)
    {
      $this->BookingRulesRS = $BookingRulesRS;
      return $this;
    }

}
