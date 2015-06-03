<?php namespace App\Http\Controllers\Admin;

use App\ExpenseCategory;
use App\ExpenseSubCategory;
use App\Language;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\ExpenseCategoryRequest;
use App\Http\Requests\Admin\ExpenseSubCategoryRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ExpenseSubCategoriesController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.expensessubcategory.index');
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
		$categories = ExpenseCategory::all();
		$category = "";
		// Show the page
		return view('admin.expensessubcategory.create_edit', compact('languages','language', 'categories', 'category'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(expensessubcategoryRequest $request)
	{
		$expensessubcategory = new ExpenseSubCategory();
		$expensessubcategory -> user_id = Auth::id();
		$expensessubcategory -> language_id = $request->language_id;
		$expensessubcategory -> expense_category_id = $request->expense_category_id;
		$expensessubcategory -> title = $request->title;
		$expensessubcategory -> save();
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$expensessubcategory = ExpenseSubCategory::find($id);
		$language = $expensessubcategory->language_id;
		$languages = Language::all();
		$categories = ExpenseCategory::all();
		$category 	= $expensessubcategory->expense_category_id;

		return view('admin.expensessubcategory.create_edit',compact('expensessubcategory','languages','language', 'categories', 'category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(expensessubcategoryRequest $request, $id)
	{
		$expensessubcategory = ExpenseSubCategory::find($id);
		$expensessubcategory -> user_id_edited = Auth::id();
		$expensessubcategory -> language_id = $request->language_id;
		$expensessubcategory -> expense_category_id = $request->expense_category_id;
		$expensessubcategory -> title = $request->title;
		$expensessubcategory -> save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */

	public function getDelete($id)
	{
		$expensessubcategory = ExpenseSubCategory::find($id);
		// Show the page
		return view('admin.expensessubcategory.delete', compact('expensessubcategory'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */
	public function postDelete(DeleteRequest $request,$id)
	{
		$expensessubcategory = ExpenseSubCategory::find($id);
		$expensessubcategory->delete();
	}

	/**
	 * Show a list of all the languages posts formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function data()
	{
		$expense_categories = ExpenseSubCategory::join('languages', 'languages.id', '=', 'expense_sub_categories.language_id')
		->select(array('expense_sub_categories.id','expense_sub_categories.title', 'languages.name', 'expense_sub_categories.created_at'))
		->orderBy('expense_sub_categories.position', 'ASC');

		return Datatables::of($expense_categories)
		->add_column('actions', '<a href="{{{ URL::to(\'admin/expensessubcategory/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/expensessubcategory/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
				ExpenseSubCategory::where('id', '=', $value) -> update(array('position' => $order));
				$order++;
			}
		}
		return $list;
	}

}

