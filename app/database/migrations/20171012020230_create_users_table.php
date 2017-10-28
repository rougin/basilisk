<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $properties = [ 'id' => false, 'primary_key' => [ 'id' ] ];

        $table = $this->table('users', $properties);

        $table->addColumn('id', 'integer', [ 'limit' => 10, 'identity' => true ]);;
        $table->addColumn('name', 'string', [ 'limit' => 200 ]);
        $table->addColumn('email', 'string', [ 'limit' => 200 ]);
        $table->addColumn('password', 'string', [ 'limit' => 500 ]);
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime', [ 'null' => true ]);

        $table->create();
    }
}
