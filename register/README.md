### PHP5 - Üye Kayıt Sistemi
__

Bu sistem ile yapmış olduğunuz PHP web sistemlerine üye kayıt sistemi ekleyebilirsiniz. Basitleştirilmiş bir şekilde yapılmıştır. Fonksiyonlar üzerinden incelemeye sağlayarak kendinize uygun şekilde güncelleyebilirsiniz.

#### Fonksiyonlar

- **veriguvenlik**
    * Gelen ismin herhangi bir saldırı komutu içerme olasılığına karşın bazı temizleme komutlarıyla güvenli hale getiriyoruz.
- **verisifreleme**
    * Kullanıcının girdiği veriyi MD5 formatında güvenli bir şekilde şifreliyoruz.
- **uyekayit**
    * Bu fonksiyon ile POST ettirilen kullanıcının sistemde olup olmadığını kontrol ettiriyoruz ve eğer kullanıcı yoksa sisteme kayıt işlemini gerçekleştiriyoruz.