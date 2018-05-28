<?php
namespace app\index\controller;

use app\base\controller;

class Index extends controller\Base
{
    public function index()
    {
        echo 'hello world';
        //return $this->display();
    }
}
