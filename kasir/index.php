<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    * {
    margin: 0;
    padding: 0;
}

body {
    background-color: #0f3923;
}

.chan {
    text-align: center;
    margin: 50px auto;
    font-size: 12px;
    background-color:;
    max-width: 790px;
    padding: 30px;
    background-color: #e2e2e2;
    border-radius: 5px;
}

form {
    margin-top: 20px;
    font-size: 12px;
    flex-direction: column;
    margin-bottom: 10px;

}

h1{
    margin-top: 8px;
}

form button {
    margin: 13px;
    padding: 3px 30px;
    border-radius: 4px;
}

table {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 50px;
    
}

th {
    padding: 10px 58px;
}

td {
    font-size: 14px;
    padding: 8px;
}

td a {
    background-color: #D30000;
    border-radius: 3px;
    padding: 4px 6px;
    /* border-radius: 6px; */
}

a {
    color: black;
    text-decoration: none;
}

.tambah1 {
    background-color: #5360FD;
    padding: 5px 8px;
    border-radius: 6px;
    margin-right: 20px;

}

.tambah2 {
    background-color: #00ab41;
    padding: 5px 8px;
    border-radius: 6px;
    margin-right: 20px;
    
}

.tambah3 {
    background-color: #D30000;
    padding: 5px 8px;
    border-radius: 6px;
    margin-right: 20px;
    
}

input {
    margin-top: 20px;
    margin-right: 15px;
    padding: 3px;
    
}

i {
    margin-right: 5px;
}


</style>
</head>
<body>
    <div class="chan">
        <div class="channie">     
            <h1>Keranjang Belanja</h1>
        </div>
        <form action="" method="post">
            <!-- <label for="nama">Nama barang:</label> -->
            <input type="text" id="nama" name="nama" placeholder="Nama Barang">
            <!-- <label for="jmlh">Jumlah barang:</label> -->
            <input type="number" id="jmlh" name="jmlh" placeholder="Jumlah">
            <!-- <label for="harga">Harga barang: Rp.</label> -->
            <input type="number" id="harga" name="harga" placeholder="Harga"><br></br>
            <button class="tambah1" type="tambah" name="tambah" value="tambah"><i class="fa-solid fa-plus"></i>Tambah</button>
            <button class="tambah2" type="submit" name="bayar" value="bayar"><i class="fa-solid fa-cart-shopping"></i>Bayar</button>
            <!-- <button class="tambah3" type="submit" ><a href="destroy.php">hapus</a></button> -->
            <button class= "tambah3" type="submit" name="destroy" value="hapus"><i class="fa-solid fa-trash"></i><a href="destroy.php">Kosongkan Keranjang</a></button>
    </form>

    <?php
    session_start();

    if(!isset($_SESSION['keranjang'])){
        $_SESSION['keranjang'] = array();
    }
    
    if(isset($_POST['tambah'])){
        if(empty($_POST['nama'])  && empty($_POST['jmlh']) && empty($_POST['harga'])){
            echo "Mohon isi semua kolom";
        }else{
            $nama = $_POST['nama'];
            $jmlh = $_POST['jmlh'];
            $harga = $_POST['harga'];
            $total = $jmlh * $harga;
            $barang = array(
                'nama' => $nama,
                'jmlh' => $jmlh,
                'harga' => $harga,
                'total' => $total
            );
            array_push($_SESSION['keranjang'], $barang);
        }
    }

    if(isset($_GET["hapus"])) {
        $index = $_GET["hapus"]; //? (int) $_GET["hapus"] : null;
        unset($_SESSION['keranjang'][$index]);
        //$_SESSION['keranjang'] = array_values($_SESSION["keranjang"]);
        header("Location: index.php");
        exit;
    }

    if(count($_SESSION['keranjang']) > 0){
        echo "<table border = '1'>";
        echo "<tr><th>Nama Barang</th><th>Jumlah Barang</th><th>Harga Barang</th><th>Total</th><th>Hapus</th></tr>";
        $totals = 0;
        foreach($_SESSION['keranjang'] as $key => $barang){
            echo "<tr>";
            echo "<td>". $barang['nama']. "</td>";
            echo "<td>". $barang['jmlh']. "</td>";
            echo "<td>Rp. ". $barang['harga']. "</td>";
            echo "<td>Rp. ". $barang['total']. "</td>";
            echo "<td><a href=\"?hapus=$key\"><i class='fa-solid fa-trash'></i>hapus</a></td>";
            echo "</tr>";
            $totals+= $barang['total'];
        }
        echo "<tr>";
        echo "<td colspan='4'>Total keseluruhan</td>";
        echo "<td>". $totals."</td>";
        echo "</table>";
    }
    
    if(isset($_POST['bayar'])){
        if(count($_SESSION['keranjang']) == 0){
            echo "Keranjang kosong";
            exit();
        }else{
            header('location: bayar.php');
            exit();
        }
    }

   
    ?>
    </div>
</body>
</html>