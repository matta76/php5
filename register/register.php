<!-- Created by https://github.com/matta76 -->
<?php
    include("connection.php"); // Veritabanı bağlantısının bulunduğu dosya
    include("functions.php"); // Fonksiyonlar
?>
<html>
    <head>
        <title>PHP REGISTER</title>
        <meta charset="UTF-8">
        <meta name="description" content="matta - PHP">
        <meta name="keywords" content="PHP">
        <meta name="author" content="matta#7310">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        .m-t1 {
            margin-top:1%;
        }
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
    </style>
    <body>
        <center>
            <h2>PHP5 - REGISTER</h2>
            <span><b>ⓘ</b> Bu bir kayıt olma sistemidir.</span>
            <hr>
            <?php 
                if(isset($_POST["regstart"])){
                    $_USERNAME = veriguvenlik($_POST["username"]);
                    $_PASSWORD = verisifreleme($_POST["password"]);
                    
                    uyekayit($_USERNAME, $_PASSWORD);
                }
            ?>
            <?php ?>
            <form method="post">
                <label>Kullanıcı Adı</label><br>
                <input type="text" name="username" class="m-t1" required><br><br>
                <label>Şifre</label><br>
                <input type="text" name="password" class="mt-1" required><br><br>

                <button type="submit" name="regstart">Kayıt Ol</button>
            </form>
        </center>
    </body>
</html>
