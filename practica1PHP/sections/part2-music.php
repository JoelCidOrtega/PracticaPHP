<?php
include '../process.php';
include '../includes/header.php';
?>
<div class="main-content">
<h1>Canción favorita</h1>
<p>Nombre: <?php echo $musica['canción']; ?></p>
<p>Artista: <?php echo $musica['artista']; ?></p>
</div>
<?php
include '../includes/footer.php';
?>