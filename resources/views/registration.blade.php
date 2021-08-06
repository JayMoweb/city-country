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
		<form method="post" action="{{route('create')}}" id="form">
			@csrf
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					@if(session()->has('error'))
						<div class="alert alert-danger">{{ session()->get('error') }}</div>
					@endif
					<label>FirstName</label>
					<input type="text" name="firstname" class="form-control">
					@error('firstname')
   						 <div class="alert alert-danger" id="error">{{ $message }}</div>
					@enderror
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>LastName</label>
					<input type="text" name="lastname" class="form-control">
					@error('lastname')
   						 <div class="alert alert-danger" id="error">{{ $message }}</div>
					@enderror
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
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
					<input type="password" name="password" class="form-control" id="password">
					@error('password')
   						 <div class="alert alert-danger" id="error">{{ $message }}</div>
					@enderror
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="confirmpassword" class="form-control">
					@error('confirmpassword')
   						 <div class="alert alert-danger" id="error">{{ $message }}</div>
					@enderror
					
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-success" name="submit" value="submit">
		</form>
	</div>
</body>
</html>
	<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#form").validate({
			rules :{
				firstname : {
					required :true,
				},
				lastname :{
					required :true,
				},
				email : {
					required : true,
					email: true
				},
				password: {
					required : true,
					minlength : 8
				},
				confirmpassword : {
					required :true,
					minlength : 8,
					equalTo : '#password'
				}
			},
			messages : {
				firstname : {
					required : 'Enter the firstname'
				},
				lastname : {
					required : 'Enter the lastname'
				},
				email : {
					required : 'Enter the email',
					email : 'Enter the valid email'
				},
				password : {
					required : 'Enter the password',
					minlength : 'Enter the manimum length'
				},
				confirmpassword : {
					required : 'Enter the confirmpassword',
					minlength : 'Enter the manimum length',
					equalTo : 'password and confirmpassword not match'
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