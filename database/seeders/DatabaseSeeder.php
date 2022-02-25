<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brands;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       /* $Brands = new Brands(); 
        $Brands->Name= "Chevrolet";
        $Brands->save();
*/
        \App\Models\Brands::create([
            'Name'=>'Chevrolet'
        ]);

        \App\Models\Brands::create([
            'Name'=>'Ford'
        ]);
    }
}
