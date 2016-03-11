<?php
namespace frontend\controllers;

use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;
use backend\models\Divination;
use backend\models\User;
use yii\web\upload;
use yii\filters\VerbFilter;
use yii\web\Session;

class WeddingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    // public function actionDetail() {
    // 	$divination = Divination::find()->all();
    // 	return $this->render('detail', array('divination'=>$divination));
    // }
    public function actionDetail() {
    	$request = Yii::$app->request;
    	$year_male = $request->get('yearmale');
    	$year_female = $request->get('yearfemale');
    	$male = $request->get('male');
    	$female = $request->get('female');
    	// echo "<pre>";
    	// print_r($request->get());die;
    	$divination_male = array();
    	$divination_female = array();
    	$divination_male = Divination::find()->where("year_age ='" . $year_male . "'" )->all();

    	$divination_female = Divination::find()->where("year_age ='" . $year_female . "'" )->all();
        return $this->render('detail' , array('divination_male' => $divination_male , 'divination_female' => $divination_female));
    }

}
