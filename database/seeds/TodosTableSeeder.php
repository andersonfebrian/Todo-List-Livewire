<?php

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::truncate();

        Todo::create(['body' => 'Drink Water']);
        Todo::create(['body' => 'Go Shopping for food']);
        Todo::create(['body' => 'Go Clubbing on Saturday']);
    }
}
