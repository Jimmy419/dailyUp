<?php
	/**
	 * 
	 */
	class LoginAction extends Action
	{
		
		public function index(){
			$this->display();
		}


		public function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify(4,2);
		}

		public function check(){
			echo md5(strtolower($_POST['fcode']));
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";
		}
	}


?>