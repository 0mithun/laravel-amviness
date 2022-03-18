<?php

namespace Modules\Candidate\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Candidate\Entities\Candidate;
use Modules\Candidate\Entities\CandidateSocialLink;

class CandidateDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Candidate::factory(5)->create();

        $socials = [
            [
                'candidate_id' => 1,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'candidate_id' => 3,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'candidate_id' => 3,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'candidate_id' => 4,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
            [
                'candidate_id' => 5,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
                'pintarest' => 'https://pintarest.com',
            ],
        ];

        CandidateSocialLink::insert($socials);
    }
}
