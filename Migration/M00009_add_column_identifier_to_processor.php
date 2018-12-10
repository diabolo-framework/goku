<?php
namespace X\Migration;
use X\Service\Database\Migration\Migration;
use X\Service\Database\Table\Column;
class M00009_add_column_identifier_to_processor extends Migration {
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
        $this->addColumn('processors', 'identifier', Column::build()->setType(Column::T_STRING)->setLength(128)->setIsNotNull(true));
    }

    /**
     * {@inheritDoc}
     * @see \X\Service\Database\Migration\Migration::down()
     */
    public function down() {
        $this->dropColumn('processors', 'identifier');
    }
}