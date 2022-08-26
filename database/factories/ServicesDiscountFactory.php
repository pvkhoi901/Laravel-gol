<?php


namespace Database\Factories;

use App\Models\ServicesDiscount;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServicesDiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServicesDiscount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'service_amount' => $this->faker->randomFloat(2, 0, 10000),
            // 'state' => $this->faker->randomElement(array_keys(STATE)),
            'service_type' => $this->faker->randomElement(array_keys(DISCOUNT_TYPE)),
            'status' => $this->faker->randomElement([0, 1]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
