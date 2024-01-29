<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = collect([
            [
                'code' => 'en',
                'lang' => 'English'
            ],
            [
                'code' => 'fr',
                'lang' => 'French'
            ]
        ]);

        $languages->each(function ($language) {
            Language::create([
                'code' => $language['code'],
                'lang' => $language['lang']
            ]);
        });
    }
}
