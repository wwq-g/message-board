<?php
namespace app\index\model;
use think\Model;
use think\Input;
class User extends Model
{
	 public static function login($name, $password)
    {

        $where['username'] = $name;
        $where['password'] = $password;
		

        $user=User::where($where)->find();
        if ($user) {
            //unset($user["password"]);
            
            return true;
        }else{
            return false;
        }
    }
}