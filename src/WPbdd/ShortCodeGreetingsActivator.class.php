<?php 

namespace WPbdd;

class ShortCodeGreetingsActivator{
	
	public function doActivateShortCode(){
		add_shortcode( 'my-useless-sc', array($this,'returnShortCode'));
	}

	public function returnShortCode(){
		$string = "Greetings";
		$string2 = "Earthlings";
		$string3 = $string . " " .$string2;
		
		return "$string3";
	}
	
}