<?php
$obj = $args['obj'];

require 'attributes.php';
require 'label.php';
?>
<textarea <?php echo $elementAttributes; ?>></textarea>
<?php if ($obj->notes): ?>
	<div class="invalid-feedback"><?php echo $obj->notes; ?></div>
<?php
endif;
