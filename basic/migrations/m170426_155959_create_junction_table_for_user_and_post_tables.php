<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_post`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `post`
 */
class m170426_155959_create_junction_table_for_user_and_post_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_post', [
            'user_id' => $this->integer(),
            'post_id' => $this->integer(),
            'PRIMARY KEY(user_id, post_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_post-user_id',
            'user_post',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_post-user_id',
            'user_post',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `post_id`
        $this->createIndex(
            'idx-user_post-post_id',
            'user_post',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-user_post-post_id',
            'user_post',
            'post_id',
            'post',
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
            'fk-user_post-user_id',
            'user_post'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_post-user_id',
            'user_post'
        );

        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-user_post-post_id',
            'user_post'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-user_post-post_id',
            'user_post'
        );

        $this->dropTable('user_post');
    }
}
