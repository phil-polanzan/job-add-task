<?php

use App\Forms\JobAddForm;

require ROOT_PATH . '/templates/inc/open.html';

$cssFiles ??= [];
$jsFiles ??= [];
$isAdminForm = true;

$form = new JobAddForm('Add New Job');

require ROOT_PATH . '/templates/inc/head.php';
?>
<div class="page">
<?php require ROOT_PATH . '/templates/inc/page-header.html'; ?>
	<main>
		<div class="form-container">
			<?php require ROOT_PATH . '/templates/inc/form-header.php'; ?>
			<div class="form-body">
				<?php $form->render(); ?>
			</div>
		</div>
	</main>
	<?php require ROOT_PATH . '/templates/inc/footer.html'; ?>
</div>
<?php
require ROOT_PATH . '/templates/inc/form-js-files.php';
require ROOT_PATH . '/templates/inc/close.html';
