<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Tender;
use App\Customer;
use App\Language;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\TenderRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class TenderController extends AdminController {

	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tenders = Tender::all();
		
		// Show the page
		return view('admin.tenders.index', compact('tenders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$customers = Customer::all();
		$customer_id = "";
		// Show the page
		return view('admin.tenders.create_edit', compact('customers', 'customer_id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(TenderRequest $request)
	{

		$tender = new Tender();
		
		$tender -> user_id = Auth::id();
		$tender->customer_id = $request->customer_id ;
		$tender->reference_number = $request->reference_number ;
		$tender->validity = $request->validity ;
		$tender->date_of = $request->date_of ;
		$tender->payment = $request->payment ;
		$tender->bid_bond = $request->bid_bond ;
		$tender->bond_payment_method = $request->bond_payment_method ;
		$tender->bank_name_and_cover_method  = $request->bank_name_and_cover_method ;// (Cash or Deposit)
		
		$tender -> save();

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$tender  = Tender::find($id);
		$customers = Customer::all();

		return view('admin.tenders.create_edit', compact('tender', 'customers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(TenderRequest $request, $id)
	{
		$tender = Tender::find($id);
		$tender -> user_id = Auth::id();
		$tender->customer_id = $request->customer_id ;
		$tender->reference_number = $request->reference_number ;
		$tender->validity = $request->validity ;
		$tender->date_of = $request->date_of ;
		$tender->payment = $request->payment ;
		$tender->bid_bond = $request->bid_bond ;
		$tender->bond_payment_method = $request->bond_payment_method ;
		$tender->bank_name_and_cover_method  = $request->bank_name_and_cover_method ;// (Cash or Deposit)

		$tender -> save();


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */

	public function getDelete($id)
	{
		$tender = Tender::find($id);
		// Show the page
		return view('admin.tenders.delete', compact('tender'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */
	public function postDelete(DeleteRequest $request,$id)
	{
		$tender = Tender::find($id);
		$tender->delete();
	}


	/**
	 * Show a list of all the languages posts formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function data()
	{
		$tender = Tender::join('customers', 'customers.id', '=', 'tenders.customer_id')
		->select(array('tenders.id', 'customers.company_name', 'tenders.reference_number','tenders.validity', 'tenders.bid_bond', 'tenders.created_at'))
		->orderBy('tenders.id', 'ASC');

		return Datatables::of($tender)
		->add_column('actions', '<a href="{{{ URL::to(\'admin/tenders/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/tenders/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
				Tender::where('id', '=', $value) -> update(array('position' => $order));
				$order++;
			}
		}
		return $list;
	}
}

