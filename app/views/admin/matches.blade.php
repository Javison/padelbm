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


<br>	
Datepicker to specify a day: Show a table with Court 1, 2, 3, 4. 
Click view to check details asociated (who made the reservation)
<br>

<div class="row">	
	LEGEND: 
	<span style="background-color:green">Avaliable</span>, 
	<span style="background-color:red">Complete</span>, 
	<span style="background-color:orange">1playerLeft</span>, 
	<span style="background-color:yellow">2playerLeft</span>,
	<span style="background-color:blue">3playerLeft</span>, 
	<span style="background-color:grey">Academy/Tournament</span>,	
	<span style="background-color:black">NoDisponsable</span>
</div>


<br>

@if (false)
@if (count($arrPadelClass)>0)
<table>
<thead>
	<tr>
		<th>padel_id</th>
		<th>court</th>
		<th>reservation_id1</th>
		<th>reservation_id2</th>
		<th>reservation_id3</th>
		<th>reservation_id4</th>
		<th>padel_status</th>
		<th>padel_time</th>
		<th>padel_price</th>
		<th>padel_paid</th>
		<th>padel_notes</th>
	</tr>
</thead>

<tbody>
@foreach ($arrPadelClass as $padelCl)
<tr>
<td>{{ $padelCl->getPadelId() }}</td>
<td>{{ $padelCl->getcourt() }}</td>
<td>{{ $padelCl->getReservation_id1() }}</td>
<td>{{ $padelCl->getReservation_id2() }}</td>
<td>{{ $padelCl->getReservation_id3() }}</td>
<td>{{ $padelCl->getReservation_id4() }}</td>
<td>{{ $padelCl->getPadel_status() }}</td>
<td>{{ $padelCl->getPadel_time() }}</td>
<td>{{ $padelCl->getPadel_price() }}</td>
<td>{{ $padelCl->getPadel_paid() }}</td>
<td>{{ $padelCl->getPadel_notes() }}</td>
<td>
<!--View message button-->
<!-- TODO -->
{{ Form::submit('View') }}
</td>
<td>
<!--delete message button-->
{{ Form::submit('Edit') }}
</td>
</tr>
@endforeach
</tbody>
</table>	

@else
	There are no matches
@endif

@endif

@stop