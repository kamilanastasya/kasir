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
* {
    margin: 0;
    padding: 0;
}

body {
    background-color: #0f3923;
}

.flower {
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
    margin-bottom: 8px;
}

table {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 50px;
    
}

button {
    
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

i {
    margin-right: 4px;
}


</style>
</head>
<body>
    <div class="flower">
        <form action="" method="post">
            <label for="nominal"><h2>Masukkan Nominal Uang</h2></label>
            <input type="number" id="nominal" name="nominal" value="Jumlah Uang">
            <p>Total yang harus di bayar adalah: Rp. <?php echo $totalBarang;?></p>
            <button type="balik" name="balik" value="balik"><i class="fa-solid fa-arrow-left"></i><a href="index.php">Kembali</a></button>
            <button type="cetak" name="cetak" value="cetak"><i class="fa-solid fa-cash-register"></i>Bayar</button>
        </form>
    
    <?php
    if(isset($_POST['cetak'])){
        if(empty($_POST['nominal'])){
            echo "Nominal tidak boleh kosong";
            exit();
        } else {
            $nominal = $_POST['nominal'];
            if($nominal < $totalBarang) {
                echo "Uang yang dimasukkan kurang";
                exit();
            } else {
                $_SESSION['nominal'] = $nominal;
                header('Location: struk.php');
                exit();
            }
        }
    }
   ?>
   </div>
</body>
</html>