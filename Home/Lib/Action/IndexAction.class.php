<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
		$this->display();
    }

    public function getDate(){
        $utbs = M("utbs");
        $tconf = M("tconf");
        $subtbs = M("subtbs");
        $tables = $utbs->field('utbs.id as tid,utbs.uid,utbs.tablename,tconf.cid,columns.mclass,columns.name,maindata.value,maindata.id as dataId,maindata.notes,maindata.time,maindata.ctime')->join(array('LEFT JOIN tconf ON utbs.id = tconf.tid','LEFT JOIN columns ON tconf.cid = columns.id','LEFT JOIN maindata ON columns.id = maindata.cid'))->where('utbs.id='.$_SESSION['utb'][id])->order('columns.id,maindata.time')->select();
        $tableCols = $tconf->field('tconf.cid,columns.name')->join(array('LEFT JOIN columns ON tconf.cid = columns.id'))->where('tconf.tid='.$_SESSION['utb'][id])->select();
        $subtables = $subtbs->field('subtbs.id as stid,subtbs.name,stbcols.subtbcolname,stbcols.calculation,stbcols.unit')->join(array('INNER JOIN stbcols ON stbcols.stid = subtbs.id'))->where('subtbs.tid='.$_SESSION['utb'][id])->select();
        $data['table'] = $_SESSION['utb'];
        $data['tablecols'] = $tableCols;
        $data['data'] = $tables;
        $data['subcolumns'] = $subtables;
        $data['status']  = 1;
        $data['subtbs'] = $subtbs->where('tid='.$_SESSION['utb'][id])->select();
        $this->ajaxReturn($data);  
    }
}