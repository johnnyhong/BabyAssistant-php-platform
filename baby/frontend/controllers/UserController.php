<?php
namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use frontendBo\BabyBo;
use frontend\beans\BabyUserForm;
use frontend\lib\helper\SessionHelper;

class UserController extends Controller
{

    public function actionIndex()
    {
        $babyBo = new BabyBo();
        $babyFormToken = $babyBo->generateToken();
        $this->renderView('home', $babyFormToken);
    }

    public function actionInfo(){
        $ret = array('succ' => TRUE, 'message' => NULL, 'data' => array());
        $babyBo = new BabyBo();
        $babyUserForm = new BabyUserForm();
        $babyUserForm->load(['BabyUserForm' => Yii::$app->request->post()]);
        if (!$babyUserForm->validate()) {
            $babyFormToken = $babyBo->generateToken();
            $ret['data']['token'] = $babyFormToken;
            $ret['succ'] = false;
            $ret['message'] = $babyUserForm->errors();
            $this->renderView('home/reiver', $ret);
        }
        $ret = $babyBo->userInfo($babyUserForm);
        $this->renderView('home/reiver', $ret);
    }

    public function actionCreate(){
        $a = [1,2,3,4,5];
        echo json_encode($a);
    }

    public function actionUpdate(){
        $a = [1,2,3,4,5];
        echo json_encode($a);
    }

    public function actionDelete(){
        $a = [1,2,3,4,5];
        echo json_encode($a);
    }

    public function actionPush(){
        var_dump('push');
    }

}
