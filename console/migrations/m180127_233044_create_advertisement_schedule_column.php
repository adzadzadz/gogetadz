<?php

use yii\db\Migration;

/**
 * Class m180127_233044_create_advertisement_schedule_columnt
 */
class m180127_233044_create_advertisement_schedule_column extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn ( '{{%advertisement}}', 'schedule', $this->integer() );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180127_233044_create_advertisement_schedule_columnt cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180127_233044_create_advertisement_schedule_columnt cannot be reverted.\n";

        return false;
    }
    */
}