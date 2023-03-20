<?php
$obj = $args['obj'];

require 'attributes.php';
require 'label.php';
?>
<textarea <?php echo $elementAttributes; ?>></textarea>
<?php if ($obj->validationErrorMessage): ?>
	<div class="invalid-feedback"><?php echo $obj->validationErrorMessage; ?></div>
<?php
endif;
