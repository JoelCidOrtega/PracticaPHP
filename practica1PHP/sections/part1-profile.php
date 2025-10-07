<?php
include '../process.php';
include '../includes/header.php';
?>
<div class="main-content">
    <h1>Perfil Estudiante</h1>
    <p>Nombre: <?php echo $perfil['nombre']; ?></p>
    <p>Edad: <?php echo $perfil['edad']; ?> años</p>
    <p>Profesión: <?php echo $perfil['profesion']; ?></p>
</div>
<?php
include '../includes/footer.php';
?>