@extends('admin.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>

			<li>
	<button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
			</li>
</ul>


<!-- ./ tabs -->
{{-- Edit Customer information Form --}}
<form class="form-horizontal" enctype="multipart/form-data"
	method="post"
	action="@if(isset($customer)){{ URL::to('admin/customers/'.$customer->id.'/edit') }}
	        @else{{ URL::to('admin/customers/create') }}@endif"
	autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<div class="tab-pane active" id="tab-general">
				
				</div>
				<div
					class="form-group {{{ $errors->has('company_name') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="company_name"> {{
							trans("admin/customers.company_name") }}</label> <input
							class="form-control" type="text" name="company_name" id="company_name"
							value="{{{ Input::old('company_name', isset($customer) ? $customer->company_name : null) }}}" />
						{!!$errors->first('title', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="sector"> {{
							trans("admin/customers.sector") }}</label> <input
							class="form-control" type="text" name="sector" id="sector"
							value="{{{ Input::old('sector', isset($customer) ? $customer->sector : null) }}}" />
						{!!$errors->first('title', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('industry') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="industry"> {{
							trans("admin/customers.industry") }}</label> <input
							class="form-control" type="text" name="industry" id="industry"
							value="{{{ Input::old('industry', isset($customer) ? $customer->industry : null) }}}" />
						{!!$errors->first('title', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				
				<div
					class="form-group {{{ $errors->has('street_address') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="street_address"> {{
							trans("admin/customers.street_address") }}</label> <input
							class="form-control" type="text" name="street_address" id="street_address"
							value="{{{ Input::old('street_address', isset($customer) ? $customer->street_address : null) }}}" />
						{!!$errors->first('street_address', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('city') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="street_address"> {{
							trans("admin/customers.city") }}</label> <input
							class="form-control" type="text" name="city" id="city"
							value="{{{ Input::old('city', isset($customer) ? $customer->city : null) }}}" />
						{!!$errors->first('street_address', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('state') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="state"> {{
							trans("admin/customers.state") }}</label> <input
							class="form-control" type="text" name="state" id="state"
							value="{{{ Input::old('state', isset($customer) ? $customer->state : null) }}}" />
						{!!$errors->first('state', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('zipCode') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="zipCode"> {{
							trans("admin/customers.zipCode") }}</label> <input
							class="form-control" type="text" name="zipCode" id="zipCode"
							value="{{{ Input::old('zipCode', isset($customer) ? $customer->zipCode : null) }}}" />
						{!!$errors->first('state', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('phone1') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="phone1"> {{
							trans("admin/customers.phone1") }}</label> <input
							class="form-control" type="text" name="phone1" id="zipCode"
							value="{{{ Input::old('phone1', isset($customer) ? $customer->phone1 : null) }}}" />
						{!!$errors->first('state', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('phone2') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="phone2"> {{
							trans("admin/customers.phone1") }}</label> <input
							class="form-control" type="text" name="phone2" id="phone2"
							value="{{{ Input::old('phone2', isset($customer) ? $customer->phone2 : null) }}}" />
						{!!$errors->first('phone2', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('phone3') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="phone3"> {{
							trans("admin/customers.phone3") }}</label> <input
							class="form-control" type="text" name="phone3" id="phone3"
							value="{{{ Input::old('phone3', isset($customer) ? $customer->phone3 : null) }}}" />
						{!!$errors->first('phone3', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('fax') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="fax"> {{
							trans("admin/customers.fax") }}</label> <input
							class="form-control" type="text" name="fax" id="fax"
							value="{{{ Input::old('fax', isset($customer) ? $customer->fax : null) }}}" />
						{!!$errors->first('phone3', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('fax2') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="fax2"> {{
							trans("admin/customers.fax2") }}</label> <input
							class="form-control" type="text" name="fax2" id="fax2"
							value="{{{ Input::old('fax2', isset($customer) ? $customer->fax2 : null) }}}" />
						{!!$errors->first('phone3', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				
				<div
					class="form-group {{{ $errors->has('memo') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="memo"> {{
							trans("admin/customers.fax2") }}</label> <input
							class="form-control" type="text" name="memo" id="memo"
							value="{{{ Input::old('memo', isset($customer) ? $customer->memo : null) }}}" />
						{!!$errors->first('memo', '<label class="control-label">:message</label>')!!}
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
						@if	(isset($customer)) 
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
