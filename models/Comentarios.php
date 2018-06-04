<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property int $id_solicitud
 * @property string $coment
 * @property string $fecha
 * @property string $hora
 * @property string $usuario
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
            [['id', 'id_solicitud', 'coment', 'fecha', 'hora', 'usuario'], 'required'],
            [['id', 'id_solicitud'], 'integer'],
            [['coment', 'fecha', 'hora', 'usuario'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_solicitud' => 'Id Solicitud',
            'coment' => 'Coment',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'usuario' => 'Usuario',
        ];
    }
}
