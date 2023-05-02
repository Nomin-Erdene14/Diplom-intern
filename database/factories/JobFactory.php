<?php

namespace Database\Factories;
use App\Models\Company;
use App\Models\User;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
      
     * @return array<string, mixed>
     */
    protected $model = Job::class;
    public function definition()
    {
        return [
            'user_id' =>User::factory(),
            'company_id' => Company::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->text(),
            'slug' => Str::of($this->faker->name),
            'description' => $this->faker->paragraph(rand(2, 20)),
            'role' => $this->faker->name,
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'type' => 'intern',
            'status' => rand(0, 1),
            'last_date' => $this->faker->dateTime(),
        ];
    }
}
