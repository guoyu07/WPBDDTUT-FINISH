<?php

class ShortCodeGreetingsActivatorCest{
	/**
	 * @test
	 * it should render simple shortcode
	 */
	public function it_should_render_simple_shortcode(\FunctionalTester $I) {
		$content = 'This is some text. [my-useless-sc]';		
		$my_post = array(
				'post_title'    => 'Lorem Ipsum',
				'post_content'  => $content,
				'post_status'   => 'publish'
		);
		
		// Insert the post into the database
		$post_id= wp_insert_post( $my_post );
		$I->amOnPage("localhost/?p=$post_id");

		global $greetingsTextString;
		$I->see($greetingsTextString);
	}
}