<?php
// This is global bootstrap for autoloading

global $greetingsTextString; $greetingsTextString = "Greetings Earthlings";


function WPbddAutoload($className){
	$front = substr($className, 0, 5);
	
	//Check namespace:
	if ($front != "WPbdd"){
		return;
	}
	
	$className = substr($className, 6);
	
	//Check for ".class.php":
	$fileName = '//var/www/html/wp-content/plugins/WPbdd/src/WPbdd/' . $className . '.class.php';
	if (file_exists($fileName)) {
		include_once($fileName);
	}else{
		//Check for ".trait.php":
		$fileName = '//var/www/html/wp-content/plugins/WPbdd/src/WPbdd/' . $className . '.trait.php';
		if (file_exists($fileName)) {
			include_once($fileName);
		}
	}
}
spl_autoload_register('WPbddAutoload');