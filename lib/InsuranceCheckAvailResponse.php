<?php

namespace Juniper\Webservice;

class InsuranceCheckAvailResponse
{

    /**
     * @var JP_CheckAvailRS $CheckAvailRS
     */
    protected $CheckAvailRS = null;

    /**
     * @param JP_CheckAvailRS $CheckAvailRS
     */
    public function __construct($CheckAvailRS)
    {
      $this->CheckAvailRS = $CheckAvailRS;
    }

    /**
     * @return JP_CheckAvailRS
     */
    public function getCheckAvailRS()
    {
      return $this->CheckAvailRS;
    }

    /**
     * @param JP_CheckAvailRS $CheckAvailRS
     * @return InsuranceCheckAvailResponse
     */
    public function setCheckAvailRS($CheckAvailRS)
    {
      $this->CheckAvailRS = $CheckAvailRS;
      return $this;
    }

}
