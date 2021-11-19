<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "felixindo";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("tidak bisa terkoneksi ke database");
}
$kode           = "";
$nm_produk      = "";
$jml_barang     = "";
$hrg_jual       = "";
$disc1          = "";
$disc2          = "";
$disc3          = "";
$jumlah         = "";
$sukses         = "";
$error          = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op == 'delete'){
    $kode    = $_GET['kode'];
    $sql1   = "delete from felixindo where kode = '$kode'";
    $q1     = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error = "Gagal melakukan delete data";
    }
}

if(isset($_POST['simpan'])){ //untuk create
    $kode           = $_POST['kode'];
    $nm_produk      = $_POST['nm_produk'];
    $jml_barang     = $_POST['jml_barang'];
    $hrg_jual       = $_POST['hrg_jual'];
    $disc1          = $_POST['disc1'];
    $disc2          = $_POST['disc2'];
    $disc3          = $_POST['disc3'];
    $jumlah         = $_POST['jumlah'];

    if($kode && $nm_produk && $jml_barang && $disc1 && $disc2 && $disc3 && $jumlah){
        $sql1 = "insert into felixindo(kode,nm_produk,jml_barang,hrg_jual,disc1,disc2,disc3,jumlah) values ('$kode', '$nm_produk' , '$jml_barang','$hrg_jual', '$disc1' , '$disc2', '$disc3', '$jumlah')";
        $q1   = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses = "Berhasil memasukkan data baru";
        }else{
            $error  = "Gagal memasukkan data baru";
        }
    }else{
        $error  = "Silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<html>
<body>
    <div class="mx-auto">
        <!-- memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit
            </div>
            <div class="card-body">
                <?php
                if($error){
                 ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                }
                ?>

                <?php
                if($sukses){
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="kode" name="kode" value="<?php echo $kode ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nm_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="nm_produk" name="nm_produk" value="<?php echo $nm_produk ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jml_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="jml_barang" name="jml_barang" value="<?php echo $jml_barang ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="hrg_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="hrg_jual" name="hrg_jual" value="<?php echo $hrg_jual ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="disc1" class="col-sm-2 col-form-label">Discount 1</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="disc1" name="disc1" value="<?php echo $disc1 ?>">
                        </div>
                    </div>

                    <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="disc2" class="col-sm-2 col-form-label">Discount 2</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="disc2" name="disc2" value="<?php echo $disc2 ?>">
                        </div>
                    </div>

                    <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="disc3" class="col-sm-2 col-form-label">Discount 3</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="disc3" name="disc3" value="<?php echo $disc3 ?>">
                        </div>
                    </div>

                    <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="jumlah" name="jumlah" value="<?php echo $jumlah ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <!-- mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data mahasiswa
            </div>
            <div class="card-body">
               <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Harga Barang</th>
                            <th scope="col">Discount 1</th>
                            <th scope="col">Discount 2</th>
                            <th scope="col">Discount 3</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        <tbody>
                            <?php 
                            $sql2   = "select * from felixindo order by kode desc";
                            $q2     = mysqli_query($koneksi,$sql2);
                            $urut   = 1;
                            while($r2 = mysqli_fetch_array($q2)){ 
                                $kode           = $r2['kode'];
                                $nm_produk      = $r2['nm_produk'];
                                $jml_barang     = $r2['jml_barang'];
                                $hrg_jual       = $r2['hrg_jual'];
                                $disc1          = $r2['disc1'];
                                $disc2          = $r2['disc2'];
                                $disc3          = $r2['disc3'];
                                $jumlah         = $r2['jumlah'];
                                      
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <td scope="row"><?php echo $kode ?></td>
                                    <td scope="row"><?php echo $nm_produk?></td>
                                    <td scope="row"><?php echo $jml_barang?></td>
                                    <td scope="row"><?php echo $hrg_jual?></td>
                                    <td scope="row"><?php echo $disc1?></td>
                                    <td scope="row"><?php echo $disc2?></td>
                                    <td scope="row"><?php echo $disc3?></td>
                                    <td scope="row"><?php echo $jumlah?></td>
                                    <td scope="row">
                                        <a href="index.php?op=delete&kode=<?php echo $kode  ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a> 
                                         
                                    </td>
                                     
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </thead>
               </table>
            </div>
        </div>
    </div>
</body>
</html>