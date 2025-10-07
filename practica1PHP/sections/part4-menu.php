<?php
include '../process.php';
include '../includes/header.php';
?>
<div class="main-content">
<h1>Menú</h1>
<img src="<?php echo $menu['foto']; ?>" alt="Foto del plato" style="width:200px;">
<p>Nombre del plato: <?php echo $menu['nombre']; ?></p>
<p>Precio: $<?php echo $menu['precio']; ?></p>
<p>Ingredientes:</p>
<ul>
    <?php foreach ($menu['ingredientes'] as $ingrediente): ?>
        <li><?php echo $ingrediente; ?></li>
    <?php endforeach; ?>
</ul>

</div>
<?php
include '../includes/footer.php';
?>