<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hour>
 */
class HourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Mendefinisikan rentang waktu berurutan dari 15:00:00 hingga 01:00:00
        $times = [
            '15:00:00',
            '16:00:00',
            '17:00:00',
            '18:00:00',
            '19:00:00',
            '20:00:00',
            '21:00:00',
            '22:00:00',
            '23:00:00',
            '00:00:00',
            '01:00:00',
        ];

        // Mengambil waktu secara berurutan dari array
        static $index = 0;
        $time = $times[$index % count($times)];
        $index++;

        return [
            'hour' => $time
        ];
    }
}
