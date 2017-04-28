<?php

use yii\db\Migration;

/**
 * Handles adding position to table `posts`.
 */
class m170426_155734_add_position_column_to_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('posts', 'position', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('posts', 'position');
    }
}

