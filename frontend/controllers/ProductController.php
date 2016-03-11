<?php

namespace frontend\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\helpers\Url;
use backend\models\Product;
use backend\models\ProductType;
use backend\models\User;
use yii\web\upload;


class ProductController extends \yii\web\Controller
{
    public function actionIndex() {
    	$request = Yii::$app->request;
    	if($request->get('str')){
    		$product_type_name = $request->get('str');
    		$query = new Query;
			$query ->select([
								'*'  
							 ])->from('product')->join('inner join', 'product_type', 'product_type.id = product.product_type_id')
			->where("product_type.id = " . $product_type_name . " and product.is_active = 1");
			$command = $query->createCommand();
			$data = $command->queryAll();
			$product_type = ProductType::find()->where('id = ' .$product_type_name)->one();
			return $this->render('product_type', array('data'=> $data , 'product_type' => $product_type));
    	}else{
    		$product_type = ProductType::find()->where('is_active = 1')->all();
    		return $this->render('index', array('product_type'=> $product_type));
    	}
    }
    
}