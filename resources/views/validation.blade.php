<html>
<head>
	<title>Validation</title>
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('js/jquery.min.js')}}"></script>	
	<style type="text/css">
		.container{
			border: 1px solid black;
		}
		/*.error {
    		color: red;
		}*/
		span{
			color: red;
		}
	</style>
</head>
<body>
<div class="container mt-2">
	<form method="post" id="form">
	<div class="row g-5">
		<div class="col-md-12">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="name" class="form-control" onkeyup="validationForm()">
				<span class="error"></span>
				<span id="errorName"></span>
			</div>
		</div>
	</div>
	<div class="row g-5">
		<div class="col-md-12">
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" id="email" class="form-control" onkeyup="validationForm()">
				<span id="errorEmail"></span>
			</div>
		</div>
	</div>
	<div class="row g-5">
		<div class="col-md-12">
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control" onkeyup="validationForm()">
				<span class="error"></span>
				<span id="errorPassword"></span>
			</div>
		</div>
	</div>
	<div class=" mt-2 mb-2">
		<span id="errorAll"></span><br><br>
		<input type="submit" class="btn btn-success" name="submit" value="submit" onclick=" return validationFormClick()">
	</div>
	</form>
</div>
</body>
</html>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
	/*$(document).ready(function() {
		$('#form').validate({
			rules: {
				name: {
					required:true
				},
				email: {
					required : true,
					email : true
				},
				password: {
					required : true,
					minlength: 8
				}
			},
			messages : {
				name : 'Enter the name',
				email: {
					required : 'Enter the email',
					email : 'Enter the validate email'
				},
				password: {
					required : 'Enter the password',
					minlength : 'Enter the password min 8 charecter'
				}
			},
			highlight: function (element) {
            	$(element).addClass('error')
       		 },
       		unhighlight: function (element) {
            	$(element).removeClass('error')
        	},
			submitHandler: function(form) {
				form.submit();
			}
		});
	});*/
	function validationForm() {
		var name = document.getElementById('name').value;
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;

		 if(name == '') {
		 	document.getElementById('errorName').innerHTML = 'Enter the name';
		 	return false;
		 }else{
		 	document.getElementById('errorName').innerHTML = 'ok.';
		 }


		var atPos = email.indexOf('@');
		var endPos = email.indexOf('.');

		 if (email == '') {
		 	document.getElementById('errorEmail').innerHTML = 'Enter the email';
		 }else if(atPos < 1 || endPos <= atPos + 1 ){
		 	document.getElementById('errorEmail').innerHTML = 'Enter the valid email';
		 }else{
		 	document.getElementById('errorEmail').innerHTML = 'ok.';
		 }
		 if (password == '') {
		 	document.getElementById('errorPassword').innerHTML = 'Enter the password';
		 }else{
		 	document.getElementById('errorPassword').innerHTML = 'ok.';
		 }
	}
	function validationFormClick() {
		var name = document.getElementById('name').value;
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;

		 if(name == '' && email == '' &&  password == '') {
		 	document.getElementById('errorAll').innerHTML = 'Enter the All the element fill';
		 	return false;
		 }else{
		 	document.getElementById('errorAll').innerHTML = 'ok.';
		 	return true;
		 }
	}
</script>