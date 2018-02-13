<?php

use yii\db\Migration;

/**
 * Handles the creation of table `withdrawal_request`.
 */
class m180212_090257_create_user_withdrawal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%user_withdrawal}}', [
            'id'      => $this->primaryKey(),
            'user_id' => $this->integer(),
            'type'    => $this->string(),
            'value'   => $this->float(),
            'status'  => $this->smallInteger(),
            'created_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user_withdrawal}}');
    }
}
