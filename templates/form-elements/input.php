<?php
$obj = $args['obj'];

require 'attributes.php';
require 'label.php';
?>
<input <?php echo $elementAttributes; ?>/>
<?php
require 'invalid_feedback.php';
