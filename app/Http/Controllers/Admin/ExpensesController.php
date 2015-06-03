<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Expense;
use App\ExpenseCategory;
use App\ExpenseSubCategory;
use App\Language;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\ExpenseRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ExpensesController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.expenses.index');
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
		$expenseCategories = ExpenseCategory::all();
		$expenseCategory = "";
		$expenseSubCategories = ExpenseSubCategory::all();
		$expenseSubCategory = "";
        // Show the page
        return view('admin.expenses.create_edit', compact('languages', 'language','expenseCategories','expenseCategory', 'expenseSubCategories', 'expenseSubCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(expenseRequest $request)
    {
        $expense = new Expense();
        $expense -> user_id = Auth::id();
        $expense -> language_id = $request->language_id;
        $expense -> title = $request->title;
        $expense -> expense_category_id = $request->expense_category_id;
        $expense -> expense_sub_category_id = $request->expense_sub_category_id;
        $expense -> date_of_purchase = $request->date_of_purchase;
        $expense -> introduction = $request->introduction;
        $expense -> content = $request->content;
        $expense -> source = $request->source;

        $picture = "";
        if(Input::hasFile('picture'))
        {
            $file = Input::file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $expense -> picture = $picture;
        $expense -> save();

        if(Input::hasFile('picture'))
        {
            $destinationPath = public_path() . '/images/expense/'.$expense->id.'/';
            Input::file('picture')->move($destinationPath, $picture);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $expense = Expense::find($id);
        $languages = Language::all();
        $language = $expense->language_id;
		$expenseCategories = ExpenseCategory::all();
		$expenseSubCategories = ExpenseSubCategory::all();
		$expenseCategory = $expense->expense_category_id;
		$expenseSubCategory = $expense -> expense_sub_category_id;
		$expense -> date_of_purchase = $expense->date_of_purchase;
		$expense -> introduction = $expense->introduction;
		$expense -> content = $expense->content;
		$expense -> source = $expense->source;
        return view('admin.expenses.create_edit',compact('expense','languages','language','expenseCategories', 'expenseSubCategories', 'expenseCategory', 'expenseSubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(ExpenseRequest $request, $id)
    {
        $expense = Expense::find($id);
        $expense -> user_id = Auth::id();
        $expense -> language_id = $request->language_id;
        $expense -> title = $request->title;
        $expense -> expense_category_id = $request->expense_category_id;
        $expense -> expense_sub_category_id = $request->expense_sub_category_id;
        $expense -> date_of_purchase = $request->date_of_purchase;
        $expense -> introduction = $request->introduction;
        $expense -> content = $request->content;
        $expense -> source = $request->source;

        $picture = "";
        if(Input::hasFile('picture'))
        {
            $file = Input::file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $expense -> picture = $picture;
        $expense -> save();

        if(Input::hasFile('picture'))
        {
            $destinationPath = public_path() . '/images/expense/'.$expense->id.'/';
            Input::file('picture')->move($destinationPath, $picture);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function getDelete($id)
    {
        $expense = Expense::find($id);
        // Show the page
        return view('admin.expenses.delete', compact('expense'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $expense = Expense::find($id);
        $expense->delete();
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $expense = Expense::join('languages', 'languages.id', '=', 'expenses.language_id')
            ->join('expense_categories', 'expense_categories.id', '=', 'expenses.expense_category_id')
            ->join('expense_sub_categories', 'expense_sub_categories.id', '=', 'expenses.expense_sub_category_id')
            ->select(array('expenses.id','expenses.title','expense_categories.title as category', 'expense_sub_categories.title as subcategory', 'expenses.date_of_purchase', 'expenses.created_at'))
            ->orderBy('expenses.position', 'ASC');

        return Datatables::of($expense)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/expenses/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/expenses/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')->make();
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
                Expense::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }
}
