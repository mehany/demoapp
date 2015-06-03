<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model {

	//


	
	
	private    $user_id;
	private    $type; // (visit clients or supplier)
	private    $head_of_mission;
	protected  $date_of; //(to be indicated in period)

	
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
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getHeadOfMission()
	{
		return $this->head_of_mission;
	}

	/**
	 * @param mixed $head_of_mission
	 */
	public function setHeadOfMission($head_of_mission)
	{
		$this->head_of_mission = $head_of_mission;
	}

	/**
	 * @return mixed
	 */
	public function getDateOf()
	{
		return $this->date_of;
	}

	/**
	 * @param mixed $date_of
	 */
	public function setDateOf($date_of)
	{
		$this->date_of = $date_of;
	}
	


	
	
	

}
