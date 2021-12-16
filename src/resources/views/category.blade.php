<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Category list</h1>
	@if(!empty($lang))
		@foreach($lang as $lg)
			{{$lg->name}}
		@endforeach
	@endif
</body>
</html>