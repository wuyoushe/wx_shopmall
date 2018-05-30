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
        //return $this->display();
    }
}
