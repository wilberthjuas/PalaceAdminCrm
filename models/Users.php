<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property int $activate
 * @property int $rol_id
 *
 * @property Comentarios[] $comentarios
 * @property Rol $rol
 */
class Users extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    public static  $salt = "stev37f"; //Enter your salt here

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'rol_id'], 'required'],
            [['rol_id'], 'integer'],
            [['username', 'authKey'], 'string', 'max' => 45],
            [['email', 'password', 'accessToken'], 'string', 'max' => 255],
            [['activate'], 'string', 'max' => 1],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['accessToken'], 'unique'],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol_id' => 'id']],
            
        ];
    }
    public static function findIdentity($id)
    {
        
        $user = Users::find()
                ->where("activate=:activate", [":activate" => 1])
                ->andWhere("id=:id", ["id" => $id])
                ->one();
        
        return isset($user) ? new static($user) : null;
    }
     /* Busca la identidad del usuario a trav�s de su token de acceso */
     public static function findIdentityByAccessToken($token, $type = null)
     {
         
         $users = Users::find()
                 ->where("activate=:activate", [":activate" => 1])
                 ->andWhere("accessToken=:accessToken", [":accessToken" => $token])
                 ->all();
         
         foreach ($users as $user) {
             if ($user->accessToken === $token) {
                 return new static($user);
             }
         }
 
         return null;
     }

      /* Busca la identidad del usuario a trav�s del username */
    public static function findByUsername($username)
    {
        $users = Users::find()
                ->where("activate=:activate", ["activate" => 1])
                ->andWhere("username=:username", [":username" => $username])
                ->all();
        
        foreach ($users as $user) {
            if (strcasecmp($user->username, $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /* Regresa el id del usuario */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    
    /* Regresa la clave de autenticaci�n */
    public function getAuthKey()
    {
        return $this->authKey;
    }

     /* Regresa la clave de autenticaci�n */
     public function getPassword()
     {
         
         return $this->password;
     }
     public function setPassword($password)
{
    return $this->password = \Yii::$app->security->generatePasswordHash($password);
}
    /**
     * @inheritdoc
     */
    
    /* Valida la clave de autenticaci�n */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /* Valida la clave de autenticaci�n */
    
    public function validatePassword($password)
    {
        
        return \Yii::$app->security->validatePassword($password,$this->getPassword());//sha1($password);
    }
   
    public function generateAuthKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }

    public function generateAccessToken($str='', $long=0){
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
       
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = $this->generateAuthKey("abcdef0123456789",200);
                $this->accessToken= $this->generateAccessToken("abcdef0123456789",200);
                
            }
            return true;
        }
        return false;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'activate' => 'Activate',
            'rol_id' => 'Rol ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolUsuarios()
    {
        return $this->hasMany(Rolusuarios::className(), ['users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }
}
