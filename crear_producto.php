<?php
// ------------------------------------------------------
// crear_producto.php
// Muestra el formulario para ingresar un nuevo estudiante.
// ------------------------------------------------------

function e($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="es" data-bs-theme="light">
<head>
    <title>Crear producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">PHP Evaluación</a>
        <div class="ms-auto">
            <a href="index.php" class="btn btn-outline-light btn-sm">Ver listado</a>
        </div>
    </div>
</nav>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <section class="card content-card">
                <div class="card-body p-4 p-md-5">
                    <span class="hero-badge mb-3">Formulario de ingreso</span>
                    <h1 class="h2 fw-bold mb-2">Ingresar producto</h1>
                    <p class="text-secondary mb-4">
                        Completa los datos solicitados. la categoria debe seleccionarse desde la lista.
                    </p>

                    <?php if (isset($_GET["error"])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= e($_GET["error"]) ?>
                        </div>
                    <?php endif; ?>

                    <form action="guardar_producto.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nombre del producto</label>
                            <input
                                type="text"
                                name="nombre"
                                class="form-control"
                                placeholder="Ejemplo: Computador"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">precio</label>
                            <input
                                type="number"
                                name="precio"
                                class="form-control"
                                placeholder="Ejemplo: 160.000"
                                min="10000"
                                max="360000"
                                required
                            >
                        </div>

                         <div class="mb-3">
                            <label class="form-label">stock</label>
                            <input
                                type="number"
                                name="stock"
                                class="form-control"
                                placeholder="Ejemplo: 16"
                                min="14"
                                max="20"
                                required
                            >
                        </div>

                    

                        <div class="mb-4">
                            <label class="form-label">categorías</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">Seleccione una categoría</option>
                                <option value="Vehiculos">Vehiculos</option>
                                <option value="Linea Blanca">Linea Blanca</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Alimentos">Alimentos</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                Guardar estudiante
                            </button>
                            <a href="index.php" class="btn btn-secondary">
                                Volver
                            </a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>