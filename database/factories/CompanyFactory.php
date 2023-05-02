<?php

namespace Database\Factories;
 use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use HasFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */
class CompanyFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {$cname = $this->faker->company;
        return [
            
          
                
            'user_id' => User::factory(),
            'cname' => $this->faker->sentence,
            'slug' => Str::slug($cname),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'logo' => '',
            'cover_photo' => '',
            'slogan' => 'text-text and text',
            'description' => $this->faker->paragraph(rand(2, 20)),
            
        ];
    }
}
