<?php
class ArticlesSeeder extends Seeder {
    public function run()
    {
        $count = 20;

        DB::table('articles')->delete();

        /** @var \Faker\Generator $faker */
        $faker = Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $article = new Article();
            $article->title = $faker->sentence(2);
            $article->description = $faker->paragraph();
            $article->save();
        }
    }
}