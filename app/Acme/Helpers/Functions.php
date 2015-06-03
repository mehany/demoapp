<?php namespace App\Acme\Helpers;

use Carbon\Carbon as Carbon;


class Functions{
	
	/**
	 * Initializer.
	 *
	 * @return \HelperFunctions
	 */
	public function __construct()
	{
		
	}
	
	
	public static function laraCheckTime($time){
	
		try{
			$test =	Carbon::parse($time)->format('H:i:s');
			return $test;
		}catch(Exception $e){
			return $time;
		};
	}
	
	
	public static function laraCheckDate($date){
	
		try{
			$test =	Carbon::parse($date)->format('Y-m-d');
			return $test;
		}catch(Exception $e){
			return $date;
		};
	}	
	
	
}
