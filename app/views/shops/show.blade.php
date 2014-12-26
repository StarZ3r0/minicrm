@extends('layouts/default')

@section('meta')
	<meta name="description" content="MiniCRM próbafeladat bolt részletei oldal.">
  <meta name="keywords" content="minicrm, próbafeladat, bolt, bolt részletei">
@stop

@section('title')
  Bolt részletei ::
  @parent
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>{{ $shop->name }}</h1>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Kulcs</th>
							<th>Érték</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Azonosító</td>
							<td>{{ $shop->id }}</td>
						</tr>
						<tr>
							<td>Bolt neve</td>
							<td>{{ $shop->name }}</td>
						</tr>
						<tr>
							<td>Írányítószám</td>
							<td>{{ $shop->zip }}</td>
						</tr>
						<tr>
							<td>Város</td>
							<td>{{ $shop->city }}</td>
						</tr>
						<tr>
							<td>Utca, házszám</td>
							<td>{{ $shop->address }}</td>
						</tr>
						<tr>
							<td>Telefonszám</td>
							<td>{{ $shop->phone }}</td>
						</tr>
						<tr>
							<td>Email cím</td>
							<td>{{ $shop->email }}</td>
						</tr>
						<tr>
							<td>Weboldal</td>
							<td>{{ $shop->website }}</td>
						</tr>
						<tr>
							<td>Aktív</td>
							<td>@if ($shop->active === 1) {{ 'Igen' }} @else {{ 'Nem' }} @endif</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h2>Értékelés</h2>
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
		  @if (Session::has('message'))
		  <div class="alert alert-success">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    {{ Session::get('message') }}
		  </div>
		  @endif
			{{ Form::open(array('url' => 'ratings/create', 'data-parsley-validate' => '')) }}
			<div class="form-group">
				<label>Hogyan értékeli a boltot?</label>
				<div class="raty"></div>
			</div>
			<div class="form-group">
				<label for="comment">Vélemény</label>
				<textarea class="form-control" rows="6" id="comment" name="comment" data-parsley-required="true">{{ Input::old('comment') }}</textarea>
			</div>
			<div class="form-group">
				<label for="name">Név</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Név" value="{{Input::old('name')}}" data-parsley-required="true">
			</div>
			<div class="form-group">
				<label for="email">Email cím</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="example@domain.tld" value="{{Input::old('email')}}" data-parsley-required="true" data-parsley-type="email">
			</div>
			<input type="hidden" name="shop_id" value="{{ $shop->id }}">
			<button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Értékelés leadása</button>
			{{ Form::close() }}
		</div>
	</div>
	<h2>Korábbi értékelések</h2>
	@foreach ($ratings as $rating)
	<hr>
	<div class="row">
		<div class="col-md-2">
			<a href="mailto:{{ $rating->email }}" class="rating-author">{{ $rating->name }}</a>
			{{ $rating->created_at }}
		</div>
		<div class="col-md-10">
			<div class="rating-show">
				@for ($i = 1; $i <= 5; $i++)
	    		@if ($i <= $rating->rating)
						<i class="fa fa-star"></i>
	    		@else
				    <i class="fa fa-star-o"></i>
					@endif
				@endfor
			</div>
			{{ $rating->comment }}
		</div>
	</div>
	@endforeach
	
@stop
