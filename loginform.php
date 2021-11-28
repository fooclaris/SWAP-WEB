<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php include "nav-bar.php"?>
<form method="post" action="logindo.php">
<h2>LOGIN</h2>
<input type="text" name="username" placeholder="Username">
<input type="text" name="password" placeholder="Password">
<a href="result"></a>
<button>Sign in</button>
<br>
<a href="registerUser.php">Don't have an account? Click here</a>
</form>

</body>
<style>

		img {
		  display: block;
		  width: 80px;
		  margin: 30px auto;
		  box-shadow: 0 5px 10px -7px #333333;
		  border-radius: 50%;
		}

		form {
		  background-color: #ffffff;
		  width: 400px;
		  margin: 50px auto 10px auto;
		  padding: 30px;
		  border-radius: 8px;
		  overflow: hidden;
		  box-shadow: 0 2px 10px -3px #333;
		  text-align: center;
		}

		input {
		  border-radius: 100px;
		  padding: 10px 15px;
		  width: 60%;
		  border: 1px solid #D9D9D9;
		  outline: none;
		  display: block;
		  margin: 20px auto 20px auto;
          box-shadow: 0 2px 10px -3px grey;
		}

		button {
		  border-radius: 100px;
		  border: none;
		  background: grey;
		  width: 60%;
		  padding: 10px;
		  color: white;
		  box-shadow: 0 2px 10px -3px white;
		  display: block;
		  margin: 10px 67px ;
		}

		a {
		  text-align: center;
		  color: grey;
		  text-decoration: none;
		}


	</style>
	
</html>
