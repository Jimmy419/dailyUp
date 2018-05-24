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
			// echo md5(strtolower($_POST['fcode']));
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			// echo md5($_POST[password]);
			$user=M('User');
			if(md5($_POST[fcode])==$_SESSION['verify']){
				$_POST['password']=md5($_POST[password]);
				// $rst=$user->where($_POST)->count()
				if($rst=$user->where($_POST)->find()){
					// echo $user->getLastSql();
					// echo "<pre>";
					// print_r($rst);
					// echo "</pre>";
					if($rst['isadmin']){
						$_SESSION['login']=1;
						$_SESSION['username']=$_POST['name'];
						$_SESSION['admin']=$rst['isadmin'];
						echo $_SESSION['admin'];
						$this->success('登录成功',U('Index/index'));						
					}else{
						$this->error('You are not admin!',U('index'));
					}
				}else{
					$this->error('用户名或密码错误',U('index'));
				}
			}else{
				$this->error('验证码有误！');
			}
		}

		public function logout(){
			setcookie(session_name(),'',time()-3600,'/');
			session_unset();
			session_destroy();
			// echo "<pre>";
			// print_r($_SESSION);
			// echo "</pre>";
			$this->success('Logout success!','index');
		}
	}


?>