<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00008_create_table_event_history extends Migration {
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
        $this->createTable('event_history', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsAutoIncrement(true)->setIsPrimary(true)->setIsNotNull(true),
            Column::build()->setName('event_id')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('trigged_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
            Column::build()->setName('started_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
            Column::build()->setName('ended_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
            Column::build()->setName('duration')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('parameters')->setType(Column::T_STRING)->setLength(4096)->setIsNotNull(true),
            Column::build()->setName('summary')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('event_history');
    }
}