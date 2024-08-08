<?php
include "connect.php";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$exercise = (isset($_POST['exercise'])) ? htmlentities($_POST['exercise']) : "";
$kalori = (isset($_POST['kalori'])) ? htmlentities($_POST['kalori']) : "";
$frekuensi = (isset($_POST['frekuensi'])) ? htmlentities($_POST['frekuensi']) : "";

$kode_rand = rand(10000,99999)."-";
$target_dir = "../assets/img/".$kode_rand;
$target_file = $target_dir.basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if(!empty($_POST['input_menu_validate'])){
// Cek apakah gambar atau bukan
$cek = getimagesize($_FILES['foto']['tmp_name']);
if($cek === false){
    $message = "Ini bukan file gambar";
    $statusUpload = 0;
}else{
    $statusUpload = 1;
    if(file_exists($target_file)){
        $message = "Maaf. File yang Dimasukkan Telah Ada";
        $statusUpload = 0;
    }else{
        if($_FILES['foto']['size'] > 500000){// 500kb
            $message = "File foto yang di upload terlalu besar";
            $statusUpload = 0;
        }else{
            if($imageType != "jpg" && $imageType != "png" && $imageType !="jpeg" && $imageType != "gif"){
                $message = "Maaf hanya diperbolehkan gambar yang memiliki format JPG,JPEG,PNG, dan GIF";
            $statusUpload = 0;
            }
        }
    }
}
if( $statusUpload == 0){
    $message = '<script>alert("'.$message.' Gambar tidak bisa diupload");
    window.location="../menu"</script>'; 
}else{
    $select = mysqli_query($conn, "SELECT * FROM tb_olahraga WHERE nama ='$nama'");
    if(mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Nama menu yang dimasukkan telah ada");
        window.location="../menu"</script>';
    }else{
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$target_file)){
            $query = mysqli_query($conn, "INSERT INTO tb_olahraga (foto,nama,exercise,kalori,frekuensi) 
    values ('". $kode_rand .$_FILES['foto']['name'] . "','$nama','$exercise','$kalori','$frekuensi')");
    if($query) {
        $message = '<script>alert("Data Berhasil Di Tambah");
        window.location="../menu"</script>';
    }else{
        $message = '<script>alert("Data gagal Di Tambah");
        window.location="../menu"</script>';
    }
        }else{
            $message = '<script>alert("Maaf, terjadi kesalahan file tia=dak dapat diupload");
        window.location="../menu"</script>';
        }
    }
}
}echo $message;
?>