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
    box-shadow: 0 2px 10px -3px #719BE6;
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
button:hover {
    background-color: #668cff;
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
<?php include "nav-bar.php"?>
<form class="form" method="post" action="logindo.php">
<input type="text" name="username" placeholder="Username">
<input type="text" name="password" placeholder="Password">
<a href="result"></a>
<button>Sign in</button>
<a href="registerUser.php">If you do not have an account click here</a>
</form>

</body>
</html>
