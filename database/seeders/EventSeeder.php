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
                'name' => 'Sekolah Pasar Modal',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],
            [
                'name' => 'Upgrading Investor 1',
                'location' => 'RSG POLINES',
                'date' => '2022-08-1 12:31:41',
                'description' => '123',
                'is_register' => 0
            ],
            [
                'name' => 'Upgrading Investor 2',
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

        // $dataImage = [
        //     [
        //         'event_id' => 1,
        //         'image' => '/storage/photo/seminar.jpeg',
        //         'thumbnail' => 1
        //     ],
        //     [
        //         'event_id' => 2,
        //         'image' => '/storage/photo/seminar.jpeg',
        //         'thumbnail' => 1
        //     ],
        //     [
        //         'event_id' => 3,
        //         'image' => '/storage/photo/seminar.jpeg',
        //         'thumbnail' => 1
        //     ],
        //     [
        //         'event_id' => 4,
        //         'image' => '/storage/photo/seminar.jpeg',
        //         'thumbnail' => 1
        //     ],
        //     [
        //         'event_id' => 5,
        //         'image' => '/storage/photo/seminar.jpeg',
        //         'thumbnail' => 1
        //     ],
        //     [
        //         'event_id' => 6,
        //         'image' => '/storage/photo/seminar.jpeg',
        //         'thumbnail' => 1
        //     ],
        // ];

        // foreach($dataImage as $eachImage)
        // {
        //     EventImage::create($eachImage);
        // }

        // $dataDocument = [
        //     [
        //         'event_id' => 1,
        //         'name' => 'File Ajah Y',
        //         'document' => '/storage/file/booklet.pdf'
        //     ],[
        //         'event_id' => 1,
        //         'name' => 'File Ajah D',
        //         'document' => '/storage/file/booklet.pdf'
        //     ],[
        //         'event_id' => 2,
        //         'name' => 'File Ajah',
        //         'document' => '/storage/file/booklet.pdf'
        //     ],[
        //         'event_id' => 2,
        //         'name' => 'File Ajah',
        //         'document' => '/storage/file/booklet.pdf'
        //     ],[
        //         'event_id' => 3,
        //         'name' => 'File Ajah',
        //         'document' => '/storage/file/booklet.pdf'
        //     ],
        // ];

        // foreach ($dataDocument as $eachDoc)
        // {
        //     EventDocument::create($eachDoc);
        // }
    }
}
