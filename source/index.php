<?php
if (isset($_SESSION['loggedin'])) {
	header('Location: home.php');
}
else{
header('Location: index.html');
}
?>
