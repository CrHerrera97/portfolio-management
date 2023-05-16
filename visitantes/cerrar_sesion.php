<?php

session_start();


session_destroy();

//header ("Location: login.php")
header( "Refresh:1; url=./../login.php", true,303);

?>

<script>
    alert("SESIÓN CERRADA")
</script>
