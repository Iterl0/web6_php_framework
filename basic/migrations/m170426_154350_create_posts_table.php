<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170426_154350_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'text' => $this->text(),
            'date' => $this->timestamp(),
            'author' => $this->integer (),
        ]);

        // creates index for column ` author_id`
        $this->createIndex(
            'idx-posts- author_id',
            'posts',
            ' author_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-posts- author_id',
            'posts',
            ' author_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-posts- author_id',
            'posts'
        );

        // drops index for column ` author_id`
        $this->dropIndex(
            'idx-posts- author_id',
            'posts'
        );

        $this->dropTable('posts');
    }
}
