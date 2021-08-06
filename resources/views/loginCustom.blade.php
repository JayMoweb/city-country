<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<form method="post" action="{{route('loginCustom')}}" id="form">
			@csrf
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					@if(session()->has('error'))
						<div class="alert alert-danger">{{ session()->get('error') }}</div>
					@endif
					<label>Email</label>
					<input type="email" name="email" class="form-control">
					@error('email')
   						 <div class="alert alert-danger" id="error">{{ $message }}</div>
					@enderror
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
					@error('password')
   						 <div class="alert alert-danger" id="error">{{ $message }}</div>
					@enderror
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-success" name="submit" value="submit">
		<a href="{{url('forgotPassword')}}">Forgot Password</a>
		</form>
	</div>
</body>
</html>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#form").validate({
			rules :{
				email : {
					required : true,
					email: true
				},
				password: {
					required : true,
					minlength : 8
				}
			},
			messages : {
				email : {
					required : 'Enter the name',
					email : 'Enter the valida email'
				},
				password : {
					required : 'Enter the password',
					minlength : 'Enter the manimum length'
				}
			},
			highlight:function(element){
				$(element).addClass('error');
			},
			unhighlight : function(element) {
				$(element).removeClass('error');
			},
			submitHandler() {
				form.submit();
			}
		});
	});
</script>