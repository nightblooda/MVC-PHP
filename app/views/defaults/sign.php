
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT;?>/assets/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT;?>/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT;?>/assets/css/main.css">

</head>
<body>
	
	<div class="limiter m-l-r-auto m-t-0 m-b-0 w-full">
		<div class="container-login100 w-full flex-c-m">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form w-full flex-w" id= 'validate-form-one'>
					<span class="login100-form-title p-b-43 w-full fs-47 lh-1-1 text-center dis-block">
						Welcome to Tree
					</span>
					
					<div class="wrap-input100 bgwhite flex-w pos-relative rs1 validate-input" data-validate = "Invalid Username">
						<input class="input100 fs-15 lh-1-2 dis-block w-full" type="text" name="email" autocomplete="off">
						<span class="label-input100 fs-15 lh-1-2 dis-block pos-absolute w-full trans-0-4 p-l-30">Username or Email</span>
					</div>
					
					
					<div class="wrap-input100 bgwhite flex-w pos-relative rs2 validate-input" data-validate="Invalid Password" id="for_valid_three">
						<input class="input100 fs-15 lh-1-2 dis-block w-full trans-0-4 bgwhite h-full" type="password" name="password" autocomplete="off">
						<span class="label-input100 fs-15 lh-1-2 dis-block pos-absolute w-full trans-0-4 p-l-30">Password</span>
					</div>

					<div class="container-login100-form-btn flex-w w-full">
						<button class="login100-form-btn fs-15 lh-1-2 flex-c-m w-full trans-0-4 pos-relative text-up" id='sibcos'>
							Sign in
						</button>
					</div>
					<div class="text-center w-full p-t-23">
						<a href= '<?php echo URL_ROOT;?>/defaultpage/signup' class= 'txt1 m-l-7 m-r-7 fs-17 lh-1-4'>Sign Up</a>
						<a href="forget.html" class="txt1 m-l-7 m-r-7 fs-17 lh-1-4">
							Forgot password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo URL_ROOT;?>/assets/js/util.js"></script>
	<script src="<?php echo URL_ROOT;?>/assets/js/main.js"></script>
	<script src="<?php echo URL_ROOT;?>/assets/js/signlog.js"></script>
</body>
</html>
