<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Comment;


class CommentSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        //disable foreign key check for this connection before running seeders
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // !!! All existing categories are deleted !!!

        //DB::table('category_post')->truncate();

        DB::table('comments')->truncate();
        
        //\App\Category::truncate();
        $post = Post::find(1);
		$c = new Comment();
		$c->body = 'Great work!';
		$post->comments()->save($c);
        //$post = Post::find(3);
        //$category = new Category(array('name' => 'Holiday','slug' => 'holiday'));
        //$post->categories()->save($category);
		
		//$category = new Category(array('name' => 'News','slug' => 'news'));
        //$post->categories()->save($category);

		//$category = new Category(array('name' => 'Laravel','slug' => 'larave'));
        //$post->categories()->save($category);
		
        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
