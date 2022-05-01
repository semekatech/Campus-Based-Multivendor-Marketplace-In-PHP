<?php  if (count($errors) > 0) : ?>
  <div class="msg" style="text-align:center; color:red">
  	<?php foreach ($errors as $error) : ?>
  	  <span><?php echo $error ?></span>
  	<?php endforeach ?>
  </div>
<?php  endif ?>