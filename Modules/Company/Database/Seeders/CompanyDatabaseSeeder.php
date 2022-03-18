<?php

namespace Modules\Company\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Company\Entities\Company;
use Modules\Company\Entities\CompanySocialLink;

class CompanyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Company::factory(5)->create();

        $socials = [
            [
                'company_id' => 1,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'company_id' => 3,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'company_id' => 3,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'company_id' => 4,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'company_id' => 5,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
        ];

        CompanySocialLink::insert($socials);
    }
}
