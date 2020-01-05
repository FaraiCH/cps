<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Hash;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = \App\User::create([

            'name' => 'Boogyman',
            'email' => 'boogy@gmail.com',
            'password' => Hash::make('Paradice')

        ]);

        $author2 = \App\User::create([

            'name' => 'Pokemon',
            'email' => 'poke@gmail.com',
            'password' => Hash::make('Paradice')

        ]);

        $category1 = \App\Category::create([
            'name' => 'News'
        ]);

        $category2 = \App\Category::create([
            'name' => 'Design'
        ]);

        $category3 = \App\Category::create([
            'name' => 'Partnership'
        ]);




        $post1 = $author1->posts()->create([

            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Blalajdkd alkdks salksa',
            'content' => 'JHhsdnk akskklsd',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',


        ]);

        $post2 = $author2->posts()->create([

            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Blalajdkd alkdks salksa',
            'content' => 'JHhsdnk akskklsd',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'

        ]);

        $post3 = $author1->posts()->create([

            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Blalajdkd alkdks salksa',
            'content' => 'JHhsdnk akskklsd',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'

        ]);





        $tag1 = Tag::create([
            'name' => 'Job'
        ]);

        $tag2 = Tag::create([
            'name' => 'Customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'Record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag3->id, $tag1->id]);

    }
}
