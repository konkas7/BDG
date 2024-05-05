<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
  <link rel="stylesheet" href="../css/style_login.css">
  <style>
        .error-message {
            color: maroon;
            margin-top: 10px;
			background-color: white;
			padding: 5px 10px;
			border-radius: 5px;
			display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
		<form class="registration" action="registration_process.php" method="POST">
			<div class="registration__field">
				<i class="registration__icon fas fa-user"></i>
				<input type="text" class="registration__input" name="nome" placeholder="First Name">
			</div>
			<div class="registration__field">
				<i class="registration__icon fas fa-user"></i>
				<input type="text" class="registration__input" name="cognome" placeholder="Last Name">
			</div>
			<div class="registration__field">
				<i class="registration__icon fas fa-envelope"></i>
				<input type="email" class="registration__input" name="email" placeholder="Email">
			</div>
			<div class="registration__field">
				<i class="registration__icon fas fa-lock"></i>
				<input type="password" class="registration__input" name="password" placeholder="Password">
			</div>
			<div class="registration__field">
				<i class="registration__icon fas fa-phone"></i>
				<input type="tel" class="registration__input" name="telefono" placeholder="Phone Number">
			</div>
			<button class="button registration__submit" type="submit">
				<span class="button__text">Register Now</span>
				<i class="button__icon fas fa-chevron-right"></i>
			</button>
			<?php if (isset($_SESSION['error_message'])) { ?>
                <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
                <?php unset($_SESSION['error_message']); ?>
            <?php } ?>               
		</form>

			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>
