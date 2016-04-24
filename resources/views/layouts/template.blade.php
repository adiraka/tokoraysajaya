<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>Raisya Jaya</title>

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/materialize.min.css') }}">

	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>

</head>
<body>

	@yield('content')
	
	<script src="{{ URL::asset('js/materialize.min.js') }}"></script>

</body>
</html>