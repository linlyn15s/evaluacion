    <?php
    // ------------------------------------------------------
    // guardar_estudiante.php
    // Recibe los datos del formulario y los inserta en MySQL.
    // ------------------------------------------------------

    require_once "conexion.php";

    $nombre = trim($_POST["nombre"] ?? "");
    $precio= $_POST["precio"] ?? "";
    $stock = $_POST["stock"] ?? "";
    $categoria =$_POST["categoria"] ?? "";

    $categoriasPermitidos= ["Vehiculosll ", "Linea Blanca", "Ropa", "Alimentos"];

    // Validación básica: los campos no pueden estar vacíos.
    if ($nombre === "" || $precio === "" || $stock === "") {
        header("Location: crear_producto.php?error=Todos los campos son obligatorios");
        exit;
    }

    // Validamos que el precio sea numérico.
    if (!is_numeric($precio)) {
        header("Location: crear_producto.php?error=La precio debe ser un número");
        exit;
    }

    // Validamos que el stock sea numérico.
    if (!is_numeric($stock)) {
        header("Location: crear_producto.php?error=La stock debe ser un número");
        exit;
    }

    // Validamos que la categoria sea una de las categorias permitidas.
    if (!in_array( $categoria, $categoriasPermitidos)) {
        header("Location: crear_producto.php?error=La categoria seleccionada no es válida");
        exit;
    }

    try {
        // Consulta preparada para insertar el producto.
        $sql = "INSERT INTO productos (nombre, precio, stock, categoria)
                VALUES (:nombre, :precio, :stock, :categoria)";

        $stmt = $conexion->prepare($sql);

        $stmt->execute([
            ":nombre" => $nombre,
            ":precio" => $precio,
            ":stock" => $stock,
            ":categoria" => $categoria
        ]);

        header("Location: index.php?mensaje=producto guardado correctamente");
        exit;

    } catch (PDOException $error) {
        die("Error al guardar el producto: " . $error->getMessage());
    }
    ?>