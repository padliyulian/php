<?php

use Illuminate\Database\Seeder;
use App\Models\Meeting;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->truncate();
        DB::table('employee_meeting')->truncate();

        $meeting = Meeting::create(['name' => 'meeting planing project web pt abs', 'description' => 'pembentukan team dan pembagian skop kerja beserta deadline', 'time' => '2019-12-01 13:00:00', 'location' => 'main office jakarta selatan, ruang meeting latai 2']);
        $meeting->employees()->attach([1,2,3,4,5,6,7]);

        $meeting = Meeting::create(['name' => 'meeting team SQA project pt nusantara steel', 'description' => 'pembahasan hasil SQA', 'time' => '2019-12-02 09:00:00', 'location' => 'main office jakarta selatan, ruang meeting latai 1']);
        $meeting->employees()->attach([1,2,3,4,5,6]);

        $meeting = Meeting::create(['name' => 'meeting team front end & back end', 'description' => 'pembahasan progress kerja team', 'time' => '2019-12-05 13:00:00', 'location' => 'branch office jakarta pusat, ruang meeting latai 5']);
        $meeting->employees()->attach([1,2,3,4,5]);
    }
}
