<?php
/* For < PHP 5.4 */
if(session_id() == '') {
    session_start();
}
/* For >= PHP 5.4 */
/*
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
*/

echo "sumitted";die;

if (isset($_POST['submit'])) 
{
		header('Location: regis.php');

}


?>

