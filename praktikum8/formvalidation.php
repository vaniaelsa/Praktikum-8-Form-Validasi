<!DOCTYPE HTML>  
<html>
<head>
    <!-- memasukkan tampilan boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
    crossorigin="anonymous">
    
    <style>
    /*  tampilan pada classs warning */
    .warning {color: #FF0000;}
    </style>
</head>
<body>  

<?php
// deklarasi variabel 
$error_nama = "";
$error_email = "";
$error_web = "";
$error_pesan = "";
$error_telp = "";

$nama = "";
$email = "";
$web = "";
$pesan = "";
$telp = "";

// Kondisi saat method post dijalankan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // pengecekan validasi saat mengisi form input nama apakah diisi atau tidak
  if (empty($_POST["nama"])) 
  {
    //  deklarasi variabel berisi pesan error saat form input nama tidak diisi
    $error_nama = "Nama tidak boleh kosong";
  } 
  else 
  {  
    $nama = cek_input($_POST["nama"]);
    // pengecekan inputan nama hanya boleh berupa huruf dan spasi saja
    if (!preg_match("/^[a-zA-Z ]*$/",$nama)) 
    {
      //  deklarasi variabel berisi pesan error saat inputan bukan berupa huruf dan spasi
      $nameErr = "Inputan Hanya boleh huruf dan spasi"; 
    }
  }
  
  // pengecekan validasi saat mengisi form input email apakah diisi atau tidak
  if (empty($_POST["email"])) 
  {
    //  deklarasi variabel berisi pesan error saat form input email tidak diisi
    $error_email = "Email tidak boleh kosong";
  } 
  else 
  {
    $email = cek_input($_POST["email"]);
     // pengecekan inputan email hanya boleh email yang valid saja
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
       //  deklarasi variabel berisi pesan error saat inputan bukan email yang valid
      $error_email = "Format email Invalid"; 
    }
  }

  // pengecekan validasi saat mengisi form input pesan apakah diisi atau tidak
  if (empty($_POST["pesan"])) 
  {
    //  deklarasi variabel berisi pesan error saat form input pesan tidak diisi
    $error_pesan = "Pesan tidak boleh kosong";
  } 
  else
  {
    $pesan = cek_input($_POST["pesan"]);
  }
    
  // pengecekan validasi saat mengisi form input website apakah diisi atau tidak
  if (empty($_POST["web"])) 
  {
    //  deklarasi variabel berisi pesan error saat form input website tidak diisi
    $error_web = "Website tidak boleh kosong";
  } 
  else 
  {
    $web = cek_input($_POST["web"]);
    // pengecekan inputan alamat url pada website valid atau tidak
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) 
    {
       //  deklarasi variabel berisi pesan error saat inputan bukan alamat url yang valid  
      $error_web = "URL tidak valid"; 
    }
  }

  // pengecekan validasi saat mengisi form input nomor telepon apakah diisi atau tidak
  if (empty($_POST["telp"])) 
  {
    //  deklarasi variabel berisi pesan error saat form input nomor telepon tidak diisi
    $error_telp = "Telp tidak boleh kosong";
  } 
  else 
  {
    $telp = cek_input($_POST["telp"]);
    // pengecekan inputan telepon hanya boleh angka saja
    if(!is_numeric($telp)) 
    {
      //  deklarasi variabel berisi pesan error saat inputan bukan berupa angka
      $error_telp = 'Nomor HP hanya boleh angka';
    }
  }

}
//deklarasi fungsi cek input
function cek_input($data) {
    // trim untuk menghapus spasi diawal atau diakhir dari string
  $data = trim($data);
    //  stripslashes untuk menghapus atau menghilangkan karakter backslashes atau tanda garis miring terbalik ("\") 
  $data = stripslashes($data);
    //  htmlspecialchars mengkonversi beberapa karakter yang telah ditetapkan untuk entitas karakter HTML
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="row">
<div class="col-md-6">
<div class="card">
  <div class="card-header">
    Contoh Validasi Form dengan PHP
  </div>

  <div class="card-body">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <div class="form-group row">
    <!-- label untuk form nama -->
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
        <!-- pengecekan pada variabel $error_nama kosong atau tidak -->
      <input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is-invalid" : ""); ?>" id="nama" placeholder="Nama" value="<?php echo $nama; ?>"> 
        <!-- jika kosong,  menampilkan warning yang sesuai dengan tampilan di bagian tag style class warning 
        dan menampilkan pesan error di variabel $error_nama -->
      <span class="warning"><?php echo $error_nama; ?> </span>
    </div>
  </div>

  <div class="form-group row">
    <!-- label untuk form nama -->
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <!-- pengecekan pada variabel $error_email kosong atau tidak -->
      <input type="text" name="email" class="form-control <?php echo($error_email !="" ? "is-invalid" : ""); ?>" id="email" placeholder="email" value="<?php echo $email; ?>">
        <!-- jika kosong,  menampilkan warning yang sesuai dengan tampilan di bagian tag style class warning 
        dan menampilkan pesan error di variabel $error_email -->
      <span class="warning"><?php echo $error_email; ?></span>
    </div>
  </div>

  <div class="form-group row">
    <!-- label untuk form website kosong atau tidak -->
    <label for="web" class="col-sm-2 col-form-label">Website</label>
    <div class="col-sm-10">
        <!-- pengecekan pada variabel $error_web -->
      <input type="text" name="web" class="form-control  <?php echo($error_web !="" ? "is-invalid" : ""); ?>" id="web" placeholder="web" value="<?php echo $web; ?>">
        <!-- jika kosong,  menampilkan warning yang sesuai dengan tampilan di bagian tag style class warning 
        dan menampilkan pesan error di variabel $error_web -->
      <span class="warning"><?php echo $error_web; ?></span>
    </div>
  </div>

  <div class="form-group row">
    <!-- label untuk form telepon kosong atau tidak-->
    <label for="telp" class="col-sm-2 col-form-label">Telp</label>
    <div class="col-sm-10">
        <!-- pengecekan pada variabel $error_telp -->
      <input type="text" name="telp" class="form-control <?php echo($error_telp !="" ? "is-invalid" : ""); ?>" id="telp" placeholder="telp" value="<?php echo $telp; ?>">
        <!-- jika kosong,  menampilkan warning yang sesuai dengan tampilan di bagian tag style class warning 
        dan menampilkan pesan error di variabel $error_telp -->
      <span class="warning"><?php echo $error_telp; ?></span>
    </div>
  </div>

  <div class="form-group row ">
    <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
    <div class="col-sm-10">
        <!-- pengecekan pada variabel $error_pesan kosong atau tidak -->
      <textarea name="pesan" class="form-control <?php echo($error_pesan !="" ? "is-invalid" : ""); ?>"><?php echo $pesan; ?></textarea>
        <!-- jika kosong,  menampilkan warning yang sesuai dengan tampilan di bagian tag style class warning 
        dan menampilkan pesan error di variabel $error_pesan -->
      <span class="warning"><?php echo $error_pesan; ?></span>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
        <!-- tombol sign in untuk submit data -->
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>

  </div>
</div>
</div>
</div>

<!-- menampilkan teks dari hasil form yang diinputkan -->
<?php
echo "<h2>Your Input:</h2>";
echo "Nama = ".$nama;
echo "<br>";
echo "Email = ".$email;
echo "<br>";
echo "Website = ".$web;
echo "<br>";
echo "Telp = ".$telp;
echo "<br>";
echo "Pesan = ".$pesan;
?>

</body>
</html>