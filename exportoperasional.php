<?php
require 'function.php';
require 'cek.php';
?>

<html>
<head>
    <title>PT. Yasiga Sarana Utama<br>
    OPERASIONAL PPI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <style>
        .signature-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .signature-left {
            text-align: left;
        }

        .signature-right {
            text-align: right;
        }

        .signature-text {
            font-weight: bold;
        }

        .tanggal-text {
            margin-bottom: 100px;
        }

        .diterima-oleh-text {
            margin-bottom: 100px;
        }

        .tanda-tangan {
            margin-bottom: 50px;
        }

        @media print {
            .tanda-tangan-text {
                font-size: 100px; /* Ganti sesuai kebutuhan */
            }
        }
    </style>
</head>

<body>
<div class="container">
    <h2>PT. Yasiga Sarana Utama</h2>
    <h4>OPERASIONAL PPI</h4>
    <div class="data-tables datatables-dark">

        <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Unit</th>
                <th>Type</th>
                <th>Nomor</th>
                <th>Tanggal</th>
                <th>keterangan</th>
                </tr>
            </thead>

            <tbody>
                     <?php
             $ambilsemuadatafaktur = mysqli_query($conn, "select * from data");
              while($data= mysqli_fetch_array($ambilsemuadatafaktur)){
                            $nama = $data ['nama'];
                            $nip = $data ['nip']; 
                            $unit = $data ['unit'];
                            $type = $data ['type'];
                            $nomor = $data ['nomor'];
                            $tanggal = $data ['tanggal'];
                            $keterangan = $data ['keterangan'];
                            ?>
                                    <tr>
                                        <td><?=$nama;?></td>
                                        <td><?=$nip;?></td>
                                        <td><?=$unit;?></td>
                                        <td><?=$type;?></td>
                                        <td><?=$nomor;?></td>
                                        <td><?=$tanggal;?></td>
                                        <td><?=$keterangan;?></td>

                                    </tr>
                     <?php
                };
                ?>
            </tbody>
        </table>
        
<script>
$(document).ready(function () {
    $('#mauexport').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf', 'print']
    });
});
</script>

<script src = "https://code.jquery.com/jquery-3.5.1.js"></script>
<script src = "https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<scrrip src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<scrrip src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_font.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


</body>

</html>
