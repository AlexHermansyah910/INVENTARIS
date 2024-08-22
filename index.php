<?php
require 'function.php';
require 'cek.php'
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OPERASIONAL PPI</title>
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrao4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Smart Shoes PT YASIGA</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                        <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                OPERASIONAL 
                            </a>

                            <a class="nav-link" href="faktur.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                FAKTUR PERMINTAAN
                            </a>


                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-undo"></i></div>
                                Logout
                            </a>

                          
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="far fa-address-card"></i></i>OPERASIONAL PPI</h1>
                    
                       
                        <div class="card mb-4">
                            <div class="card-header">
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Masukan Data
                             </button> -->
                             <style>
                            .btn.btn_info {
                                background-color: darkgreen;
                                color: white;
                                border: 5px solid transparent; /* Menetapkan border agar dapat berubah saat diarahkan */
                                transition: border-color 0.3s ease; /* Efek transisi untuk perubahan warna border */
                                text-decoration: none; /* Menghilangkan garis bawah default pada tautan */
                                padding: 2px 8px; /* Sesuaikan sesuai kebutuhan Anda */
                                display: inline-block;
                            }

                            .btn.btn_info:hover {
                                border-color: black; /* Warna border saat diarahkan */
                            }
                            </style>
                        <a href="exportoperasional.php" class="btn btn_info">Export</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Unit</th>
                                            <th>Type</th>
                                            <th>Nomor</th>
                                            <th>Tanggal</th>
                                            <th>Tanggal Terbaru</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>        
                                    <tbody>
                                    <?php
                                    $ambilsemuadata = mysqli_query($conn, "select * from data");
                                    // $i = 1;
                                    while($data= mysqli_fetch_array($ambilsemuadata)){
                                    $idn = $data ['idn'];   
                                    $nama = $data ['nama'];
                                    $nip = $data ['nip'];
                                    $unit = $data ['unit'];
                                    $type = $data ['type'];
                                    $nomor = $data ['nomor'];
                                    $tanggal = $data ['tanggal'];
                                    $tanggalterbaru = $data ['tanggalterbaru'];
                                    $keterangan = $data ['keterangan'];
                                    ?>
                                        <tr>
                                            <td><?=$idn;?></td>
                                            <td><?=$nama;?></td>
                                            <td><?=$nip;?></td>
                                            <td><?=$unit;?></td>
                                            <td><?=$type;?></td>
                                            <td><?=$nomor;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$tanggalterbaru;?></td>
                                            <td><?=$keterangan;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$nip;?>">
                                            Edit
                                                </button>
                                                
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idn;?>">
                                            <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- edit Modal -->
                                        <div class="modal fade" id="edit<?=$nip;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method= "post">
                                                <div class="modal-body">
                                                    Nama
                                                    <input type= "text" name= "nama" value= "<?=$nama;?>" class= "form-control" required>
                                                    <div style="margin: 5px"></div>
                                                    NIP
                                                    <input type= "text" name= "nip" value= "<?=$nip;?>" class= "form-control" required>
                                                    <div style="margin: 5px"></div>
                                                    Unit
                                                    <input type= "text" name= "unit" value= "<?=$unit;?>" class= "form-control" required>
                                                    <div style="margin: 5px"></div>
                                                    Type
                                                    <input type= "text" name= "type" value= "<?=$type;?>" class= "form-control" required>
                                                    Nomor
                                                    <input type= "text" name= "nomor" value= "<?=$nomor;?>" class= "form-control" required>
                                                    Tanggal            
                                                    <input type= "date" name= "tanggal" value= "<?=$tanggal;?>" class= "form-control" required>
                                                    Tanggal Terbaru            
                                                    <input type= "date" name= "tanggalterbaru" value= "<?=$tanggalterbaru;?>" class= "form-control" required>
                                                    Keterangan            
                                                    <input type= "text" name= "keterangan" value= "<?=$keterangan;?>" class= "form-control" required>            
                                                    <div style="margin: 5px"></div>
                                                    <button type= "submit" class= "btn btn-primary" name ="update">Submit</button>
                                                </div>
                                                </form>


                                                </div>
                                            </div>
                                            </div>

                                    </div>

                                    <!-- delete Modal -->
                                    <div class="modal fade" id="delete<?=$idn;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Barang?</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method= "post">
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus <?=$nama;?>?
                                                    <input type= "hidden" name= "idn" value= "<?=$idn;?>">
                                                    <input type= "hidden" name= "nama" value= "<?=$nama;?>">
                                                    <input type= "hidden" name= "nip" value= "<?=$nip;?>">                                                    <input type= "hidden" name= "unit" value= "<?=$unit;?>">
                                                    <input type= "hidden" name= "type" value= "<?=$type;?>">
                                                    <input type= "hidden" name= "nomor" value= "<?=$nomor;?>">
                                                    <input type= "hidden" name= "tanggal" value= "<?=$tanggal;?>">
                                                    <input type= "hidden" name= "tanggalterbaru" value= "<?=$tanggalterbaru;?>">
                                                    <input type= "hidden" name= "keterangan" value= "<?=$keterangan;?>">
                                                    <br>
                                                    <br>
                                                    <button type= "submit" class= "btn btn-danger" name ="hapus">Hapus</button>
                                                    <br>
                                                </div>
                                                </form>


                                                </div>
                                            </div>
                                            </div>

                                    </div>
                                    
                                    <?php
                                     };

                                    ?>

                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
     <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <!-- <div class="modal-header">
            <h4 class="modal-title">Tambah Barang</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div> -->

        <!-- Modal body -->
        <form method= "post">
        <div class="modal-body">
        <input type= "text" name= "nama" class= "form-control" placeholder= "Nama" required>
        <div style="margin: 5px"></div>
        <input type= "text" name= "nip" class= "form-control" placeholder= "NIP" required>
        <div style="margin: 5px"></div>
         <input type= "text" name= "unit" class= "form-control" placeholder= "Unit" required>
        <div style="margin: 5px"></div>
        <input type= "text" name= "type" class= "form-control" placeholder= "Type" required>
        <div style="margin: 5px"></div>
        <input type= "text" name= "nomor" class= "form-control" placeholder= "Nomor" required>
        <div style="margin: 5px"></div>
        <input type= "date" name= "tanggal" class= "form-control" placeholder= "Tanggal" required>
        <div style="margin: 5px"></div>
        <input type= "date" name= "tanggalterbaru" class= "form-control" placeholder= "Tanggal Terbaru" required>
        <div style="margin: 5px"></div>
        <input type= "text" name= "keterangan" class= "form-control" placeholder= "Keterangan" required>
        <div style="margin: 5px"></div>
        <button type= "submit" class= "btn btn-primary" name ="data">Submit</button>
        </div>
        </form>


        </div>
    </div>
    </div>
</html>