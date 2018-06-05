<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeeder::class);
    }
}
class userSeeder extends Seeder
{
	public function run(){
		DB::table('users')->insert([
			['name'=>'hung','email'=>str_random(3).'@yahoo.com','password'=>bcrypt('12345')],
			['name'=>'nam','email'=>str_random(3).'@yahoo.com','password'=>bcrypt('12345')]
		]);
	}
}
