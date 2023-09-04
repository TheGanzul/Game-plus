<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link 
		rel="stylesheet" 
		href="../css/styleregister.css"
	/>
	<link 
	rel="stylesheet"
	href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
/>
</head>
<body>
	<div class="back">
		<a href="../../index.html"><span class="material-symbols-outlined">&#xe15e</span></a>
	</div>
	<div class="main">  	
		
		<input type="checkbox" id="chk" aria-hidden="true">
			


			<div class="login">
				<form>
					<a href="../../index.html"><img src="../img/index/LOGO1.png" width= "80"></a>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
			<div class="signup">
				<form action="../php/user_register_be.php" method="POST" class="form_register">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="user_name" placeholder="User name" required="">
					<input type="email" name="user_email" placeholder="Email" required="">
					<input type="password" name="user_pswd" placeholder="Password" required="">
					<input type="password" name="user_rpswd" placeholder="Repeat Password" required=>
					<button>Sign up</button>
				</form>
			</div>

	</div>
</body>
</html>