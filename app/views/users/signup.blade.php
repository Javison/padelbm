@extends('layouts.default')


@section('content')

	<div class="maincontent">
	 <h1>Signup</h1>
	 {{-- Renders the signup form of Confide --}}
	 {{ Confide::makeSignupForm()->render(); }}
	</div> 


@endsection
