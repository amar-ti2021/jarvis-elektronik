<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = mt_rand(0, 1);
        $name = $this->generateName($gender);
        return [
            'name' => $name,
            'gender' => $gender,
            'address' => $this->faker->address(),
            'photo' => "https://randomuser.me/api/portraits/" . (($gender === 1) ? 'men/' : 'women/') . mt_rand(3, 50) . '.jpg',
            'email' => $this->faker->email(),
            'phone_number' => '+62 812 888 888',
            'role_id' => 2,
        ];
    }
    private function generateName($gender)
    {
        if ($gender === 1) {
            $name = $this->faker->firstNameMale() . " " . $this->faker->lastName();
        } else {
            $name = $this->faker->firstNameFemale() . " " . $this->faker->lastName();
        }
        return $name;
    }
}
