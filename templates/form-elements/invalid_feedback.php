<?php
if ($obj->validationErrorMessage): ?>
	<div class="invalid-feedback"><?php echo $obj->validationErrorMessage; ?></div>
<?php
endif;