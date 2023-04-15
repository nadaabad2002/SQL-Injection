<!DOCTYPE html>
<html>
<head>
	<title>Sign-up Form</title>
	<style type="text/css">
		label {
			display: block;
			margin-bottom: 3px;
            
		}
		input[type="submit"] {
			margin-top: 5px;
     
		}
        form{
            display: block;
              width: 100%;
             padding: 0.375rem 0.75rem;
             font-size: 1rem;
             line-height: 1.5;
             color: black;
             background-color: #fff;
             background-clip: padding-box;
             border: 2px solid #ced4da;
             border-radius: 0.25rem;
        }
        .btn-primary {
             color: #fff;
             background-color: #007bff;
             border-color: #007bff;
                 }

	</style>
</head>
<body>
	<form action="#"  method="post" enctype="multipart/form-data">
    <h1>Sign-up Form </h1>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" minlength="8" required>
		<label for="gender">Gender:</label>
		<select name="gender" id="gender" required>
			<option value="">-- Select Gender --</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		</select>
		<label for="image">Image:</label>
		<input type="file" name="image" id="image" accept="image/*" required>
        <div>
        <label  for="remember-me">Remember Me</label>
        <input  type="checkbox"  name="remember-me" id="remember-me">
        </div>
		<input type="submit" class="btn-primary" name="submit" value="Sign Up">
	</form>
	<?php
	
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password = htmlspecialchars($password);
			$gender = $_POST['gender'];
			$image = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name'];
			$remember_me = isset($_POST['remember-me']) ? 'yes' : 'no';

			if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
				echo 'Name should contain only letters and spaces';
				exit();
			}

			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo'Please enter a valid email address';
				exit();
			}

		
			if ($gender == '') {
				echo 'Please select your gender';
				exit();
			}


			$image_size = $_FILES['image']['size'];
			if ($image_size > 1000000) {
				echo 'Image size should be no more than 1 MB';
				exit();
            }

          
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($image_tmp, $target_file);
    
      
            echo "Name: $name";
            echo "Email: $email";
            echo "Password: $password";
            echo "Gender: $gender";
            echo "Remember Me: $remember_me";
            echo "Image: <img src='$target_file' width='100'>";
        }
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT); 


$host = 'localhost';
$username = 'root';
$password = '';
$gender='';
$dbname = 'web2';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
else{
    'Done';
}
$sql = "INSERT INTO users (name, email, password,gender) VALUES ('$name', '$email', '$password','$gender')";
if (mysqli_query($conn, $sql)) {
	$name='';
	$email='';
	$password='';
	$gender='';


 } else {
	die("failed: " . mysqli_connect_error());

}




$conn->close();

?>
</html>






















