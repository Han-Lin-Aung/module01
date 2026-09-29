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

  <?php include("header.php") ?>

  <?php $products = $conn->query("SELECT * FROM products");
  $counter = 1;
  ?>

  <div class="container">
    <a href="product_create.php" class="btn btn-success my-4">Products Create</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Qty</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($items = $products->fetch_assoc()): ?>
        <tr>
          <th scope="row"><?php echo $counter ?></th>
          <td><?php echo $items["title"]; ?></td>
          <td><?php echo $items["price"]; ?></td>
          <td><?php echo $items["qty"]; ?></td>
          <td>
            <a class="btn btn-warning" href="product_update.php?id=<?php echo $items['id']; ?>">Update</a>
            <a class="btn btn-outline-danger" href="product_delete.php?id=<?php echo $items['id'] ?>">Delete</a>
          </td>
        </tr>
      <?php
        $counter++;
      endwhile; ?>
    </tbody>
  </table>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>