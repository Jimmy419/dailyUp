<?php
/**
 * 
 */
class CommonAction extends Action
{
	
	public function _initialize(){
		if(!$_SESSION['login']){
			$this->error("You don't have the authority!", U('Login/index'));
			// exit;
		}
	}
}
?>