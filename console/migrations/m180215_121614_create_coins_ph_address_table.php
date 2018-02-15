<?php

use yii\db\Migration;

/**
 * Handles the creation of table `coins_ph_address`.
 */
class m180215_121614_create_coins_ph_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('coins_ph_address', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'tag' => $this->string(),
            'value' => $this->string(),
            'status'  => $this->smallInteger(),
            'created_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('coins_ph_address');
    }
}