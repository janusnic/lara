<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Category;


class CategorySeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // !!! All existing categories are deleted !!!

        DB::table('category_post')->truncate();

        DB::table('categories')->truncate();
        
        //\App\Category::truncate();
        $post = Post::find(1);
        /*
        $categories = [
			new Category(array('name' => 'Vacation','slug' => 'holiday')),
			new Category(array('name' => 'Tropical','slug' => 'tropical')),
			new Category(array('name' => 'Leisure','slug' => 'leisure')),
			new Category(array('name' => 'News','slug' => 'news')),	
			new Category(array('name' => 'Laravel','slug' => 'larave')),
			];*/
		$categories = [
			new Category(array('name' => 'Vacation')),
			new Category(array('name' => 'Tropical')),
			new Category(array('name' => 'Leisure')),
			new Category(array('name' => 'News')),	
			new Category(array('name' => 'Laravel')),
			];
			$post->categories()->saveMany($categories);
               
        $post = Post::find(3);
        //$category = new Category(array('name' => 'Holiday','slug' => 'holiday'));
        //$post->categories()->save($category);
		
		//$category = new Category(array('name' => 'News','slug' => 'news'));
        //$post->categories()->save($category);

		//$category = new Category(array('name' => 'Laravel','slug' => 'larave'));
        //$post->categories()->save($category);
		$category = Category::find(1);
		// In this example we're passing in a Category object
		$post->categories()->attach($category);
		// The number 5 is the primary key of another category
		$post->categories()->attach(4);

        $post = Post::find(2);
		$category = Category::find(1);
		$post->categories()->attach([3,4]);

		// Pass the Category object into the detach method
		$post->categories()->detach(Category::find(3));

		$categories = [2,3,4,5];
		$post = Post::find(5);
		$post->categories()->sync($categories);
		// Pass a category's ID
		//$post->categories()->detach(3);
		// Pass along an array of category IDs
		//$post->categories()->detach([3,4]);

        
        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
