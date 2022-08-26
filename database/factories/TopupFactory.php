<?php


namespace Database\Factories;

use App\Models\Topup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TopupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(),
            'category_id' => $this->faker->name,
            // 'state' => $this->faker->randomElement(array_keys(STATE)),
            'carrier_id' => $this->faker->name,
            'topup_rate' => $this->faker->randomFloat(2, 0, 10000),
            'autopay_discount' => $this->faker->randomElement([0, 1]),
            'autopay_type' => $this->faker->name,
            'bill_amount' => $this->faker->randomFloat(2, 0, 10000),
            'discount_type' => $this->faker->name,
            'autopay_discount_amount' => $this->faker->randomElement([0, 1]),
            'apply_tax' => $this->faker->randomElement([0, 1]),
            'regulatory_code' => $this->faker->name,
            'tax_inclued' => $this->faker->randomElement([0, 1]),
            'tribal_plan_state' => $this->faker->randomElement([0, 1]),
            'status' => $this->faker->randomElement([0, 1]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
