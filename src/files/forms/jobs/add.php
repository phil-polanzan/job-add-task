<?php
$cssFiles ??= [];
$jsFiles ??= [];
$isAdminForm = true;

require ROOT_PATH . '/templates/inc/open.html';
require ROOT_PATH . '/templates/inc/head.php';
?>
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
					<h4>Job added</h4>
					<br/>
					<p>
						<a href="/">Add another job</a>
					</p>
				</div>
				<div id="post-failed" class="row alert alert-danger div-hidden" role="alert">
					<h4>Error</h4>
				</div>
				<div class="row form-wrapper">
					<?php
					// todo fix apache in order to redirect ajax-post to /src/files/requests/ajax-post.php
					?>
					<form id="job-add" class="app-form model-form" action="<?php echo ROOT_URL; ?>/src/files/requests/ajax-post.php" method="post" novalidate>
						<div class="row">
							<label for="" class="form-label required">Title</label>
							<input type="text" id="title" name="title" class="form-control" maxlength="50" required/>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<div class="row">
							<label for="description" class="form-label">Description</label><br/>
							<textarea id="description" name="description" class="form-control html-editor" maxlength="255"></textarea>
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
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
<?php
require ROOT_PATH . '/templates/inc/footer.html';
require ROOT_PATH . '/templates/inc/form-js-files.php';
require ROOT_PATH . '/templates/inc/close.html';
