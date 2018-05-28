<?php

namespace app\models;

use Yii;
use \SoapClient;

/**
 * This is the model class for table "formatosolicitudes".
 *
 * @property int $id
 * @property string $autorizador_id
 * @property string $autorizador_nombre
 * @property string $autorizador_puesto
 * @property string $solicitante_id
 * @property string $solicitante_nombre
 * @property string $solicitante_puesto
 * @property string $usuario_id
 * @property string $nombre
 * @property string $puesto
 * @property string $departamento
 * @property string $correo
 * @property string $comentario
 * @property string $tipo
 * @property string $usuarioRef
 * @property Users $users
 * @property Rolusuarios[] $rolusuarios
 * @property Sistemasap[] $sistemasaps
 */
class Formatosolicitudes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formatosolicitudes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autorizador_id', 'autorizador_nombre', 'autorizador_puesto', 'solicitante_id', 'solicitante_nombre', 'solicitante_puesto', 'usuario_id', 'nombre', 'puesto', 'departamento', 'comentario'], 'required'],
            [['users_id'], 'integer'],
            [['autorizador_id', 'autorizador_nombre', 'solicitante_id', 'solicitante_nombre', 'usuario_id', 'nombre'], 'string', 'max' => 100],
            [['autorizador_puesto', 'solicitante_puesto', 'puesto', 'departamento', 'correo'], 'string', 'max' => 50],
            [['comentario'], 'string', 'max' => 255],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'autorizador_id' => 'Autorizador ID',
            'autorizador_nombre' => 'Autorizador Nombre',
            'autorizador_puesto' => 'Autorizador Puesto',
            'solicitante_id' => 'Solicitante ID',
            'solicitante_nombre' => 'Solicitante Nombre',
            'solicitante_puesto' => 'Solicitante Puesto',
            'usuario_id' => 'Usuario ID',
            'nombre' => 'Nombre',
            'puesto' => 'Puesto',
            'departamento' => 'Departamento',
            'correo' => 'Correo',
            'comentario' => 'Comentario',
            'tipo' => 'Tipo',
            'usuarioRef' => 'Usuario Ref',
        ];
    }

    public function getEmpleado($parametros){
        $n_Autorizador =$_GET['parametros'];//obtener Valor del campo 083078

        $parametros = array();
        //$parametros[numeroIdentificacion] = "0922464656";
        $parametros['numeroEmpleado'] = $n_Autorizador;


        try{
            $client = new SoapClient('http://140.50.34.128/sisturws/index.php?r=externos/Empleados/ServiceInterface',['soap_version'=>SOAP_1_2,
            'exceptions'=>true,
            'trace'=>1,
            'cache_wsdl'=>WSDL_CACHE_NONE]);

            //var_dump($client->__getFunctions()); //metedo que trae todas lad funciones
            //die();
             $result = $client->ObtenerEmpleados($parametros);

             //var_dump($client->__getTypes());
            //var_dump($result);
            // die();

             $data = array();
             $data = $result;
             echo json_encode($data);

        }catch(SoapFault $fault){


        }

    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolusuarios()
    {
        return $this->hasMany(Rolusuarios::className(), ['solicitudAlta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasaps()
    {
        return $this->hasMany(Sistemasap::className(), ['solicitudAlta_id' => 'id']);
    }
}
