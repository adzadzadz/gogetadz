<?php

use yii\db\Migration;

/**
 * Class m180529_041815_create_pv_tables
 */
class m180529_041815_create_pv_tables extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%user_pv}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'value' => $this->string(),
            'status'  => $this->smallInteger(),
            'created_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user_pv}}');
    }

}
