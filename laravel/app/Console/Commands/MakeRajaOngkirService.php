<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRajaOngkirService extends Command
{
    protected $signature = 'make:rajaongkirs';
    protected $description = 'Create RajaOngkirService in app/Services directory';

    public function handle()
    {
        $servicePath = app_path('Services/RajaOngkirService.php');
        $stub = File::get(base_path('stubs/rajaongkir-service.stub'));

        File::put($servicePath, $stub);

        $this->info('RajaOngkirService created successfully.');
    }
}
