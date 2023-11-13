<?php
include("../../models/connection.php");
include("../../models/clientes/clientesRepository.php");

$clientesRepository = new ClientesRepository($conn);
$resultados = $clientesRepository->catClientes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../styles/inicio.css">
    <title>Catalogo Clientes</title>
</head>
<body>
    <div id="navbarContainer"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
            <div class="card shadow">
                    <div class="card-body shadow">
                        <table id="myTable" class="display table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php foreach($resultados as $fila) { ?>
                                <tr>
                                    <td>
                                        <?php echo $fila['ID_CLIENTE']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['NOMBRE']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['TELEFONO']; ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../scripts/dataTables.js"></script>
    <script src="../../scripts/navbarCat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>