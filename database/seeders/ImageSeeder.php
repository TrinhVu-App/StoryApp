<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageDir = "storage/app/public/images";
        $images = array_diff(scandir($imageDir), array('.', '..'));

        foreach ($images as $image) {
            DB::table('images')->insert([
                'name' => $image,
                'src' => "/storage/images/" . $image,
                'url' => asset("/storage/images/" . $image)
            ]);
        }
    }
}
