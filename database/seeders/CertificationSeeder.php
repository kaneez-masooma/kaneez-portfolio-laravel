<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
             [
                'title' => 'Full Stack Development',
                'issuer' => 'Kamyaab Freelancer Program',
                'date_earned' => null, // TODO: add date
                'credential_url' =>'/certificates/kfp.pdf',
                'sort_order' => 1,
            ],
            [
                'title' => 'Aspire Leaders Program',
                'issuer' => 'Aspire Institute',
                'date_earned' => null, // TODO: add date
                'credential_url' =>'/certificates/Aspire-Certificate.pdf',
                'sort_order' => 2,
            ],
            [
                'title' => 'Safex Solutions Internship',
                'issuer' => 'Safex Solutions', // TODO: confirm if completed or in progress
                'date_earned' => null,
                'credential_url' => '/certificates/safex.jpg',
                'sort_order' => 3,
            ],
             [
                'title' => 'AlKhidmat Summer Internship',
                'issuer' => 'AlKhidmat Foundation Pakistan', // TODO: confirm if completed or in progress
                'date_earned' => null,
                'credential_url' => '/certificates/alkhidmat.pdf',
                'sort_order' => 4,
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::updateOrCreate(
                ['title' => $cert['title']],
                $cert
            );
        }
    }
}
