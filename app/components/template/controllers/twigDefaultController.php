<?php
/**
 * This class is call by /src/config/routing.yml
 * when no parameters are passed.
 * You can change is behavior, do what you want.
 */
class defaultController extends tzController {

	// first method call when the website is launched
	public function showAction () {
		$this->tzRender->run('/templates/default', array("web_path" => WEB_PATH));                                                        
	}
}