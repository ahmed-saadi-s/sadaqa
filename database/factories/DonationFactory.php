<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement([3, 4, 5,9.10,11]),
            'charity_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(100000, 10000000),
            'user_delivered' => $this->faker->boolean,
            'site_delivered' => $this->faker->boolean,
            'recipient_name' => $this->faker->randomElement([
                'Ahmed Saadi', 'Fatima Al-Hariri', 'Omar Al-Jabari', 
                'Layla Al-Mansour', 'Ibrahim Khalil', 'Mona Fadli', 
                'Ali Zaidan', 'Aisha Hassan', 'Youssef El-Sayed', 
                'Noor Al-Sabah'
            ]),
            'recipient_phone' => $this->faker->phoneNumber,
            'recipient_address' => $this->faker->randomElement([
                'شارع الحمرا، دمشق', 'حي المزة، دمشق', 'شارع الثورة، حلب', 
                'شارع الحمرا، حلب', 'حي العزيزية، حلب', 'شارع النصر، حمص', 
                'حي الزهراء، حمص', 'شارع الجلاء، درعا', 'حي السيدة زينب، دمشق', 
                'شارع الخضراء، دمشق'
            ]),
            'created_at' => $this->faker->dateTimeBetween('2018-01-01', '2024-12-31'),
            'updated_at' => now(),
        ];
    }
}
