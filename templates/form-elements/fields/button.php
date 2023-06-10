<?php
$obj = $args['obj'];

require __DIR__ . '/../inc/attributes.php';
?>
<button <?php echo $elementAttributes; ?>><?php echo $obj->label; ?></button>