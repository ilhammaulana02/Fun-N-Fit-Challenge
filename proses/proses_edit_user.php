<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$kesan = (isset($_POST['kesan'])) ? htmlentities($_POST['kesan']) : "";
$password = md5('password');

if(!empty($_POST['input_user_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$username'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("Username yang dimasukkan telah ada");
        window.location="../user"</script>';
    }else{
    $query = mysqli_query($conn, "UPDATE tb_user SET nama='$name',username='$username',
    level='$level',kesan='$kesan' WHERE id='$id'"); 
    if($query) {
        $message = '<script>alert("Data Berhasil Di Update");
        window.location="../user"</script>';
    }else{
        $message = '<script>alert("Data Gagal Di Update")</script>';
    }
}
}echo $message;
?>