<?php
include 'koneksi.php';
// $acak=rand(1000,9999);
// $jumlah = 1;
$id = $_GET['id'];
// echo $id;
// $ktp = $_GET['ktp'];
$name = $_GET['product'];
// echo $nama;
$cashier = $_GET['cashier'];
$price = $_GET['price'];
$category = $_GET['category'];
$method = $_GET['method'];

    if ($method == "add"){
	$hasil=mysqli_query($koneksi, "insert into product(name, price, id_category, id_cashier) values (
                                  '".$name."',
                                  '".$price."',
                                  '".$category."',
                                  '".$cashier."')");        

    }elseif($method == "edit"){
        $hasil = mysqli_query($koneksi, "update product set name = '".$name."', price = '".$price."', id_category = '".$category."', id_cashier = '".$cashier."'where id='".$id."'");

    }elseif($method == "delete"){
        $hasil = mysqli_query($koneksi, "delete from product where id='".$id."'");
    }	

    // $data = mysqli_query($koneksi, 'select jumlah from mobil where id="'.$id.'"');
    //     $kurang = mysqli_fetch_array($data);
    //     $jadi = $kurang['jumlah'] - $jumlah;
        // echo $kurang['jumlah'];
        // echo $jadi;
    // $tampil=mysqli_query($koneksi, "update mobil set jumlah = jumlah-1 where id='".$id."'")
?>

        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                <th scope="col">NO</th>
                <th scope="col">CASHIER</th>
                <th scope="col">PRODUCT</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">PRICE</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <!-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')">Delete</button> -->
            <tbody>
                <?php
                include ('koneksi.php');
                $hasil = mysqli_query($koneksi, "SELECT id, cashier.name, product.name, category.name, price, cashier.id_cashier, category.id_category
                                                 FROM product, cashier, category 
                                                 WHERE product.id_category=category.id_category 
                                                       AND product.id_cashier=cashier.id_cashier");
                $bil = 1;
                while($baca=mysqli_fetch_array($hasil)){
                    echo'
                    <tr>
                        <th scope="row">'. $bil++ .'</th>
                        <td>'.$baca[1].'</td>
                        <td>'.$baca[2].'</td>
                        <td>'.$baca[3].'</td>
                        <td>Rp. '.$baca[4].'</td>
                        <td>
                            <button class="unstyled-button" onclick="edit(\''.$baca[0].'\',\''.$baca['id_cashier'].'\',\''.$baca[2].'\',\''.$baca['id_category'].'\',\''.$baca[4].'\')">EDIT</a> |
                    
                            <button class="unstyled-button" onclick="deleted('.$baca[0].')">DELETE</a>
                        </td>
                    </tr>
                    ';
                };
                ?>
            </tbody>
        </table>