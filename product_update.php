<?php
include("connection.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <?php
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $product = $conn->query("SELECT * FROM products WHERE id=$id");

        $item = $product->fetch_assoc();

        $media = "photos/";

        if (isset($_POST['submit'])) {

            $title = $_POST['title'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $image = $item['image'];

            if (!empty($_FILES["image"]["name"])) {

                $image = time() . "_" . basename($_FILES['image']['name']);

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    $media . $image
                );
            }

            $conn->query("UPDATE products SET title='$title',price='$price',qty='$qty',image='$image'WHERE id=$id
        ");

            header("location:product_list.php");
            exit;
        }
    }
    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto border p-4 rounded">
            <h2 class="text-center">Product Update</h2>
            <div class="mb-2">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $item['title'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $item['price'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Qty</label>
                <input type="number" class="form-control" name="qty" value="<?php echo $item['qty'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button class="w-100 btn btn-outline-success" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>