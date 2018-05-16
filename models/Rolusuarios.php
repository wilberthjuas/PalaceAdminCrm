<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rolusuarios".
 *
 * @property int $id
 * @property string $rol_solicitado
 * @property int $estatus_tiempo
 * @property string $fecha_vencimiento
 * @property int $solicitudAlta_id
 *
 * @property Formatosolicitudes $solicitudAlta
 */
class Rolusuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rolusuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_solicitado', 'estatus_tiempo'], 'required'],
            [['fecha_vencimiento'], 'safe'],
            [['solicitudAlta_id'], 'integer'],
            [['rol_solicitado'], 'string', 'max' => 45],
            [['estatus_tiempo'], 'string', 'max' => 1],
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
            'rol_solicitado' => 'Rol Solicitado',
            'estatus_tiempo' => 'Estatus Tiempo',
            'fecha_vencimiento' => 'Fecha Vencimiento',
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
