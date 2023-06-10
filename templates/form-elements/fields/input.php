<?php
$obj = $args['obj'];

require __DIR__ . '/../inc/attributes.php';
require __DIR__ . '/../inc/label.php';
?>
<input <?php echo $elementAttributes; ?>/>
<?php
require __DIR__ . '/../inc/invalid_feedback.php';
