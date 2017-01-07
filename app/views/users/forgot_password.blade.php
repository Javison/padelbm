@extends('layouts.default')

@section('inner-banner')

	<p>Inner-banner</p>

@stop

@section('content')

	<div class="maincontent">
	 <h1>Password Reminder</h1>
	 {{-- Renders the signup form of Confide --}}
	 {{ Confide::makeForgotPasswordForm()->render(); }}
	</div> 


@endsection
