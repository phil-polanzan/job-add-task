<?php

use App\Forms\JobAddForm;

require ROOT_PATH . '/templates/inc/open.html';

$cssFiles ??= [];
$jsFiles ??= [];
$isAdminForm = true;

// todo fix apache in order to redirect ajax-post to /src/files/requests/ajax-post.php
$form = new JobAddForm('Add New Job', 'src/files/requests/ajax-post.php');

require ROOT_PATH . '/templates/inc/head.php';
?>
<div class="page">
	<?php require ROOT_PATH . '/templates/inc/page-header.html'; ?>
	<main>
		<div class="form-container">
			<?php require ROOT_PATH . '/templates/inc/form-header.php'; ?>
			<div class="form-body">
				<?php
				foreach ($form->getAlerts() as $alert) {
					require ROOT_PATH . "/$alert";
				}
				?>
				<div class="row form-wrapper">
					<?php
					$mapFn = function ($key, $value) {
						return "$key=\"$value\"";
					};
					$formAttributes = $form->getAttributes();
					$elementAttributes = implode(' ', array_map($mapFn, array_keys($formAttributes), array_values($formAttributes)));
					?>
					<form <?php echo $elementAttributes; ?> novalidate>
						<?php foreach ($form->elements as $element): ?>
							<div class="row">
								<?php $element->render(); ?>
							</div>
						<?php endforeach; ?>
					</form>
				</div>
			</div>
		</div>
	</main>
<?php
require ROOT_PATH . '/templates/inc/footer.html';
require ROOT_PATH . '/templates/inc/form-js-files.php';
require ROOT_PATH . '/templates/inc/close.html';
