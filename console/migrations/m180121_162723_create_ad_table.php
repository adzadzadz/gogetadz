<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ad`.
 */
class m180121_162723_create_ad_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%advertisement}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'name' => $this->string(),
            'description' => $this->string(),
            'url'   => $this->string(),
            'image_url'   => $this->string(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()
        ]);

        $this->createTable('{{%user_advertisement}}', [
            'user_id' => $this->integer(),
            'ad_id'   => $this->integer(),
            'status'  => $this->smallInteger(),
        ]);

        $this->addForeignKey( 
            $name = 'fk_adid', 
            $table = '{{%user_advertisement}}', 
            $columns = 'ad_id', 
            $refTable = '{{%advertisement}}', 
            $refColumns = 'id', 
            $delete = null, 
            $update = null );

        $this->addForeignKey( 
            $name = 'fk_uid', 
            $table = '{{%user_advertisement}}', 
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
        $this->dropTable('ad');
    }
}
