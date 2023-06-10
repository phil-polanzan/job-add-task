<?php
$obj = $args['obj'];

require __DIR__ . '/../inc/attributes.php';
require __DIR__ . '/../inc/label.php';
?>
<textarea <?php echo $elementAttributes; ?>></textarea>
<?php
require __DIR__ . '/../inc/invalid_feedback.php';
