<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
	<div class="container">
		<form method="post">
			@csrf
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control">
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-success" name="submit" value="submit">
		</form>
	</div>
</body>
</html>