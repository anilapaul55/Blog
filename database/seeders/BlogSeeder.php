<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->insert([
            'blog_title' => 'Blog',
            'blog_subtitle' => 'Blog',
            'blog_image' => 'Blog.jpeg',
            'blog_description' => 'In non ante ornare, dignissim elit vitae, feugiat erat. Sed eu ullamcorper odio. Praesent lorem odio, faucibus at aliquam non, sollicitudin sit amet nibh. Duis dapibus nulla et velit facilisis vestibulum. Suspendisse hendrerit nunc sed pretium vestibulum. In sit amet dolor magna. Suspendisse efficitur dapibus venenatis. In vitae urna tempor, suscipit nisl non, consectetur sapien. Sed sagittis urna vel justo congue, id molestie lorem feugiat.',
        ]);

        DB::table('blog')->insert([
            'blog_title' => 'New Blog',
            'blog_subtitle' => 'New Blog',
            'blog_image' => 'NewBlog.jpeg',
            'blog_description' => 'In non ante ornare, dignissim elit vitae, feugiat erat. Sed eu ullamcorper odio. Praesent lorem odio, faucibus at aliquam non, sollicitudin sit amet nibh. Duis dapibus nulla et velit facilisis vestibulum. Suspendisse hendrerit nunc sed pretium vestibulum. In sit amet dolor magna. Suspendisse efficitur dapibus venenatis. In vitae urna tempor, suscipit nisl non, consectetur sapien. Sed sagittis urna vel justo congue, id molestie lorem feugiat.',
        ]);
    }
}
