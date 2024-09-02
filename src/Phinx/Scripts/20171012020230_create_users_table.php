<?php

use Phinx\Migration\AbstractMigration;

/**
 * @codeCoverageIgnore
 *
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class CreateUsersTable extends AbstractMigration
{
    /**
     * @return void
     */
    public function change()
    {
        $properties = ['id' => false, 'primary_key' => ['id']];

        $table = $this->table('users', $properties);

        $table->addColumn('id', 'integer', ['limit' => 10, 'identity' => true]);
        $table->addColumn('name', 'string', ['limit' => 200]);
        $table->addColumn('email', 'string', ['limit' => 200]);
        $table->addColumn('password', 'string', ['limit' => 500]);
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime', ['null' => true]);

        $table->create();
    }
}
