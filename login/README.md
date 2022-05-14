### PHP5 - Giriş Sistemi

__

Bu sistem ile yapmış olduğunuz PHP web sistemlerine üye giriş sistemi ekleyebilirsiniz. Basitleştirilmiş bir şekilde yapılmıştır. Fonksiyonlar üzerinden incelemeye sağlayarak kendinize uygun şekilde güncelleyebilirsiniz. PHP5 altında bulunan tüm çalışmaları inceleyerek daha sağlam bir şekilde temel oturtabilirsiniz.

#### Fonksiyonlar

- **verisifreleme**
    * Kullanıcının girdiği veriyi MD5 formatına çeviriyoruz, veritabanında kullanıcıların şifresi MD5 olarak saklanıyor.
- **girisyap**
    * Bu fonksiyon ile POST ettirilen kullanıcının sistemde olup olmadığını kontrol ettiriyoruz ve eğer kullanıcı varsa, şifre uyuşuyorsa sisteme girişini sağlıyoruz. Eğer site bakım modundaysa sadece yönetici olan kullanıcılar giriş yapabiliyor.

#### Veritabanı

- **Kullanıcıların bulunduğu tablo**
    * Eğer "PHP5 > Install" alanında bulunan çalışma sayesinde bir kurulum yaptıysanız tablonuzu güncelleyerek admin alanını ekleyebilirsiniz;
        - ```ALTER TABLE users ADD admin INT NOT NULL DEFAULT 0;```
    * Eğer herhangi bir users tablonuz yoksa;
        - ```CREATE TABLE users2 (id int(11) NOT NULL AUTO_INCREMENT, username varchar(255) NOT NULL, password text NOT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;```
    * Site ayarının çekildiği, bakım modu kontrolünün yapıldığı tablo;
        - ```CREATE TABLE ayar (id int(11) NOT NULL AUTO_INCREMENT, maintenance int(11) NOT NULL DEFAULT 0, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;```
        - **Tablo içindeki veri;**
            * ```INSERT INTO ayar (maintenance) VALUES ('0');```