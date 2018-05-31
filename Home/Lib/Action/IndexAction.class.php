<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
    	$cols = M("columns"); // 实例化User对象
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->select(); 
		
		$utbs = M("utbs");
		$this->tables = $utbs->field('utbs.*,tconf.cid,columns.mclass,columns.name,maindata.value,maindata.notes,maindata.time,maindata.ctime')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id','LEFT JOIN maindata ON columns.id = maindata.cid'))->where('utbs.id='.$_SESSION['uid'])->select();
		// echo $utbs->getLastSql();
		// echo "<pre>";
		// print_r($this->tables);
		// echo "</pre>";
		$data = M("maindata");
		$this->datas = $data->where('uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function add(){
    	$cols = M("columns");
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function insert(){
        $datasend=M('maindata');
        $datasend->create();
        // $data->password=md5($_POST['password']);
        if($datasend->add()){
			$data['status']  = 1;
			$data['errMsg'] = "Data insert successfully!";
			$this->ajaxReturn($data);
        }else{
			$data['status']  = 0;
			$data['errMsg'] = "Data insert failed!";
			$this->ajaxReturn($data);        	
        }
    }
}