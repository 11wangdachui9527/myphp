<?php
/**
 * Created by PhpStorm.
 * User: 17845
 * Date: 2020/2/12
 * Time: 21:02
 */

class Loader {

    //自动加载类
    public static function autoload($class){
        //echo "加载类名：" . $class . "<br>";
        $file = self::findFile($class);
        $file ? self::includeFile($file) : '类文件不存在';
    }

    /**
     * 通过类名查找类文件，返回类文件绝对路径。
     * @param $class    类名
     * @return string
     */
    static function findFile($class){
        //限定命名空间中第一个`\`出现的位置
        $first_backslash_pos = strpos($class,'\\');
        //取出类的顶级命名空间
        $top_namespace = substr($class,0,$first_backslash_pos);

        //echo $top_namespace;
        //通过类的限定名称查找类文件地址
        $map = [
            //顶级命名空间对应的绝对路径
            'App'   =>  dirname(__DIR__) . '/app'
        ];

        //var_dump($map);

        //类文件的相对路径
        $relative_path = str_replace('\\','/',substr($class,$first_backslash_pos + 1));

        $class_file = $map[$top_namespace] . '/' . $relative_path . '.php';

        if (is_file($class_file)){
            return $class_file;
        }else{
            return false;
        }
    }

    /**
     * 引入类文件
     * @param $file
     */
    static function includeFile($file){
        include "$file";
    }
}