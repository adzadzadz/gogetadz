<?php

use yii\db\Migration;

/**
 * Handles the creation of table `codes`.
 */
class m180125_091815_create_codes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%codes}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'code' => $this->string(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%codes}}');
    }
}
