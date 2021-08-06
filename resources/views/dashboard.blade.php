@if(session()->has('success'))
	<div class="alert alert-success">{{ session()->get('success') }}</div>
@endif
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
	<button class="btn btn-success"><a href="{{url('logoutCustom')}}">Logout</a></button>
</body>
</html>