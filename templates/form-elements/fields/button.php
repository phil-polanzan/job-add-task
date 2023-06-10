<?php
$obj = $args['obj'];

require '../inc/attributes.php';
?>
<button <?php echo $elementAttributes; ?>><?php echo $obj->label; ?></button>