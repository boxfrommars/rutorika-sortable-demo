<?php
class ArticlesSeeder extends Seeder {
    public function run()
    {
        $count = 20;

        DB::table('articles')->delete();
        DB::table('grouped_articles')->delete();

        /** @var \Faker\Generator $faker */
        $faker = Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $article = new GroupedArticle();
            $article->title = $faker->sentence(2);
            $article->description = $faker->paragraph();
            $article->category = rand(0, 1) ? 'first' : 'second';
            $article->save();
        }

        for ($i = 0; $i < $count; $i++) {
            $article = new Article();
            $article->title = $faker->sentence(2);
            $article->description = $faker->paragraph();
            $article->save();
        }
    }
}