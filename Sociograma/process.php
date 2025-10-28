<?php

require_once 'includes/function.php';

$nombre = trim($_POST['nombre'] ?? ''); 
$gusto = trim($_POST['gusto'] ?? '');
$fecha = trim($_POST['fecha'] ?? '');
$horaEntrada = trim($_POST['horaEntrada'] ?? '');
$horaSalida = trim($_POST['horaSalida'] ?? '');
$preferencia = trim($_POST['preferencia'] ?? '');
$compa = ($_POST['compa'] ?? []);
$neg = ($_POST['neg'] ?? []);
$motivo = trim($_POST['motivo'] ?? '');
$ayuda = trim($_POST['ayuda'] ?? '');
$color = trim($_POST['color'] ?? '');
$comentarios = trim($_POST['comentarios'] ?? '');
$lenguajes = ($_POST['lenguajes'] ?? []);
$stack = trim($_POST['stack'] ?? '');
$roles = ($_POST['roles'] ?? []);
$disponibilidad = ($_POST['disponibilidad'] ?? []);
$observaciones = trim($_POST['observaciones'] ?? '');
$nivel = trim($_POST['nivel'] ?? '');
$ide = trim($_POST['ide'] ?? '');
$git = trim($_POST['git'] ?? '');
$comunicacion = trim($_POST['comunicacion'] ?? '');
$fecha_envio = trim(date('Y-m-d H:i:s'));

$hoy = date('Y-m-d');

$errors = [];
if (strlen($_POST['nombre']) === 0) {
    $errors['nombre'] = 'El nombre es obligatorio.';
} else{
if (strlen($_POST['nombre']) < 3) {
    $errors['nombre'] = 'El nombre debe tener al menos 3 caracteres.';
}
}
if (strlen(trim($_POST['fecha'] ?? '')) === 0) {
    $errors['fecha'] = 'La fecha es obligatoria.';
} else {
    if (trim($_POST['fecha']) !== $hoy) {
        $errors['fecha'] = 'debe poner la fecha correcta';
    }
}
if (strlen($_POST['horaEntrada']) === 0) {
    $errors['horaEntrada'] = 'La hora es obligatoria.';
}
if (strlen($_POST['horaSalida']) === 0) {
    $errors['horaSalida'] = 'La hora es obligatoria.';
}
if (strlen(trim($_POST['horaEntrada'] ?? '')) > 0 && strlen(trim($_POST['horaSalida'] ?? '')) > 0) {
    $in = strtotime($_POST['horaEntrada']);
    $out = strtotime($_POST['horaSalida']);
    if ($in === false || $out === false || $in >= $out) {
        $errors['hora'] = 'La hora de entrada debe ser menor que la de salida.';
    }
}
if (strlen($_POST['gusto']) === 0) {
    $errors['gusto'] = 'El gusto es obligatorio.';
}
if (strlen($_POST['gusto']) <1 || strlen($_POST['gusto']) >5) {
    $errors['gusto'] = 'El gusto debe estar entre 1 y 5.';
}
if (strlen($_POST['preferencia']) === 0) {
    $errors['preferencia'] = 'La preferencia es obligatoria.';
}
if (empty($_POST['compa'])) {
    $errors['compa'] = 'Debes seleccionar al menos un compañero.';
}
if (empty($_POST['neg'])) {
    $errors['neg'] = 'Debes seleccionar al menos un compañero que no deseas.';
}
if (!empty($_POST['compa']) && !empty($_POST['neg'])) {
    $intersect = array_intersect($_POST['compa'], $_POST['neg']);
    if (!empty($intersect)) {
        $msg = 'No puedes seleccionar a la misma persona como compañero y como persona que no deseas trabajar.';
        $errors['compa'] = $msg;
        $errors['neg'] = $msg;
    }
}
if (strlen($_POST['motivo']) === 0) {
    $errors['motivo'] = 'El motivo es obligatorio.';
} if (str_word_count(trim($_POST['motivo'] ?? '')) < 5) {
    $errors['motivo'] = 'El motivo debe contener al menos 5 palabras.';
}
if (strlen($_POST['ayuda']) === 0) {
    $errors['ayuda'] = 'La ayuda es obligatoria.';
}
if (strlen($_POST['color']) === 0) {
    $errors['color'] = 'El color es obligatorio.';
}
if (strlen($_POST['comentarios']) === 0) {
    $errors['comentarios'] = 'Los comentarios son obligatorios.';
} if (str_word_count(trim($_POST['comentarios'] ?? '')) < 5) {
    $errors['comentarios'] = 'Los comentarios deben contener al menos 5 palabras.';
}
if (empty($_POST['lenguajes'])) {
    $errors['lenguajes'] = 'Debes seleccionar al menos un lenguaje.';
}
if (strlen($_POST['stack']) === 0) {
    $errors['stack'] = 'El stack es obligatorio.';
}
if (empty($_POST['roles'])) {
    $errors['roles'] = 'Debes seleccionar al menos un rol.';
}
if (empty($_POST['disponibilidad'])) {
    $errors['disponibilidad'] = 'Debes seleccionar al menos una disponibilidad.';
}
if (strlen($_POST['observaciones']) === 0) {
    $errors['observaciones'] = 'Las observaciones son obligatorias.';
} if (str_word_count(trim($_POST['observaciones'] ?? '')) < 5) {
    $errors['observaciones'] = 'Las observaciones deben contener al menos 5 palabras.';
}
if (strlen($_POST['nivel']) === 0) {
    $errors['nivel'] = 'El nivel es obligatorio.';
}
if (strlen($_POST['ide']) === 0) {
    $errors['ide'] = 'El IDE es obligatorio.';
}
if (strlen($_POST['git']) === 0) {
    $errors['git'] = 'La respuesta sobre Git es obligatoria.';
}
if (strlen($_POST['comunicacion']) === 0) {
    $errors['comunicacion'] = 'Las preferencias de comunicación son obligatorias.';
} elseif (str_word_count(trim($_POST['comunicacion'] ?? '')) < 5) {
    $errors['comunicacion'] = 'Las preferencias de comunicación deben contener al menos 5 palabras.';
}


if ($errors) {
     $old_field = $_POST;
     include 'includes/header.php';
     include 'index.php';
     include 'includes/footer.php';
 }
 
else {$file = 'data/sociograma.json';
$data = load_json($file);
 
$registro = $_POST;
$registro['fecha_guardado_servidor'] = date('Y-m-d H:i:s');
 
$data[] = $registro;
 
 
if (!save_json($file, $data)) {
    http_response_code(500);
    echo "Error interno del servidor: No se pudo guardar el archivo JSON.";
    exit;
}
 
include 'includes/header.php';}
?>
 
<main class="container">
    <h2>¡Gracias, <?= htmlspecialchars($_POST['nombre']) ?>!</h2>
    <p>Respuesta guardada correctamente.</p>
    <p><a href="index.php">Volver al formulario</a></p>
    <p>Ver respuestas: <a href="api.php" target="_blank">api.php</a></p>
</main>