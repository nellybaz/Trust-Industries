<?php
session_start();
session_unset();
session_destroy();

setcookie('user', 'John Doe', time() - (86400 * 30), "/");

 ?>
