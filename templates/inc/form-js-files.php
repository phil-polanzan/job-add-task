<?php foreach ($form->getJsFiles() as $js): ?>
	<?php $module = $js['is_module'] ?? false; ?>
	<script <?php echo $module ? "type=\"module\"" : ''; ?> src="<?php echo ROOT_URL . "/{$js['name']}"; ?>"></script>
<?php endforeach; ?>
