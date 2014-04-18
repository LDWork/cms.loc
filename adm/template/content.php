<div class="span8 well-g">
<?php 
	if (isset($_GET['view']))
	{
		$view = clearStr($_GET['view']); 
			if ($view == '') 
			{
				$view = "main";
			}
	} 
	else {
		$view = 'main';
	}

	
	include $view.'.php';
?>
</div>