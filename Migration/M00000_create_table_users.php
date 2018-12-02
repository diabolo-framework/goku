<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00000_create_table_users extends Migration {
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
        $this->createTable('users', array(
            Column::build()->setName('id')->setType(Column::T_INTEGER)->setIsAutoIncrement(true)->setIsPrimary(true)->setIsNotNull(true),
            Column::build()->setName('name')->setType(Column::T_STRING)->setLength(64)->setIsNotNull(true),
            Column::build()->setName('email')->setType(Column::T_STRING)->setLength(128)->setIsNotNull(true),
            Column::build()->setName('is_admin')->setType(Column::T_INTEGER)->setDefaultValue(0),
            Column::build()->setName('status')->setType(Column::T_INTEGER)->setDefaultValue(0),
            Column::build()->setName('registered_at')->setType(Column::T_DATETIME)->setIsNotNull(true),
            Column::build()->setName('password')->setType(Column::T_STRING)->setLength(128)->setIsNotNull(true),
            Column::build()->setName('account_name')->setType(Column::T_STRING)->setLength(128)->setIsNotNull(true),
            Column::build()->setName('account_secret')->setType(Column::T_STRING)->setLength(128)->setIsNotNull(true),
        ));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropTable('users');
    }
}