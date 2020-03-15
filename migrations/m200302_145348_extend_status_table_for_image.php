<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m200302_145348_extend_status_table_for_image
 */
class m200302_145348_extend_status_table_for_image extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->addColumn('{{%status}}','image_src_filename',Schema::TYPE_STRING.' NOT NULL');
        $this->addColumn('{{%status}}','image_web_filename',Schema::TYPE_STRING.' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%status}}','image_src_filename');
        $this->dropColumn('{{%status}}','image_web_filename');
        return false;
    }
}
