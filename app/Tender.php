<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model {

	
	
	//
	

	private $customer_id;
	private $reference_number;
	private $validity;
	private $date_of;
	private $payment;
	private $bid_bond;
	//(yes or no), if yes;
	private $bond_payment_method;
	//(Cash/check/LG), in case of LG;
	private $bank_name_and_cover_method;// (Cash or Deposit)
	
	public function author()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	
	public function customer()
	{
		return $this->belongsTo('App\Customer', 'customer_id');
	}
	
	

	/**
	 * @return mixed
	 */
	public function getCustomerId()
	{
		return $this->customer_id;
	}

	/**
	 * @param mixed $customer_id
	 */
	public function setCustomerId($customer_id)
	{
		$this->customer_id = $customer_id;
	}
	
	/**
	 * @return mixed
	 */
	public function getReferenceNumber()
	{
		return $this->reference_number;
	}
	
	/**
	 * @param mixed $reference_number
	 */
	public function setReferenceNumber($reference_number)
	{
		$this->reference_number = $reference_number;
	}
	
	/**
	 * @return mixed
	 */
	public function getValidity()
	{
		return $this->validity;
	}
	
	/**
	 * @param mixed $validity
	 */
	public function setValidity($validity)
	{
		$this->validity = $validity;
	}
	
	/**
	 * @return mixed
	 */
	public function getDateOf()
	{
		return $this->date_of;
	}
	
	/**
	 * @param mixed $date
	 */
	public function setDateO($date)
	{
		$this->date_of = $date_of;
	}
	
	/**
	 * @return mixed
	 */
	public function getPayment()
	{
		return $this->payment;
	}
	
	/**
	 * @param mixed $payment
	 */
	public function setPayment($payment)
	{
		$this->payment = $payment;
	}
	
	/**
	 * @return mixed
	 */
	public function getBidBond()
	{
		return $this->bid_bond;
	}
	
	/**
	 * @param mixed $bid_bond
	 */
	public function setBidBond($bid_bond)
	{
		$this->bid_bond = $bid_bond;
	}
	
	/**
	 * @return mixed
	 */
	public function getBondPaymentMethod()
	{
		return $this->bond_payment_method;
	}
	
	/**
	 * @param mixed $bond_payment_method
	 */
	public function setBondPaymentMethod($bond_payment_method)
	{
		$this->bond_payment_method = $bond_payment_method;
	}
	
	/**
	 * @return mixed
	 */
	public function getBankNameAndCoverMethod()
	{
		return $this->bank_name_and_cover_method;
	}
	
	/**
	 * @param mixed $bank_name_and_cover_method
	 */
	public function setBankNameAndCoverMethod($bank_name_and_cover_method)
	{
		$this->bank_name_and_cover_method = $bank_name_and_cover_method;
	}

}
