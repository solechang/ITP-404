<!doctype html>
<html>
<head>
	<title>Add a New Course</title>
</head>
<body>

<h2>Add a new course to our database</h2>

<div class="errors">
	{{ $errors->first('course_name', '<p>:message</p>') }}
	{{ $errors->first('course_number', '<p>:message</p>') }}
	{{ $errors->first('units', '<p>:message</p>') }}
</div>

@if(Session::get('success'))
	<div>{{ Session::get('success') }}</div>
@endif

<form action="{{ URL::to('course/add_course') }}" method="post">
	<label>Course Name:</label>
	<input type="text" name="course_name" value="{{ Input::old('course_name') }}" />
	<label>Course Number:</label>
	<input type="text" name="course_number" value="{{ Input::old('course_number') }}" />
	<label>Units:</label>
	<input type="text" name="units" value="{{ Input::old('units') }}" />

	<input type="submit" />
</form>

</body>
</html>