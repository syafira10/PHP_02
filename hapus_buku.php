<?php
    include './koneksi.php';
    
    $id_buku = $_GET['id_buku'];
    

    $sql = "DELETE FROM buku WHERE id_buku='$id_buku'";
    if($db1->query($sql) === TRUE){
         header("location:index.php?pesan=sukses_hapus");
    }else{
        echo "Eror: " . $sql . "<br>" . $db1->error;
    }

    $db1->close();

?>