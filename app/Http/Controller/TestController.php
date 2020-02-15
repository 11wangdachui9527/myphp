<?php
/**
 * Created by PhpStorm.
 * User: 17845
 * Date: 2020/2/12
 * Time: 21:37
 */

namespace App\Http\Controller;
use App\Model\User;
class TestController {
    function __construct()
    {
    }

    function test(){
        echo 'test';
    }

    function users(){
        $user = new User();
        print_r($user->getUsers());
    }
}