<?php
session_start();
require_once ("db.php");
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="styleregister.css">
    </head>
<body>

<?php
if (isset($_POST['reg_user'])) {
// Empfangen der Dateien aud dem Form

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
$vorname = mysqli_real_escape_string($db, $_POST['vorname']);
$nachname = mysqli_real_escape_string($db, $_POST['nachname']);

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($password_1)) { array_push($errors, "Password is required"); }
if ($password_1 != $password_2) {
array_push($errors, "The two passwords do not match");
}
if (empty($vorname)) { array_push($errors, "Vorname is required"); }
if (empty($nachname)) { array_push($errors, "Nachname is required"); }

// first check the database to make sure
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
if ($user['username'] === $username) {
array_push($errors, "Username already exists");
}

if ($user['email'] === $email) {
array_push($errors, "email already exists");
}
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
$password = md5($password_1);//encrypt the password before saving in the database

$query = "INSERT INTO users (username, email, passwort, vorname, nachname)
VALUES('$username', '$email', '$password', '$vorname', '$nachname')";
mysqli_query($db, $query);
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: index.php');
}
}
?>



<div class="header">
    <h2>Register</h2>
</div>

<form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Vorname</label>
        <input type="text" name="vorname">
    </div>
    <div class="input-group">
        <label>Nachname</label>
        <input type="text" name="nachname">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>
</body>
</html>