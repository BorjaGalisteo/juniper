<?php

namespace Juniper\Webservice;

class JP_SearchSegmentsHotels
{

    /**
     * @var JP_SearchSegmentHotels $SearchSegmentHotels
     */
    protected $SearchSegmentHotels = null;

    /**
     * @var int $Nights
     */
    protected $Nights = null;

    /**
     * @var ArrayOfString3 $Suppliers
     */
    protected $Suppliers = null;

    /**
     * @var ArrayOfString5 $HotelCodes
     */
    protected $HotelCodes = null;

    /**
     * @var string $HotelName
     */
    protected $HotelName = null;

    /**
     * @var string $CountryOfResidence
     */
    protected $CountryOfResidence = null;

    /**
     * @var ArrayOfJP_HotelCategory $HotelCategories
     */
    protected $HotelCategories = null;

    /**
     * @var ArrayOfJP_HotelType $HotelTypes
     */
    protected $HotelTypes = null;

    /**
     * @var ArrayOfJP_PropertyType $PropertyTypes
     */
    protected $PropertyTypes = null;

    /**
     * @var ArrayOfJP_Board $Boards
     */
    protected $Boards = null;

    /**
     * @var ArrayOfJP_SupplementHotelType $SupplementTypes
     */
    protected $SupplementTypes = null;

    /**
     * @var string $InfoSource
     */
    protected $InfoSource = null;

    /**
     * @var string $ProductClass
     */
    protected $ProductClass = null;

    /**
     * @var ArrayOfString6 $PromoCodes
     */
    protected $PromoCodes = null;

    /**
     * @var PaymentType $PaymentType
     */
    protected $PaymentType = null;

    /**
     * @var JP_PackageContracts $PackageContracts
     */
    protected $PackageContracts = null;

    /**
     * @var ArrayOfJP_DailyHotelContract $DailyContracts
     */
    protected $DailyContracts = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return JP_SearchSegmentHotels
     */
    public function getSearchSegmentHotels()
    {
      return $this->SearchSegmentHotels;
    }

    /**
     * @param JP_SearchSegmentHotels $SearchSegmentHotels
     * @return JP_SearchSegmentsHotels
     */
    public function setSearchSegmentHotels($SearchSegmentHotels)
    {
      $this->SearchSegmentHotels = $SearchSegmentHotels;
      return $this;
    }

    /**
     * @return int
     */
    public function getNights()
    {
      return $this->Nights;
    }

    /**
     * @param int $Nights
     * @return JP_SearchSegmentsHotels
     */
    public function setNights($Nights)
    {
      $this->Nights = $Nights;
      return $this;
    }

    /**
     * @return ArrayOfString3
     */
    public function getSuppliers()
    {
      return $this->Suppliers;
    }

    /**
     * @param ArrayOfString3 $Suppliers
     * @return JP_SearchSegmentsHotels
     */
    public function setSuppliers($Suppliers)
    {
      $this->Suppliers = $Suppliers;
      return $this;
    }

    /**
     * @return ArrayOfString5
     */
    public function getHotelCodes()
    {
      return $this->HotelCodes;
    }

    /**
     * @param array $HotelCodes
     * @return JP_SearchSegmentsHotels
     */
    public function setHotelCodes($HotelCodes)
    {
      $this->HotelCodes = $HotelCodes;
      return $this;
    }

    /**
     * @return string
     */
    public function getHotelName()
    {
      return $this->HotelName;
    }

    /**
     * @param string $HotelName
     * @return JP_SearchSegmentsHotels
     */
    public function setHotelName($HotelName)
    {
      $this->HotelName = $HotelName;
      return $this;
    }

    /**
     * @return string
     */
    public function getCountryOfResidence()
    {
      return $this->CountryOfResidence;
    }

    /**
     * @param string $CountryOfResidence
     * @return JP_SearchSegmentsHotels
     */
    public function setCountryOfResidence($CountryOfResidence)
    {
      $this->CountryOfResidence = $CountryOfResidence;
      return $this;
    }

    /**
     * @return ArrayOfJP_HotelCategory
     */
    public function getHotelCategories()
    {
      return $this->HotelCategories;
    }

    /**
     * @param ArrayOfJP_HotelCategory $HotelCategories
     * @return JP_SearchSegmentsHotels
     */
    public function setHotelCategories($HotelCategories)
    {
      $this->HotelCategories = $HotelCategories;
      return $this;
    }

    /**
     * @return ArrayOfJP_HotelType
     */
    public function getHotelTypes()
    {
      return $this->HotelTypes;
    }

    /**
     * @param ArrayOfJP_HotelType $HotelTypes
     * @return JP_SearchSegmentsHotels
     */
    public function setHotelTypes($HotelTypes)
    {
      $this->HotelTypes = $HotelTypes;
      return $this;
    }

    /**
     * @return ArrayOfJP_PropertyType
     */
    public function getPropertyTypes()
    {
      return $this->PropertyTypes;
    }

    /**
     * @param ArrayOfJP_PropertyType $PropertyTypes
     * @return JP_SearchSegmentsHotels
     */
    public function setPropertyTypes($PropertyTypes)
    {
      $this->PropertyTypes = $PropertyTypes;
      return $this;
    }

    /**
     * @return ArrayOfJP_Board
     */
    public function getBoards()
    {
      return $this->Boards;
    }

    /**
     * @param ArrayOfJP_Board $Boards
     * @return JP_SearchSegmentsHotels
     */
    public function setBoards($Boards)
    {
      $this->Boards = $Boards;
      return $this;
    }

    /**
     * @return ArrayOfJP_SupplementHotelType
     */
    public function getSupplementTypes()
    {
      return $this->SupplementTypes;
    }

    /**
     * @param ArrayOfJP_SupplementHotelType $SupplementTypes
     * @return JP_SearchSegmentsHotels
     */
    public function setSupplementTypes($SupplementTypes)
    {
      $this->SupplementTypes = $SupplementTypes;
      return $this;
    }

    /**
     * @return string
     */
    public function getInfoSource()
    {
      return $this->InfoSource;
    }

    /**
     * @param string $InfoSource
     * @return JP_SearchSegmentsHotels
     */
    public function setInfoSource($InfoSource)
    {
      $this->InfoSource = $InfoSource;
      return $this;
    }

    /**
     * @return string
     */
    public function getProductClass()
    {
      return $this->ProductClass;
    }

    /**
     * @param string $ProductClass
     * @return JP_SearchSegmentsHotels
     */
    public function setProductClass($ProductClass)
    {
      $this->ProductClass = $ProductClass;
      return $this;
    }

    /**
     * @return ArrayOfString6
     */
    public function getPromoCodes()
    {
      return $this->PromoCodes;
    }

    /**
     * @param ArrayOfString6 $PromoCodes
     * @return JP_SearchSegmentsHotels
     */
    public function setPromoCodes($PromoCodes)
    {
      $this->PromoCodes = $PromoCodes;
      return $this;
    }

    /**
     * @return PaymentType
     */
    public function getPaymentType()
    {
      return $this->PaymentType;
    }

    /**
     * @param PaymentType $PaymentType
     * @return JP_SearchSegmentsHotels
     */
    public function setPaymentType($PaymentType)
    {
      $this->PaymentType = $PaymentType;
      return $this;
    }

    /**
     * @return JP_PackageContracts
     */
    public function getPackageContracts()
    {
      return $this->PackageContracts;
    }

    /**
     * @param JP_PackageContracts $PackageContracts
     * @return JP_SearchSegmentsHotels
     */
    public function setPackageContracts($PackageContracts)
    {
      $this->PackageContracts = $PackageContracts;
      return $this;
    }

    /**
     * @return ArrayOfJP_DailyHotelContract
     */
    public function getDailyContracts()
    {
      return $this->DailyContracts;
    }

    /**
     * @param ArrayOfJP_DailyHotelContract $DailyContracts
     * @return JP_SearchSegmentsHotels
     */
    public function setDailyContracts($DailyContracts)
    {
      $this->DailyContracts = $DailyContracts;
      return $this;
    }

}
