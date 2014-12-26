@extends('layouts/default')

@section('meta')
	<meta name="description" content="MiniCRM próbafeladat bolt felvitele oldal.">
  <meta name="keywords" content="minicrm, próbafeladat, bolt, bolt felvitele">
@stop

@section('title')
  Új bolt hozzáadása ::
  @parent
@stop

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h1>Új bolt</h1>
			@if( $errors->count() > 0 )
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p>Hiba történt:</p>
        <ul id="form-errors">
          @foreach ($errors->all('<li>:message</li>') as $message)
		    		{{ $message }}
					@endforeach
        </ul>   
      </div>
      @endif
	    {{ Form::open(array('route' => 'shops.store', 'data-parsley-validate' => '')) }}
	    <fieldset>
				<legend>Általános adatok</legend>
				<div class="form-group">
					<label for="name">Bolt neve</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Bolt neve" value="{{Input::old('name')}}" data-parsley-required="true">
				</div>
				<div class="form-group">
					<label for="opening_hours">Nyitvatartási idő</label>
					<textarea  class="form-control" rows="6" id="opening_hours" name="opening_hours" data-parsley-required="true">{{ Input::old('opening_hours') }}</textarea>
				</div>
				<div class="checkbox">
		    	<label>
		    		{{ Form::checkbox('active', '1', true) }} Aktív?
		    	</label>
		    </div>
			</fieldset>
			<fieldset>
				<legend>Bolt címe</legend>
				<div class="form-group">
					<label for="zip">Írányítószám</label>
					<input type="text" class="form-control" name="zip" id="zip" placeholder="Írányítószám" value="{{Input::old('zip')}}" data-parsley-required="true">
				</div>
				<div class="form-group">
					<label for="city">Város</label>
					<input type="text" class="form-control" name="city" id="city" placeholder="Város" value="{{Input::old('city')}}" data-parsley-required="true">
				</div>
				<div class="form-group">
					<label for="address">Utca, házszám</label>
					<input type="text" class="form-control" name="address" id="address" placeholder="Utca, házszám" value="{{Input::old('address')}}" data-parsley-required="true">
				</div>
			</fieldset>
			<fieldset>
				<legend>Bolt elérhetőségei</legend>
				<div class="form-group">
					<label for="phone">Telefonszám</label>
					<input type="text" class="form-control" name="phone" id="phone" placeholder="+36-20-563-4941" value="{{Input::old('phone')}}" data-parsley-required="true">
				</div>
				<div class="form-group">
					<label for="email">Email cím</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="example@domain.tld" value="{{Input::old('email')}}" data-parsley-required="true" data-parsley-type="email">
				</div>
				<div class="form-group">
					<label for="website">Weboldal</label>
					<input type="text" class="form-control" name="website" id="website" placeholder="http://domain.tld" value="{{Input::old('website')}}">
				</div>
			</fieldset>
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Mentés</button>
	    {{ Form::close() }}
		</div>
	</div>
@stop