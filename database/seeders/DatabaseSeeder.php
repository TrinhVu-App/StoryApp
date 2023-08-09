<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Page;
use App\Models\Story;
use App\Models\Touchable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $audioDir = "storage/app/public/audios";
        $audios = array_diff(scandir($audioDir), array('.', '..'));

        foreach ($audios as $audio) {
            DB::table('audios')->insert([
                'name' => $audio,
                'src' => $audioDir . "/" . $audio,
                'url' => asset($audioDir . "/" . $audio)
            ]);
        }

        $imageDir = "storage/app/public/images";
        $images = array_diff(scandir($imageDir), array('.', '..'));

        foreach ($images as $image) {
            DB::table('images')->insert([
                'name' => $image,
                'src' => $imageDir . "/" . $image,
                'url' => asset($imageDir . "/" . $image)
            ]);
        }

        $stories = Story::factory(10)->create();
        $pageCount = 0;
         foreach ($stories as $story) {
             //pageSeeder goes here
             $pageTotal= random_int(1, 13);
             for ($i = 0; $i < $pageTotal; $i++) {
                 Page::factory(1)->create([
                     'pageNum' => $i+1
                 ]);
                 $pageCount++;
             }
         };
         for ($i = 0; $i<$pageCount; $i++) {
             //TouchableSeeder goes here
             Touchable::factory(10)->create([
                 'pageID' => $i+1
             ]);
         }
    }
}
