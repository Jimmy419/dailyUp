<?php
// 本类由系统自动生成，仅供测试用途
class MapAction extends CommonAction {
    public function index(){
    	$cols = M("utbs"); // 实例化User对象
		$this->tbs = $cols->field('utbs.*,tconf.cid,columns.mclass,columns.name')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id'))->where('utbs.uid='.$_SESSION['uid'])->select();
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
        // $_POST[uid]=$_SESSION['uid'];
        // $cols->uid=$_SESSION['uid'];
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