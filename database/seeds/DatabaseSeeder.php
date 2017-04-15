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
        \CrazyQuiz\User::create([
            'name' => 'Administrador',
            'email' => 'admin@crazyquiz.com.br',
            'password' => bcrypt('crazyquiz2017'),
        ]);

        $this->call(QuestionsSeeder::class);
    }
}
