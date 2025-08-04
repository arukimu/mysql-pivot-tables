<?php
define("DIRECTACESS", "true");
	require_once('../shared/shared.php');
	//$login->headerTo(true, "setconfig.php");
	// this will check if security.php exists AND display warning you have already exists account message.
	if(file_exists('../shared/security.php'))
	{
	
		echo '
			<link href="../tables/common/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
			<script src="../tables/common/js/jquery-1.9.1.js"></script>
			<script src="../tables/common/bootstrap/js/bootstrap.js"></script>
			<div class="container" style="position: relative;top: 10px;">
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<div>
						<strong>Be aware you have already account!</strong> you can\'t make more than one account.!
						
						
					</div>
				</div>
			</div>';
		exit();
	
	}
	// retriving data via ajax and validate it and then create [security.php] :: USER DATA
	if( isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) )
	{
	
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		if( !filter_var($email, FILTER_VALIDATE_EMAIL) )
		{
			echo 'wrong_email';
			exit();
		}
		else if( preg_match('/[^a-z0-9_]/i', $username) || strlen($username) < 5 || is_numeric($username[0]) || $username[0] === '_')
		{
			echo 'wrong_username';
			exit();
		}
		else if( preg_match('/[ \/\\\]/i', $password) || strlen($password) < 8 || !preg_match('/[a-z]+/', $password) || !preg_match('/[A-Z]+/', $password) || !preg_match('/[0-9]+/', $password) )
		{
			echo 'wrong_password';
			exit();
		}
		
		$salt = createSalt($username);
		$hashPassword = hash("sha256",$password.$salt);		
		if(is_writable('../shared'))
		{
		
			$filePath = '../shared/security.php';
			$file = fopen($filePath, 'w+') or exit("Unable to open file!");
			$str = "<?php \r\n
                            if (! defined('DIRECTACESS')) exit('No direct script access allowed');  \r\n
	\$email = '$email';\r\n
	\$username = '$username';\r\n
	\$password = '$hashPassword';\r\n
?>";		
			if ($file) {
				fwrite($file, $str);
				fclose($file);
			}else{
				echo 'error_file';
				exit();
			}
			
		}else{
			echo 'error_folder';
			exit();
		}
		
		echo 'signup_success';
		exit();
	}
?>
<!DOCTYPE html>
<html>

	<head>
	
		<meta charset='UTF-8'/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Pivot table</title>
		
		<link type='text/css' rel='stylesheet' href='../tables/common/bootstrap/css/bootstrap.min.css' />
		
		<link rel="stylesheet" href="../tables/common/alertify/themes/alertify.default.css" />
		<link rel="stylesheet" href="../tables/common/alertify/themes/alertify.core.css" />
		
		<style>
		body {
			color: #000;
			direction: ltr;
			background-image: url(../tables/common/img/cream_pixels.png);
			background-repeat: repeat;
		}
		.img {max-width:100%;
			height: auto;}

		.app-logo {
			margin-top: 5px;
			margin-right: auto;
			margin-bottom: 5px;
			margin-left: auto;
			max-width:100%;
			height: auto;
		}
		#formContainer
		{
		
			margin-top: 40px;
		
		}
		
		.left-inner-addon 
		{
			position: relative;
		}
		.left-inner-addon input 
		{
			height: 40px;
			padding-left: 30px;    
		}
		.left-inner-addon i 
		{
			position: absolute;
			padding: 13px 12px;
			pointer-events: none;
		}
		.popover-content
		{
		
			color: #4e4e4e;
			font-size: 14px;
			font-family: "Lobster", Georgia, Times, serif;
			letter-spacing: 1px;
		}
		#emailFeedback, #usernameFeedback, #passwordFeedback, #confirmPassFeedback{
		
			top: 3px;
		
		}
		</style>
		
		
	</head>

	<body>
	
		<div class='container'>
		
			<div class="header">
				<div style="text-align:center">
					<img src="../tables/common/img/app-logo.png" class="app-logo" alt='Logo picture'/>
				</div>
			</div><!-- .header -->
			
			
			<div id='formContainer'>
				<form role="form" onsubmit='return false;'>
					<div class='row'>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
						<div class="form-group col-lg-4 col-md-6 col-sm-8 col-xs-12">
							<!-- <label for="email">Email</label> -->
							<div id='emailContainer' class="left-inner-addon">
								<i class="glyphicon glyphicon-envelope"></i>
								<input type="email" class="form-control" id="email" placeholder="Email Address">
								<span id="emailFeedback"></span>
							</div>
						</div>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
					</div>
					<div class='row'>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
						<div class="form-group col-lg-4 col-md-6 col-sm-8 col-xs-12">
							<!-- <label for="username">User name</label> -->
							<div id='usernameContainer' class="left-inner-addon">
								<i class="glyphicon glyphicon-user"></i>
								<input type="text" class="form-control" id="username" placeholder="Username" data-container="body" data-toggle="popover" data-placement="right">
								<span id="usernameFeedback"></span>
							</div>
						</div>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
					</div>
					<div class='row'>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
						<div class="form-group col-lg-4 col-md-6 col-sm-8 col-xs-12">
							<!-- <label for="password">Password</label> -->
							<div id='passwordContainer' class="left-inner-addon">
								<i class="glyphicon glyphicon-lock"></i>
								<input type="password" class="form-control" id="password" placeholder="Password" data-container="body" data-toggle="popover" data-placement="right">
								<span id="passwordFeedback"></span>
							</div>
						</div>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
					</div>
					<div class='row' style='margin-bottom: 10px;'>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
						<div class="form-group col-lg-4 col-md-6 col-sm-8 col-xs-12">
							<!-- <label for="confirmPassword">Confirm password</label> -->
							<div id='confirmPassContainer' class="left-inner-addon">
								<i class="glyphicon glyphicon-lock"></i>
								<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" data-container="body" data-toggle="popover" data-placement="right">
								<span id="confirmPassFeedback"></span>
							</div>
						</div>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
					</div>
					<div class='row'>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
						<div id='signupBtnContainer' class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
							<button id='signupBtn' class='btn btn-primary btn-lg btn-block'>Create account</button>
						</div>
						<div class="col-lg-4 col-md-3 col-sm-2 hidden-xs"></div>
					</div>
				</form>
			</div>			
		<div><!-- container -->
		
		
		<script src='../tables/common/js/jquery-1.9.1.js'></script>
		<script src='../tables/common/bootstrap/js/bootstrap.min.js'></script>
		<script src="../tables/common/alertify/lib/alertify.min.js"></script>
		<script src="help_msg.js"></script>
		<script>
			var realpath = "<?php echo addslashes(realpath('signup.php')); ?>";
			var email_ok = false;
			var username_ok = false;
			var password_ok = false;
			var confirmPass_ok = false;
		
			function validate_email(id)
			{
			
				var email = $(id).val();
					
                var wrongRegExp = email.match(/[' "><]/gi);
					
                var arrOfAT = email.match(/@+/gi);
					
				var arrOfDot = email.match(/\.+/gi);
					
				$('#emailFeedback').removeClass();
				$('#emailContainer').removeClass();
					
				if (email == "") 
				{
					$('#emailContainer').addClass('left-inner-addon has-warning has-feedback');
					$('#emailFeedback').addClass('glyphicon glyphicon-warning-sign form-control-feedback');
					email_ok = false;
                }
                else if ( wrongRegExp || arrOfAT === 'undefined' || arrOfAT === null || arrOfAT.length === 0 || arrOfAT.length > 1 ||
						arrOfAT[0] !== '@' || arrOfDot === 'undefined' || arrOfDot === null || arrOfDot.length === 0 || email.search("@") <= 2 ||
						email.lastIndexOf('.') < (email.indexOf('@') + 2) || email.lastIndexOf('.') === (email.length - 1) ||
						email.charAt(email.indexOf("@") - 1) === '.' || email.charAt(email.indexOf("@") + 1) === '.' ||
						email.lastIndexOf(".") === (email.length - 2)
						) 
				{
					$('#emailContainer').addClass('left-inner-addon has-error has-feedback');
					$('#emailFeedback').addClass('glyphicon glyphicon-remove form-control-feedback');
					email_ok = false;
                }else {
					$('#emailContainer').addClass('left-inner-addon has-success has-feedback');
					$('#emailFeedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					email_ok = true;
                }
			}
			
			function validate_username(id)
			{
			
				var username = $(id).val();
					
                var wrongRegExp = username.match(/[^a-z0-9_]/gi);
					
				var firstChar = username.charAt(0);
				var firstCharRegExp = firstChar.match(/[^a-z]/i);
					
				$('#usernameFeedback').removeClass();
				$('#usernameContainer').removeClass();
					
                if (username === '') {
                    $('#usernameContainer').addClass('left-inner-addon has-warning has-feedback');
					$('#usernameFeedback').addClass('glyphicon glyphicon-warning-sign form-control-feedback');
					username_ok = false;
                }
                else if ( wrongRegExp || username.length < 5 || firstCharRegExp ) {
					$('#usernameContainer').addClass('left-inner-addon has-error has-feedback');
					$('#usernameFeedback').addClass('glyphicon glyphicon-remove form-control-feedback');
					username_ok = false;
                }
                else {
                    $('#usernameContainer').addClass('left-inner-addon has-success has-feedback');
					$('#usernameFeedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					username_ok = true;
                }
			}
			
			function validate_password(id)
			{
			
				var password = $(id).val();
					
				var wrongRegExp = password.match(/[ \/\\]/gi);
					
				$('#passwordFeedback').removeClass();
				$('#passwordContainer').removeClass();
					
                if (password === '') {
                    $('#passwordContainer').addClass('left-inner-addon has-warning has-feedback');
					$('#passwordFeedback').addClass('glyphicon glyphicon-warning-sign form-control-feedback');
					password_ok = false;
                }
                else if (password.length < 8 || password.match(/\d+/gi) === null || password.match(/[a-z]+/g) === null  || password.match(/[A-Z]+/g) === null || wrongRegExp) {
					$('#passwordContainer').addClass('left-inner-addon has-error has-feedback');
					$('#passwordFeedback').addClass('glyphicon glyphicon-remove form-control-feedback');
					password_ok = false;
                }else{
					$('#passwordContainer').addClass('left-inner-addon has-success has-feedback');
					$('#passwordFeedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					password_ok = true;
				}
			}
			
			function validate_confirmPass(id)
			{
			
				var password = $('#password').val();
				var confirmPass = $(id).val();
					
				$('#confirmPassFeedback').removeClass();
				$('#confirmPassContainer').removeClass();
					
				if( confirmPass === ''){
					$('#confirmPassContainer').addClass('left-inner-addon has-warning has-feedback');
					$('#confirmPassFeedback').addClass('glyphicon glyphicon-warning-sign form-control-feedback');
					confirmPass_ok = false;
				}else if( confirmPass !== password){
					$('#confirmPassContainer').addClass('left-inner-addon has-error has-feedback');
					$('#confirmPassFeedback').addClass('glyphicon glyphicon-remove form-control-feedback');
					confirmPass_ok = false;
				}else{
					$('#confirmPassContainer').addClass('left-inner-addon has-success has-feedback');
					$('#confirmPassFeedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					confirmPass_ok = true;
				}
			}
			
			$(document).ready(function(){
				
				help_msg('signup');

				$('#email').blur(function(){
					validate_email(this);
				});
				
				$('#username').blur(function(){
					validate_username(this);
				});
				
				$('#password').blur(function(){
					validate_password(this);
				});
				
				$('#confirmPassword').blur(function(){
					validate_confirmPass(this);
				});
				
				$('#signupBtn').mousedown(function(){
					
					var email = $('#email').val();
					var username = $('#username').val();
					var password = $('#password').val();
					var confirmPass = $('#confirmPassword').val();
					
					validate_email('#email');
					validate_username('#username');
					validate_password('#password');
					validate_confirmPass('#confirmPassword');
					
					if( email_ok && username_ok && password_ok && confirmPass_ok ){
					
						$.ajax({
						
							url: 'signup.php',
							type: 'POST',
							data: 'email='+email+'&username='+username+'&password='+password,
							success: function(data)
							{
								if(data === 'wrong_email') alertify.error('Not valid email');
								else if(data === 'wrong_username') alertify.error('Not valid username');
								else if(data === 'wrong_password') alertify.error('Not valid password');
								else if(data === 'error_file') alertify.error('Can\'t open security.php file.');
								else if(data === 'error_folder') alertify.error('Please make sure that the shared folder is writeable');
								else if(data === 'signup_success') {
								
									alertify.success('signup success');
									$('#signupBtn').css('display', 'none');
									$('#signupBtnContainer').append('<div class="alert alert-success alert-dismissable">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
									  '<strong>Signup Success!</strong><br />'+
									  '<strong>E-mail: </strong> '+email+' <br />'+
									  '<strong>username: </strong> '+username+' <br />'+
									  '<a class="alert-link" href="login.php">Login now</a>'+
									'</div>');
									////////////////////////// Warning Message /////////////////////////////////////////
									$('#signupBtnContainer').append('<div class="alert alert-danger">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
									  '<strong>Note: </strong><br />'+
									  '<p>Please delete sign up page <br /><strong>( which is located at:<br />'+realpath+' )</strong><br /> for security reason.</p>'+
									'</div>');
								}
							},
							error: function()
							{
							
								alert('You get some trouble');
							
							}
						});
						
					}else{
						alertify.error('Enter valid data!');
					}
				
				});
			
			});
			
			
		
		</script>
		
		
	</body>

</html>