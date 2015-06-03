<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ExpenseRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'title' => 'required|min:3',
            'language_id' => 'required|integer',
            'expense_category_id' => 'required|integer',
			'expense_sub_category_id' => 'required|integer',
            'content' => 'required|min:20',
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}


}