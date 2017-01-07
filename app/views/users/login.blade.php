@extends('layouts.default')


@section('content')

	<div class="maincontent">
	 <h1>Login</h1>
	 {{-- Renders the signup form of Confide --}}
	 {{ Confide::makeLoginForm()->render(); }}
	</div> 


@endsection
