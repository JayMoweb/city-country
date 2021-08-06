@if(session()->has('error'))
	<div class="alert alert-danger">{{ session()->get('error') }}</div>
@endif
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
		<form method="post" id="form">
			@csrf
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
				email : {
					required : true,
					email: true
				}
			},
			messages : {
				email : {
					required : 'Enter the name',
					email : 'Enter the valid email'
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