<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendedor;
use App\Models\ReglaComision;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        ReglaComision::create(['monto_minimo'=>0, 'tasa'=>0]);
        ReglaComision::create(['monto_minimo'=>500, 'tasa'=>5]);
        ReglaComision::create(['monto_minimo'=>1000, 'tasa'=>8]);
        ReglaComision::create(['monto_minimo'=>2000, 'tasa'=>10]);

        $juan = Vendedor::create(['nombre'=>'Juan Narvaez','correo'=>'juan@vendedor.com']);
        $nicolas = Vendedor::create(['nombre'=>'Nicolas Cazares','correo'=>'nico@vendedor.com']);
        $rosa = Vendedor::create(['nombre'=>'Rosa Saldaña','correo'=>'rosa@vendedor.com']);

        $juan->ventas()->create(['fecha' => '2026-09-03', 'monto' => 850.00]);
        $juan->ventas()->create(['fecha' => '2026-10-15', 'monto' => 950.75]);

        $nicolas->ventas()->create(['fecha' => '2026-10-03', 'monto' => 350.00]);
        $nicolas->ventas()->create(['fecha' => '2026-10-10', 'monto' => 455.50]);
        $nicolas->ventas()->create(['fecha' => '2026-11-20', 'monto' => 1500.80]);

        $rosa->ventas()->create(['fecha' => '2026-11-25', 'monto' => 2200.50]);
        $rosa->ventas()->create(['fecha' => '2026-11-25', 'monto' => 450.50]);

    }
}
