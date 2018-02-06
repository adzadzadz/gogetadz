<?php

use yii\db\Migration;

/**
 * Class m180206_155320_create_user_network_pk
 */
class m180206_155320_create_user_network_pk extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_network}}', 'id', $this->primaryKey());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180206_155320_create_user_network_pk cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180206_155320_create_user_network_pk cannot be reverted.\n";

        return false;
    }
    */
}
