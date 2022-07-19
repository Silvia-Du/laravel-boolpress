<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\PublicUser;

class PublicUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 30; $i++){
            $new_PublicUser = new PublicUser();
            $new_PublicUser->name = $faker->firstName($gender = null);
            $new_PublicUser->surname = $faker->lastName();
            $new_PublicUser->email = $faker->email();
            $new_PublicUser->save();

        }
    }
}
