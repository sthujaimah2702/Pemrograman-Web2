<?php 
// membuat tag php untuk memproses form belanja

// menggunakan variabel bawaan php yaitu &_SERVER dalam if
/* untuk membuat kondisi agar method POST bisa dieksekusi
dalam file yang sama yaitu tugas_form-belanja tanpa berpindah halaman*/
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //membuat variabel yang ada dalam form seperti customer, produk dan jumlah
    $customer = $_POST['customer'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    //membuat kondisi untuk menentukan total produk
    // 1. if untuk kondisi produk TV (Rp. 4.200.000)
    if ($produk == 'TV'){
        $total_produk = $jumlah * 4200000;
    // 2. elseif untuk kondisi produk kulkas (Rp. 3.100.000)
    } elseif ($produk == 'Kulkas'){
        $total_produk = $jumlah * 3100000;
    // 3. elseIF untuk kondisi produk Mesin Cuci (Rp. 3.800.000)
    } elseif ($produk == 'Mesin Cuci'){
        $total_produk = $jumlah* 3800000;
    // 4. else untuk kondisi jika tidak memilih produk apapun
    } else {
        $total_produk = 'TIDAK VALID';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Form Belanja_Siti Hujaimah_SI04</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h3>Sistem Penilaian</h3>
<div class="container">
	<div class="row">
		<div class="col-md-6">
            <h2>Belanja Online</h2>
            <!-- membuat form belanja dengan method POST -->
            <form method="POST">
            <div class="form-group row">
                <label for="customer" class="col-4 col-form-label">Customer</label> 
                <div class="col-8">
                <input id="customer" name="customer" placeholder="Nama Customer" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Pilih Produk</label> 
                <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="TV" required="required"> 
                    <label for="produk_0" class="custom-control-label">TV</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="Kulkas" required="required"> 
                    <label for="produk_1" class="custom-control-label">Kulkas</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="Mesin Cuci" required="required"> 
                    <label for="produk_2" class="custom-control-label">Mesin Cuci</label>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
                <div class="col-8">
                <input id="jumlah" name="jumlah" placeholder="Jumlah" type="text" class="form-control" required="required">
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
		</div>
        <!-- membuat list grup produk dan harga -->
		<div class="col-md-6">
			<div class="list-group">
				 <a href="#" class="list-group-item list-group-item-action active"><b>DAFTAR HARGA</b></a>
				<div class="list-group-item">
					<b>TV</b>: Rp. 4.200.000
				</div>
				<div class="list-group-item">
					<p class="list-group-item-text">
						<b>KULKAS</b>: Rp. 3.100.000
					</p>
				</div>
				<div class="list-group-item justify-content-between">
					<b>MESIN CUCI</b> : Rp.3.800.000
				</div> <a href="#" class="list-group-item list-group-item-action active justify-content-between"><b>HARGA DAPAT BERUBAH SETIAP SAAT</b></a>
			</div>
		</div>
	</div>
    <hr>
	<div class="row">
		<div class="col-md-12">
            <h2>Tabel Keterangan Pemesanan Barang</h2>
        <!-- membuat table hasil proses form belanja -->
        <table class="table text-uppercase table-bordered">
            <tr class="table-primary">
                <th>Nama</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
            <!-- masukan variabel yang sudah dibuat dalam tag php
            agar bisa diproses didalam tabel belanja -->
            <tr>
                <td><?= $customer; ?></td>
                <td><?= $produk; ?></td>
                <td><?= $jumlah; ?></td>
                <td>Rp. <?= $total_produk; ?></td>
            </tr>
        </table>
		</div>
	</div>
</div>
</body>
</html>