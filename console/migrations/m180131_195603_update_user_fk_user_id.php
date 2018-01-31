<?php

use yii\db\Migration;

/**
 * Class m180131_195603_update_user_fk_user_id
 */
class m180131_195603_update_user_fk_user_id extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropForeignKey( 'fk_uidnetwork', '{{%user_network}}' );
        $this->addForeignKey( 
            $name = 'fk_uidnetwork', 
            $table = '{{%user_network}}', 
            $columns = 'user_id', 
            $refTable = '{{%user}}', 
            $refColumns = 'id', 
            $delete = 'CASCADE', 
            $update = null );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180131_195603_update_user_fk_user_id cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180131_195603_update_user_fk_user_id cannot be reverted.\n";

        return false;
    }
    */
}
