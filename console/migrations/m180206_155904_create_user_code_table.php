<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_code`.
 */
class m180206_155904_create_user_code_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%user_code}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'code_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user_code}}');
    }
}
