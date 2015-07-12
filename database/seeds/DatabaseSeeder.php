<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeds\UserTableSeeder;
use Database\Seeds\RolesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        

        // $this->call('UserTableSeeder');

        //Model::reguard();
        $this->call('UserTableSeeder');
        $this->call('RolesTableSeeder');
        Model::reguard();
        $this->call('PostTableSeeder');
    }

}
    class PostTableSeeder extends Seeder
    {
      public function run()
      {
        $faker = Faker\Factory::create();

        \App\Post::truncate();
        for ($i = 0; $i < 20; $i++) {
          $blog = new \App\Post();
          $blog->title = $faker->sentence(mt_rand(3, 10));
          $blog->content = join("\n\n", $faker->paragraphs(mt_rand(3, 6)));
          //$blog->published_at = $faker->dateTimeBetween('-1 month', '+3 days');
          $blog->save();
        }
      }
    }
