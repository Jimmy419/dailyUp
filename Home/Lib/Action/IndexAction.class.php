<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
    	$cols = M("columns"); // 实例化User对象
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->select(); 
		
		$utbs = M("utbs");
		$this->tables = $utbs->field('utbs.*,tconf.cid,columns.mclass,columns.name,maindata.value,maindata.id as dataId,maindata.notes,maindata.time,maindata.ctime')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id','LEFT JOIN maindata ON columns.id = maindata.cid'))->where('utbs.uid='.$_SESSION['uid'])->select();
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
        $test[cid]=$_POST[cid];
        $test[time]=$_POST[time];
        $rst = $datasend->where($test)->find();
        // $data['mess'] = $datasend->getLastSql();
        if($rst){
			$data['status']  = 0;
			$data['errMsg'] = "不能重复插入！";
			$this->ajaxReturn($data);   
        }else{
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

    public function edit(){
    	$cid=$_GET[cid];
    	$cols = M("columns");
		$this->column = $cols->find($cid);
		$id=$_GET[id];
		$maindata = M("maindata");
		$this->currentData = $maindata->find($id);
		$this->time = date('Y-m-d', $this->currentData[time]);
		$this->display();
    }
    
    public function update(){
        $utbs=M('utbs');
        $data['tablename']=$_POST['tablename'];
        $data['uid']=$_SESSION['uid'];
        if($rst = $utbs->where($_POST)->find()){
            $this->error('字段已存在！', U('index'));
        }else{
            if($utbs->where('id='.$_POST[id])->save($data)){
                $this->success('更新成功', U('index'));
            }else{
                $this->error('更新失败', U('index'));
            }
        }
    }

    public function delete(){
        $id=$_GET[id];
        $cols=M('utbs');
        if($cols->delete($id)){
            $this->success('删除成功', U('index'));
        }else{
            $this->error('删除失败', U('index'));
        }
    }
}