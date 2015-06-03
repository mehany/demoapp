<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	//
	
	
	private $user_id;
	private $company_name;
	private $sector;
	private $industry;
	private $street_address;
	private $city;
	private $state;
	private $zipCode;
	private $phone1;
	private $phone2;
	private $phone3;
	private $fax1;
	private $fax2;
	private $memo;
	
	


	public function author()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	
	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * @param mixed $user_id
	 */
	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	/**
	 * @return mixed
	 */
	public function getCompanyName()
	{
		return $this->company_name;
	}

	/**
	 * @param mixed $company_name
	 */
	public function setCompanyName($company_name)
	{
		$this->company_name = $company_name;
	}

	/**
	 * @return mixed
	 */
	public function getMemo()
	{
		return $this->memo;
	}

	/**
	 * @param mixed $memo
	 */
	public function setMemo($memo)
	{
		$this->memo = $memo;
	}

	/**
	 * @return mixed
	 */
	public function getFax2()
	{
		return $this->fax2;
	}

	/**
	 * @param mixed $fax2
	 */
	public function setFax2($fax2)
	{
		$this->fax2 = $fax2;
	}

	/**
	 * @return mixed
	 */
	public function getFax1()
	{
		return $this->fax1;
	}

	/**
	 * @param mixed $fax1
	 */
	public function setFax1($fax1)
	{
		$this->fax1 = $fax1;
	}

	/**
	 * @return mixed
	 */
	public function getPhone2()
	{
		return $this->phone2;
	}

	/**
	 * @param mixed $phone2
	 */
	public function setPhone2($phone2)
	{
		$this->phone2 = $phone2;
	}

	/**
	 * @return mixed
	 */
	public function getPhone3()
	{
		return $this->phone3;
	}

	/**
	 * @param mixed $phone3
	 */
	public function setPhone3($phone3)
	{
		$this->phone3 = $phone3;
	}

	/**
	 * @return mixed
	 */
	public function getPhone1()
	{
		return $this->phone1;
	}

	/**
	 * @param mixed $phone1
	 */
	public function setPhone1($phone1)
	{
		$this->phone1 = $phone1;
	}

	/**
	 * @return mixed
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @param mixed $city
	 */
	public function setCity($city)
	{
		$this->city = $city;
	}

	/**
	 * @return mixed
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * @param mixed $state
	 */
	public function setState($state)
	{
		$this->state = $state;
	}

	/**
	 * @return mixed
	 */
	public function getZipCode()
	{
		return $this->zipCode;
	}

	/**
	 * @param mixed $zipCode
	 */
	public function setZipCode($zipCode)
	{
		$this->zipCode = $zipCode;
	}

	/**
	 * @return mixed
	 */
	public function getStreetAddress()
	{
		return $this->street_address;
	}

	/**
	 * @param mixed $street_address
	 */
	public function setStreetAddress($street_address)
	{
		$this->street_address = $street_address;
	}

	/**
	 * @return mixed
	 */
	public function getIndustry()
	{
		return $this->industry;
	}

	/**
	 * @param mixed $industry
	 */
	public function setIndustry($industry)
	{
		$this->industry = $industry;
	}

	/**
	 * @return mixed
	 */
	public function getSector()
	{
		return $this->sector;
	}

	/**
	 * @param mixed $sector
	 */
	public function setSector($sector)
	{
		$this->sector = $sector;
	}
	

	


}
