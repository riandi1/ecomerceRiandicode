<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $name = $this->faker->sentence(2);
        $subactegory = Subcategory::all()->random();
        $category = $subactegory->category;

        $brand = $category->brands->random();

        if ($subactegory->color) {
            $quantity = null;
        }else{
            $quantity = 15;
        }

        return [
            'name' => $name,
            'slug'=> Str::slug($name),
            'description' => $this->faker->text(),
            'price'=> $this->faker->randomElement([9900,15000,8000]),
            'subcategory_id'=>$subactegory->id,
            'brand_id'=> $brand->id,
            'quantity'=> $quantity,
            'status'=>2
            
        ];
    }
}
