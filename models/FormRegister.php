<?php

namespace app\models;
use Yii;
use yii\base\model;
use app\models\Users;

class FormRegister extends model{
 
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $rol_id;
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat','rol_id'], 'required', 'message' => 'Campo requerido'],
            ['username', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'M�nimo 3 y m�ximo 50 caracteres'],
            ['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'S�lo se aceptan letras y n�meros'],
            ['username', 'username_existe'],
            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'M�nimo 5 y m�ximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no v�lido'],
            ['email', 'email_existe'],
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'M�nimo 6 y m�ximo 16 caracteres'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],
        
        ];
    }
    
    public function email_existe($attribute, $params)
    {
  
  //Buscar el email en la tabla
  $table = Users::find()->where("email=:email", [":email" => $this->email]);
  
  //Si el email existe mostrar el error
  if ($table->count() == 1)
  {
                $this->addError($attribute, "El email seleccionado existe");
  }
    }
 
    public function username_existe($attribute, $params)
    {
  //Buscar el username en la tabla
  $table = Users::find()->where("username=:username", [":username" => $this->username]);
  
  //Si el username existe mostrar el error
  if ($table->count() == 1)
  {
                $this->addError($attribute, "El usuario seleccionado existe");
  }
    }
 
}
