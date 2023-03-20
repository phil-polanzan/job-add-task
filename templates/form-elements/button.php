<?php
$obj = $args['obj'];

require 'attributes.php';
?>
<button <?php echo $elementAttributes; ?>><?php echo $obj->label; ?></button>