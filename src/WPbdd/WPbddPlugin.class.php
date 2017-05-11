<?php

namespace WPbdd;

class WPbddPlugin{
	
	public function __construct(){
		//die('WPbddPlugin line 8');
		$this->registerAutoloader();
	}
	
	public function doActivateShortCodeGreetings(){
		//die('WPbddPlugin line 13');
		$ShortCodeGreetingsActivator= new ShortCodeGreetingsActivator();
		$ShortCodeGreetingsActivator->doActivateShortCode();
	}
	
	public static function registerAutoloader(){
		$className = get_class();
		spl_autoload_register(
				array(
						$className,
						'loadClassOrTrait'
				)
		);
	}
	
	public static function loadClassOrTrait($className){
		$namespace = __NAMESPACE__;
		$stringLenght= strlen($namespace);
		$front = substr($className, 0, $stringLenght);
		if ($front != $namespace){
			return;
		}
		$className = substr($className, ($stringLenght+1));
		$classPath = plugin_dir_path(__FILE__) . $className . '.class.php';
		if(file_exists($classPath)){
			require_once($classPath);
			return;
		}else{
			$traitPath = plugin_dir_path(__FILE__) . $className . '.trait.php';
			if(file_exists($traitPath)){
				require_once($traitPath);
				return;
			}
		}
		throw new \Exception("ERROR: CAN'T FIND $className");
	}

}