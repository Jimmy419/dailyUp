<?php
class UserModel extends Model{
    // protected $_map=array(
    //     'username'=>'name',
    //     'word'=>'password'
    // );

    protected $_validate = array(
        array('name','require','Name cannot be empty!'), //默认情况下用正则进行验证
        array('name','','The name already exist!',0,'unique',1), // 
        array('password','require','Password cannnot be empty!'),
        array('password','checkPwd','Password must be: 1. Length between 6 and 16; 2.Have at least one upcase, one digital, one special character;',0, 'callback')
    );

    function checkPwd($password){
        $pattern1 = '/.*[0-9]+.*/';
        $pattern2 = '/.*[a-z]+.*/';
        $pattern3 = '/.*[A-Z]+.*/';
        $pattern4='/.*[\^\`\~\!\@\#\$\%\&\*\(\)\+\=\|\\\[\]\{\}\:\;\'\,\.\<\>\/\?].*/';
        $pattern5='/^.{8,16}$/';
        preg_match_all($pattern1,$password,$arr1);
        preg_match_all($pattern2,$password,$arr2);
        preg_match_all($pattern3,$password,$arr3);
        preg_match_all($pattern4,$password,$arr4);
        preg_match_all($pattern5,$password,$arr5);
        if($arr1[0][0] && $arr2[0][0] && $arr3[0][0] && $arr4[0][0] && $arr5[0][0]){
            return true;
        }else{
            return false;
        }
    }
    
    protected $patchValidate=true;
}
?>