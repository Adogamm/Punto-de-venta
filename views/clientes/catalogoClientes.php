<?php
include("../../models/connection.php");
include("../../models/clientes/clientesRepository.php");

$clientesRepository = new ClientesRepository($conn);
$resultados = $clientesRepository->catClientes();

?>

