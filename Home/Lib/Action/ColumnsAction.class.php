<?php
// 本类由系统自动生成，仅供测试用途
class ColumnsAction extends CommonAction {
    public function index(){
    	$cols = M("columns"); // 实例化User对象
		$this->colums = $cols->where('uid='.$_SESSION['uid'])->select();
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
        $cols=M('columns');
        $id=$_GET[id];
        $this->col=$cols->find($id);
        // echo $cols->getLastSql();
        // echo "<pre>";
        // print_r($this->col);
        // echo "</pre>";
        $this->display();
    }
    
    public function update(){
        $cols=M('columns');
        $data['mclass']=$_POST['mclass'];
        $data['name']=$_POST['name'];
        if($rst = $cols->where($_POST)->find()){
            $this->error('字段已存在！', U('index'));
        }else{
            if($cols->where('id='.$_POST[id])->save($data)){
                $this->success('更新成功', U('index'));
            }else{
                $this->error('更新失败', U('index'));
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