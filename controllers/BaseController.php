<?php

namespace app\controllers;

use Yii;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\AccessHelpers;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\helpers\Url;
use app\models\FormRegister;
use app\models\Users;
use \SoapClient;

class BaseController extends Controller { 
 
    public function beforeAction($action) { 
        if (!parent::beforeAction($action)) { 
             return false; 
        } 
        $operacion = str_replace("/", "-", Yii::$app->controller->route);
 
        $permitirSiempre = ['site-captcha', 'site-signup', 'site-index', 'site-error', 'site-about', 'site-contact', 'site-login', 'site-logout'];
 
        if (in_array($operacion, $permitirSiempre)) {
            return true;
        }
 
        if (!AccessHelpers::getAcceso($operacion)) {
            echo $this->render('/site/nopermitido');
            return false;
        }
 
        return true;
    }
}
