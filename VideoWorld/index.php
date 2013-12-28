<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html lang='en-US' xmlns='http://www.w3.org/1999/xhtml' dir='ltr'>
	<?php
		session_start();		
		require_once('web/html/templates/base/header.html');
	?><body>
	<div id='outer'>		
		<div id="shell" >
			<?php
				require_once('php/util/db_connector.php');
				require_once('php/util/util.php');				
				require_once('php/header.php');
			?>
			<div id='main'>
			<?php 
				$page = isset($_GET['page']) ? $_GET['page'] : 'show';
				$id = isset($_GET['id']) ? $_GET['id'] : null;
				$type = isset($_GET['type']) ? $_GET['type'] : null;
				if(!@include('php/pages/'.$page.'.php'))
				{
					showMessage('The requested page does not exist', 0);
				}
				else
				{
					require_once('php/pages/'.$page.'.php');
				}
			?>
			</div>
			<?php require_once('web/html/templates/base/footer.html');require_once('php/footer.php');?></div>	
	</div>
	</body>
</html>