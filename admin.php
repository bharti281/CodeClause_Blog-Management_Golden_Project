<?php 
session_start();
ob_start();
if(isset($_SESSION['user_data'])){
echo $_SESSION['user_data'][0];
echo $_SESSION['user_data'][1];
echo $_SESSION['user_data'][2];
unset($_SESSION['user_data']);
}
?>
<h1>Welcome</h1>
