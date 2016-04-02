<?php
  View::make('partials/header');
?>
<div class="container">
	<div class="inline-content">
      	<div class="left">Hello <?php echo Auth::getUser(); ?>!</div>
      	<div class="right"><a class="button small" href="index.php?page=logout">Logout</a></div>
    </div>
</div>
<?php
  View::make('partials/footer');
?>