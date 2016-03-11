<?php
namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\User;
use backend\models\UserGroup;
use backend\models\Group;
use backend\utility\DataTable\UserTable;
use backend\utility\DataTable\DataTableFacade;
class UserController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLoadAjax(){
        if (Yii::$app->request->isAjax):
            $dataTableFacade = new DataTableFacade(new UserTable(Yii::$app->request->post()));
            $dataArray = $dataTableFacade->getData();
            $json = json_encode($dataArray);
            $data = '{"draw": ' . $dataTableFacade->getDraw() . ',"recordsTotal": ' . $dataTableFacade->getTotalRecord() . ',"recordsFiltered": ' . $dataTableFacade->getTotalFiltered() . ',"data": ' . $json . '}';
            return $data;
        endif;
    }
    public function actionSaveProfile()
    {
        if (Yii::$app->request->isAjax):
            $old_password = $_POST['old-password'];
            $new_password = $_POST['new-password'];
            $user = User::findOne(Yii::$app->user->getId());
            if($old_password != ""):
                if(Yii::$app->getSecurity()->validatePassword($old_password, $user->password_hash)):
                    $user->password_hash = Yii::$app->security->generatePasswordHash($new_password);
                    $user->auth_key = \Yii::$app->security->generateRandomString();
                    $user->update();
                else:
                    echo 1;
                    die;
                endif;
            endif;
        endif;
    }
    public function actionChangeProfile()
    {
        if (Yii::$app->request->isAjax):
            $model = User::findOne(Yii::$app->user->getId());
            return $this->renderPartial('_form_profile', array('model' => $model));
        endif;
    }
}