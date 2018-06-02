<?php
// 本类由系统自动生成，仅供测试用途
class MapAction extends CommonAction {
    public function index(){
    	$cols = M("utbs"); // 实例化User对象
		$this->tbs = $utbs->field('utbs.*,tconf.cid,columns.mclass,columns.name')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id'))->where('utbs.id='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function add(){
		$this->display();
    }

    public function insert(){
        $cols=M('utbs');
        $cols->create();
        $_POST[uid]=$_SESSION['uid'];
        $cols->uid=$_SESSION['uid'];
        if($rst = $cols->where($_POST)->find()){
            // echo $cols->getLastSql();
            $this->error('不能重复插入！', U('index'));
        }else{
            if($cols->add()){
                $this->success('添加成功', U('index'));
            }else{
                $this->error('插入失败', U('index'));
            }
        }
    }     

    public function edit(){
        $cols=M('utbs');
        $id=$_GET[id];
        $this->col=$cols->find($id);
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