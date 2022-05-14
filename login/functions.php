<?php  
    function verisifreleme($string){
        $string = md5($string);
        return $string;
    }

    function girisyap($username, $password){
        $siteayar = mysql_query("SELECT (maintenance) FROM ayar WHERE id = 1", $GLOBALS['conn']);

        $siteayari = mysql_fetch_array($siteayar);

        if($siteayari['maintenance'] == 0){
            $uyekontrol = mysql_query("SELECT * FROM users WHERE username = '$username' and password = '$password'", $GLOBALS['conn']);
            $uyecheck = mysql_num_rows($uyekontrol);

            if($uyecheck == 1){
                session_start();
                ob_start();
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;

                echo '<h4>Giriş işlemi başarılı.</h4>';
            } else {
                echo '<h4>Girilen bilgiler ya eşleşmedi ya da böyle bir üye yok.</h4>';
            }
        } else {
            $uyekontrol = mysql_query("SELECT * FROM users WHERE username = '$username' and password = '$password'", $GLOBALS['conn']);
            $uyecheck = mysql_num_rows($uyekontrol);
            $uyearray = mysql_fetch_array($uyekontrol);

            if($uyecheck == 1){
                if($uyearray['admin'] >= 1){
                    session_start();
                    ob_start();
                    $_SESSION["login"] = true;
                    $_SESSION["username"] = $username;
                    echo '<h4>Site bakım modundayken yönetici olarak giriş yaptınız.</h4>';
                }
            } else {
                echo '<h4>Site bakım modunda, sadece yöneticiler giriş yapabilir.</h4>';
            }
        }
    }
?>