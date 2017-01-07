@extends('layouts.default')

@section('inner-banner')


@stop


@section('content')

<div class="row">

	@if (isset($messageKO))		
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	        {{ $messageKO }}
    	</div>	
	@endif
	
	@if (isset($messageOK))		
		<div class="alert alert-success alert-dismissable">
		   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		   <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
		   {{ $messageOK }}
		</div>		
	@endif
	
</div>
	
<!-- INFORMACION DE LA PAGINA -->
@if (isset($dayGamesClass))
<div class="row">
	<div class="col-sm-3">
	
	<table class="table table-striped table-bordered">
	<thead>
		<tr>
	    	<th colspan="2">COURT 1</th>
	    </tr>
		<tr>
			<th>Hora</th>
			<th>Status</th>
		</tr>
	</thead>
	
	<tbody>
	
	@foreach ($dayGamesClass->games1 as $court1)
		<tr>
			<td>{{ $court1->hour }}</td>
			<td bgcolor="{{ $court1->getColor() }}">
				<?php  if($court1->canJoinGame()){ ?>
					<a href='matches/{{$court1->id}}'>JOIN</a></td>
				<?php }?>			
		</td>
		</tr>	
	@endforeach
	
	</tbody>
	</table>
	
	</div>
</div>
@endif


@endsection
