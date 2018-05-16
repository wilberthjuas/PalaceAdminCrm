<?php

use yii\db\Migration;

/**
 * Class m180406_035714_tablas
 */
class m180406_035714_tablas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;//Creamos esta variable para enviar la codificacion de Carácteres utf8
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //Creamos las tablas users y le asignamos la variable
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(45)->notNull()->unique(),
            'email' => $this->string(255)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'authKey' => $this->string(45)->notNull(),
            'accessToken' => $this->string(255)->unique(),
            'activate' => 'tinyint(1) NOT NULL DEFAULT 0',
            'rol_id'=>$this->integer()->notNull(),
        
        ], $tableOptions);

          //Tabla de Entornos
        $this->createTable('{{%entornos}}',[
            'id'=>$this->primarykey(),
            'sistema_nombre'=>$this->string(50)->notNull(),
        ], $tableOptions);

        //Tabla ambientes
        $this->createTable('{{%ambientes}}',[
            'id'=>$this->primaryKey(),
            'ambiente'=>$this->string(50)->notNull(),
            'entornos_id'=>$this->integer()->null(), 
        ],$tableOptions);
  
        //Tabla Portales
        $this->createTable('{{%portales}}',[
              'id'=>$this->primaryKey(),
              'portal_nombre'=>$this->string(50)->notNull(),
              'ambientes_id'=>$this->integer()->null(),  
        ],$tableOptions);

        //Tabla rol
        $this->createTable('{{%rol}}',[
            'id' => $this->primaryKey(),
            'nombre' => $this->string(32)->notNull()->unique(),
        ],$tableOptions);

        //Tabla Operacion
        $this->createTable('{{%operacion}}',[
            'id' => $this->primaryKey(),
            'nombre' => $this->string(64)->notNull()->unique(),
        ],$tableOptions);

        //Tabla rol_operacion
        $this->createTable('{{%rol_operacion}}',[
            'rol_id' =>$this->integer()->notNull(),
            'operacion_id' =>$this->integer()->notNull(),
        ],$tableOptions);
        

          //Tabla formatoSolicitud
          $this->createTable('{{%formatoSolicitudes}}',[
            'id'=>$this->primarykey(),
            'autorizador_id'=>$this->string(100)->notNull(),
            'autorizador_nombre'=>$this->string(100)->notNull(),
            'autorizador_puesto'=>$this->string(50)->notNull(),
            'solicitante_id'=>$this->string(100)->notNull(),
            'solicitante_nombre'=>$this->string(100)->notNull(),
            'solicitante_puesto'=>$this->string(50)->notNull(),
            'usuario_id'=>$this->string(100)->notNull(),
            'nombre'=>$this->string(100)->notNull(),
            'puesto'=>$this->string(50)->notNull(),
            'departamento'=>$this->string(50)->notNull(),
            'correo'=>$this->string(50)->Null(),
            'comentario'=>$this->string(255)->notNull(),
            'users_id'=>$this->integer()->null(),
            
  
        ], $tableOptions);

        

      //Tabla Rol Usuarios
        $this->createTable('{{%rolUsuarios}}',[
            'id'=>$this->primarykey(),
            'rol_solicitado'=>$this->string(45)->notNull(),
            'estatus_tiempo'=>$this->boolean()->notNull(),
            'fecha_vencimiento'=>$this->date()->null(),
            'solicitudAlta_id'=>$this->integer()->null(),
        ], $tableOptions);
  
        //Tabla Sistemas SAP
        $this->createTable('{{%sistemaSap}}',[
            'id'=>$this->primaryKey(),
            'sistemas'=>$this->string(500)->notNull(),
            'ambientes'=>$this->string(500)->notNull(),
            'portales'=>$this->string(500)->null(),
            'solicitudAlta_id'=>$this->integer()->null(),
        ]);


              //Aqui se agregan las llaves foraneas de las relaciones
             //Primero se agrega la tabla y el atributo de la relacion--después el atributo y tabla donde esta la id
              $this->addForeignKey('Fk-ROL-Fk-OPERACION','rol_operacion','rol_id','rol','id','CASCADE');
              $this->addForeignKey('Fk-OPERACION-Fk-OPERACION','rol_operacion','operacion_id','operacion','id','CASCADE');
                //Foreign Tabla ambientes
          $this->addForeignKey('Fk-ROL-Fk-USER','users','rol_id','rol','id','CASCADE');
          //Foreign Tabla ambientes
          $this->addForeignKey('Fk-ENTORNO-Fk-AMBIENTE','ambientes','entornos_id','entornos','id','CASCADE');
          //Foreign Tabla portales
          $this->addForeignKey('Fk-AMBIENTE-Fk-PORTAL','portales','ambientes_id','ambientes','id','CASCADE');

           //Foreign Tabla RolUsuarios-solicitud
           $this->addForeignKey('Fk-FORMATO-Fk-ROLUSUARIO','rolUsuarios','solicitudAlta_id','formatoSolicitudes','id','CASCADE');
           //Foreign Tabla SistemaSAp-solicitud
           $this->addForeignKey('Fk-FORMATO-Fk-SISTEMASAP','sistemaSap','solicitudAlta_id','formatoSolicitudes','id','CASCADE');
           $this->addForeignKey('FK-USERS-Fk-FORMATO-Fk','formatoSolicitudes','users_id','users','id','CASCADE');
             
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180406_035714_tablas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_035714_tablas cannot be reverted.\n";

        return false;
    }
    */
}
