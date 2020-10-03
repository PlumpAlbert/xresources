<?php
include_once '../src/list.php';

$schemas = getSchemas($_GET['count'], $_GET['offset']);

foreach ($schemas as $schema) {
?>
<div class="schema">
  <h3 class="schema-name">
    <?= $schema['name'] ?>
  </h3>
  <div
    class="schema__colors-wrapper"
    style="background: <?= $schema['background'] ?>"
  >
    <?php
    foreach($schema['colors'] as $color) {
      echo "<div class='schema__color' style='background: $color;'></div>";
    }
    ?>
  </div>
</div>
<?php
}
?>
