<?php

namespace app\models;

use Yii;
use app\models\Users;
use app\models\RolOperacion;
use app\models\Operacion;

/**
 * This is the model class for table "rol".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property RolOperacion[] $rolOperacions
 * @property Users $users
 */
class Rol extends \yii\db\ActiveRecord
{
    public $operaciones;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 32],
            [['nombre'], 'unique'],
            ['operaciones', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }


    public function afterSave($insert, $changedAttributes){
        \Yii::$app->db->createCommand()->delete('rol_operacion', 'rol_id = '.(int) $this->id)->execute();
     
        foreach ($this->operaciones as $id) {
            $ro = new RolOperacion();
            $ro->rol_id = $this->id;
            $ro->operacion_id = $id;
            $ro->save();
        }
    }

    public function getRolOperaciones()
    {
    return $this->hasMany(RolOperacion::className(), ['rol_id' => 'id']);
    }
 
    public function getOperacionesPermitidas()
    {
    return $this->hasMany(Operacion::className(), ['id' => 'operacion_id'])
        ->viaTable('rol_operacion', ['rol_id' => 'id']);
    }
 
    public function getOperacionesPermitidasList()
    {
    return $this->getOperacionesPermitidas()->asArray();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolOperacions()
    {
        return $this->hasMany(RolOperacion::className(), ['rol_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['rol_id' => 'id']);
    }
}
