<?php
    $dbip = "localhost";
    $dbuser = "root";
    $dbad = "dbtestpanel";
    $dbpass = "";

    $conn = @mysql_connect($dbip,$dbuser,$dbpass) or die("Veritabanina baglanılamadı. - LOCAL");
    mysql_select_db($dbad,$conn) or die("Veritabanı bulunamadı.");
?>
