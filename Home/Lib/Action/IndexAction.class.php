<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
    	$class = M("class"); // 实例化User对象
		$this->rows = $class->where('uid='.$_SESSION['uid'])->select(); 
		// echo $class->getLastSql();
		// echo "<pre>";
		// print_r($this->rows);
		// echo "</pre>";
		$this->display();
    }
}