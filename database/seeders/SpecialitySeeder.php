<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Speciality::query()->truncate();
        $specialities =
            ['Anesthesia Technology',
             'Cardiology',
             'Dental Hygienist',
             'Dentistry',
             'Dermatology',
             'Dialysis Therapy',
             'ECG and CT Scan Technician',
             'Family & Community Medicine',
             'General Surgery',
             'Geriatric Medicine',
             'GIT and Hepatology',
             'Hematology',
             'HIV and Family Education',
             'Home Based Health Care',
             'Hospital & Health Management',
             'Hospital Administration',
             'Infectious Disease',
             'Internal Medicine',
             'Maternal & Child Health',
             'Medical Imaging Technology',
             'Medical Lab. Technology',
             'Medical Record Technology',
             'Neurology',
             'Neurosurgery',
             'Nuclear Medicine Technology',
             'Nursing',
             'Nursing Care Assistant',
             'Obstetrics and Gynecology',
             'Occupational Therapy',
             'Oncology',
             'Operation Theatre Technology',
             'Ophthalmology',
             'Optometry',
             'Optometry & Ophthalmic Technology',
             'Orthopedics',
             'Otorhinolaryngology (ORL)',
             'Palliative Medicine',
             'Pathology',
             'Pediatric Surgery',
             'Pediatrics',
             'Pharmacy',
             'Physiotherapy',
             'Plastic and Reconstructive Surgery',
             'Psychiatry',
             'Pulmonology',
             'Radiology',
             'Rehabilitation Medicine',
             'Rheumatology',
             'Rural Health Care',
             'Technician/ Lab Assistant',
             'Thoracic Surgery',
             'Urology',
             'Vascular Surgery',
             'Veterinary & Public Health',
             'X-Ray Technician',
            ];

        foreach ($specialities as $speciality) {
            Speciality::firstOrCreate([
                                          'name_en' => $speciality,
                                          'name_ar' => $speciality
                                      ]);
        }
    }
}
