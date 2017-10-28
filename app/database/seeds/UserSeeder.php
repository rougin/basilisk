<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * @var array
     */
    protected $items = [
        [ 'name' => 'Harry James Potter', 'email' => 'hjpotter@hogwarts.co.uk' ],
        [ 'name' => 'Hermione Jane Granger', 'email' => 'hjgranger@hogwarts.co.uk' ],
        [ 'name' => 'Ronald Bilius Weasley', 'email' => 'rbweasley@hogwarts.co.uk' ],
    ];

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [];

        foreach ($this->items as $item) {
            $item['created_at'] = date('Y-m-d H:i:s');

            $item['password'] = password_hash('12345', PASSWORD_BCRYPT);

            array_push($data, $item);
        }

        $this->table('users')->insert($data)->save();
    }
}
