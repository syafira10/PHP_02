<?php
    include './koneksi.php';

    if(isset($_POST['simpan'])){
        $judul_buku = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $jenis_buku = $_POST['jenis_buku'];
        $image = $_FILES['gambar_buku']['name'];
        $target = "./images/";
        $namaSementara = $_FILES['gambar_buku']['tmp_name'];
        $terupload = move_uploaded_file($namaSementara, $target.$image);


        $sql = "INSERT INTO buku (judul_buku, penulis,gambar_buku,jenis_buku) VALUES('$judul_buku','$penulis','$image','$jenis_buku')";
        if($db1->query($sql) === TRUE){
            header("location:index.php?pesan=sukses_simpan");
        }else{
            echo "Error: " . $sql . "<br>" . $db1->error;
        }	
      
    }
   

    $db1->close();

?>