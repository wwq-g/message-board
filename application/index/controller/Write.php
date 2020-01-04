<?php
namespace app\index\controller;
use think\View;
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\Message;
use app\index\model\Review;
class Write extends Controller{

  public function index(){
  	$list = Message::all(function($query){
    	$query->order('id', 'desc');
		});
		$view = new View;

		//设置变量输出
		$view->assign('list',$list);
		//return $view->fetch('/write/index');
		
		$re_list = Review::all();

		//$view = new View;

		//设置变量输出
		$view->assign('re_list',$re_list);
		return $view->fetch('/write/index');
  	return $view->fetch('index');

  }
  
  //用户注册
  public function write(){
	 
			//实例化User
		      $Message = new Message;
		    //接收前端表单提交的数据
		    $Message->message_title = input('post.message_title');
		    $Message->message_content = input('post.message_content');
				
				
				$Message->lastdate = date('Y-m-d H:i:s',time());
				//进行规则验证
		    $result = $this->validate(
		      [
		        'title' => $Message->message_title,
		        'content' => $Message->message_content,
		      ],
		      [
		        'title' => 'require|min:2',
		        'content' => 'require',
		      ]);
			  
		    if (true !== $result) {
		      $this->error($result);
		    }
			
		
		    //写入数据库
		    if ($Message->save()) {
		      return $this->success("留言成功","Write/message");
			  exit();
		    } else {
		      return $this->error('留言失败',"Write/message");
		    }
   
    
  }
  
  
  
	public function Message(){
		//echo $id;
		$list = Message::all(function($query){
    	$query->order('id', 'desc');
		});

		$view = new View;

		//设置变量输出
		$view->assign('list',$list);
		
	
		return $view->fetch('/write/index');
	}
	
	
}