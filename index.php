<?php
// ------------------------------------------------------
// index.php
// Página principal: prueba la conexión y lista estudiantes.
// ------------------------------------------------------

require_once "conexion.php";

// Consultamos los productos registrados.
$sql = "SELECT * FROM productos ORDER BY id DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Función simple para imprimir texto seguro en HTML.
function e($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="es" data-bs-theme="light">
<head>
    <title>Evaluación PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        crossorigin="anonymous"
    >
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">PHP Evaluación</a>
        <div class="ms-auto">
            <a href="crear_producto.php" class="btn btn-outline-light btn-sm">Nuevo Producto</a>
        </div>
    </div>
</nav>

<main class="container py-5">
    <section class="card hero-card mb-4">
        <div class="card-body p-4 p-md-5">
            <span class="hero-badge mb-3">PHP + MySQL + Bootstrap 5</span>
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h1 class="display-6 fw-bold mb-3">Registro de producto</h1>
                    <p class="lead text-secondary mb-0">
                        Este ejemplo realiza un test de conexión con la base de datos
                        e inserta producto en una tabla usando PHP, PDO y MySQL.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="crear_producto.php" class="btn btn-primary btn-lg">
                        Ingresar producto
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php if (isset($_GET["mensaje"])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= e($_GET["mensaje"]) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="alert alert-success shadow-sm" role="alert">
        <strong>Conexión exitosa:</strong>
        conectado correctamente a la base de datos <strong>evaluacion_php4g</strong>.
    </div>

    <section class="card content-card">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="h4 fw-bold mb-1">Productos registrados</h2>
                    <p class="text-secondary mb-0">Datos almacenados en la tabla productos.</p>
                </div>
            </div>

            <?php if (empty($productos)): ?>
                <div class="alert alert-info mb-0">
                    Todavía no hay productos registrados.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Categorias</th>
                                <th>Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?= e($producto["id"]) ?></td>
                                    <td class="fw-semibold"><?= e($productos["nombre"]) ?></td>
                                    <td><?= e($producto["precio"]) ?></td>
                                    <td><?= e($producto["stock"]) ?></td>
                                    <td><?= e($productos["categoria"]) ?></td>
                                    <td><?= e($productos["fecha_registro"]) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<footer class="container pb-4 text-center footer-note">
    Evaluación simple: conexión, formulario e inserción en una tabla.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>