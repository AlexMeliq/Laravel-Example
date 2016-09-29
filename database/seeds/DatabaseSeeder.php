<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\About;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
         $this->call('PostsSeeder');
         $this->call('AboutsSeeder');

        Model::reguard();
    }
}

class PostsSeeder extends  Seeder{

    public function run(){

        DB::table('Posts')->delete();
        Post::create([
            'title' => 'First Post',
            'slug' => 'first-post',
            'excerpt' => '<b>First Post body</b>',
            'content' => '<b>Content First Post body</b>',
            'published' => true,
            'published_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        Post::create([
            'title' => 'Second Post',
            'slug' => 'Second-post',
            'excerpt' => '<b>Second Post body</b>',
            'content' => '<b>Content Second Post body</b>',
            'published' => false,
            'published_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        Post::create([
            'title' => 'Third Post',
            'slug' => 'Third-post',
            'excerpt' => '<b>Third Post body</b>',
            'content' => '<b>Content Third Post body</b>',
            'published' => false,
            'published_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        Post::create([
            'title' => 'Fourth Post',
            'slug' => 'Fourth-post',
            'excerpt' => '<b>Fourth Post body</b>',
            'content' => '<b>Content Fourth Post body</b>',
            'published' => false,
            'published_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }

}
class AboutsSeeder extends  Seeder{

    public function run(){

        DB::table('Abouts')->delete();
        About::create([
            'title' => 'About Us',
            'content' => '<p>Content About Us</p>',
        ]);

        About::create([
            'title' => 'Our Mission',
            'content' => '<p>Content Our Mission </p>',
        ]);

        About::create([
            'title' => 'Find Us',
            'content' => '<b>Content Find Us</b>',
        ]);
    }

}