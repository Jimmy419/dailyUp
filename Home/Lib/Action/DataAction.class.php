<?php

class DataAction extends CommonAction {

    public function index(){
        $utbs = M("utbs");
        $_SESSION['tabidx'] = 2;
        $tables = $utbs->field('utbs.*,tconf.cid,columns.mclass,columns.name,maindata.value,maindata.id as dataId,maindata.notes,maindata.time,maindata.ctime')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id','LEFT JOIN maindata ON columns.id = maindata.cid'))->where('utbs.id='.$_SESSION['utb'][id])->order('columns.id,maindata.time')->select();
        foreach ($tables as $k => $v) {
            $v[time] = date('Y-m-d', $v[time]);
            $tables[$k][time] =$v[time];
        }
        $this->tables = $tables;
        $this->tblist = $utbs->where('uid='.$_SESSION['uid'])->select();

        $this->display();
    }

    public function add(){
        $utbs = M("utbs");
        $this->columns = $utbs->field('columns.*')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id'))->where('utbs.id='.$_SESSION['utb'][id])->select();
        $this->display();
    }

    public function insert(){
        $datasend=M('maindata');
        $datasend->create();
        $test[uid]=$_SESSION[uid];
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
        $maindata=M('maindata');
        $datas['notes']=$_POST['notes'];
        $datas['value']=$_POST['value'];
        $datas['ctime']=$_POST['ctime'];
        if($maindata->where('id='.$_POST[id])->save($datas)){
            // $this->success('更新成功', U('index'));
            $data['mess'] = $maindata->getLastSql();
            $data['status']  = 1;
            $data['errMsg'] = "Data insert successfully!";
            $this->ajaxReturn($data);
        }else{
            $data['mess'] = $maindata->getLastSql();
            $data['status']  = 0;
            $data['errMsg'] = "Data insert failed!";
            $this->ajaxReturn($data);
        }
    }

    public function delete(){
        $id=$_GET[id];
        $cols=M('maindata');
        if($cols->delete($id)){
            $this->success('删除成功', U('index'));
        }else{
            $this->error('删除失败', U('index'));
        }
    }
}


?>