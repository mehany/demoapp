<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Mission;
use App\Language;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\MissionRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Acme\Helpers\Functions;

class MissionController extends AdminController {

	/*
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show the page
		return view('admin.missions.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		// Show the page
		return view('admin.missions.create_edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(MissionRequest $request)
	{

		$mission = new Mission();

		$mission ->user_id = Auth::id();
		$mission ->type = $request->type;
		$mission ->head_of_mission = $request->head_of_mission;
		$mission ->date_of = Functions::laraCheckDate($request->date_of);
		$mission ->memo = $request->memo;

		$mission -> save();

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$mission  = Mission::find($id);

		return view('admin.missions.create_edit',compact('mission'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(MissionRequest $request, $id)
	{
		$mission = Mission::find($id);
		$mission -> user_id = Auth::id();				
		$mission ->type = $request->type;
		$mission ->head_of_mission = $request->head_of_mission;
		$mission ->date_of = Functions::laraCheckDate($request->date_of);
		$mission ->memo = $request->memo;

		$mission -> save();


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */

	public function getDelete($id)
	{
		$mission = Mission::find($id);
		// Show the page
		return view('admin.missions.delete', compact('mission'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return Response
	 */
	public function postDelete(DeleteRequest $request,$id)
	{
		$mission = Mission::find($id);
		$mission->delete();
	}


	/**
	 * Show a list of all the languages posts formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function data()
	{
		$mission = Mission::select(array('missions.id','missions.type','missions.head_of_mission as category', 'missions.date_of', 'missions.created_at'))
		->orderBy('missions.id', 'ASC');

		return Datatables::of($mission)
		->add_column('actions', '<a href="{{{ URL::to(\'admin/missions/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/missions/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
				Mission::where('id', '=', $value) -> update(array('position' => $order));
				$order++;
			}
		}
		return $list;
	}
}
