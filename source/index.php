// Copyright (C) 2022 Avery Fiebig-Dorey


<?php
if (isset($_SESSION['loggedin'])) {
	header('Location: home.php');
}
else{
header('Location: index.html');
}
?>
