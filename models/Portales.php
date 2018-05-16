<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portales".
 *
 * @property int $id
 * @property string $portal_nombre
 * @property int $ambientes_id
 *
 * @property Ambientes $ambientes
 */
class Portales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portal_nombre'], 'required'],
            [['ambientes_id'], 'integer'],
            [['portal_nombre'], 'string', 'max' => 50],
            [['ambientes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ambientes::className(), 'targetAttribute' => ['ambientes_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'portal_nombre' => 'Portal Nombre',
            'ambientes_id' => 'Ambientes ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmbientes()
    {
        return $this->hasOne(Ambientes::className(), ['id' => 'ambientes_id']);
    }
}
