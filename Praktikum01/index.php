<?php 
// ini sebuah komentar
/* ini juga sebuah komentar (untuk komentar yang lebih dari 1 baris) */
# ini komentar pake kres
// untuk shortcutnya menggunakan ctrl+/

// echo "Hello World <br>";
// echo 'Hello World <br>';
// print_r("Siti Hujaimah <br>");
// var_dump("STTT Nurul Fikri");

// Membuat variabel user
// $nama = "Siti Hujaimah";
// $umur = 18;
// $berat = 44.5;
// $mahasiswa = true;

// echo "Nama saya adalah $nama <br>";
// echo "Umur saya $umur <br>";
// echo "Berat badan saya mecapai $berat kg";

// Membuat variabel sistem
// echo 'Dokumen Root' .$_SERVER["DOCUMENT_ROOT"];
// echo "<br>";
// echo 'Nama File' .$_SERVER["PHP_SELF"];

// Membuat variabel konstanta
// define('PHI', 3.14);
// $jari = 10;
// $luas = PHI * $jari * $jari;
// $keliling = 2 * PHI * $jari;
// echo "Luas lingkaran dengan jari-jari $jari = $luas <br>";
// echo "Keliling lingkaran dengan jari-jari $jari = $keliling";

// Membuat array
$programs = ["PHP","JavaScript", "HTML", "CSS"];
// echo $programs[0];
// echo "Jumlah data variabel programs sebanyak " .count($programs);
foreach($programs as $program){
    echo "Bahasa $program <br>";
}

?>