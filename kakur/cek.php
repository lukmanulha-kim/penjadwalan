<?php
session_start();

if(!isset($_SESSION['username'])){
	echo '<script language="javascript">document.location="login.php";</script>';
}
?>