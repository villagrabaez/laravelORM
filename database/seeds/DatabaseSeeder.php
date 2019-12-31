<?php

use Illuminate\Database\Seeder;
use App\{Group, Level, User, Profile, Location, Image, Category, Tag, Post, Video, Comment};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Group::class, 3)->create();

        factory(Level::class)->create(['name' => 'Oro']);
        factory(Level::class)->create(['name' => 'Plata']);
        factory(Level::class)->create(['name' => 'Bronce']);

        factory(User::class, 5)->create()->each(
            function( $user ){
                $profile = $user->profile()->save( factory(Profile::class)->make() );

                $profile->location()->save( factory(Location::class)->make() );

                $user->groups()->attach( $this->array( rand(1, 3) ) );

                $user->image()->save( factory(Image::class)->make(['url' => 'https://lorempixel.com/90/90/people']) );
            }
        );

        factory(Category::class, 4)->create();
        factory(Tag::class, 12)->create();
        factory(Post::class, 40)->create()->each(
            function( $post ){
                $post->image()->save( factory(Image::class)->make() );
                $post->tags()->attach( $this->array(rand(1, 12)) );

                $number_comments = rand(1, 6);

                for($i=0; $i<$number_comments; $i++){
                    $post->comments()->save( factory(Comment::class)->make() );
                }
            }
        );

        factory(Video::class, 40)->create()->each(
            function( $video ){
                $video->image()->save( factory(Image::class)->make() );
                $video->tags()->attach( $this->array(rand(1, 12)) );

                $number_comments = rand(1, 6);

                for($i=0; $i<$number_comments; $i++){
                    $video->comments()->save( factory(Comment::class)->make() );
                }
            }
        );
    }

    public function array( $max )
    {
        $values = [];

        for( $i = 1; $i < $max; $i++ ){
            $values[] = $i;
        }

        return $values;
    }
}
