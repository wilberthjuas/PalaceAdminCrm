<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entornos".
 *
 * @property int $id
 * @property string $sistema_nombre
 *
 * @property Ambientes[] $ambientes
 * @property Solicitudentornos[] $solicitudentornos
 */
class Entornos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entornos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sistema_nombre'], 'required'],
            [['sistema_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sistema_nombre' => 'Sistema Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmbientes()
    {
        return $this->hasMany(Ambientes::className(), ['entornos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudentornos()
    {
        return $this->hasMany(Solicitudentornos::className(), ['entorno_id' => 'id']);
    }
}
