<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if(!empty($_POST['input_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_user where id='$id'"); 
    if($query) {
        $message = '<script>alert("Data Berhasil Di Hapus");
        window.location="../user"</script>';
    }else{
        $message = '<script>alert("Data Gagal Di Hapus");
        window.location="../user"</script>';
    }
}echo $message;
?>