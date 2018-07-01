<?php
// 本类由系统自动生成，仅供测试用途
class SubcolumnsAction extends CommonAction {
    public function index(){
    	$utbs = M("utbs");
		$this->subcolumns = $utbs->field('stbcols.*')->join(array('INNER JOIN subtbs ON utbs.id = subtbs.tid','INNER JOIN stbcols ON subtbs.id = stbcols.stid'))->where('utbs.uid='.$_SESSION['uid'])->select();
		$this->display();
    }

    public function getColumn(){
        $subtbid = $_POST[id];
        $subtbs = M('subtbs');
        $parentTbCols = $subtbs->field('columns.*')->join(array('INNER JOIN utbs ON utbs.id = subtbs.tid','INNER JOIN tconf ON utbs.id = tconf.tid','INNER JOIN columns ON tconf.cid = columns.id'))->where('subtbs.id='.$subtbid)->select();
        $this->ajaxReturn($parentTbCols);
    }

    public function add(){
        $utbs = M("utbs");
        $this->stbs = $utbs->field('subtbs.*')->join(array('INNER JOIN subtbs ON utbs.id = subtbs.tid'))->where('utbs.uid='.$_SESSION['uid'])->select();
        $this->display();
    }

    public function insert(){
        $stbcols=M('stbcols');
        $stbcols->create();
        $testdata[stid]=$_POST[stid];
        $testdata[subtbcolname]=$_POST[subtbcolname];

        if($rst = $stbcols->where($testdata)->find()){
            $data['status']  = 0;
            $data['errMsg'] = "Duplicated item!";
            $this->ajaxReturn($data); 
        }else{
            if($stbcols->add()){
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
        $utbs = M("utbs");
        $this->stbs = $utbs->field('subtbs.*')->join(array('INNER JOIN subtbs ON utbs.id = subtbs.tid'))->where('utbs.uid='.$_SESSION['uid'])->select();
        $stbcols = M("stbcols");
        $this->currentsubcol = $stbcols->find($_GET[id]);
        $this->display();
    }
    
    public function update(){
        $stbcols=M('stbcols');
        if($stbcols->where('id='.$_POST[id])->save($_POST)){
            $data['status']  = 1;
            $data['errMsg'] = "Data update successfully!";
            $this->ajaxReturn($data);
        }else{
            $data['status']  = 0;
            $data['errMsg'] = "update failed!";
            $this->ajaxReturn($data);  
        }
    }

    public function delete(){
        $id=$_GET[id];
        $stbcols=M('stbcols');
        if($stbcols->delete($id)){
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