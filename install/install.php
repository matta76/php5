<!-- Created by https://github.com/matta76 -->
<html>
    <head>
        <title>PHP DATABASE INSTALL</title>
        <meta charset="UTF-8">
        <meta name="description" content="matta - PHP">
        <meta name="keywords" content="PHP INSTALL">
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
            <h2>PHP5 - DATABASE SETUP</h2>
            <span><b>ⓘ</b> Bu bir otomatik database içerik kurulum kodlarıdır. Öncesinden plesk, cpanel veya kullandığınız işletim sisteminden bir sql kullanıcısı ve database'i oluşturmanız gerekmektedir.</span>
            <hr>
            <?php 
                if(isset($_POST["databaseolustur"])){
                    $_DBIP = $_POST["databaseip"];
                    $_DBUSER = $_POST["databasekullaniciadi"];
                    $_DBAD = $_POST["databaseadi"];
                    $_DBPASS = $_POST["databasesifre"];
            
                    if(empty($_DBIP) || empty($_DBUSER) || empty($_DBAD)){
                        echo '<h3>Girilen verilerden herhangi biri boş. Tekrar kontrol edin.</h3>';
                    } else {
                        $dbdosya = fopen("connection.php", 'w');
                        $verigir = '
                            <?php
                                $dbip = "'.$_DBIP.'";
                                $dbuser = "'.$_DBUSER.'";
                                $dbad = "'.$_DBAD.'";
                                $dbpass = "'.$_DBPASS.'";
            
                                $conn = @mysql_connect($dbip,$dbuser,$dbpass) or die("Veritabanina baglanilamadi. - LOCAL");
                                mysql_select_db($dbad,$conn) or die("Veritabanı bulunamadi.");
                            ?>
                        ';
                        $dosyaolustur = fwrite($dbdosya, $verigir);
                        fclose($dbdosya);
            
                        if(!$dosyaolustur){
                            echo 'Dosya oluşturulamadı.';
                        } else {
                            $conn = @mysql_connect($_DBIP,$_DBUSER,$_DBPASS) or die("Veritabanina baglanilamadi. - LOCAL");
                                mysql_select_db($_DBAD,$conn) or die("Veritabanı bulunamadi.");
                            
                            $sql1 = "
                                CREATE TABLE `users` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `username` varchar(255) NOT NULL,
                                    `password` text NOT NULL,
                                    PRIMARY KEY (`id`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;
                            ";

                            $verikaydi = mysql_query($sql1, $conn);

                            if($verikaydi){
                                echo '<h4>VERITABANI BAŞARILI ŞEKİLDE OLUŞTURULDU.</h4>';
                            } else {
                                echo '<h4>VERITABANI OLUŞTURULURKEN HATA OLUŞTU. KURULUMU TEKRARLAYIN.</h4>';
                            }
                        }
                    }
                }
            ?>
            <form method="post">
                <label>Database IP <br><font size="1">((Genellikle localhost değeri alır.))</font></label><br>
                <input type="text" name="databaseip" value="localhost" class="m-t1" required><br><br>
                <label>Database Kullanıcı Adı</label><br>
                <input type="text" name="databasekullaniciadi" class="mt-1" required><br><br>
                <label>Database Adı</label><br>
                <input type="text" name="databaseadi" class="mt-1" required><br><br>
                <label>Database Şifresi</label><br>
                <input type="text" name="databasesifre" class="mt-1" required><br><br>

                <button type="submit" name="databaseolustur">Database Oluştur</button>
            </form>
        </center>
    </body>
</html>
