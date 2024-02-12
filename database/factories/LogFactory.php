<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // สร้างวันที่ในเดือนที่แล้ว
        $date = Carbon::now()->subMonth();
        return [
            'user_id' => 1,
            'user_type' => 0,
            'text_detail' => fake()->randomElement(['เข้าสู่ระบบ', 'ออกจากระบบ']), // สร้าง action ที่เป็นประโยคสุ่ม
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
