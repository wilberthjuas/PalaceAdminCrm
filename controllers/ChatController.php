<?php 
namespace app\controllers;

use Yii;
use Yii\web\Controller;

class ChatController extends controller
{


    public function actionSendChat() {
        if (!empty($_POST)) {
            echo \sintret\chat\ChatRoom::sendChat($_POST);
        }
    }
}