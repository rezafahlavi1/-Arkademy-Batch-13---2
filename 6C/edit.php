<form action="POST" method="POST">
<?php 
include ('koneksi.php');
$id = $_GET['id'];
$all = mysqli_query($koneksi, "select * from product where id='".$id."'");
$read = mysqli_fetch_array($all);
?>
    <select class="form-control" name="cashier" id="cashier">
        <?php
            include ('koneksi.php');
            $hasil = mysqli_query($koneksi, "SELECT * FROM cashier");
            while($baca=mysqli_fetch_array($hasil)){
                echo'
                    <option value="'.$baca['id_cashier'].'" selected>'.$baca['name'].'</option>
                ';
            };
        ?>
        </select><br>
       <select class="form-control" name="category" id="category">
        <?php
            include ('koneksi.php');
            $hasil = mysqli_query($koneksi, "SELECT * FROM category");
            while($baca=mysqli_fetch_array($hasil)){
                echo'
                    <option value="'.$baca['id_category'].'" selected>'.$baca['name'].'</option>
                ';
            };
        ?>
        </select><br>
        <input class="form-control" type="text" name="product" id="product" placeholder='Food/drink'><br>
        <input class="form-control" type="text" name="price" id="price" placeholder="price"><br>
        <button type="submit" value="submit" id='save' class="btn btn-primary">SAVE</button>
    </form>