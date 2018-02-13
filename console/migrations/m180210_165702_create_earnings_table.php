<?php

use yii\db\Migration;

/**
 * Handles the creation of table `earnings`.
 */
class m180210_165702_create_earnings_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%user_earnings}}', [
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
        $this->dropTable('earnings');
    }
}
