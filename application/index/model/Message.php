<?php
namespace app\index\model;
use think\Model;
use think\Input;
class Message extends Model
{
	 public static function write($title, $content)
    {

        $where['title'] = $title;
        $where['content'] = $content;

        $message=Message::where($where)->find();
        if ($message) {
            //unset($user["password"]);
            
            return true;
        }else{
            return false;
        }
    }
}