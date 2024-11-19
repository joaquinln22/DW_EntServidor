<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.bundle.min.js"></script>
    <title></title>
    <style>
        .caja{
            width: 450px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="caja col-auto">
                <form action="consulta_mesas.php" method="post" name="inicio_sesion">
                    <div class="row text-center">
                        <div class="col-12">
                            <h1>Crear Mesa</h1>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <div class="col-auto">
                            <p>Nº mesa:</p>
                        </div>
                        <div class="col-auto">
                            <input type="number" name="num_mesa" size="20" required>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <div class="col-auto">
                            <p>Nº comensales:</p>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="num_comen" size="20" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col d-grid">
                            <input class="boton1 btn btn-danger" type="submit" value="Crear">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <h1>Listado de Mesas</h1>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nº Mesa</th>
                                    <th>Estado</th>
                                    <th>Nº Comensales</th>
                                    <th>Fecha Creación</th>
                                    <th>Notas</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><textarea rows="3" id="note" name="notas"></textarea></td>
                                    <td><input class="boton1 btn btn-danger" type="submit" value="Agregar Pedido"></td>
                                    <td><input class="boton1 btn btn-danger" type="submit" value="Cerrar Cuenta"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>