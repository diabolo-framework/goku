<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00002_create_table_projects extends Migration {
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
        $this->createTable('projects', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsAutoIncrement(true)->setIsPrimary(true)->setIsNotNull(true),
            Column::build()->setName('name')->setType(Column::T_STRING)->setLength(128)->setIsNotNull(true),
            Column::build()->setName('user_id')->setType(Column::T_INTEGER)->setIsNotNull(true),
            Column::build()->setName('status')->setType(Column::T_INTEGER)->setIsNotNull(true)->setDefaultValue(0),
            Column::build()->setName('identifier')->setType(Column::T_STRING)->setLength(128)->setIsNotNull(true),
            Column::build()->setName('description')->setType(Column::T_STRING)->setLength(512)->setIsNotNull(true),
            Column::build()->setName('is_public')->setType(Column::T_INTEGER)->setIsNotNull(true)->setDefaultValue(0),
            Column::build()->setName('created_at')->setType(Column::T_DATETIME)->setLength(128)->setIsNotNull(true),
            Column::build()->setName('is_application_required')->setType(Column::T_INTEGER)->setIsNotNull(true)->setDefaultValue(0),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('projects');
    }
}