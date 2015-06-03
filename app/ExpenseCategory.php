<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class ExpenseCategory extends Model {

	protected $table = "expense_categories";

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function description()
	{
		return nl2br($this->description);
	}

	/**
	 * Get the author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the slider's images.
	 *
	 * @return array
	 */
	public function expenses()
	{
		return $this->belongsTo('App\Expense');
	}

	/**
	 * Get the category's language.
	 *
	 * @return Language
	 */
	public function language()
	{
		return $this->belongsTo('App\Language');
	}

}
