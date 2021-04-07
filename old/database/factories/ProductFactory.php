<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'slug'=>$this->faker->unique()->slug,
            'model_no'=>Str::random(8),
            'summary'=>$this->faker->text,
            'description'=>$this->faker->paragraphs(3,true),
//            'specification'=>$this->faker->paragraphs(3,true),
            'stock'=>$this->faker->numberBetween(2,10),
//            'brand_id'=>$this->faker->randomElement(Brand::pluck('id')->toArray()),
            'photo'=>$this->faker->imageUrl('679','441'),
            'image_path'=>$this->faker->imageUrl('679','441'),
//            'variants'=>$this->faker->imageUrl('60','60'),
//            'variants_path'=>$this->faker->imageUrl('60','60'),
            'price'=>$this->faker->numberBetween(100,1000),
            'offer_price'=>$this->faker->numberBetween(100,1000),
            'discount'=>$this->faker->numberBetween(0,100),
            'tags'=>$this->faker->randomElement(['new','hot','sale']),
            'is_featured'=>$this->faker->randomElement([0,1]),
//            'todays_deal'=>$this->faker->randomElement([0,1]),
            'status'=>$this->faker->randomElement(['active','inactive']),
        ];
    }
}
