
<html>
  <body>
    <h1>Productos disponibles</h1>
    <?php
    $conexion = mysqli_connect("localhost", "usuario", "contraseña", "tienda");

    $sql = "SELECT * FROM productos";

    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      while($row = mysqli_fetch_assoc($resultado)) {
        echo "<h2>" . $row["nombre"] . "</h2>";
        echo "<p>" . $row["descripcion"] . "</p>";
        echo "<p>Precio: $" . $row["precio"] . "</p>";
        echo "<form method='post' action='procesar_pedido.php'>";
        echo "<input type='hidden' name='id_producto' value='" . $row["id_producto"] . "'>";
        echo "<label>Cantidad:</label>";
        echo "<input type='number' name='cantidad' value='1' min='1' max='" . $row["cantidad"] . "'>";
        echo "<input type='submit' value='Agregar al carrito'>";
        echo "</form>";
      }
    } else {
      echo "No hay productos disponibles en este momento.";
    }

    mysqli_close($conexion);
    ?>
  </body>
</html>
