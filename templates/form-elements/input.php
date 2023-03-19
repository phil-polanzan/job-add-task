<?php
$obj = $args['obj'];

require 'attributes.php';
require 'label.php';
?>
<input <?php echo $elementAttributes; ?>/>
<?php if ($obj->notes): ?>
	<div class="invalid-feedback"><?php echo $obj->notes; ?></div>
<?php
endif;


