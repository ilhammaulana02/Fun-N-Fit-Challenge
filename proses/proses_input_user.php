<?php
include "connect.php";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$nip = (isset($_POST['nip'])) ? htmlentities($_POST['nip']) : "";
$alamat = (isset($_POST['kesan'])) ? htmlentities($_POST['kesan']) : "";
$password = md5('password');

if(!empty($_POST['input_user_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$username'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("Username yang dimasukkan telah ada");
        window.location="../user"</script>';
    }else{
    $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,level,nip,kesan,password) 
    values ('$name','$username','$level','$nip','$kesan','$password')");
    if($query) {
        $message = '<script>alert("Data Berhasil Di Tambah");
        window.location="../user"</script>';
    }else{
        $message = '<script>alert("Data Gagal dimasukkan")</script>';
    }
    }
}echo $message;
?>