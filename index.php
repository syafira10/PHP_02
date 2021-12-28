<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PHP 02/Habib</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php 
        if(isset($_GET['pesan'])){
          if($_GET['pesan']=="sukses_simpan"){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Tambah Buku Sukses !</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
        }
        ?>
        <?php 
        if(isset($_GET['pesan'])){
          if($_GET['pesan']=="sukses_hapus"){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Hapus Buku Sukses !</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
          }
        }
        ?>
        <div class="row mt-3" id="load_data">
            <?php
              include './koneksi.php';
              $query = "SELECT * FROM buku";
              $dewan1 = $db1->prepare($query);
              $dewan1->execute();
              $res1 = $dewan1->get_result();
              while ($row = $res1->fetch_assoc()) {
                $id_buku = $row["id_buku"];
                $judul_buku = $row["judul_buku"];
                $penulis = $row["penulis"];
                $jenis_buku = $row["jenis_buku"];
                $gambar_buku = $row["gambar_buku"];
                    
            ?>
              <div class="col-sm-3 mb-3" >
                  <div class="card">
                        <img src="<?php echo "./images/$gambar_buku"; ?>" alt="gambar">
                        <div class="card-body text-decoration-none">
                            <h5 class="card-title"><?php echo $judul_buku; ?></h5>
                            <p class="card-text text-decoration-none"><?php echo $jenis_buku; ?></p>
                            <p class="card-text text-decoration-none"><?php echo $penulis; ?></p>        
                        </div>
                                       
                        <div class="card-footer">
                            <a href='ubah_buku.php?id_buku=<?php echo $id_buku; ?>' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_buku.php?id_buku=<?php echo $id_buku; ?>' class='btn btn-danger btn-sm'>Hapus</a>
                            </div>
                        </div>
          
                  </div>
                  <?php } ?>
                </div>
        </div>
        <div class="container">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
            </div>
            <!-- Button trigger modal -->
           

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="simpan_buku.php" method="POST" enctype="multipart/form-data">               
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control"></label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Buku</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_buku">
                            <option selected>Jenis Buku</option>
                            <option value="romance" name="romance">Romantis</option>
                            <option value="horor" name="horor">Horor</option>
                            <option value="3" name="fantasi">Fantasi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Buku</label>
                        <input type="file" name="gambar_buku" value="" class="form-control"></label>
                    </div> 
                    <button type="submit" name="simpan" value="simpan" class="btn btn-warning">Simpan</button>
                </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        
          
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>