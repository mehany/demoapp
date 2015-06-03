@extends('admin.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}
<form class="form-horizontal" enctype="multipart/form-data"
	method="post"
	action="@if(isset($mission)){{ URL::to('admin/missions/'.$mission->id.'/edit') }}
	        @else{{ URL::to('admin/missions/create') }}@endif"
	autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<div class="tab-pane active" id="tab-general">
				
				<div
					class="form-group {{{ $errors->has('type') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="type"> {{
							trans("admin/missions.type") }}</label> <input
							class="form-control" type="text" name="type" id="type"
							value="{{{ Input::old('type', isset($mission) ? $mission->type : null) }}}" />
						{!!$errors->first('type', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('head_of_mission') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="head_of_mission"> {{
							trans("admin/missions.head_of_mission") }}</label> <input
							class="form-control" type="text" name="head_of_mission" id="head_of_mission"
							value="{{{ Input::old('head_of_mission', isset($mission) ? $mission->head_of_mission : null) }}}" />
						{!!$errors->first('head_of_mission', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('date_of') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="date_of"> {{
							trans("admin/missions.date_of") }}</label> <input
							class="form-control" type="text" name="date_of" id="date_of"
							value="{{{ Input::old('date_of', isset($mission) ? $mission->date_of : null) }}}" />
						{!!$errors->first('date_of', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('memo') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="memo">{{
							trans("admin/missions.memo") }}</label>
						<textarea class="form-control full-width wysihtml5" name="memo"
							value="memo" rows="10">{{{ Input::old('memo', isset($mission) ? $mission->memo : null) }}}</textarea>
						{!! $errors->first('memo', '<label class="control-label">:message</label>')
						!!}
					</div>
				</div>
				
				
				<!-- ./ general tab -->
			</div>
			<!-- ./ tabs content -->

			<!-- Form Actions -->

			<div class="form-group">
				<div class="col-md-12">
					<button type="reset" class="btn btn-sm btn-warning close_popup">
						<span class="glyphicon glyphicon-ban-circle"></span> {{
						trans("admin/modal.cancel") }}
					</button>
					<button type="reset" class="btn btn-sm btn-default">
						<span class="glyphicon glyphicon-remove-circle"></span> {{
						trans("admin/modal.reset") }}
					</button>
					<button type="submit" class="btn btn-sm btn-success">
						<span class="glyphicon glyphicon-ok-circle"></span> 
						@if	(isset($mission)) 
						  {{ trans("admin/modal.edit") }}
						@else 
						  {{trans("admin/modal.create") }}
						@endif
					</button>
				</div>
			</div>
			<!-- ./ form actions -->

</form>
@stop
