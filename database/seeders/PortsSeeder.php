<?php

namespace Database\Seeders;

use App\Models\Port;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Port::create([
            'name' => 'Angra do Heroismo',
            'latitude' => 38.65,
            'longitude' => -27.216667,
        ]);

        Port::create([
            'name' => 'Aveiro - Molhe Central',
            'latitude' => 40.633333,
            'longitude' => -8.75,
        ]);

        Port::create([
            'name' => 'Cascais',
            'latitude' => 38.7,
            'longitude' => -9.416667,
        ]);

        Port::create([
            'name' => 'Faro - Olhão',
            'latitude' => 37.033333,
            'longitude' => -7.833333,
        ]);

        Port::create([
            'name' => 'Figueira da Foz',
            'latitude' => 40.15,
            'longitude' => -8.866667,
        ]);

        Port::create([
            'name' => 'Funchal',
            'latitude' => 32.633333,
            'longitude' => -16.9,
        ]);

        Port::create([
            'name' => 'Horta',
            'latitude' => 38.533333,
            'longitude' => -28.633333,
        ]);

        Port::create([
            'name' => 'Lagos',
            'latitude' => 37.1,
            'longitude' => -8.666667,
        ]);

        Port::create([
            'name' => 'Lajes das Flores',
            'latitude' => 39.4,
            'longitude' => -31.15,
        ]);

        Port::create([
            'name' => 'Leixões',
            'latitude' => 41.183333,
            'longitude' => -8.7,
        ]);

        Port::create([
            'name' => 'Lisboa',
            'latitude' => 38.716667,
            'longitude' => -9.133333,
        ]);

        Port::create([
            'name' => 'Peniche',
            'latitude' => 39.35,
            'longitude' => -9.4,
        ]);

        Port::create([
            'name' => 'Ponta Delgada',
            'latitude' => 37.733333,
            'longitude' => -25.666667,
        ]);

        Port::create([
            'name' => 'Sesimbra',
            'latitude' => 38.45,
            'longitude' => -9.1,
        ]);

        Port::create([
            'name' => 'Setúbal - Tróia',
            'latitude' => 38.533333,
            'longitude' => -8.9,
        ]);

        Port::create([
            'name' => 'Sines',
            'latitude' => 37.95,
            'longitude' => -8.866667,
        ]);

        Port::create([
            'name' => 'Viana do Castelo',
            'latitude' => 41.7,
            'longitude' => -8.833333,
        ]);

        Port::create([
            'name' => 'Vila do Porto',
            'latitude' => 36.966667,
            'longitude' => -25.166667,
        ]);

        Port::create([
            'name' => 'Vila Real de Santo António',
            'latitude' => 37.2,
            'longitude' => -7.416667,
        ]);
    }
}
