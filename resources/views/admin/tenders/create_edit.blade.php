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
	action="@if(isset($tender)){{ URL::to('admin/tenders/'.$tender->id.'/edit') }}
	        @else{{ URL::to('admin/tenders/create') }}@endif"
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
					class="form-group {{{ $errors->has('customer_id') ? 'error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="customer_id">{{
							trans("admin/tenders.customer_id") }}</label> 
							<select
							style="width: 100%" name="customer_id" id="customer_id"
							class="form-control"> 
							@foreach($customers as $item)
								<option value="{{$item->id}}"
									@if(!empty($customer_id))
                                        @if($item->id==$customer_id)
									selected="selected" @endif @endif >{{$item->company_name}}
								</option>
							@endforeach
						</select>
						{!!$errors->first('customer_id', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('reference_number') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="reference_number"> {{
							trans("admin/tenders.reference_number") }}</label> <input
							class="form-control" type="text" name="reference_number" id="reference_number"
							value="{{{ Input::old('reference_number', isset($tender) ? $tender->reference_number : null) }}}" />
						{!!$errors->first('reference_number', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('validity') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="validity"> {{
							trans("admin/tenders.validity") }}</label> <input
							class="form-control" type="text" name="validity" id="validity"
							value="{{{ Input::old('validity', isset($tender) ? $tender->validity : null) }}}" />
						{!!$errors->first('validity', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
			
				<div
					class="form-group {{{ $errors->has('date_of') ? 'error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="title">{{
							trans("admin/tenders.date_of") }}</label> <input
							class="form-control" type="date" name="date_of" id="date_of"
							value="{{{ Input::old('date_of', isset($tender) ? $tender->date_of : null) }}}" />
						{!! $errors->first('date_of', '<label class="control-label">:message</label>')
						!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('payment') ? 'error' : '' }}}">
					<div class="col-md-12">
					<label class="control-label" for="payment">{{
							trans("admin/tenders.payment") }}</label> 
						<select style="width: 100%" name="payment" id="payment" class="form-control">
						 		<option value=""></option> 
								<option value="cash" @if(isset($tender->payment)) @if($tender->payment==$tender->payment) selected="selected" @endif @endif>Cash</option>
								<option value="Check" @if(isset($tender->payment)) @if($tender->payment==$tender->payment) selected="selected" @endif @endif>Check</option>
								<option value="LG" @if(isset($tender->payment)) @if($tender->payment==$tender->payment) selected="selected" @endif @endif>LG</option>
						</select>
					
						{!! $errors->first('payment', '<label class="control-label">:message</label>') !!}
					</div>
				</div>
				
				
				<div
					class="form-group {{{ $errors->has('bid_bond') ? 'error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="bid_bond">{{
							trans("admin/tenders.bid_bond") }}</label> 
							<select style="width: 100%" name="bid_bond" id="bid_bond" class="form-control">
							    <option value=""></option> 
								<option value="yes" @if(isset($tender->bid_bond)) @if($tender->bid_bond=='yes') selected="selected" @endif @endif>Yes</option>
								<option value="no" @if(isset($tender->bid_bond)) @if($tender->bid_bond=='no') selected="selected" @endif @endif>No</option>
						</select>
						{!! $errors->first('bid_bond', '<label class="control-label">:message</label>') !!}

					</div>
				</div>
				
				
				
				<div
					class="form-group {{{ $errors->has('bond_payment_method') ? 'error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="bond_payment_method">{{
							trans("admin/tenders.bond_payment_method") }}</label> <input
							class="form-control" type="text" name="bond_payment_method" id="bond_payment_method"
							value="{{{ Input::old('bond_payment_method', isset($tender) ? $tender->bond_payment_method : null) }}}" />
						{!! $errors->first('bond_payment_method', '<label class="control-label">:message</label>') !!}
					</div>
				</div>
				
				
				<div
					class="form-group {{{ $errors->has('bank_name_and_cover_method') ? 'error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="bank_name_and_cover_method">{{
							trans("admin/tenders.bank_name_and_cover_method") }}</label> <input
							class="form-control" type="text" name="bank_name_and_cover_method" id="bank_name_and_cover_method"
							value="{{{ Input::old('bank_name_and_cover_method', isset($tender) ? $tender->bank_name_and_cover_method	 : null) }}}" />
						{!! $errors->first('bank_name_and_cover_method', '<label class="control-label">:message</label>')
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
						@if	(isset($tender)) 
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
