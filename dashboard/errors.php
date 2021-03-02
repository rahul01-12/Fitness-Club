<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php if(!empty($error )){
					echo $error;
			} else{
				echo "string";
			}?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
