<?php
include '../process.php';
include '../includes/header.php';
?>
<div class="main-content">
<h1>Viaje</h1>
<img src="<?php echo $viajes['mapa']; ?>" alt="Foto del destino" style="width:200px;">
<p>Destino: <?php echo $viajes['Destino']; ?></p>
<p>Estancia: <?php echo $viajes['Estancia']; ?></p>
<p>Mensaje: <?php echo $viajes['Mensaje']; ?></p>
</div>
<?php
include '../includes/footer.php';
?>