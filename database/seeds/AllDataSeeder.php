<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class AllDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('students')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'patron' => $faker->suffix,
                'email' => $faker->email,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'birthday' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

        DB::table('courses')->insert([
            'title' => 'Laravel',
            'created_at' => Carbon::now()
        ]);
        DB::table('courses')->insert([
            'title' => 'Python',
            'created_at' => Carbon::now()
        ]);
        DB::table('courses')->insert([
            'title' => 'Javascript',
            'created_at' => Carbon::now()
        ]);
        DB::table('courses')->insert([
            'title' => 'VueJS',
            'created_at' => Carbon::now()
        ]);
        DB::table('courses')->insert([
            'title' => 'PHP',
            'created_at' => Carbon::now()
        ]);
        DB::table('courses')->insert([
            'title' => 'Linux Sys - Admining',
            'created_at' => Carbon::now()
        ]);
    }
}
