<?php

use Phinx\Migration\AbstractMigration;

/**
 * @codeCoverageIgnore
 *
 * @package [NAME]
 *
 * @author [AUTHOR] <[EMAIL]>
 */
class CreateUsersTable extends AbstractMigration
{
    /**
     * @return void
     */
    public function change()
    {
        $config = array('id' => false, 'primary_key' => array('id'));

        $table = $this->table('users', $config);

        $table->addColumn('id', 'integer', array('limit' => 10, 'identity' => true));
        $table->addColumn('email', 'string', array('limit' => 200));
        $table->addColumn('name', 'string', array('limit' => 200));
        $table->addColumn('password', 'string', array('limit' => 500));
        $table->addColumn('created_by', 'integer', array('limit' => 10, 'null' => true));
        $table->addColumn('updated_by', 'integer', array('limit' => 10, 'null' => true));
        $table->addColumn('deleted_by', 'integer', array('limit' => 10, 'null' => true));
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime', array('null' => true));
        $table->addColumn('deleted_at', 'datetime', array('null' => true));

        $table->create();
    }
}
