<?php
class ColumnsAction extends CommonAction {
    public function index(){
    	$cols = M("columns");
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->order('mclass, id')->select();
		$this->display();
    }

    public function add(){
		$this->display();
    }

    public function insert(){
        $cols=M('columns');
        $cols->create();
        $_POST[uid]=$_SESSION['uid'];
        $cols->uid=$_SESSION['uid'];
        if($rst = $cols->where($_POST)->find()){
            $data['status']  = 0;
            $data['errMsg'] = "不能重复插入！";
            $this->ajaxReturn($data); 
        }else{
            if($cols->add()){
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
        $cols=M('columns');
        $id=$_GET[id];
        $this->col=$cols->find($id);
        $this->display();
    }
    
    public function update(){
        $cols=M('columns');
        $testdata['mclass']=$_POST['mclass'];
        $testdata['name']=$_POST['name'];
        $testdata['uid']=$_SESSION['uid'];
        $_POST[uid]=$_SESSION['uid'];
        if($rst = $cols->where($testdata)->find()){
            $data['status']  = 0;
            $data['errMsg'] = "The item already exist!";
            $this->ajaxReturn($data); 
        }else{      
            $updateData['mclass']=$_POST['mclass'];
            $updateData['name']=$_POST['name'];
            if($cols->where('id='.$_POST[id])->save($updateData)){
                $data['sql']=$cols->getLastSql();
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
        $cols=M('columns');
        if($cols->delete($id)){
            $this->success('删除成功', U('index'));
        }else{
            $this->error('删除失败', U('index'));
        }
    }
}