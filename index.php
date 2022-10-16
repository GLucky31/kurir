<?php session_start();
 include_once 'header.php';

if(isset($_SESSION['type']))
{
echo $_SESSION['type'];
}?>

<?php include_once 'footer.php'?>