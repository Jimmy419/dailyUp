<?php
/**
 * 
 */
class CommonAction extends Action
{
	
	public function _initialize(){
		if(!$_SESSION['login']){
			$this->error("You don't have the authority!", U('Login/index'));
			// exit;
		}

		if(!$_SESSION['utbs']){
			$utbs = M("utbs");
			$tblist = $utbs->where('uid='.$_SESSION['uid'])->select();
			$_SESSION['utbs'] = $tblist;
		}

		if(!$_SESSION['utb']){
			$_SESSION['utb'] = $_SESSION['utbs'][0];
		}

		if(!$_SESSION['tabidx']){
			$_SESSION['tabidx'] = 1;
		}
	}

    public function setSesstionTb(){
        $utbs = M("utbs");
        $tblist = $utbs->where('uid='.$_SESSION['uid'])->select();
        $_SESSION['utbs'] = $tblist;
		foreach ($tblist as $utb) {
			if($utb[id] == $_GET[tid]){
				$_SESSION['utb'] = $utb;
			}
		}
		$data[status] = 1;
        $this->ajaxReturn($data);  
    }
}
?>