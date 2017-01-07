@extends('layouts.admindefault')

@section('content')

<div class="row">
		
	@if (isset($message))
		<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		{{ $message }}
		</div>
	@endif
</div>

<div class="row">
	Selector de fecha <br>
	Total reservas del dia <br>
	Pistas pendientes de reserva <br>
	
<br>
</div>



@stop