<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property int $id_form_solicitud
 * @property string $Descripcion
 * @property string $Duracion
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_form_solicitud', 'Descripcion', 'Duracion'], 'required'],
            [['id', 'id_form_solicitud'], 'integer'],
            [['Descripcion', 'Duracion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_form_solicitud' => 'Id Form Solicitud',
            'Descripcion' => 'Descripcion',
            'Duracion' => 'Duracion',
        ];
    }
}
