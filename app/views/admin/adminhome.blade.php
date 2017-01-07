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

Main page Admin PBM <br>
Summary last reservations <br>


</div>

	

@stop