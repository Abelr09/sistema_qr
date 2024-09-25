<?php
include "global/config.php";
include "global/conexion.php";
include "carrito.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">Logo</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Carrito(0)</a>
                </li>
            </ul>
        </div>

    </nav>
    <br />
    <br />
    <div class="container">
        <div class="alert alert-success" role="alert">
            <?php echo ($mensaje); ?>
            <a href="#" class="badge badge-success">Ver Carrito</a>
        </div>
        <div class="row">
            <?php
            $sentencia = $pdo->prepare("SELECT * FROM tblproductos");
            $sentencia->execute();
            $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos)
            ?>

            <?php foreach ($listaProductos as $producto) { ?>
                <div class="col-3">
                    <div class="card">
                        <img title="<?php echo $producto['nombre']; ?>" class="card-img-top"
                            src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>"
                            data-toggle="popover" data-trigger="hover"
                            data-content="<?php echo $producto['descripcion']; ?>">


                        <div class="card-body">
                            <span><?php echo $producto['nombre']; ?></span>
                            <h5 class="card-title"><?php echo $producto['precio'] ?>$</h5>
                            <p class="card-text">Descripcion</p>

                            <form action="" method="post">

                                <input type="text" id="id" name="id"
                                    value="<?php echo openssl_encrypt($producto['id'], cod, key); ?>">
                                <input type="text" id="nombre" name="nombre"
                                    value="<?php echo  openssl_encrypt($producto['nombre'], cod, key); ?>">
                                <input type="text" id="precio" name="precio"
                                    value="<?php echo openssl_encrypt($producto['precio'], cod, key); ?>">
                                <input type="text" id="cantidad" name="cantidad"
                                    value="<?php echo openssl_encrypt(1, cod, key); ?>">

                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                    Agregar al carrito</button>
                            </form>


                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>
    </div>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>

</html>