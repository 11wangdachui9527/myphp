<?php
/**
 * Created by PhpStorm.
 * User: 17845
 * Date: 2020/2/12
 * Time: 20:38
 */

ini_set('display_errors',1);
error_reporting(E_ALL);

include '../core/Loader.php';
spl_autoload_register('Loader::autoload');

use App\Http\Controller\TestController;
$test = new TestController();

$test->run();