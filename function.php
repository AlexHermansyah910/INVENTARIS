<?php
session_start();
//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","inventaris");

//menambah operasional baru
if(isset($_POST['ambilsemuadatafaktur'])){
  $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $unit = $_POST['unit'];
    $type = $_POST['type'];
    $nomor = $_POST['nomor'];
    $tanggal = $_POST['tanggal'];
    $tanggalterbaru = $_POST['tanggalterbaru'];
    $keterangan = $_POST['keterangan'];


    $ambilsemuadatafaktur = mysqli_query($conn, "insert into faktur ( nama,nip,unit, type,nomor, tanggal,tanggalterbaru keterangan) values ('$nama','$nip','$unit', '$type','$nomor','$tanggal','$tanggalterbaru','$keterangan')");
    if($ambilsemuadatafaktur){
     header('location:faktur.php');
    } else {
      echo 'Gagal';
      header('location:faktur.php');
    }
};

//menambah faktur
if(isset($_POST['faktur'])){
  $nama = $_POST['nama'];
  $nip = $_POST['nip'];
  $unit = $_POST['unit'];
  $type = $_POST['type'];
  $nomor = $_POST['nomor'];
  $tanggal = $_POST['tanggal'];
  $tanggalterbaru = $_POST['tanggalterbaru'];
  $keterangan = $_POST['keterangan'];

    // $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang = '$barangnya'");
    // $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    // $stocksekarang = $ambildatanya['stock'];
    // $tambahkanstocksekarangdenganquantity = $stocksekarang + $qty;

    $addtofaktur = mysqli_query($conn, "insert into faktur (nama,nip,unit, type,nomor, tanggal, keterangan) values ('$nama','$nip','$unit', '$type','$nomor', '$tanggal', '$keterangan')");
    $addtofaktur = mysqli_query($conn, "insert into data (nama,nip, unit, type,nomor, tanggal, keterangan) values ('$nama','$nip','$unit', '$type','$nomor', '$tanggal','$keterangan')");
    // $updatestockmasuk =  mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity'where idbarang = '$barangnya'");
    if($addtofaktur){
        header('location:faktur.php');
       } else {
         echo 'Gagal';
         header('location:faktur.php');
       }
}


//menambah barang keluar
// if(isset($_POST['addbarangkeluar'])){
//     $barangnya = $_POST['barangnya'];
//     $penerima = $_POST['penerima'];
//     $qty = $_POST['qty'];

//     $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang = '$barangnya'");
//     $ambildatanya = mysqli_fetch_array($cekstocksekarang);

//     $stocksekarang = $ambildatanya['stock'];
//     $tambahkanstocksekarangdenganquantity = $stocksekarang - $qty;

//     $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, penerima, qty) values ('$barangnya','$penerima','$qty')");
//     $updatestockmasuk =  mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity'where idbarang = '$barangnya'");
//     if($addtokeluar&&$updatestockmasuk){
//         header('location:keluar.php');
//        } else {
//          echo 'Gagal';
//          header('location:keluar.php');
//        }
// }

//update data FAKTUR
if(isset($_POST['update'])){
  $nama = $_POST['nama'];
  $nip = $_POST['nip'];
  $unit = $_POST['unit'];
  $type = $_POST['type'];
  $nomor = $_POST['nomor'];
  $tanggal = $_POST['tanggal'];
  $tanggalterbaru = $_POST['tanggalterbaru'];
  $keterangan = $_POST['keterangan'];
  $update = mysqli_query($conn, "update faktur set nama = '$nama',nip = '$nip' ,unit = '$unit',type = '$type',nomor = '$nomor',tanggal = '$tanggal',tanggalterbaru = '$tanggalterbaru',keterangan = '$keterangan' ");
  $addtofaktur = mysqli_query($conn, "insert into data (nama,nip, unit, type,nomor,  tanggal,keterangan) values ('$nama','$nip','$unit', '$type','$nomor', '$tanggal','$tanggalterbaru', '$keterangan')");
  // $updateedit = mysqli_query($conn, "update data set nama = '$nama',unit = '$unit',type = '$type',tanggal = '$tanggal',tanggalterbaru = '$tanggalterbaru',keterangan = '$keterangan' where nip ='$nip'");

  if($update){
    header('location:faktur.php');
  } else {
    echo 'Gagal';
    header('location:faktur.php');
  }
}

//menghapus data FAKTUR
if(isset($_POST['delete'])){
  $nip = $_POST['nip'];

  $delete =  mysqli_query($conn, "delete from faktur where nip= '$nip'");
  if($delete){
    header('location:faktur.php');
  } else {
    echo 'Gagal';
    header('location:faktur.php');
  }
};

//update data OPERASIONAL
if(isset($_POST['tambah'])){
  $nama = $_POST['nama'];
  $nip = $_POST['nip'];
  $unit = $_POST['unit'];
  $type = $_POST['type'];
  $nomor = $_POST['nomor'];
  $tanggal = $_POST['tanggal'];
  $tanggalterbaru = $_POST['tanggalterbaru'];
  $keterangan = $_POST['keterangan'];
  $tambah = mysqli_query($conn, "update data set nama = '$nama', nip ='$nip',unit = '$unit',type = '$type',nomor ='$nomor,'tanggal = '$tanggal','tanggalterbaru = '$tanggalterbaru',keterangan = '$keterangan'");
  $tambahedit = mysqli_query($conn, "update faktur set nama = '$nama', nip ='$nip', unit = '$unit',type = '$type',nomor = '$nomor,'tanggal = '$tanggal','tanggalterbaru = '$tanggalterbaru',keterangan = '$keterangan' ");

  if($tambahedit&&$tambah){
    header('location:index.php');
  } else {
    echo 'Gagal';
    header('location:index.php');
  }
}

//menghapus data OPERASIONAL
if(isset($_POST['hapus'])){
  $idn  = $_POST['idn'];

  $hapus =  mysqli_query($conn, "delete from data where idn= '$idn'");
  if($hapus){
    header('location:index.php');
  } else {
    echo 'Gagal';
    header('location:index.php');
  }
};

//mengubah data barang masuk
// if(isset($_POST['updatebarangmasuk'])){
//   $idb = $_POST ['idb'];
//   $idm = $_POST ['idm'];
//   $deskripsi = $_POST ['keterangan'];
//   $qty = $_POST ['qty'];

//   $lihatstock = mysqli_query($conn, "select * from stock where idbarang= '$idb'");
//   $stocknya = mysqli_fetch_array($lihatstock);
//   $stockskrg = $stocknya['stock'];

//   $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk= '$idm'");
//   $qtynya = mysqli_fetch_array($qtyskrg);
//   $qtyskrg = $qtynya['qty'];

//   if($qty>$qtyskrg){
//   $selisih = $qty-$qtyskrg ;
//   $kurangin = $stockskrg + $selisih;
//   $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang ='$idb'");
//   $updatenya = mysqli_query($conn, "update masuk set qty='$qty',keterangan = '$deskripsi' where idmasuk ='$idm'");

//   if($kurangistocknya&&$updatenya){
//     header('location:masuk.php');
//   } else {
//     echo 'Gagal';
//     header('location:masuk.php');
  
//   }
//   }else {
//     $selisih = $qtyskrg-$qty ;
//     $kurangin = $stockskrg - $selisih;
//     $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang ='$idb'");
//     $updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan = '$deskripsi' where idmasuk ='$idm'");
  
//     if($kurangistocknya&&$updatenya){
//       header('location:masuk.php');
//     } else {
//       echo 'Gagal';
//       header('location:masuk.php');
    
//     }
//   }
// }


//menghapus barang masuk
// if(isset($_POST['hapusbarangmasuk'])){
//   $idb = $_POST ['idb'];
//   $qty = $_POST ['kty'];
//   $idm = $_POST ['idm'];

//   $getdatastock = mysqli_query($conn,"select * from stock where idbarang = '$idb'");
//   $data = mysqli_fetch_array($getdatastock);
//   $stock = $data['stock'] ;

//   $selisih = $stock - $qty;

//   $update = mysqli_query($conn, "update stock set stock = '$selisih' where idbarang = '$idb'");
//   $hapusdata = mysqli_query($conn, "delete from masuk where idmasuk = '$idm'");


//   if ($update&&$hapusdata){
//     header('location:masuk.php');
//   } else {
//     header('location:masuk.php');

// }
// }



//Mengubah Data Barang Keluar

// if(isset($_POST['updatebarangkeluar'])){
//   $idb = $_POST ['idb'];
//   $idk = $_POST ['idk'];
//   $penerima = $_POST ['penerima'];
//   $qty = $_POST ['qty'];

//   $lihatstock = mysqli_query($conn, "select * from stock where idbarang= '$idb'");
//   $stocknya = mysqli_fetch_array($lihatstock);
//   $stockskrg = $stocknya['stock'];

//   $qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar= '$idk'");
//   $qtynya = mysqli_fetch_array($qtyskrg);
//   $qtyskrg = $qtynya['qty'];

//   if($qty>$qtyskrg){
//   $selisih = $qty-$qtyskrg ;
//   $kurangin = $stockskrg - $selisih;
//   $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang ='$idb'");
//   $updatenya = mysqli_query($conn, "update keluar set qty='$qty' , penerima = '$penerima' where idkeluar ='$idk'");

//   if($kurangistocknya&&$updatenya){
//     header('location:keluar.php');
//   } else {
//     echo 'Gagal';
//     header('location:keluar.php');
  
//   }
//   }else {
//     $selisih = $qtyskrg-$qty ;
//     $kurangin = $stockskrg + $selisih;
//     $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang ='$idb'");
//     $updatenya = mysqli_query($conn, "update keluar set qty='$qty', penerima = '$penerima' where idkeluar ='$idk'");
  
//     if($kurangistocknya&&$updatenya){
//       header('location:keluar.php');
//     } else {
//       echo 'Gagal';
//       header('location:keluar.php');
    
//     }
//   }
// }


//menghapus barang keluar
// if(isset($_POST['hapusbarangkeluar'])){
//   $idb = $_POST ['idb'];
//   $qty = $_POST ['kty'];
//   $idk = $_POST ['idk'];

//   $getdatastock = mysqli_query($conn,"select * from stock where idbarang = '$idb'");
//   $data = mysqli_fetch_array($getdatastock);
//   $stock = $data['stock'] ;

//   $selisih = $stock + $qty;

//   $update = mysqli_query($conn, "update stock set stock = '$selisih' where idbarang = '$idb'");
//   $hapusdata = mysqli_query($conn, "delete from keluar where idkeluar = '$idk'");


//   if ($update&&$hapusdata){
//     header('location:keluar.php');
//   } else {
//     header('location:keluar.php');

// }
// }
// tgl pada tanda tangan

?>