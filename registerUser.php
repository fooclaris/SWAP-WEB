<html>
<head>
	<style>
		* {
		  box-sizing: border-box;
		}

		body {
		  background-color: #eeeeee;
		}

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
		  padding: 10px;
		  border-radius: 8px;
		  overflow: hidden;
		  box-shadow: 0 2px 10px -3px #333;
		  text-align: 20px;
		}

		input {
		  border-radius: 100px;
		  padding: 10px 15px;
		  width: 60%;
		  border: 1px solid #D9D9D9;
		  outline: none;
		  display: block;
		  margin: 20px auto 20px auto;
		}

		button {
		  border-radius: 100px;
		  border: none;
		  background: #719BE6;
		  width: 60%;
		  padding: 10px;
		  color: #FFFFFF;
		  margin-top: 25px;
		  box-shadow: 0 2px 10px -3px #719BE6;
		  display: block;
		  margin: 55px auto 10px auto;
		}

		a {
		  text-align: center;
		  margin-top: 30px;
		  color: #719BE6;
		  text-decoration: none;
		  padding: 5px;
		  display: inline-block;
		}

		a:hover {
		  text-decoration: underline;
		}

	</style>
</head>
<body>
<form method="post" action="doRegister.php">
<label>Username:</label>
<input type="text" id="username" name="username" placeholder="Username">
<label>Password:</label>
<input type="text" id="password" name="password" placeholder="Password">
<!-- <label>Confirm Password:</label>
<input type="text" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">-->
<label>Address:</label> 
<input type="text" id="address" name="address" placeholder="Address">
<label>First Name:</label>
<input type="text" id="firstName" name="firstName" placeholder="First Name">
<label>Last Name:</label>
<input type="text" id="lastName" name="lastName" placeholder="Last Name">
<label>Mobile Number:</label>
<input type="text" id="mobileNumber" name="mobileNumber" placeholder="Password">
<label>Email :</label>
<input type="text" id="email" name="email" placeholder="Email">
<!-- <input class="button" type="button" onclick="register()" value="Sign Up"> -->
<button>Sign Up</button>
</form>

</body>
</html>
