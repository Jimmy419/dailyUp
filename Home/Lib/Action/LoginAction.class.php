<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function index(){
		$this->display();
    }

	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,2);
	}

	public function check(){
		$user=M('User');
		if(md5($_POST[fcode])==$_SESSION['verify']){
			$_POST['password']=md5($_POST[password]);
			if($rst=$user->where($_POST)->find()){
				$_SESSION['login']=1;
				$_SESSION['username']=$_POST['name'];
				$_SESSION['admin']=$rst['isadmin'];
				$_SESSION['uid']=$rst['id'];
				// if($rst['isadmin']){
				// 	echo $_SESSION['admin'];
				// 	$this->success('登录成功',U('Index/index'));						
				// }else{
				// 	$this->error('You are not admin!',U('index'));
				// }
				$data['status']  = 1;
				$this->ajaxReturn($data);				
			}else{
				$data['status']  = 0;
				$data['errMsg'] = "Name or password is not correct!";
				$this->ajaxReturn($data);	
				// $this->error('用户名或密码错误',U('index'));
			}
		}else{
			$data['status']  = 0;
			$data['errMsg'] = "Verifying code is not correct!";
			$this->ajaxReturn($data);	
		}
	}

	public function logout(){
		setcookie(session_name(),'',time()-3600,'/');
		session_unset();
		session_destroy();
		$data['status']  = 1;
		$this->ajaxReturn($data);	
	}
}