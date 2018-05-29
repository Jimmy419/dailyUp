<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
    	$cols = M("columns"); // 实例化User对象
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->select(); 
		
		$utbs = M("utbs");
		$this->tables = $utbs->where('uid='.$_SESSION['uid'])->select();
		// echo $class->getLastSql();
		// echo "<pre>";
		// print_r($this->colums);
		// echo "</pre>";
		$data = M("maindata");
		$this->datas = $data->where('uid='.$_SESSION['uid'])->select();
		$this->display();
    }
}