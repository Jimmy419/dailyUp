<?php
// 本类由系统自动生成，仅供测试用途
class MapAction extends CommonAction {
    public function index(){
    	$cols = M("utbs");
		$this->tbs = $cols->field('utbs.*,tconf.id as tfid, tconf.cid,columns.mclass,columns.name')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id'))->where('utbs.uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function add(){
        $tbs = M("utbs");
        $this->tbs = $tbs->where('utbs.uid='.$_SESSION['uid'])->select();
        $cols = M("columns");
        $this->cols = $cols->where('columns.uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function insert(){
        $cols=M('tconf');
        $cols->create();
        if($rst = $cols->where($_POST)->find()){
            $data['status']  = 0;
            $data['errMsg'] = "Duplicated item!";
            $this->ajaxReturn($data);  
        }else{
            if($cols->add()){
                $data['status']  = 1;
                $data['errMsg'] = "Data insert successfully!";
                $this->ajaxReturn($data);
            }else{
                $data['status']  = 0;
                $data['errMsg'] = "Insert failed!";
                $this->ajaxReturn($data);
            }
        }
    }     

    public function edit(){
        $tbs = M("utbs");
        $this->tbs = $tbs->where('utbs.uid='.$_SESSION['uid'])->select();
        $cols = M("columns");
        $this->cols = $cols->where('columns.uid='.$_SESSION['uid'])->select();
        $cols=M('tconf');
        $id=$_GET[id];
        $this->map=$cols->find($id);
        $this->display();
    }
    
    public function update(){
        $utbs=M('tconf');
        $send['cid']=$_POST['cid'];
        $send['tid']=$_POST['tid'];
        if($rst = $utbs->where($send)->find()){
            $data['status']  = 0;
            $data['errMsg'] = "The item already exist!";
            $this->ajaxReturn($data); 
        }else{
            if($utbs->where('id='.$_POST[id])->save($send)){
                $data['status']  = 1;
                $data['errMsg'] = "Data update successfully!";
                $this->ajaxReturn($data);
            }else{
                $data['status']  = 0;
                $data['errMsg'] = "Data update failed!";
                $this->ajaxReturn($data);
            }
        }
    }

    public function delete(){
        $id=$_GET[id];
        $cols=M('tconf');
        if($cols->delete($id)){
            $this->success('删除成功', U('index'));
        }else{
            $this->error('删除失败', U('index'));
        }
    }
}