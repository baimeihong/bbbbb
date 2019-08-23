<?php 
namespace app\controllers;
use yii\web\Controller;

class QqController extends Controller
{
     public function actionIndex()
     {
     	return $this->render('index');
     }
     public function actionQq()
     {
     	include "qq\API\qqConnectAPI.php";
     	$qq = new \QC();

     	return $qq->qq_login();
     }
     public function actionDemo()
     {
     	return $this->renderpartial('demo');
     }
     public function actionWear()
     {
     	 $name = "南京";
     	 $data = file_get_contents("http://api.k780.com/?app=weather.future&weaid=$name&&appkey=43786&sign=a77807b39be7d4c7fab27d8525fef706&format=json");
     	 // echo $data;
     	 $res = json_decode($data,true);
     	 $arr = $res['result'];
     	
     	 var_dump($arr);die;
           
           // foreach ($arr as $key => $value) {
                
           // }
           // $db->createCommand()->setSql("insert into city values ")->execute();
 
     	 return $this->render('wear',['arr'=>$arr]);
     }
     public function actionMap()
     {
          $name = "上海";
          $data = file_get_contents("http://api.map.baidu.com/geocoding/v3/?address=$name&output=json&ak=kqA4cmmdXTYrkOpKRCKE90OFfEfT18yG");
          $res = json_decode($data,true);
          // var_dump($res);die;
          $lng = $res['result']['location']['lng'];
          $lat = $res['result']['location']['lat'];
           return $this->render('map',['lng'=>$lng,'lat'=>$lat]);
     }
}

 ?>