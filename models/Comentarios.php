<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property string $comentario
 * @property int $usuarios_id
 * @property int $asignarRol_id
 *
 * @property Rolusuarios $asignarRol
 * @property Users $usuarios
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comentario'], 'required'],
            [['usuarios_id', 'asignarRol_id'], 'integer'],
            [['comentario'], 'string', 'max' => 50],
            [['asignarRol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rolusuarios::className(), 'targetAttribute' => ['asignarRol_id' => 'id']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comentario' => 'Comentario',
            'usuarios_id' => 'Usuarios ID',
            'asignarRol_id' => 'Asignar Rol ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignarRol()
    {
        return $this->hasOne(Rolusuarios::className(), ['id' => 'asignarRol_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Users::className(), ['id' => 'usuarios_id']);
    }
}
