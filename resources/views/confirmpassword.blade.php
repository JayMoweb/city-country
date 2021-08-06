@if(session()->has('error'))
<div class="alert alert-danger">{{session()->get('error')}}</div>
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
		<form method="post" action="{{url('saveUpdatePasssword/'.$token)}}" id="form">
			@csrf
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>New password</label>
					<input type="password" name="newpassword" class="form-control" id="newpassword">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Confirm password</label>
					<input type="password" name="confirmpassword" class="form-control">
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
				newpassword : {
					required : true,
					minlength : 8
				},
				confirmpassword: {
					required : true,
					minlength : 8,
					equalTo : "#newpassword"
				}

			},
			messages : {
				newpassword : {
					required : 'Enter the password',
					minlength : 'Enter the manimum length'
				},
				confirmpassword : {
					required : 'Enter the confirmpassword password',
					minlength : 'Enter the manimum length',
					equalTo : 'password doesnt match'
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