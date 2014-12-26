@extends('layouts/default')

@section('meta')
	<meta name="description" content="MiniCRM próbafeladat bolt értékelő oldal hozzászólási lehetőséggel.">
  <meta name="keywords" content="minicrm, próbafeladat, bolt, értékelés">
@stop

@section('title')
  Bolt értékelő oldal ::
  @parent
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Boltok</h1>
			@if (Session::has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('message') }}
      </div>
      @endif
			<a href="/shops/create" class="btn btn-primary"><i class="fa fa-file"></i> Új bolt hozzáadása</a>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Bolt neve</th>
							<th>Bolt címe</th>
							<th>Bolt telefonszáma</th>
							<th>Bolt email címe</th>
							<th>Bolt weboldala</th>
							<th>Műveletek</th>
						</tr>
					</thead>
					<tbody>
						@if ($shops->isEmpty())
						<tr>
							<td colspan="7" class="text-center no-result">Nincs még bolt hozzáadva</td>
						</tr>
						@else	
							@foreach ($shops as $shop)
							<tr @if ($shop->active === 0) class="danger" @endif>
								<td>{{ $shop->id }}</td>
								<td>{{ $shop->name }}</td>
								<td>{{ $shop->zip . ' ' . $shop->city . ' ' . $shop->address }}</td>
								<td>{{ $shop->phone }}</td>
								<td><a href="mailto:{{ $shop->email }}">{{ $shop->email }}</a></td>
								<td><a href="{{ $shop->website }}">{{ $shop->website }}</a></td>
								<td class="cell-action">
									<a href="/shops/{{ $shop->id }}" class="btn btn-info pull-left"><i class="fa fa-eye"></i> Megtekintés</a>
									<a href="/shops/{{ $shop->id }}/edit" class="btn btn-success button-pull-left"><i class="fa fa-edit"></i> Szerkesztés</a>
									{{ Form::open(array('route' => array('shops.destroy', $shop->id), 'method' => 'delete', 'class' => 'button-pull-left button-delete-confirm')) }}
                      <button type="submit" href="{{ URL::route('shops.destroy', $shop->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Törlés</button>
                  {{ Form::close() }}
								</td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
