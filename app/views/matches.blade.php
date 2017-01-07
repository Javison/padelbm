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
                <h2>Imagen 1</h2>
                <div class="carousel-caption">
                  <h3>First slide label</h3>
                  <p>Lorem ipsum dolor sit amet consectetur�</p>
                </div>
            </div>
            <div class="item">
                <h2>Slide 2</h2>
                <div class="carousel-caption">
                  <h3>Second slide label</h3>
                  <p>Aliquam sit amet gravida nibh, facilisis gravida�</p>
                </div>
            </div>

            <div class="item">
                <h2>Slide 3</h2>
                <div class="carousel-caption">
                  <h3>Third slide label</h3>
                  <p>Praesent commodo cursus magna vel�</p>
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
	

	<div class="col-sm-4">
		<div class="form-inline fecha">			
			{{ Form::open(array('url' => 'matches', 'method' => 'GET')) }}				
			{{ Form::datePicker('fromDate') }}				
			{{-- Form::datePicker('toDate') --}}				
			{{ Form::submit('View Date' , array('class'=>'btn')) }}				
			{{ Form::close() }}			
		</div>
	</div>
</div>
	
	<!-- INFORMACION DE LA PAGINA -->
	@if (isset($dayGamesClass))
	<div class="row">
		<div class="col-sm-3">
		
		<table class="table table-condensed table-striped table-bordered">
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
