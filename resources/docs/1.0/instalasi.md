# Instalasi

---

- [Instalasi](#instalasi)

<a name="prasyarat-instalasi"></a>

## Prasyarat Instalasi

> {warning} 
>           <ul>
>             <li>Git</li>
>             <li>XAMPP, atau local web server apa pun yang memiliki PHP dan MySQL di dalamnya.</li>
>             <li>Composer</li>
>           </ul>

Untuk menjalankan karimun pada local server untuk pertama kali, anda dapat mengikuti langkah-langkah berikut:

<a name="mulai-instalasi"></a>

## Mulai Instalasi

1. Lakukan clone kedalam XAMPP htdocs atau local web servel lainnya
<br>
git clone [https://github.com/empnefsi/karimun.git](https://github.com/empnefsi/karimun.git)

2. Masuk ke `main` branch
<br>
`git switch main`

3. Copy dan Rename `env.example` ke `.env`
<br>
`cp .env.example .env`

4. Ubah kredensial anda yang ada file `.env`
<ul>
    <li>Kredensial Database</li>
    <li>Konfigurasi mail. Co. mailtrap</li>
</ul>

5. Jalankan `$ composer install` didalam file direktori proyek
6. Jalankan `$ composer dump-autoload` 
7. Jalankan `$ php artisan key:generate`
8. Jalankan `$ php artisan migrate--seed`
9. Jalankan `$ php artisan storage:link`
10. Selesai sudah, saatnya jalankan `php artisan serve`
11. Buka browser anda dan cantumkan `localhost:8000` pada url anda.
12. Untuk melakukan testing pada bagian admin, anda dapat mencoba dengan pergi ke `localhost:8000/login`. Untuk masuk ke laman admin anda dapat menggunakan kredensial dibawah ini:

> {info} email: admin@argon.com

> password: secret