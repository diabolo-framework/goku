<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00006_create_table_prpcess_queue extends Migration {
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
        $this->createTable('process_queue', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsAutoIncrement(true)->setIsPrimary(true)->setIsNotNull(true),
            Column::build()->setName('project_id')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('event_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('processor_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('parameters')->setType(Column::T_STRING)->setLength(4096)->setIsNotNull(true),
            Column::build()->setName('status')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('started_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('process_queue');
    }
}