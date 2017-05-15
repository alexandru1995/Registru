<?php
session_start();
$masc = false;
session_unset();
session_destroy();
 header( 'Location: indexx.php', true, 301 );
?>