<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00005_create_table_prpcessor_history extends Migration {
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
        $this->createTable('processor_history', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsAutoIncrement(true)->setIsPrimary(true)->setIsNotNull(true),
            Column::build()->setName('event_history_id')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('processor_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('status')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('message')->setType(Column::T_STRING)->setLength(512)->setIsNotNull(true),
            Column::build()->setName('started_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
            Column::build()->setName('duration')->setType(Column::T_INTEGER)->setIsNotNull(true),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('processor_history');
    }
}