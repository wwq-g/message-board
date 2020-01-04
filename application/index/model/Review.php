<?php
namespace app\index\model;
use think\Model;
use think\Input;
class Review extends Model
{
	 public static function review($content)
    {

        $where['re_content'] = $content;
		$review=Review::where($where)->find();
        if ($review) {
            //unset($user["password"]);
            
            return true;
        }else{
            return false;
        }
    }
}