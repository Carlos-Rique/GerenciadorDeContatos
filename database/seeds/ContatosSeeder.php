<?php

use App\Models\Contatos;
use Illuminate\Database\Seeder;

class ContatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contatos::class,50)->create();
    }
}
