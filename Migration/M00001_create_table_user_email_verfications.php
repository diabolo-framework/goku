<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00001_create_table_user_email_verfications extends Migration {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::getDb()
     */
    protected function getDb() {
        return 'goku';
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::up()
     */
    public function up() {
        $this->createTable('user_email_verfications', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsNotNull(true)->setIsAutoIncrement(true)->setIsPrimary(true),
            Column::build()->setName('uesr_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('code')->setType(Column::T_STRING)->setIsNotNull(true),
            Column::build()->setName('expired_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('user_email_verfications');
    }
}