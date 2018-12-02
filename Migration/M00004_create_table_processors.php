<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00004_create_table_processors extends Migration {
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
        $this->createTable('processors', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsAutoIncrement(true)->setIsPrimary(true)->setIsNotNull(true),
            Column::build()->setName('name')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('event_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('user_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('project_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('description')->setType(Column::T_STRING)->setLength(512)->setIsNotNull(true),
            Column::build()->setName('http_url')->setType(Column::T_STRING)->setLength(512)->setIsNotNull(true),
            Column::build()->setName('http_method')->setType(Column::T_STRING)->setLength(8)->setIsNotNull(true),
            Column::build()->setName('status')->setType(Column::T_INTEGER)->setIsNotNull(true),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('processors');
    }
}