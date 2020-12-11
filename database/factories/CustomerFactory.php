<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $feedback = ['-1', '0', '1', '2', '3'];
        $k = array_rand($feedback);
        return [
            'name' => $this->faker->name,
            'organization' => $this->faker->company,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'feedback' => $feedback[$k],
            'user_id' => 1,
            'comment' => $this->faker->text(100)
        ];
    }
}
