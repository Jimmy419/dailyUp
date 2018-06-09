<?php
// 本类由系统自动生成，仅供测试用途
class UploadAction extends Action {
    public function index(){
    	$cols = M("columns"); // 实例化User对象
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->order('mclass, id')->select();
		$this->display();
    }

	public function upload(){
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// $dataList[] = array('name'=>'php','email'=>'admin@gamil.com');
		// $dataList[] = array('name'=>'thinkphp','email'=>'admin@gamil.com');
		// echo "<pre>";
		// print_r($dataList);
		// echo "</pre>";
        $datasend=M('maindata');

		$this->deleted = $datasend->where('cid='.$_POST['cid'])->delete();
		// echo "<pre>";
		// print_r($this->deleted);
		// echo "</pre>";
		// echo "<hr>";
		// echo $this->deleted;
		if($this->deleted >= 0){
	        $datasend->create();
	        $dataAdded = $datasend->addAll($_POST[data]);
	        if($dataAdded){
	        	// echo $datasend->getLastSql();
				$data['status']  = 1;
				$data['errMsg'] = "Data insert successfully!";
				$this->ajaxReturn($data);
	        }else{
	        	// echo $datasend->getLastSql();
				$data['status']  = 0;
				$data['errMsg'] = "Data insert failed!";
				$this->ajaxReturn($data);        	
	        }			
		} else {
			$data['status']  = 0;
			$data['errMsg'] = "Old data removed failed!";
			$this->ajaxReturn($data); 			
		}
	}
}