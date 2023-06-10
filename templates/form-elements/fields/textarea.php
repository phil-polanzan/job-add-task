<?php
$obj = $args['obj'];

require '../inc/attributes.php';
require '../inc/label.php';
?>
<textarea <?php echo $elementAttributes; ?>></textarea>
<?php
require '../inc/invalid_feedback.php';
