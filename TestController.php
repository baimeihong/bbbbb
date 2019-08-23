<?php 
namespace app\controllers;
use yii\web\Controller;

class TestController extends Controller
{
   
     public function actionQq_do()
     {
         if (isset($_GET['code'])) {
               include "qq\API\qqConnectAPI.php";
               $qq = new \QC();
               $calback = $qq->qq_callback();
               $oppenid = $qq->get_openid();
               $qq = new \QC($calback,$oppenid);
               $info = $qq->get_user_info();
               // var_dump($info);
               $name ="网名是：".$info['nickname'];
               echo "$name <br>";
               $gender="性别：".$info['gender'];
               echo "$gender <br>";
         }
     }
}

 ?>