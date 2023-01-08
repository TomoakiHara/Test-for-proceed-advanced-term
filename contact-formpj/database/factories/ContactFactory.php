<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'=>$this->faker->name,
            'gender'=>$this->faker->randomElement(['男性', '女性']),
            'email'=>$this->faker->safeEmail,
            'postcode'=>$this->faker->postcode,
            'address'=>$this->faker->address,
            'building_name'=>$this->faker->text(10),
            'opinion'=>$this->faker->sentence(10),
        ];
    }
}
