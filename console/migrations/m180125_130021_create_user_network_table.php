<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_network`.
 */
class m180125_130021_create_user_network_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%user_network}}', [
            'user_id' => $this->integer(),
            'sponsor' => $this->integer(),
            'placement' => $this->integer(),
            'position' => $this->integer(),
            'code' => $this->string(),
        ]);

        $this->createIndex ( 'ix_uid', '{{%user_network}}', 'user_id', $unique = true );

        $this->addForeignKey( 
            $name = 'fk_uidnetwork', 
            $table = '{{%user_network}}', 
            $columns = 'user_id', 
            $refTable = '{{%user}}', 
            $refColumns = 'id', 
            $delete = null, 
            $update = null );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user_network}}');
    }
}