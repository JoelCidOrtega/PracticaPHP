<?php
include '../process.php';
include '../includes/header.php';
?>
<div class="main-content">
<h1>Pelicula favorita</h1>
<img src="<?php echo $peliculas['foto']; ?>" alt="Poster de la película" style="width:200px;">
<p>Nombre: <?php echo $peliculas['Nombre']; ?></p>
<p>Artista: <?php echo $peliculas['Director']; ?></p>
<p>Duración: <?php echo $peliculas['duracion']; ?></p>
</div>
<?php
include '../includes/footer.php';
?>