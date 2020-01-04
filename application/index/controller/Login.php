<?php
namespace app\index\controller;
use think\View;
use think\Input;
use think\Controller;
use app\index\model\User;
use Captcha;
use think\Session;

/**
 *
 */
class login extends Controller{
  public function index(){
    $view = new View();
    return $view->fetch('index');
  }
  public function login(){
      $view = new View();
      $name = input('request.name');
      $password  = input('request.password');
      


       $check=\app\index\model\User::login($name, $password);
       if ($check) {
       		// header(strtolower("location:"));
       		Session::set('username',$name);
			$user = User::get(['username' => $name]);
			
       		return $this->success("登录成功","Write/message");
       		exit();
       }else{
       		return $this->error("用户名或密码错误");
       }
       
       
  }
}