<?php
session_start();
include('connection.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    // Retrieve user data from the database
    $query = "SELECT * FROM cloud WHERE username = '$username'AND password='$password'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        echo '<script>alert("Incorrect username or password. Please try again.");</script>';
     
    } else {
           $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        header("Location: home.php"); 
        exit();
    }
}


?>
<style>
	body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 650px;
            margin: 0;
            background-size: cover;
            background-repeat: no-repeat;       
            
        }


        form {
            width: 400px;
            height: 300px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-size: cover;
            background-repeat: no-repeat;  

        }

        form label, form input {
           
            margin-bottom: 10px;
        }
        form label{
            float: left;
        }

        form input[type="text"], form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px;
            cursor: pointer;
            float: right;

            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
            height: 30px;
        }
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        h2.title_login{
        	margin-bottom: 30px;
        	padding-bottom: 10px;
        	border-bottom: 1px solid black;

        }
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Cloud Computing loginpage</title>
</head>
<body>
	<div class="User_login">
		<form class="user_login" action="index.php" method="post">
			<h2 class="title_login">LOG IN</h2>
			<label class="login_label" for="username">Usename:</label>

			<input type="text" name="username" required>
			<label class="login_label" for="password">Password:</label>
			<input type="Password" name="password" required>
			<br><br>
			<input type="submit" value="Sign-in">
		</form>
	</div>
</body>
</html>