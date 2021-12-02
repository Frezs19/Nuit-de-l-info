<?php
session_start();
session_destroy(); //Efface la session 

header('Location: ../view/mainpage.view.php');
exit();
 ?>
