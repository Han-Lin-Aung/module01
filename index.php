<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php
    include("header.php");
    ?>

    <?php $products = $conn->query("SELECT * FROM products");
    ?>

    <div class="container fluid mt-3">
        <div class="row row-col-1 row-cols-md-2 row-cols-lg-3 gap-3">

            <?php while ($items = $products->fetch_assoc()): ?>
                <div class="card" style="width: 18rem;">
                    <img src="photos/<?php echo $items["image"]; ?>" class="card-img-top" alt="..." <?php echo $items["image"]; ?>>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $items["title"]; ?></h5>
                        <p class="card-text"><?php echo $items["price"] ?></p>
                        <p class="card-text"><?php echo $items["qty"] ?></p>

                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>