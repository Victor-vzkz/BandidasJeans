<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $categories = factory(Category::class, 4)->create();
     $categories->each(function ($category) {
          $products = factory(Product::class, 20)->make();
          $category->products()->saveMany($products);

          $products->each(function($p){
              $images = factory(ProductImage::class, 4)->make();
           $p->images()->saveMany($images);
          });        
     });
    
    }
}
