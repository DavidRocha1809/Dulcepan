<?php
session_start();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$producto = [
    'id' => $id,
    'nombre' => $nombre,
    'precio' => $precio,
    'cantidad' => $cantidad,
    'categoria' => $categoria
];

// Verifica si el producto ya está en el carrito
$found = false;
foreach ($_SESSION['carrito'] as &$item) {
    if ($item['id'] == $id && $item['categoria'] == $categoria) {
        // Incrementa la cantidad si el producto ya está en el carrito
        $item['cantidad'] += $cantidad;
        $found = true;
        break;
    }
}

if (!$found) {
    // Si el producto no está en el carrito, agrégalo
    $_SESSION['carrito'][] = $producto;
}

header("Location: carrito.php");
exit();
?>