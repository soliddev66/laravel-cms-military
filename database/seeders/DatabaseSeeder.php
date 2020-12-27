<?php

namespace Database\Seeders;


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

        $this->call([
            UserSeeder::class,
            LanguageSeeder::class,
            HomepageVersionSeeder::class,
            CreativeHomepageVersionSeeder::class,
            MenuKeywordSeeder::class,
            ContentOneGroupKeywordSeeder::class,
            ContentTwoGroupKeywordSeeder::class,
            ContentThreeGroupKeywordSeeder::class,
            ContentFourGroupKeywordSeeder::class,
            ContentFiveGroupKeywordSeeder::class,
            ContentSixGroupKeywordSeeder::class,
            FrontendOneGroupKeywordSeeder::class,
            FrontendTwoGroupKeywordSeeder::class,
            ThemeSeeder::class,
            SectionSeeder::class,
            CreativeSectionSeeder::class,
        ]);
    }
}
