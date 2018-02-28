<!DOCTYPE html>
<html>
	<head>
		<title>{{$title or 'Curso Laravel'}}</title>
	</head>
	<body>

		@stack('script')
		@yield('content')

	</body>
</html>