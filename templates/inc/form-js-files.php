<?php foreach ($form->getJsFiles() as $js): ?>
	<script src="<?php echo ROOT_URL . "/$js"; ?>"></script>
<?php endforeach; ?>
<script type="module" src="<?php echo ROOT_URL; ?>/lib/js/app/form.js"></script>
