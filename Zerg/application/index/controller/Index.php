<?php
namespace app\index\controller;

use app\base\controller;

class Index extends controller\Base
{
    public function index()
    {
        echo 'index index';
        echo 'hello world';
        var_dump('I am comming');
        echo 'haha';
        return null;
        //return $this->display();
    }
}
