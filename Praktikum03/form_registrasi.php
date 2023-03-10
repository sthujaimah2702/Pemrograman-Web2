<?php require_once "proses_registrasi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body>
    <div class="container">
        <h2>Form Registrasi IT Club GDSC</h2>
        <form method="POST">
        <!-- inputan NIM -->
            <div class="form-group row">
                <label for="nim" class="col-4 col-form-label">NIM</label> 
                <div class="col-8">
                <input id="nim" name="nim" placeholder="Masukkan NIM" type="text" class="form-control" required="required">
                </div>
            </div>
        <!-- inputan nama -->
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label> 
                <div class="col-8">
                <input id="nama" name="nama" placeholder="Masukkan Nama" type="text" class="form-control" required="required">
                </div>
            </div>
        <!-- inputan email -->
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label> 
                <div class="col-8">
                <input id="email" name="email" placeholder="Masukkan Email" type="text" class="form-control" required="required">
                </div>
            </div>
        <!-- inputan jenis kelamin -->
            <div class="form-group row">
                <label class="col-4">Jenis Kelamin</label> 
                <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="jenis_kelamin" id="jenis_kelamin_0" type="radio" class="custom-control-input" value="Pria" required="required"> 
                    <label for="jenis_kelamin_0" class="custom-control-label">Pria</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="jenis_kelamin" id="jenis_kelamin_1" type="radio" class="custom-control-input" value="Wanita" required="required"> 
                    <label for="jenis_kelamin_1" class="custom-control-label">Wanita</label>
                </div>
                </div>
            </div>
        <!-- inputan domisili -->
            <div class="form-group row">
                <label for="domisili" class="col-4 col-form-label">Domisili</label> 
                <div class="col-8">
                <select id="domisili" name="domisili" class="custom-select" required="required">
            <!-- menggunakan foreach = perulangan dengan data berbentuk array -->
                    <?php foreach($domisili as $dom){ ?>
                    <option value="<?= $dom;?>"><?= $dom;?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
        <!-- inputan program studi -->
            <div class="form-group row">
                <label for="program_studi" class="col-4 col-form-label">Program Studi</label> 
                <div class="col-8">
                <select id="program_studi" name="program_studi" class="custom-select" required="required">
            <!-- menggunakan foreach = perulangan dengan data berbentuk array -->
                <?php foreach($program_studi as $key => $value){ ?>
                    <option value="<?= $key;?>"><?= $value;?></option>
                <?php } ?>
                </select>
                </div>
            </div>
        <!-- inputan skill programing -->
            <div class="form-group row">
                <label class="col-4">Skill Programming</label> 
                <div class="col-8">
            <!-- menggunakan foreach = perulangan dengan data berbentuk array -->
            <!-- key = kata kunci
                value = nilai pada array -->
                <?php foreach($skills as $key => $value){ ?>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="skill[]" id="<?=$key;?>" type="checkbox" class="custom-control-input" value="<?=$key;?>"> 
                    <label for="<?=$key;?>" class="custom-control-label"><?=$key;?></label>
                </div>
                <?php } ?>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    <!-- tabel hasil form registrasi -->
        <table class="table table-bordered">
            <tr class="table-warning text-uppercase">
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Domisili</th>
                <th>Program Studi</th>
                <th>Skill Programing</th>
                <th>Skor</th>
                <th>Predikat</th>
            </tr>
            <?php 
            // menggunakan isset untuk memeriksa variabel berisi NULL atau tidak
            if(isset($_POST['submit'])){
            $nim_user = $_POST['nim']; // menangkap inputan nim
            $nama_user = $_POST['nama']; // menangkap inputan nama
            $email_user = $_POST['email']; // menangkap inputan user
            $jenis_kelamin_user = $_POST['jenis_kelamin']; // menangkap inputan jenis kelamin
            $domisili_user = $_POST['domisili']; // menagkap inputan domisili
            $program_studi_user = $_POST['program_studi']; // menangkap inputan prodi
            $skill_user = $_POST['skill']; // menangkap inputan skill programing

            // tahap pengolahan
            $skor_user = 0; // mengolah value hasil inputan skill programing
                foreach((array)$skill_user as $skprog){$skor_user += $skills[$skprog];};

            $predikat_user = ""; // menentukan predikat yang didapatkan berdasarkan hasil skor
                if($skor_user == 0){
                    $predikat_user = "Tidak Memadai"; // kondisi skor 0
                } elseif($skor_user >0 and $skor_user <= 40){
                    $predikat_user = "Kurang"; // kondisi skor 1-40
                } elseif($skor_user >40 and $skor_user <= 60){
                    $predikat_user = "Cukup"; // kondisi skor 41-60
                } elseif($skor_user >60 and $skor_user <= 100){
                    $predikat_user = "Baik"; // kondisi skor 61-100
                } elseif($skor_user >100){
                    $predikat_user = "Sangat Baik"; // kondisi skor >100
                } else {
                    $predikat_user = "Tidak Valid"; // kondisi salah
                };
            ?>
            <tr>
                <td><?= $nim_user; ?></td> <!-- menampilkan hasil inputan nim -->
                <td><?= $nama_user; ?></td> <!-- menampilkan hasil inputan nama -->
                <td><?= $email_user; ?></td> <!-- menampilkan hasil inputan email -->
                <td><?= $jenis_kelamin_user; ?></td> <!-- menampilkan hasil inputan jenis kelamin -->
                <td><?= $domisili_user; ?></td> <!-- menampilkan hasil inputan domisili -->
                <td><?= $program_studi_user; ?></td> <!-- menampilkan hasil inputan prodi -->
                <td><?php foreach((array)$skill_user as $skill){echo $skill . " ";}; ?></td> <!-- menampilkan hasil inputan skill -->
                <td><?= $skor_user; ?></td> <!-- menampilkan hasil inputan skor -->
                <td><?= $predikat_user; ?></td> <!-- menampilkan hasil inputan predikat -->
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>