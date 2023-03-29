<?php
$obj = $args['obj'];

require 'attributes.php';
require 'label.php';
?>
<textarea <?php echo $elementAttributes; ?>></textarea>
<?php
require 'invalid_feedback.php';
