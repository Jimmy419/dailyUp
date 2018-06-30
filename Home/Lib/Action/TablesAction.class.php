<?php
// 本类由系统自动生成，仅供测试用途
class TablesAction extends CommonAction {
    public function index(){
    	$cols = M("utbs");
		$this->tbs = $cols->where('uid='.$_SESSION['uid'])->select();
        $_SESSION['utbs'] = $this->tbs;
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
        if($rst = $utbs->where('tablename="'.$_POST['tablename'].'" AND uid='.$_SESSION['uid'])->find()){
            $data['status']  = 0;
            $data['errMsg'] = "字段已存在！";
            $this->ajaxReturn($data);  
        }else{
            if($utbs->where('id='.$_POST[id])->save($data)){
                $data['status']  = 1;
                $data['errMsg'] = "Data update successfully!";
                $this->ajaxReturn($data);
            }else{
                $data['status']  = 0;
                $data['errMsg'] = "update failed!";
                $this->ajaxReturn($data);  
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