<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m170426_153109_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'text' => $this->text(),
            'date' => $this->timestamp(),
            'author' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('posts');
    }
}
