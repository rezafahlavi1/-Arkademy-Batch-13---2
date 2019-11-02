<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arkademy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
    .tables{
        margin-top: 200px;
    }
    .title{
        margin-top:10px;
    }
    .modal-content  {
        -webkit-border-radius: 10px !important;
        -moz-border-radius: 10px !important;
        border-radius: 10px !important; 
    }
    .table-bordered {
        -webkit-border-radius: 100px !important;
        -moz-border-radius: 100px !important;
        border-radius: 100px !important;
    }
    .button{
        border: 2px solid #FF8FB2;
        background-color: #FF8FB2;
        width: 90px;
        padding: 5px;
        border-radius: 5px;
    }
    .close{
        h1{
            size: 24px;
        }
    }
    </style>
</head>
<body>
    <!-- Image and text -->
    <nav class="navbar navbar-light fixed-top bg-light">
        <div class='container'>
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo.png" width="350" height="85" class="d-inline-block" alt="">
            </a>
            <form class="form-inline">
                <button class="button" type="button" data-toggle="modal" data-target="#add">Add</button>
            </form>
        </div>
    </nav>


    <div class="container tables" id='data'>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="POST" method="POST">
                    <select class="form-control" name="cashier" id="cashier">
                    <?php
                        include ('koneksi.php');
                        $hasil = mysqli_query($koneksi, "SELECT * FROM cashier");
                        while($baca=mysqli_fetch_array($hasil)){
                            echo'
                                <option value="'.$baca['id_cashier'].'">'.$baca['name'].'</option>
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
                                <option value="'.$baca['id_category'].'">'.$baca['name'].'</option>
                            ';
                        };
                    ?>
                    </select><br>
                    <input class="form-control" type="text" name="product" id="product" placeholder='Food/drink'><br>
                    <input class="form-control" type="text" name="price" id="price" placeholder="price"><br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" value="submit" class="button" data-dismiss="modal" onclick='add()'>ADD</button>
            </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id='edt'>
                <form action="POST" method="POST">
                    <input type="hidden" name="id" id="id1">
                    <select class="form-control" name="cashier" id="cashier1">
                    <?php
                        include ('koneksi.php');
                        $hasil = mysqli_query($koneksi, "SELECT * FROM cashier");
                        while($baca=mysqli_fetch_array($hasil)){
                            echo'
                                <option value="'.$baca['id_cashier'].'">'.$baca['name'].'</option>
                            ';
                        };
                    ?>
                    </select><br>
                   <select class="form-control" name="category" id="category1">
                    <?php
                        include ('koneksi.php');
                        $hasil = mysqli_query($koneksi, "SELECT * FROM category");
                        while($baca=mysqli_fetch_array($hasil)){
                            echo'
                                <option value="'.$baca['id_category'].'">'.$baca['name'].'</option>
                            ';
                        };
                    ?>
                    </select><br>
                    <input class="form-control" type="text" name="product" id="product1" placeholder='Food/drink'><br>
                    <input class="form-control" type="text" name="price" id="price1" placeholder="price"><br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" value="submit" class="button" data-dismiss="modal" onclick='update()'>ADD</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='container'>
                    <div class='text-center'>
                        <h6 id='nama'>DATA RAISA ANDRIANI #1 </h6> <br>
                        <img src="assets/img/centang.png" width='200px' height='160px' alt="">
                        <br><br>
                        <h6>BERHASIL DIHAPUS!</h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- End Modal -->
    
 
    <script>
        function awal(){
            $("#id").val('');
            $('#cashier').val('');
            $('#category').val('');
            $('#product').val('');
            $('#price').val('');  
        }
        function edit(id, cashier, product, category, price){
            $('#edit').modal('show');
            $("#id1").val(id);
            $('#cashier1').val(cashier);
            $('#product1').val(product);
            $('#category1').val(category);
            $('#price1').val(price);
        }

        function add(){
            var id = $("#id").val()
            var cashier = $('#cashier').val();
            var category = $('#category').val();
            var product = $('#product').val();
            var price = $('#price').val();
            // console.log(cashier);
            $.ajax({
                url: "save.php",
                async: true,
                type: 'GET',
                data: 'cashier='+cashier+'&category='+category+'&product='+product+'&price='+price+'&id='+id+'&method=add',
                success: function(metu){
                    document.getElementById("data").innerHTML = metu;
                    awal();
                    alert('Pemesanan Sukses, Silahkan Lakukan Pembayaran');
                }
            });
            // console.log(nama);
        };

        function update(){
            var id = $("#id1").val()
            var cashier = $('#cashier1').val();
            var category = $('#category1').val();
            var product = $('#product1').val();
            var price = $('#price1').val();
            // console.log(cashier);
            $.ajax({
                url: "save.php",
                async: true,
                type: 'GET',
                data: 'cashier='+cashier+'&category='+category+'&product='+product+'&price='+price+'&id='+id+'&method=edit',
                success: function(metu){
                    document.getElementById("data").innerHTML = metu;
                    awal();
                    alert('Update Berhasil');
                }
            });
            // console.log(nama);
        };


        function deleted(id){
            if (confirm("Are You Sure To Delete ?")) {
                // var id = $("#id").val()
                var cashier = $('#cashier').val();
                var category = $('#category').val();
                var product = $('#product').val();
                var price = $('#price').val();
                $.ajax({
                url: "save.php",
                async: true,
                type: 'GET',
                data: 'cashier='+cashier+'&category='+category+'&product='+product+'&price='+price+'&id='+id+'&method=delete',
                success: function(metu){
                    document.getElementById("data").innerHTML = metu;
                    // document.getElementById("nama").innerHTML = 'DATA '+$('cashier.name')+$('cashier.id');
                    $('#delete').modal('show');
                }
            });
            }
        }

    </script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>