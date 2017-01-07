@extends('layouts.admindefault')

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

<h3>Dar de alta pistas vacias para su reserva</h3>
	

<div class="row">
	<div class="col-sm-8">
		<div class="form-inline fecha">			
			{{ Form::open(array('url' => 'admin/dischargeCheck')) }}				
			{{ Form::datePicker('fromDate') }}				
			{{-- Form::datePicker('toDate') --}}				
			{{ Form::submit('View Dates' , array('class'=>'btn')) }}				
			{{ Form::close() }}			
		</div>
	</div>
</div>

	
<!-- INFORMACION DE LA PAGINA -->

@if (isset($dayGamesClass))

{{ Form::open(array('url' => 'admin/dischargeOk')) }}
	<table class="table table-condensed table-striped table-bordered">
	<thead>
		<tr>
			<th>Court</th>
			<th>Num</th>
			<th>Hora</th>
			<th>date</th>
			<th>Status</th>			
			<th>discharge</th>
			<th>Game ID</th>
			<th>price</th>
			<th>paid</th>
			<th>notes</th>
		</tr>
	</thead>
	
	<tbody>

	@foreach ($dayGamesClass->games1 as $court1)
		<tr>
		<td> <input type="hidden" name="court[]" value="1"> 1 </td>
		<td><input type="hidden" name="game_num[]" value="{{ $court1->game_num }}">{{ $court1->game_num +1 }}</td>
		<td>{{ $court1->hour }}</td>
		<td> <input type="hidden" name="game_date[]" value="{{ $court1->game_date }}"> {{ $court1->game_date }}</td>
		<td bgcolor="{{ $court1->getColor() }}"><select name="status[]">
			  <option value="avaliable" <?php if($court1->status == "avaliable"){ echo "selected"; } ?> >avaliable</option>
			  <option value="complete"<?php if($court1->status == "complete"){ echo "selected"; } ?> >complete</option>
			  <option value="3left"<?php if($court1->status == "3left"){ echo "selected"; } ?> >3left</option>
			  <option value="2left"<?php if($court1->status == "2left"){ echo "selected"; } ?> >2left</option>
			  <option value="1left"<?php if($court1->status == "1left"){ echo "selected"; } ?> >1left</option>
			  <option value="nondisposable"<?php if($court1->status == "nondisposable"){ echo "selected"; } ?> >nondisposable</option>
			  <option value="academy"<?php if($court1->status == "academy"){ echo "selected"; } ?> >academy</option>
			  <option value="tournament"<?php if($court1->status == "tournament"){ echo "selected"; } ?> >tournament</option>
			</select>
		</td>
		<td><input type="hidden" name="discharge[]" value="{{ $court1->discharge }}">{{ $court1->discharge }}</td>
		<td><input type="hidden" name="game_id[]" value="{{ $court1->id }}">{{ $court1->id }}</td>
		<td><input type="number" name="price[]" step="0.5" min="0" max="20" value="{{ $court1->price }}"> </td>
		<td><input type="number" name="paid[]" step="0.5" min="0" max="20" value="{{ $court1->paid }}"> </td>
		<td><input type="text" name="notes[]" value="{{ $court1->notes }}"> </td>
		</tr>	
	@endforeach
	
	</tbody>
	</table>
	{{ Form::submit('Load Dates' , array('class'=>'btn')) }}
{{ Form::close() }}



<!-- avaliable, complete, 3left, 2left, teamleft, 1left, academy, tournament 
<select>
  <option value="avaliable">Avaliable</option>
  <option value="complete">Complete</option>
  <option value="3left">3 left</option>
  <option value="2left">2 left</option>
  <option value="teamleft">Team left</option>
  <option value="1left">1 left</option>
  <option value="academy">Academy</option>
  <option value="tournament">Tournament</option>  
</select>
{{-- Form::select('match_status', array(
		'avaliable' => 'Avaliable',
		'complete' => 'Complete',
		'3left' => '3 left',
		'2left' => '2 left',
		'teamleft' => 'Team left',
		'1left' => '1 left',
		'academy' => 'Academy',
		'tournament' => 'Tournament'
		), $court1->status) --}} </td>
	-->
	  
	
	

@endif



@stop