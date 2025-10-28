<?php
include 'includes/header.php';
include_once 'includes/function.php';

$old_field = $old_field ?? [];
$errors = $errors ?? [];
?>
<h1>Sociograma: Nueva Clase</h1>
<form action="process.php" method="post">

  <!-- 1. Tu nombre -->
  <label>1. Tu nombre:</label>
  <input type="text" name="nombre">
  <?= field_error('nombre', $errors) ?>
  <p></p>

  <!-- 2. ¿Qué tanto te gusta trabajar con tus compañeros? -->
  <label>2. ¿Qué tanto te gusta trabajar con tus compañeros? (1-5)</label>
  <input type="number" name="gusto" min="1" max="5" required>
  <?= field_error('gusto', $errors) ?>
  <p></p>

  <!-- 3. Fecha de hoy -->
  <label>3. Fecha de hoy:</label>
  <input type="date" name="fecha" required>
  <?= field_error('fecha', $errors) ?>
  <p></p>

  <!-- 4. Hora -->
  <label>4. ¿A que hora entras y a que hora sales?</label>
  <p></p>
  Hora entrada: <input type="time" name="horaEntrada" required>
  Hora salida: <input type="time" name="horaSalida" required>
  <?= field_error('horaEntrada', $errors) ?>
  <?= field_error('horaSalida', $errors) ?>
  <?= field_error('hora', $errors) ?>
  <p></p>

  <!-- 5. Preferencia de trabajo -->
  <label>5. ¿Prefieres trabajar solo o en grupo?</label>
  <input type="radio" name="preferencia" value="solo" required> Solo
  <input type="radio" name="preferencia" value="grupo"> En grupo
  <?= field_error('preferencia', $errors) ?>
  <p></p>

  <!-- 6. ¿Con quién te gustaría trabajar? -->
  <label>6. ¿Con quién te gustaría trabajar? (marca todos los que quieras)</label>
  <input type="checkbox" name="compa[]" value="sandro"> Sandro
  <input type="checkbox" name="compa[]" value="jan"> Jan
  <input type="checkbox" name="compa[]" value="elia"> Elia
  <?= field_error('compa', $errors) ?>
  <p></p>

  <!-- 7. ¿Con quién no te gustaría trabajar? -->
  <label>7. ¿Con quién no te gustaría trabajar? (marca todos los que quieras)</label>
  <input type="checkbox" name="neg[]" value="sandro"> Sandro
  <input type="checkbox" name="neg[]" value="jan"> Jan
  <input type="checkbox" name="neg[]" value="elia"> Elia
  <?= field_error('neg', $errors) ?>
  <p></p>

  <!-- 8. Motivo -->
  <label>8. Explica el motivo:</label>
  <p></p>
  <textarea name="motivo" rows="4" required
    placeholder="Motivo..."
    ></textarea>
  <?= field_error('motivo', $errors) ?>
  <p></p>

  <!-- 9. ¿A quién pedirías ayuda? -->
  <label>9. ¿A quién pedirías ayuda si no entiendes algo?</label>
  <select name="ayuda" required>
    <option value="">Selecciona una persona</option>
    <option value="sandro">Sandro</option>
    <option value="jan">Jan</option>
    <option value="elia">Elia</option>
  </select>
  <?= field_error('ayuda', $errors) ?>
  <p></p>

  <!-- 10. Color -->
  <label>10. Elige un color que represente cómo te sientes en la clase:</label>
  <input type="color" name="color" required>
  <?= field_error('color', $errors) ?>
  <p></p>

  <!-- 11. Comentarios -->
  <label>11. Explica brevemente cómo te has sentido en esta nueva clase:</label>
  <p></p>
  <textarea name="comentarios" rows="4" required
    placeholder="¿Como te sientes?"
    ></textarea>
  <?= field_error('comentarios', $errors) ?>
  <p></p>

  <!-- 12. Lenguajes de programación -->
  <label>12. ¿Qué lenguajes de programación te gusta usar?</label>
  <?php
  $langs = ['javascript', 'python', 'java', 'php', 'csharp', 'cpp'];
  foreach ($langs as $lang) {
    $checked = in_array($lang, $old_field['lenguajes'] ?? []) ? 'checked' : '';
    echo "<input type='checkbox' name='lenguajes[]' value='$lang' $checked> " . ucfirst($lang);
  }
  ?>
  <?= field_error('lenguajes', $errors) ?>
  <p></p>

  <!-- 13. Stack -->
  <label>13. ¿Eres más de Frontend o Backend?</label>
  <input type="radio" name="stack" value="frontend"
    required> Frontend
  <input type="radio" name="stack" value="backend">
  Backend
  <input type="radio" name="stack" value="fullstack"> Fullstack
  <?= field_error('stack', $errors) ?>
  <p></p>

  <!-- 14. Rol -->
  <label>14. ¿Qué rol prefieres en un equipo?</label>
  <?php
  $roles = ['lider', 'programador', 'diseñador', 'tester'];
  foreach ($roles as $rol) {
    $checked = in_array($rol, $old_field['roles'] ?? []) ? 'checked' : '';
    echo "<input type='checkbox' name='roles[]' value='$rol' $checked> " . ucfirst($rol);
  }
  ?>
  <?= field_error('roles', $errors) ?>
  <p></p>

  <!-- 15. Disponibilidad -->
  <label>15. Disponibilidad horaria para trabajar en grupo</label>
  <?php
  $horas = ['mañana', 'tarde', 'noche'];
  foreach ($horas as $hora) {
    $checked = in_array($hora, $old_field['disponibilidad'] ?? []) ? 'checked' : '';
    echo "<input type='checkbox' name='disponibilidad[]' value='$hora' $checked> " . ucfirst($hora);
  }
  ?>
  <?= field_error('disponibilidad', $errors) ?>
  <p></p>

  <!-- 16. Observaciones -->
  <label>16. Observaciones adicionales:</label>
  <p></p>
  <textarea name="observaciones" rows="4" required
    placeholder="Observaciones..."
    ></textarea>
  <?= field_error('observaciones', $errors) ?>
  <p></p>

  <!-- 17. Nivel -->
  <label>17. Nivel de experiencia en programación:</label>
  <select name="nivel" required>
    <option value="">Selecciona nivel</option>
    <?php
    $niveles = ['principiante', 'intermedio', 'avanzado', 'experto'];
    foreach ($niveles as $nivel) {
      $selected = old_field('nivel', $old_field) === $nivel ? 'selected' : '';
      echo "<option value='$nivel' $selected>" . ucfirst($nivel) . "</option>";
    }
    ?>
  </select>
  <?= field_error('nivel', $errors) ?>
  <p></p>

  <!-- 18. IDE -->
  <label>18. Editor / IDE que usas habitualmente:</label>
  <select name="ide" required>
    <option value="">Selecciona editor/IDE</option>
    <?php
    $ides = ['vscode', 'phpstorm', 'sublime', 'vim', 'otro'];
    foreach ($ides as $ide) {
      $selected = old_field('ide', $old_field) === $ide ? 'selected' : '';
      echo "<option value='$ide' $selected>" . ucfirst($ide) . "</option>";
    }
    ?>
  </select>
  <?= field_error('ide', $errors) ?>
  <p></p>

  <!-- 19. Git -->
  <label>19. ¿Usas control de versiones (Git)?</label>
  <input type="radio" name="git" value="si" required> Sí
  <input type="radio" name="git" value="no"> No
  <?= field_error('git', $errors) ?>
  <p></p>

  <!-- 20. Preferencias o restricciones de comunicación -->
  <label>20. Preferencias o restricciones de comunicación (mensajería, reuniones, etc.):</label>
  <p></p>
  <textarea name="comunicacion" rows="4"
    placeholder="Por ejemplo: prefiero mensajes, evitar llamadas por la mañana, etc."
    required></textarea>
  <?= field_error('comunicacion', $errors) ?>
  <p></p>
  <input type="submit" value="enviar" />
</form>
<?php
include 'includes/footer.php';
?>