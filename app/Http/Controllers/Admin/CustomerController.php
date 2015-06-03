<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Customer;
use App\Language;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class CustomerController extends AdminController {

	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.customers.index');
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
		return view('admin.customers.create_edit', compact('languages', 'language'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(CustomerRequest $request)
	{

		$customer = new Customer();

		$customer ->user_id = Auth::id();
		$customer ->company_name = $request->company_name;
		$customer ->sector = $request->sector;
		$customer ->industry = $request->industry;
		$customer ->street_address = $request->street_address;
		$customer ->city = $request->city;
		$customer ->state = $request->state;
		$customer ->zipCode = $request->zipCode;
		$customer ->phone1 = $request->phone1;
		$customer ->phone2 = $request->phone2;
		$customer ->phone3 = $request->phone3;
		$customer ->fax = $request->fax;
		$customer ->fax2 = $request->fax2;
		$customer ->memo = $request->memo;

		$customer -> save();

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$customer  = Customer::find($id);
		
		return view('admin.customers.create_edit',compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(CustomerRequest $request, $id)
	{
		$customer = Customer::find($id);
		$customer -> user_id = Auth::id();
		
		$customer ->company_name = $request->company_name;
		$customer ->sector = $request->sector;
		$customer ->industry = $request->industry;
		$customer ->street_address = $request->street_address;
		$customer ->city = $request->city;
		$customer ->state = $request->state;
		$customer ->zipCode = $request->zipCode;
		$customer ->phone1 = $request->phone1;
		$customer ->phone2 = $request->phone2;
		$customer ->phone3 = $request->phone3;
		$customer ->fax = $request->fax;
		$customer ->fax2 = $request->fax2;
		$customer ->memo = $request->memo;
		
		$customer -> save();

		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */

	public function getDelete($id)
	{
		$customer = Customer::find($id);
		// Show the page
		return view('admin.customers.delete', compact('customer'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */
	public function postDelete(DeleteRequest $request,$id)
	{
		$customer = Customer::find($id);
		$customer->delete();
	}


	/**
	 * Show a list of all the languages posts formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function data()
	{
		$customer = Customer::select(array('customers.id','customers.company_name','customers.sector as category', 'customers.phone1', 'customers.created_at'))
		->orderBy('customers.company_name', 'ASC');

		return Datatables::of($customer)
		->add_column('actions', '<a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
				Customer::where('id', '=', $value) -> update(array('position' => $order));
				$order++;
			}
		}
		return $list;
	}
}
