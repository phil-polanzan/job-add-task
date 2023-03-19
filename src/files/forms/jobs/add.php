<?php
$cssFile ??= [];
$jsFile ??= [];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Job Add Task</title>
		<link rel="icon" type="image/x-icon" href="<?php echo ROOT_URL ?>/lib/images/logo.png" sizes="32x32" />
		<link rel="stylesheet" href="<?php echo ROOT_URL . "/lib/css/app/app.css"; ?>" id="app-css" type="text/css" media="all">

		<?php foreach ($cssFile as $item): ?>
			<link rel="stylesheet" href="<?php echo ROOT_URL . "/lib/css/$item"; ?>" id="<?php echo strtolower(str_replace('.css', '', $item)); ?>" type="text/css" media="all">
		<?php endforeach; ?>

		<?php foreach ($jsFile as $item): ?>
			<script src="<?php echo ROOT_URL . "/lib/js/$item"; ?>" id="<?php echo strtolower(str_replace('.js', '', $item)); ?>"></script>
		<?php endforeach; ?>
	</head>
	<body>
		<div class="page">
			<header class="title">
				<div class="header-content">
					<h2>Job Add Task</h2>
				</div>
			</header>
			<main>
				<div class="form-container">
					<div class="form-header">
						<div class="header-wrapper row">
							<div class="row">
								<h3>Add New Job</h3>
							</div>
						</div>
					</div>
					<div class="form-body">
						<div id="post-success" class="row alert alert-success div-hidden" role="alert">
							Job added
						</div>
						<div id="post-failed" class="row alert alert-danger div-hidden" role="alert">
							Error
						</div>
						<div class="row form-wrapper">
							<form class="app-form model-form" action="<?php echo ROOT_URL; ?>/ajax_save" method="post" novalidate>
								<div class="row">
									<label for="" class="form-label required">Title</label>
									<input type="text" id="title" name="title" class="form-control" maxlength="50" required/>
									<div class="invalid-feedback">Please fill out this field.</div>
								</div>
								<div class="row">
									<label for="description" class="form-label">Description</label>
									<textarea id="description" name="description" class="form-control" maxlength="255"></textarea>
								</div>
								<div class="row">
									<label for="estimated_hours" class="form-label">Estimated Hours</label>
									<input type="number" id="estimated_hours" name="estimated_hours" class="form-control" min="0" step="0.5"/>
									<div class="invalid-feedback">Please set with valid value.</div>
								</div>
								<div class="row">
									<label for="entry_date" class="form-label required">Entry Date</label>
									<input type="text" id="entry_date" name="entry_date" class="form-control datepicker" data-date-format="dd.mm.yyyy" required/>
									<div class="invalid-feedback">Please fill out this field.</div>
								</div>
								<div class="row">
									<label for="schedule_start_date" class="form-label">Schedule Start Date</label>
									<input type="text" id="schedule_start_date" name="schedule_start_date" class="form-control datepicker" data-date-format="dd.mm.yyyy"/>
									<div class="invalid-feedback">Start Date cannot be greater than End Date.</div>
								</div>
								<div class="row">
									<label for="schedule_end_date" class="form-label">Schedule End Date</label>
									<input type="text" id="schedule_end_date" name="schedule_end_date" class="form-control datepicker" data-date-format="dd.mm.yyyy"/>
									<div class="invalid-feedback">End Date cannot be smaller than Start Date.</div>
								</div>
								<div class="row">
									<button class="btn btn-primary" type="submit">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</main>
		</div>
		<footer>
			<div class="footer-content">
				<div class="wrap">
					<p>Job Add Task Footer</p>
				</div>
			</div>
		</footer>
		<script src="<?php echo ROOT_URL; ?>/lib/js/vendor/jquery/jquery-3.6.4.min.js"></script>
		<script src="<?php echo ROOT_URL; ?>/lib/js/vendor/popper/popper.min.js"></script>
		<script src="<?php echo ROOT_URL; ?>/lib/js/vendor/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo ROOT_URL; ?>/lib/js/vendor/bootstrap/bootstrap-datepicker.min.js"></script>
	</body>
</html>
