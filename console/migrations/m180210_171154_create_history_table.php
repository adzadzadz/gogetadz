<?php

use yii\db\Migration;

/**
 * Handles the creation of table `history`.
 */
class m180210_171154_create_history_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'type'    => $this->string(),
            'key'     => $this->string(),
            'value'   => $this->string(),
            'status'  => $this->smallInteger(),
            'created_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('history');
    }
}
