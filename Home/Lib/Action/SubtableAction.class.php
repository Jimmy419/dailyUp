<?php
// 本类由系统自动生成，仅供测试用途
class SubtableAction extends CommonAction {
    public function index(){
    	$utbs = M("utbs");
		$this->tbs = $utbs->field('subtbs.*')->join(array('INNER JOIN subtbs ON utbs.id = subtbs.tid'))->where('utbs.uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function add(){
        $tbs = M("utbs");
        $this->tbs = $tbs->where('utbs.uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function insert(){
        $subtbs=M('subtbs');
        $subtbs->create();
        if($rst = $subtbs->where($_POST)->find()){
            $data['status']  = 0;
            $data['errMsg'] = "Duplicated item!";
            $this->ajaxReturn($data); 
        }else{
            if($subtbs->add()){
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
        $subtbs = M("subtbs");
        $this->currentsubtb = $subtbs->find($_GET[id]);
        $this->display();
    }
    
    public function update(){
        $subtbs=M('subtbs');
        if($rst = $subtbs->where('tid='.$_POST['tid'].' AND name="'.$_POST['name'].'"')->find()){
            $data['status']  = 0;
            $data['errMsg'] = "Duplicated items!";
            $this->ajaxReturn($data);  
        }else{
            if($subtbs->where('id='.$_POST[id])->save($_POST)){
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
        $subtbs=M('subtbs');
        if($subtbs->delete($id)){
            $data['status']  = 1;
            $data['errMsg'] = "Item deleted!";
            $this->ajaxReturn($data);
        }else{
            $data['status']  = 0;
            $data['errMsg'] = "Delete failed!";
            $this->ajaxReturn($data);
        }
    }
}