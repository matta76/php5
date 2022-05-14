<?php
            function veriguvenlik($string){
                $string = htmlspecialchars(mysql_escape_string(addslashes(strip_tags(trim($string)))));

                return $string;
            }
            function verisifreleme($string){
                $string = md5($string);

                return $string;
            }
            function uyekayit($username, $password){
                $uyekontrolu = mysql_query("SELECT * FROM users WHERE username = '$username'", $GLOBALS['conn']);

                $uyekontrolusayisi = mysql_num_rows($uyekontrolu);

                if($uyekontrolusayisi >= 1){
                    echo '<h4>Böyle bir üye olduğu için kayıt işlemi yapamazsınız.</h4>';
                } else {
                    $uyekaydiyap = mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')", $GLOBALS['conn']);

                    if($uyekaydiyap){
                        echo '<h4>Kayıt işlemi başarılı bir şekilde gerçekleştirildi.</h4>';
                    } else {
                        echo '<h4>Kayıt işlemi gerçekleştirilirken bir hata oluştu.</h4>';
                    }
                }
            }
?>