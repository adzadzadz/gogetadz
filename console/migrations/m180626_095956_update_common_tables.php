<?php

use yii\db\Migration;

/**
 * Class m180626_095956_update_common_tables
 */
class m180626_095956_update_common_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_network}}', 'package', 'VARCHAR(64) AFTER position');
        $this->addColumn('{{%user_earnings}}', 'table', 'VARCHAR(64) AFTER value');
        $this->addColumn('{{%user_earnings}}', 'leverage', 'VARCHAR(64) AFTER value');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180626_095956_update_common_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_095956_update_common_tables cannot be reverted.\n";

        return false;
    }
    */
}
