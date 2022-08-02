<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventDocument;
use App\Models\EventImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Seminar Nasional',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'register_type' => 'SINGLE',
                'is_register' => 1
            ],
            [
                'name' => 'Lomba Video',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'register_type' => 'SINGLE',
                'is_register' => 1
            ],
            [
                'name' => 'Lomba Trading',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'register_type' => 'SINGLE',
                'is_register' => 1
            ],
            [
                'name' => 'SEKOLAH PASAR MODAL 1 & 2',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],
            [
                'name' => 'Sekolah Pasar Modal Lanjutan',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],
            [
                'name' => 'Bedah Paper',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],[
                'name' => 'IG LIVE',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],[
                'name' => 'Opening Account',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],[
                'name' => 'Pengembangan Pengetahuan Pengurus',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],[
                'name' => 'Share it',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],[
                'name' => 'Upgrading Investor',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],

        ];

        foreach($data as $eachData)
        {
            Event::create($eachData);
        }

        $dataImage = [
            [
                'event_id' => 1,
                'image' => '/storage/images/BannerSeminar.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 2,
                'image' => '/storage/images/BannerVideo.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 3,
                'image' => '/storage/images/BannerTrading.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 4,
                'image' => '/storage/images/SPM.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 5,
                'image' => '/storage/images/SPML.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 6,
                'image' => '/storage/images/BEDAHPAPER.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 7,
                'image' => '/storage/images/IGLIVE.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 8,
                'image' => '/storage/images/OA.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 9,
                'image' => '/storage/images/P3.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 10,
                'image' => '/storage/images/SHAREIT.png',
                'thumbnail' => 1
            ],
            [
                'event_id' => 11,
                'image' => '/storage/images/UPGRADING.png',
                'thumbnail' => 1
            ],

        ];

        foreach($dataImage as $eachImage)
        {
            EventImage::create($eachImage);
        }

        $dataDocument = [
            [
                'event_id' => 1,
                'name' => 'File Ajah Y',
                'document' => '/storage/file/booklet.pdf'
            ],[
                'event_id' => 1,
                'name' => 'File Ajah D',
                'document' => '/storage/file/booklet.pdf'
            ],[
                'event_id' => 2,
                'name' => 'File Ajah',
                'document' => '/storage/file/booklet.pdf'
            ],[
                'event_id' => 2,
                'name' => 'File Ajah',
                'document' => '/storage/file/booklet.pdf'
            ],[
                'event_id' => 3,
                'name' => 'File Ajah',
                'document' => '/storage/file/booklet.pdf'
            ],
        ];

        foreach ($dataDocument as $eachDoc)
        {
            EventDocument::create($eachDoc);
        }
    }
}
