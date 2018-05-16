<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sistemasap".
 *
 * @property int $id
 * @property string $sistemas
 * @property string $ambientes
 * @property string $portales
 * @property int $solicitudAlta_id
 *
 * @property Formatosolicitudes $solicitudAlta
 */
class Sistemasap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sistemasap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sistemas', 'ambientes'], 'required'],
            [['solicitudAlta_id'], 'integer'],
            [['sistemas', 'ambientes', 'portales'], 'string', 'max' => 500],
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
            'sistemas' => 'Sistemas',
            'ambientes' => 'Ambientes',
            'portales' => 'Portales',
            'solicitudAlta_id' => 'Solicitud Alta ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudAlta()
    {
        return $this->hasOne(Formatosolicitudes::className(), ['id' => 'solicitudAlta_id']);
    }
}
