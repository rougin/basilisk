<?php

use Phinx\Seed\AbstractSeed;

/**
 * @codeCoverageIgnore
 *
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class UserSeeder extends AbstractSeed
{
    /**
     * @var array<string, string>[]
     */
    protected $items = array(
        array('name' => 'Harry Jonathans Potter', 'email' => 'hjpotter@hogwarts.co.uk'),
        array('name' => 'Hermione Jane Granger', 'email' => 'hjgranger@hogwarts.co.uk'),
        array('name' => 'Ronald Bilius Weasley', 'email' => 'rbweasley@hogwarts.co.uk'),
    );

    /**
     * @return void
     */
    public function run(): void
    {
        $items = array();

        foreach ($this->items as $item)
        {
            $item['created_at'] = date('Y-m-d H:i:s');

            $item['password'] = password_hash('12345', PASSWORD_BCRYPT);

            $items[] = $item;
        }

        $table = $this->table('users');

        $table->insert($items)->save();
    }
}
