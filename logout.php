// Copyright (C) 2022 Avery Fiebig-Dorey

<?php
session_start();
session_destroy();
header('Location: index.html');
?>
