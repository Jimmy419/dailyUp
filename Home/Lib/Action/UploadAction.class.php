<?php
// 本类由系统自动生成，仅供测试用途
class UploadAction extends Action {
    public function index(){
    	$cols = M("columns"); // 实例化User对象
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->order('mclass, id')->select();
		$this->display();
    }

	public function upload(){
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Reader.Excel2007");
        import("Org.Util.PHPExcel.IOFactory");

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";	
		
		// readfile($_FILES[file][tmp_name]);	




		// $inputFileName = $_FILES[file][tmp_name];
		$inputFileName = './Home/Tpl/Public/Uploads/Datafile/5b1541aa828ab.xlsx';
		date_default_timezone_set('PRC');
		// 读取excel文件
		try {
			// PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e) {
			die('加载文件发生错误:'.pathinfo($inputFileName,PATHINFO_BASENAME).':'.$e->getMessage());
		}

		// 确定要读取的sheet，什么是sheet，看excel的右下角，真的不懂去百度吧
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		// 获取一行的数据
		for ($row = 1; $row <= $highestRow; $row++){
			// Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
			//这里得到的rowData都是一行的数据，得到数据后自行处理，我们这里只打出来看看效果
			var_dump($rowData);
			echo "<br>";
		}













		// import('ORG.Net.UploadFile');
		// $up=new UploadFile();
		// $up->savePath='./Home/Tpl/Public/Uploads/Datafile/';
		// // $up->thumb=true;
		// $up->allowExts=array('xlsx');
		// $up->maxSize=102400;
		// if($up->upload()){
		// 	echo "<pre>";
		// 	print_r($up->getUploadFileInfo());
		// 	echo "</pre>";
		// }else{
		// 	echo $up->getErrorMsg();
		// }
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