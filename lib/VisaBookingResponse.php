<?php

namespace Juniper\Webservice;

class VisaBookingResponse
{

    /**
     * @var JP_BookingRS $BookingRS
     */
    protected $BookingRS = null;

    /**
     * @param JP_BookingRS $BookingRS
     */
    public function __construct($BookingRS)
    {
      $this->BookingRS = $BookingRS;
    }

    /**
     * @return JP_BookingRS
     */
    public function getBookingRS()
    {
      return $this->BookingRS;
    }

    /**
     * @param JP_BookingRS $BookingRS
     * @return VisaBookingResponse
     */
    public function setBookingRS($BookingRS)
    {
      $this->BookingRS = $BookingRS;
      return $this;
    }

}
