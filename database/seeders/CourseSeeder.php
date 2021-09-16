<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::firstOrCreate([
            'title_en'           => 'online event',
            'title_ar'           => 'اونلاين ايفنت',
            'price'           => '10.00',
            'start_date'      => '2021-7-30 6:00',
            'end_date'        => '2021-7-31 6:00',
            'hours_count'     => '5',
            'description_en'     => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'description_ar'     => 'وريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستري',
            'cme_count'       => '3',
            'certificate'     => '0',
            'type_id'         => '1',
            'from'            => '12:00',
            'to'              => '13:00',
            'organization_id' => '5'
        ]);

        Course::firstOrCreate([
            'title_en'           => 'online course',
            'title_ar'           => 'اونلاين كورس',
            'price'           => '10.00',
            'start_date'      => '2021-9-30 6:00',
            'end_date'        => '2021-10-1 6:00',
            'hours_count'     => '5',
            'description_en'     => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'description_ar'     => 'وريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستري',
            'cme_count'       => '3',
            'certificate'     => '0',
            'type_id'         => '2',
            'from'            => '12:00',
            'to'              => '13:00',
            'organization_id' => '4'
        ]);

        Course::firstOrCreate([
            'title_en'           => 'recorded',
            'title_ar'           => 'مسجل',
            'price'           => '10.00',
            'start_date'      => '2021-9-30 6:00',
            'end_date'        => '2021-10-1 6:00',
            'hours_count'     => '5',
            'description_en'     => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'description_ar'     => 'وريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستري',
            'cme_count'       => '1',
            'certificate'     => '1',
            'type_id'         => '3',
            'from'            => '12:00',
            'to'              => '13:00',
            'organization_id' => '3'
        ]);

        Course::firstOrCreate([
            'title_en'           => 'physical',
            'title_ar'           => 'مادي',
            'price'           => '0',
            'start_date'      => '2021-9-30 6:00',
            'end_date'        => '2021-10-1 6:00',
            'hours_count'     => '5',
            'description_en'     => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'description_ar'     => 'وريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستري',
            'cme_count'       => '2',
            'certificate'     => '0',
            'type_id'         => '4',
            'from'            => '12:00',
            'to'              => '13:00',
            'organization_id' => '2',
            'seats'           => 20
        ]);

        Course::firstOrCreate([
            'title_en'           => 'hybrid',
            'title_ar'           => 'مزدوج',
            'price'           => '10.00',
            'start_date'      => '2021-9-30 6:00',
            'end_date'        => '2021-10-1 6:00',
            'hours_count'     => '5',
            'description_en'     => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'description_ar'     => 'وريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستري',
            'cme_count'       => '2',
            'certificate'     => '0',
            'type_id'         => '5',
            'from'            => '12:00',
            'to'              => '13:00',
            'organization_id' => '1',
            'seats'           => 10
        ]);
    }
}
