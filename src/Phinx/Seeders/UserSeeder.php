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
    protected $items =
    [
        ['name' => 'Harry Jonathans Potter', 'email' => 'hjpotter@hogwarts.co.uk'],
        ['name' => 'Hermione Jane Granger', 'email' => 'hjgranger@hogwarts.co.uk'],
        ['name' => 'Ronald Bilius Weasley', 'email' => 'rbweasley@hogwarts.co.uk'],
    ];

    public function run(): void
    {
        $data = array();

        foreach ($this->items as $item)
        {
            $item['created_at'] = date('Y-m-d H:i:s');

            $item['password'] = password_hash('12345', PASSWORD_BCRYPT);

            array_push($data, (array) $item);
        }

        $this->table('users')->insert($data)->save();
    }
}
