<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends CommonAction {
    public function index(){
        import('ORG.Util.Page');
        $user = M('user');
        $count=$user->count();
        $page=new Page($count,2);
        $this->show=$page->show();
        $this->rows=$user->limit($page->firstRow,$page->listRows)->order('id')->select();
        // echo $user->getLastSql();
        $this->display();
        // $_POST['username']='user5';
        // $_POST['word']='455';
        // $user=D('user');
        // $user->create();
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
    }

    public function add(){
        $this->display();
    }  
    
    public function insert(){
        $user=M('user');
        $user->create();
        $user->password=md5($_POST['password']);
        if($user->add()){
            $this->success('添加成功', U('index'));
        }
    }     

    public function edit(){
        $user=M('User');
        $id=$_GET[id];
        $this->row=$user->find($id);
        $this->display();
    }
    
    public function update(){
        $user=D('user');
        if($user->create()){
            $user->password=md5($_POST['password']);
            echo $user->password;
            if($user->save()){
                // echo $user->getLastSql();
                // $this->success('修改成功', U('index'));
                $rst=array('code' => 0, 'errMsg' => 'Update successfully!');
                echo json_encode($rst);                
            }else{
                $err=array('code' => 1, 'errMsg' => "Update failed!");
                echo json_encode($err);
            }
        }else{
            // echo "<pre>";
            // print_r($user->getError());
            // echo "</pre>";
            // echo $user->getLastSql();
            $err=array('code' => 1, 'errMsg' => current($user->getError()));
            echo json_encode($err);
        }
    }

    public function delete(){
        $id=$_GET[id];
        $user=M('user');
        if($user->delete($id)){
            $this->success('删除成功', U('index'));
        }
    }
}

