<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Home</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
</head>
<body>
	
<div id="container">
	<h1>USC Schedule of Classes</h1>
	
	<div id="instructors">
	<?php foreach($itp_instructors as $instructor) : ?>
		<div class="instructor">
			<h4><?php echo $instructor->first_name . ' ' . $instructor->last_name ?></h4>
		</div>
	<?php endforeach ?>
	</div>
	
	<hr />

	<div id="schedule">
	<?php foreach($scheduled_courses as $sc) : ?>
		<div class="course">
			<h3>
				<?php echo $sc->name ?> (<?php echo $sc->units ?>) 
			</h3>
			<p>
				<?php echo $sc->first_name . ' ' . $sc->last_name ?> -
				<?php echo $sc->term ?>
			</p>
		</div>
	<?php endforeach ?>
	</div>
</div>

</body>
</html>
