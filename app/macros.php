<?php

// app/macros.php

Form::macro('fullName', function($name) {
	return '<p>Full name: <input type="text" name="'.$name.'"></p>';
});

Form::macro('dateAny', function($name) {
	$today = date("Y-m-d");//date("Y-m-d")=2014-05-03 min="2013-10-08″
	return '<input type="date" name="'.$name.'" value="'.$today.'">';
});

Form::macro('dateFuture', function($name) {
	$today = date("Y-m-d");//date("Y-m-d")=2014-05-03 min="2013-10-08″
	return '<input type="date" name="'.$name.'" min="'.$today.'" value="'.$today.'">';
});


/* Max day: Yesterday
 *  Min day: 1 month */
Form::macro('datePast', function($name) {
	$datetime = new DateTime();
	$yesterday = $datetime->modify('-1 day')->format("Y-m-d");
	$minDate = $datetime->modify('-1 month')->format("Y-m-d");
	return '<input type="date" name="'.$name.'" min="'.$minDate.'" max="'.$yesterday.'" value="'.$yesterday.'">';
});

/* Max day: Today
 *  Min day: 1 month */
Form::macro('dateHoy', function($name) {
	$datetime = new DateTime();
	$today = $datetime->format("Y-m-d");
	$minDate = $datetime->modify('-1 month')->format("Y-m-d");
	return '<input type="date" name="'.$name.'" min="'.$minDate.'" max="'.$today.'" value="'.$today.'">';
});

//<!-- DATETIME PICKER http://eonasdan.github.io/bootstrap-datetimepicker/ -->
Form::macro('datePicker', function($name) {

	return '
	<div class="input-group date" id="'.$name.'">
		<input type="text" name="'.$name.'" class="form-control" />
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
	</div>
	<script type="text/javascript">
		var day = new Date();
	
		$(function () {
			$("#'.$name.'").datetimepicker({
				format: "YYYY-MM-DD",
				defaultDate: new Date(day.getFullYear(), day.getMonth(), day.getDate(), 08, 0, 0, 0)
				// new Date(year, month, day, hours, minutes, seconds, milliseconds);
			});
		});
	</script>
	';
});

Form::macro('dateTimePicker', function($name) {
	//<!-- DATETIME PICKER http://tarruda.github.io/bootstrap-datetimepicker/	-->

		return '
	<div class="input-group date" id="'.$name.'">
		<input type="text" name="'.$name.'" class="form-control" />
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
	</div>
	<script type="text/javascript">
		$(function () {
			$("#'.$name.'").datetimepicker({
				format: "YYYY-MM-DD HH:mm:ss"
			});
		});
	</script>
	';
});