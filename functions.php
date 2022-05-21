<?php

/* +========================================+ */
/* +   Function yang ada disini merupakan   + */
/* +   function yang sering saya gunakan    + */
/* +   dalam pembuatan webapp php native    + */
/* +      Banjar, 19 Mei 2022 - 17.31       + */
/* +========================================+ */

/* 
   Koneksi ke Database Local
   Masukkan nama database di dalam kutip contoh : $namaDatabase = "db_sekolah ";
*/
$namaDatabase = "dojokone";
$conn = mysqli_connect("localhost", "root", "", $namaDatabase);

/* Start Session */
session_start();

/* Setting Zona Waktu WIB */
date_default_timezone_set('Asia/Jakarta');

/* Fungsi dump variable dengan langsung memberhentikan program */
function dd($v)
{
   var_dump($v);
   die;
}

/* 
   Fungsi untuk menampilkan data dari database yang disimpan didalam array
   $allUser = tampilData('SELECT * FROM tb_users');
   foreach( $allUser as $user ) {
      echo "nama : $user['nama']";
      echo "alamat : $user['alamat']";
   }
*/
function tampilData($query)
{
   global $conn;
   $data = [];
   $q = mysqli_query($conn, $query);
   while ($result = mysqli_fetch_assoc($q)) {
      $data[] = $result;
   }
   return $data;
}

/* 

   Fungsi untuk menerima request dari input sekaligus diberi keamanan
   request(attribute name);
   request('nama_depan');

*/
function request(string $request)
{
   global $conn;
   return htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST[$request]));
}

/* Fungsi ini digunakan saat menampilkan data dari kolom di database */
function e($v)
{
   return htmlspecialchars($v);
}

/* Fungsi untuk membuat slug */
function slug($text = '')
{
   $text = trim($text);
   if (empty($text)) return '';
   $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
   $text = strtolower(trim($text));
   $text = str_replace(' ', '-', $text);
   $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
   return $text;
}