// Copyright (C) 2022 Avery Fiebig-Dorey

<?php
session_start();
// const testing = true;
if (!isset($_SESSION['loggedin']) /*&& !testing */) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'averygame';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	echo('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email, wins, losses, xp, level FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $wins, $losses, $xp, $level);
$stmt->fetch();
$stmt->close(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Avery Game | Profile</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Avery Game | Profile</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Account Details:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
				</table>
        <br><br>
        <p>Avery Game Account Details:</p>
        <table>
          <tr>
            <td>Level:</td>
            <td><?=$level?></td>
          </tr>
          <tr>
            <td>XP:</td>
            <td><?=$xp?></td>
          </tr>
          <tr>
            <td>Wins:</td>
            <td><?=$wins?></td>
          </tr>
          <tr>
            <td>Losses:</td>
            <td><?=$losses?></td>
          </tr>
        </table>
				<br><br>
				<p>Return <a href="home.php">home</a></p>
			</div>
		</div>
	</body>
</html>
