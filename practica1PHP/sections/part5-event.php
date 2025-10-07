<?php
include '../process.php';
include '../includes/header.php';
?>
<div class="main-content">
    <h1>Ticket (simple)</h1>
    <p><strong>Evento:</strong> <?php echo htmlspecialchars($eventos['evento']); ?></p>
    <p><strong>Fecha:</strong> <?php echo htmlspecialchars($eventos['fecha']); ?></p>
    <p><strong>Lugar:</strong> <?php echo htmlspecialchars($eventos['lugar']); ?></p>
    <p><strong>Entradas:</strong> <?php echo (int)$eventos['entradas']; ?></p>
    <p><strong>Precio unidad:</strong> €<?php echo number_format($eventos['precio_unitario'], 2); ?></p>
    <p><strong>Gastos gestión:</strong> €<?php echo number_format($eventos['gastos_gestion'], 2); ?></p>
    <p><strong>Total:</strong> €<?php echo number_format($eventos['total'], 2); ?></p>
</div>
<?php
include '../includes/footer.php';
?>