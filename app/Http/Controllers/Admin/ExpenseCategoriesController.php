<?php namespace App\Http\Controllers\Admin;

use App\ExpenseCategory;
use App\Language;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\ExpenseCategoryRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ExpenseCategoriesController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.expensescategory.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$languages = Language::all();
		$language = "";
		// Show the page
		return view('admin.expensescategory.create_edit', compact('languages','language'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(ExpensesCategoryRequest $request)
	{
		$expensescategory = new ExpenseCategory();
		$expensescategory -> user_id = Auth::id();
		$expensescategory -> language_id = $request->language_id;
		$expensescategory -> title = $request->title;
		$expensescategory -> save();
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$expensescategory = ExpenseCategory::find($id);
		$language = $expensescategory->language_id;
		$languages = Language::all();

		return view('admin.expensescategory.create_edit',compact('expensescategory','languages','language'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(ExpensesCategoryRequest $request, $id)
	{
		$expensescategory = ExpenseCategory::find($id);
		$expensescategory -> user_id_edited = Auth::id();
		$expensescategory -> language_id = $request->language_id;
		$expensescategory -> title = $request->title;
		$expensescategory -> save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */

	public function getDelete($id)
	{
		$expensescategory = ExpenseCategory::find($id);
		// Show the page
		return view('admin.expensescategory.delete', compact('expensescategory'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */
	public function postDelete(DeleteRequest $request,$id)
	{
		$expensescategory = ExpenseCategory::find($id);
		$expensescategory->delete();
	}

	/**
	 * Show a list of all the languages posts formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function data()
	{
		$expense_categories = ExpenseCategory::join('languages', 'languages.id', '=', 'expense_categories.language_id')
		->select(array('expense_categories.id','expense_categories.title', 'languages.name', 'expense_categories.created_at'))
		->orderBy('expense_categories.position', 'ASC');

		return Datatables::of($expense_categories)
		->add_column('actions', '<a href="{{{ URL::to(\'admin/expensescategory/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/expensescategory/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                <input type="hidden" name="row" value="{{$id}}" id="row">')
                ->remove_column('id')

                ->make();
	}

	/**
	 * Reorder items
	 *
	 * @param items list
	 * @return items from @param
	 */
	public function getReorder(ReorderRequest $request) {
		$list = $request->list;
		$items = explode(",", $list);
		$order = 1;
		foreach ($items as $value) {
			if ($value != '') {
				ExpenseCategory::where('id', '=', $value) -> update(array('position' => $order));
				$order++;
			}
		}
		return $list;
	}

}

