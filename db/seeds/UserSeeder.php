<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $exists = $this->hasTable('users');
        if($exists)
            return;
            
        $table = $this->table('users');
        $table->addColumn('username', 'string')
              ->create();
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'username'      => $faker->userName,
            ];
        }

        $this->table('users')->insert($data)->saveData();
    }
}
