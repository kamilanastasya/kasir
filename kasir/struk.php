<?php
session_start();
if (isset($_SESSION['keranjang'])) {
    $totalBarang = 0;
    foreach($_SESSION['keranjang'] as $barang) {
        if(isset($barang['total'])) {
            $totalBarang += $barang['total'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
     <!-- font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
*{
    margin: 0;
    padding: 0;
 }

body{
    font-family: arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100vh;
    background-color:#0f3923;;
}

.sun {
    text-align: center;
    margin-top: 50px;
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
    margin-top: 10px;
}

h3{
    margin-top: 10px;
    margin-bottom: 15px;
}

form button {
    margin: 13px;
    padding: 3px 30px;
    border-radius: 4px;
    margin-bottom: 8px;
}

table {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 50px;
    
}

button {
    padding: 2px 4px;
    margin-right: 10px;
}

th {
    padding: 10px 58px;
}

td {
    font-size: 14px;
}

a {
    color: black;
    text-decoration: none;
}

input{
    margin-top: 10px;
}

p{
    margin-top: 10px;
}

hr{
    margin-top: 10px;
    margin-bottom: 5px;
}

i {
    margin-right: 3px;
}


    </style>
</head>
<body>
    <div class="sun">
        <h1>BUKTI PEMBAYARAN</h1>
        <p>Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16146</p>
        <hr>
        <?php 
    foreach($_SESSION['keranjang'] as $key => $barang){ 
        echo $barang['nama']; 
        echo $barang['jmlh']; 
        echo $barang['harga']; 
        echo $barang['total'] . "<br>"; 
    }
    ?>
    <hr>
    <p>Total: <?php echo  $totalBarang ;?></p>
    <p>Tunai: <?php echo $_SESSION['nominal'];?></p>
    <p>Kembalian: <?php $kembali = $_SESSION['nominal'] - $totalBarang; echo $kembali;?></p>
    <hr>
    <h3>Terimakasih telah berbelanja di MiStore</h3>    
    
    <button><i class="fa-solid fa-arrow-left"></i><a href="index.php"></a>Kembali</button>
    <button onClick="window.print()"><i class="fa-solid fa-print"></i>Print</button>
</div>
</body>
</html>