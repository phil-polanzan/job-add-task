<?php
$obj = $args['obj'];

require '../inc/attributes.php';
require '../inc/label.php';
?>
<input <?php echo $elementAttributes; ?>/>
<?php
require '../inc/invalid_feedback.php';
