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
@stop
