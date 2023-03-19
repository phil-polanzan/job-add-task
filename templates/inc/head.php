<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Job Add Task</title>
	<link rel="icon" type="image/x-icon" href="<?php echo ROOT_URL ?>/lib/images/logo.png" sizes="32x32" />
	<link rel="stylesheet" href="<?php echo ROOT_URL; ?>/lib/css/app/app.css" id="app-css" type="text/css" media="all">

	<?php
	if ($isAdminForm) {
		require ROOT_PATH . '/templates/inc/form-css-files.php';
	}
	?>

	<?php foreach ($cssFiles as $item): ?>
		<link rel="stylesheet" href="<?php echo ROOT_URL . "/lib/css/$item"; ?>" id="<?php echo strtolower(str_replace('.css', '', $item)); ?>-css" type="text/css" media="all">
	<?php endforeach; ?>

	<?php foreach ($jsFiles as $item): ?>
		<script src="<?php echo ROOT_URL . "/lib/js/$item"; ?>" id="<?php echo strtolower(str_replace('.js', '', $item)); ?>-css"></script>
	<?php endforeach; ?>
</head>
<body>
