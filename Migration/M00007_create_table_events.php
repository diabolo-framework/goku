<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00007_create_table_events extends Migration {
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
        $this->createTable('events', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsAutoIncrement(true)->setIsPrimary(true)->setIsNotNull(true),
            Column::build()->setName('project_id')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('name')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('identifier')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('description')->setType(Column::T_STRING)->setLength(512)->setIsNotNull(true),
            Column::build()->setName('status')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('created_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
            Column::build()->setName('updated_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('events');
    }
}