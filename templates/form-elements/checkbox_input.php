<?php
$obj = $args['obj'];

require 'attributes.php';
require 'label.php';
?>
	<input <?php echo $elementAttributes; ?>/>
<?php if ($obj->validationErrorMessage): ?>
	<div class="invalid-feedback"><?php echo $obj->validationErrorMessage; ?></div>
<?php
endif;
