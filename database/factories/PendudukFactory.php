<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Penduduk::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['L', 'P']);
        $agama = $this->faker->randomElement(['Islam','Katolik','Kristen','Hindu','Budha','Konghucu']);
        $pendidikan = $this->faker->randomElement(['SD','SMP','SMA','D3','S1']);

        return [
            'nik' => $this->faker->randomDigit,
            'nama' => $this->faker->name($gender),
            'alamat' => $this->faker->address,
            'jenkel' => $gender,
            'tgl_lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'tempat_lahir' => $this->faker->address,
            'agama' => $agama,
            'pendidikan' => $pendidikan
        ];
    }
}
