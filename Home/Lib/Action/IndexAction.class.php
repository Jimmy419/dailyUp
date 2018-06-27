<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
		// $utbs = M("utbs");
  //       $_SESSION['tabidx'] = 1;
		// $tables = $utbs->field('utbs.*,tconf.cid,columns.mclass,columns.name,maindata.value,maindata.id as dataId,maindata.notes,maindata.time,maindata.ctime')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id','LEFT JOIN maindata ON columns.id = maindata.cid'))->where('utbs.id='.$_SESSION['utb'][id])->order('columns.id,maindata.time')->select();
  //       foreach ($tables as $k => $v) {
  //           $v[time] = date('Y-m-d', $v[time]);
  //           $tables[$k][time] =$v[time];
  //       }
  //       $this->tables = $tables;
  //       $this->tblist = $utbs->where('uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function getDate(){
        $utbs = M("utbs");
        $tconf = M("tconf");
        $subtbs = M("subtbs");
        $tables = $utbs->field('utbs.id as tid,utbs.uid,utbs.tablename,tconf.cid,columns.mclass,columns.name,maindata.value,maindata.id as dataId,maindata.notes,maindata.time,maindata.ctime')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id','LEFT JOIN maindata ON columns.id = maindata.cid'))->where('utbs.id='.$_SESSION['utb'][id])->order('columns.id,maindata.time')->select();
        $tableCols = $tconf->field('tconf.cid,columns.name')->join(array('LEFT JOIN columns ON tconf.cid = columns.id'))->where('tconf.tid='.$_SESSION['utb'][id])->select();
        $subtables = $subtbs->field('subtbs.id as stid,subtbs.name,stbcols.subtbcolname,stbcols.calculation,stbcols.unit')->join(array('LEFT JOIN stbcols ON stbcols.stid = subtbs.id'))->where('subtbs.tid='.$_SESSION['utb'][id])->select();
        $data['table'] = $_SESSION['utb'];
        $data['tablecols'] = $tableCols;
        $data['data'] = $tables;
        $data['subcolumns'] = $subtables;
        $data['status']  = 1;
        $data['subtbs'] = $subtbs->where('tid='.$_SESSION['utb'][id])->select();
        $this->ajaxReturn($data);  
    }

  //   public function add(){
  //   	$cols = M("columns");
		// $this->colums = $cols->where('uid='.$_SESSION['uid'])->select();
		// $this->display();
  //   }

  //   public function insert(){
  //       $datasend=M('maindata');
  //       $datasend->create();
  //       $test[cid]=$_POST[cid];
  //       $test[time]=$_POST[time];
  //       $rst = $datasend->where($test)->find();
  //       if($rst){
		// 	$data['status']  = 0;
		// 	$data['errMsg'] = "不能重复插入！";
		// 	$this->ajaxReturn($data);   
  //       }else{
	 //        if($datasend->add()){
		// 		$data['status']  = 1;
		// 		$data['errMsg'] = "Data insert successfully!";
		// 		$this->ajaxReturn($data);
	 //        }else{
		// 		$data['status']  = 0;
		// 		$data['errMsg'] = "Data insert failed!";
		// 		$this->ajaxReturn($data);        	
	 //        }
  //       }
  //   }

  //   public function edit(){
  //   	$cid=$_GET[cid];
  //   	$cols = M("columns");
		// $this->column = $cols->find($cid);
		// $id=$_GET[id];
		// $maindata = M("maindata");
		// $this->currentData = $maindata->find($id);
		// $this->time = date('Y-m-d', $this->currentData[time]);
		// $this->display();
  //   }
    
  //   public function update(){
  //       $maindata=M('maindata');
  //       $datas['notes']=$_POST['notes'];
  //       $datas['value']=$_POST['value'];
  //       $datas['ctime']=$_POST['ctime'];
  //       if($maindata->where('id='.$_POST[id])->save($datas)){
  //           $data['mess'] = $maindata->getLastSql();
		// 	$data['status']  = 1;
		// 	$data['errMsg'] = "Data insert successfully!";
		// 	$this->ajaxReturn($data);
  //       }else{
  //           $data['mess'] = $maindata->getLastSql();
		// 	$data['status']  = 0;
		// 	$data['errMsg'] = "Data insert failed!";
		// 	$this->ajaxReturn($data);
  //       }
  //   }


}