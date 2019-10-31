<?php namespace Config;

class Autoload {

     public static function start() {

          spl_autoload_register(function($classNotFound)
          {
            
               $url = ROOT . str_replace("\\", "/", $classNotFound)  . ".php";
               $url = str_replace("\\","/",$url);

               //echo $url . " ". $classNotFound . '<br/> ';

               include_once($url);
          });
     }
}
