<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DalilDestinationsEntities;
use App\Models\SubDestinationsEntities;

class DalilEntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_entity = SubDestinationsEntities::create([
            'id' => '1',
            'name' => 'مدينة بورفؤاد',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '2',
            'name' => 'حى الشرق',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '3',
            'name' => 'حى المناخ',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '4',
            'name' => 'حى الضواحى',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '5',
            'name' => 'حى العرب',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '6',
            'name' => 'حى الزهور',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '7',
            'name' => 'حى غرب',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '8',
            'name' => 'حى الجنوب',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '9',
            'name' => 'مستشفيات',
        ]);

        $sub_entity = SubDestinationsEntities::create([
            'id' => '10',
            'name' => 'مراكز طبية',
        ]);

// ================================================================================================

        $entity = DalilDestinationsEntities::create([
            'id' => '1',
            'entity' => 'مكتب المحافظ',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '2',
            'entity' => 'مكتب نائب المحافطظ',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '3',
            'entity' => 'مكتب السكرتير العام',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '4',
            'entity' => 'مكتب السكرتير العام المساعد',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '5',
            'entity' => 'ادارات الديوان العام',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '6',
            'entity' => 'المديريات',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '7',
            'entity' => 'مديرية التربية والتعليم',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '8',
            'entity' => 'قطاع شبكات الكهرباء',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '9',
            'entity' => 'الشركة القابضة لمياه الشرب والصرف الصحى بورسعيد ـ دمياط',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '10',
            'entity' => 'هيئة قناة السويس (قطاع شبكات مياه بورسعيد ورى إسماعيلية)',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '11',
            'entity' => 'الجهاز التنفيذى',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '12',
            'entity' => 'المصالح الحكومية',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '13',
            'entity' => 'الشركات',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '14',
            'entity' => 'الجامعات',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '15',
            'entity' => 'المدارس',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '16',
            'entity' => 'الاندية',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '17',
            'entity' => 'ارقام السادة مسئولين بشركة تاون جاس',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '18',
            'entity' => 'الاحياء',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '19',
            'entity' => 'مسئولى الاحياء',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '20',
            'entity' => 'سكرتيرى الاحياء',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '21',
            'entity' => 'هيئة الاسعاف',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '22',
            'entity' => 'الهيئة العامة للرعاية الصحية (التامين الشامل - مديرية الشئون الصحية)',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '23',
            'entity' => 'مستشفيات حكومية (مديرى المستشفيات)',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '24',
            'entity' => 'ارقام غرفة العمليات المركزية بمجلس الوزراء ومركز المعلومات ودعم القرار',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '25',
            'entity' => 'ارقام يستعان بها أثناء زيارة رئيس مجلس الوزراء',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '26',
            'entity' => 'حالات طوارئ',
        ]);

        $entity = DalilDestinationsEntities::create([
            'id' => '27',
            'entity' => 'ارقام مسئولى جهات مختلفة',
        ]);

// ================================================================================================

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '1',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '1',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '2',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '2',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '3',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '3',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '4',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '4',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '5',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '5',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '6',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '6',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '7',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '7',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '8',
            'dalil_destinations_entities_id' => '18',
            'sub_destinations_entities_id' => '8',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '9',
            'dalil_destinations_entities_id' => '22',
            'sub_destinations_entities_id' => '9',
        ]);

        $subEntity_entity = DB::table('dalil_destinations_entities_sub_destinations_entities')->insert([
            'id' => '10',
            'dalil_destinations_entities_id' => '22',
            'sub_destinations_entities_id' => '10',
        ]);
    }
}
