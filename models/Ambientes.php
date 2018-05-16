<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ambientes".
 *
 * @property int $id
 * @property string $ambiente
 * @property int $entornos_id
 *
 * @property Entornos $entornos
 * @property Portales[] $portales
 */
class Ambientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ambientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ambiente'], 'required'],
            [['entornos_id'], 'integer'],
            [['ambiente'], 'string', 'max' => 50],
            [['entornos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entornos::className(), 'targetAttribute' => ['entornos_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ambiente' => 'Ambiente',
            'entornos_id' => 'Entornos ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntornos()
    {
        return $this->hasOne(Entornos::className(), ['id' => 'entornos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortales()
    {
        return $this->hasMany(Portales::className(), ['ambientes_id' => 'id']);
    }
}
