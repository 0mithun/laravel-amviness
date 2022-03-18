<?php

namespace Modules\Priceplan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Priceplan\Entities\Priceplan;

class PriceplanDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Priceplan::factory(5)->create();
    }
}
