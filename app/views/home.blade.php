@extends('layouts.default')

@section('inner-banner')
<!-- VISOR IMAGENES -->
<div class="row visible-md visible-lg">
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <h2>Slide 1</h2>
                <div class="carousel-caption">
                  <h3>First slide label</h3>
                  <p>Reserva pistas facilmente online para uno o varios...blabla</p>
                </div>
            </div>
            <div class="item">
                <h2>Slide 2</h2>
                <div class="carousel-caption">
                  <h3>Second slide label</h3>
                  <p>Las instalaciones ...blabla</p>
                </div>
            </div>

            <div class="item">
                <h2>Slide 3</h2>
                <div class="carousel-caption">
                  <h3>Third slide label</h3>
                  <p>Torneo americano y clases todos los </p>
                </div>
            </div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
   
	<hr>
</div>

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

<!-- avaliable, complete, 3left, 2left, 1left, nodisponsable, academy, tournament
<div class="row">	
	LEGEND: 
	<span style="background-color:green">Avaliable</span>, 
	<span style="background-color:red">Complete</span>, 
	<span style="background-color:orange">1playerLeft</span>, 
	<span style="background-color:yellow">2playerLeft</span>,
	<span style="background-color:blue">3playerLeft</span>, 
	<span style="background-color:grey">Academy/Tournament</span>,	
	<span style="background-color:black">NoDisponsable</span>
</div> -->

<!--  -->
<div class="row">
<div class="col-sm-6 col-md-offset-3 col-lg-offset-3">
	<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<td>JOIN NOW</td>
			<td bgcolor="green">4 Players Avaliable</td>
			<td bgcolor="blue">3 Players left</td>
			<td bgcolor="yellow">2 Players left</td>
			<td bgcolor="orange">1 Player left</td>
		</tr>
		
		<tr>
			<td>NOT AVALIABLE</td>
			<td bgcolor="red">Complete</td>
			<td bgcolor="grey">Academy</td>
			<td bgcolor="grey">Tournament</td>
			<td bgcolor="black">No Avaliable</td>
		</tr>
		
	</tbody>
	</table>
</div>
</div>	
<div class="row">
	
</div>


@stop