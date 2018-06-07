<?php

namespace StayForLong\Juniper\Domain\Hotel;

class Pax
{
	/**
	 * @var integer
	 */
	protected $id_pax;

	/**
	 * @var integer
	 */
	protected $age;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $surname;

	/**
	 * Pax constructor.
	 * @param integer $id_pax
	 * @param integer $age
	 * @param string $name
	 * @param string $surname
	 */
	public function __construct($id_pax, $age, $name = "", $surname = "")
	{
		$this->id_pax  = $id_pax;
		$this->age     = $age;
		$this->name    = $name;
		$this->surname = $surname;
	}

	/**
	 * @return int
	 */
	public function idPax()
	{
		return $this->id_pax;
	}

	/**
	 * @return int
	 */
	public function age()
	{
		return $this->age ?? 30;
	}

	/**
	 * @return string
	 */
	public function name()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function surname()
	{
		return $this->surname;
	}
}