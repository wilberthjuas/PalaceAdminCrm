<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitudentornos".
 *
 * @property int $id
 * @property int $entorno_id
 * @property int $solicitudAlta_id
 *
 * @property Entornos $entorno
 * @property Formatosolicitudes $solicitudAlta
 */
class Solicitudentornos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitudentornos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entorno_id', 'solicitudAlta_id'], 'required'],
            [['entorno_id', 'solicitudAlta_id'], 'integer'],
            [['entorno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entornos::className(), 'targetAttribute' => ['entorno_id' => 'id']],
            [['solicitudAlta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Formatosolicitudes::className(), 'targetAttribute' => ['solicitudAlta_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entorno_id' => 'Entorno ID',
            'solicitudAlta_id' => 'Solicitud Alta ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntorno()
    {
        return $this->hasOne(Entornos::className(), ['id' => 'entorno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudAlta()
    {
        return $this->hasOne(Formatosolicitudes::className(), ['id' => 'solicitudAlta_id']);
    }
}
