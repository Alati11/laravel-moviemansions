<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visits = [
            [
                "building_id" => 1,
                "time" => "2024-01-19 02:10:03",
                "ip_address" => "192.168.1.1"
            ],
            [
                "building_id" => 1,
                "time" => "2024-01-25 08:45:21",
                "ip_address" => "203.120.34.56"
            ],
            [
                "building_id" => 1,
                "time" => "2024-01-10 12:30:15",
                "ip_address" => "192.168.0.123"
            ],
            [
                "building_id" => 5,
                "time" => "2024-01-21 02:10:03",
                "ip_address" => "192.168.1.1"
            ],
            [
                "building_id" => 5,
                "time" => "2024-01-12 08:45:21",
                "ip_address" => "203.120.34.56"
            ],
            [
                "building_id" => 8,
                "time" => "2024-01-02 12:30:15",
                "ip_address" => "192.168.0.123"
            ],
            [
                "building_id" => 9,
                "time" => "2024-01-27 15:20:45",
                "ip_address" => "172.16.20.5"
            ],
            [
                "building_id" => 13,
                "time" => "2024-01-22 18:55:12",
                "ip_address" => "198.51.100.22"
            ],
            [
                "building_id" => 8,
                "time" => "2024-01-13 22:40:30",
                "ip_address" => "10.0.0.77"
            ],
            [
                "building_id" => 5,
                "time" => "2024-01-12 03:15:09",
                "ip_address" => "192.168.2.200"
            ],
            [
                "building_id" => 9,
                "time" => "2024-01-05 06:50:36",
                "ip_address" => "172.16.10.15"
            ],
            [
                "building_id" => 13,
                "time" => "2024-01-24 10:25:24",
                "ip_address" => "203.0.113.8"
            ],
            [
                "building_id" => 1,
                "time" => "2024-02-01 14:00:50",
                "ip_address" => "192.168.3.45"
            ],
            [
                "building_id" => 5,
                "time" => "2024-01-03 17:35:18",
                "ip_address" => "198.18.5.60"
            ],
            [
                "building_id" => 8,
                "time" => "2024-01-09 21:10:42",
                "ip_address" => "172.16.30.12"
            ],
            [
                "building_id" => 9,
                "time" => "2024-02-12 00:45:59",
                "ip_address" => "192.168.4.89"
            ],
            [
                "building_id" => 13,
                "time" => "2024-01-22 04:20:27",
                "ip_address" => "203.120.67.33"
            ],
            [
                "building_id" => 8,
                "time" => "2024-01-30 07:55:14",
                "ip_address" => "192.168.5.176"
            ],
            [
                "building_id" => 9,
                "time" => "2024-02-10 11:30:40",
                "ip_address" => "172.16.40.94"
            ],
            [
                "building_id" => 1,
                "time" => "2024-01-18 15:05:57",
                "ip_address" => "198.51.200.18"
            ],
            [
                "building_id" => 5,
                "time" => "2024-01-22 18:40:23",
                "ip_address" => "10.0.0.124"
            ],
            [
                "building_id" => 8,
                "time" => "2024-01-06 22:15:49",
                "ip_address" => "192.168.6.57"
            ],
            [
                "building_id" => 9,
                "time" => "2024-01-15 08:30:45",
                "ip_address" => "192.168.7.32"
            ],
            [
                "building_id" => 13,
                "time" => "2024-01-20 14:15:22",
                "ip_address" => "203.120.45.78"
            ],
            [
                "building_id" => 1,
                "time" => "2024-01-03 18:45:30",
                "ip_address" => "192.168.8.91"
            ],
            [
                "building_id" => 8,
                "time" => "2024-01-25 23:10:57",
                "ip_address" => "172.16.50.11"
            ],
            [
                "building_id" => 9,
                "time" => "2024-01-30 03:35:24",
                "ip_address" => "198.51.250.44"
            ],
            [
                "building_id" => 13,
                "time" => "2024-02-07 09:00:50",
                "ip_address" => "10.0.0.88"
            ],
            [
                "building_id" => 1,
                "time" => "2024-02-10 13:25:18",
                "ip_address" => "192.168.9.156"
            ],
            [
                "building_id" => 8,
                "time" => "2024-02-15 17:50:46",
                "ip_address" => "172.16.60.22"
            ],
            [
                "building_id" => 13,
                "time" => "2024-02-10 22:15:24",
                "ip_address" => "203.0.113.74"
            ],
            [
                "building_id" => 9,
                "time" => "2024-02-15 02:40:50",
                "ip_address" => "192.168.10.189"
            ],
            [
                "building_id" => 24,
                "time" => "2024-01-08 09:20:35",
                "ip_address" => "192.168.2.200"
            ],
            [
                "building_id" => 24,
                "time" => "2024-01-15 14:45:10",
                "ip_address" => "203.120.67.33"
            ],
            [
                "building_id" => 24,
                "time" => "2024-02-02 18:10:22",
                "ip_address" => "172.16.10.15"
            ],
            [
                "building_id" => 24,
                "time" => "2024-02-09 23:35:55",
                "ip_address" => "198.51.200.18"
            ],
            [
                "building_id" => 24,
                "time" => "2024-02-18 10:05:30",
                "ip_address" => "10.0.0.124"
            ],
        ];

        foreach ($visits as $visit) {

            $new_visit = new Visit();
            $new_visit->building_id = $visit['building_id'];
            $new_visit->ip_address = $visit['ip_address'];
            $new_visit->time = $visit['time'];

            $new_visit->save();
        }
    }
}
