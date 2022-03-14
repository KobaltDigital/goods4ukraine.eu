<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class AdSeeder extends Seeder
{
    public function run()
    {
        $testLocations = [
            'Heemskerk' => [52.5061136719872, 4.689069093228484],
            'Egmond' => [52.610443816212296, 4.650909304608522],
            'Vondelpark' => [52.36113021822991, 4.877993243224219],
            'Utrecht' => [52.09340422760812, 5.119130241365936],
            'Den Haag' => [52.07274305012605, 4.325248010364942],
            'Rotterdam' => [51.92030842157423, 4.490684512526803],
        ];

        foreach ($testLocations as $city => $testLocation) {
            $user = User::inRandomOrder()->first();
            Ad::factory()
                ->create([
                    'user_id' => $user->id,
                    'city' => $city,
                    'location' => new Point(...$testLocation)
                ]);
        }
    }
}
