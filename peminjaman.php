

<?php 
include('koneksi.php');




if (empty($_POST['nama']) || empty($_POST['nip']) || empty($_POST['keperluan']) || empty($_POST['instansi']) || empty($_POST['judul_arsip']) || empty($_POST['email']) || empty($_POST['no_wa']) || empty($_POST['alamat'])) {

    echo "<script>alert('Mohon Isi Data dengan lengkap');history.back();</script>";


}elseif(isset($_POST['submit']))
{
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$keperluan = $_POST['keperluan'];
$instansi = $_POST['instansi'];
$judul_arsip = $_POST['judul_arsip'];
$email = $_POST['email'];
$no_wa = $_POST['no_wa'];
$alamat = $_POST['alamat'];


$surat = $_FILES['surat']['name'];
$tmp = $_FILES['surat']['tmp_name'];
$folder = "surat/";



move_uploaded_file($tmp, $folder.$surat);

$tambah = mysqli_query($conn,"INSERT INTO peminjaman (nama, nip, keperluan, instansi, judul_arsip, email,no_wa,alamat, surat) VALUES ('$nama', '$nip', '$keperluan', '$instansi', '$judul_arsip','$email','$no_wa','$alamat','$surat')");

if($tambah){
    echo "<script>alert('Layanan Sudah Diajukan'); document.location='layanan.php';
          </script>";
  }else{
     echo "<script>alert('Gagal Mengajukan Layanan');history.back();</script>";

  }
}
 ?>

