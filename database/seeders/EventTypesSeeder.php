<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventTypes;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  insert users   */
        $event_type = EventTypes::create([
            'id' => '1',
            'name' => 'تصدع وإنهيار عقار',
        ]);

        $event_type = EventTypes::create([
            'id' => '2',
            'name' => 'طرق ومواصلات',
        ]);

        $event_type = EventTypes::create([
            'id' => '3',
            'name' => 'حريق',
        ]);

        $event_type = EventTypes::create([
            'id' => '4',
            'name' => 'مياه شرب',
        ]);
        $event_type = EventTypes::create([
            'id' => '5',
            'name' => 'تلوث بيئى',
        ]);

        $event_type = EventTypes::create([
            'id' => '6',
            'name' => 'صرف صحى',
        ]);
        $event_type = EventTypes::create([
            'id' => '7',
            'name' => 'حوادث طرق',
        ]);

        $event_type = EventTypes::create([
            'id' => '8',
            'name' => 'أحداث شغب',
        ]);

        $event_type = EventTypes::create([
            'id' => '9',
            'name' => 'إنفجار',
        ]);

        $event_type = EventTypes::create([
            'id' => '10',
            'name' => 'تيار كهربائى',
        ]);

        $event_type = EventTypes::create([
            'id' => '11',
            'name' => 'تسمم',
        ]);

        $event_type = EventTypes::create([
            'id' => '12',
            'name' => 'زلزال',
        ]);

        $event_type = EventTypes::create([
            'id' => '13',
            'name' => 'إنفجار ماسورة غاز',
        ]);

        $event_type = EventTypes::create([
            'id' => '14',
            'name' => 'أخرى',
        ]);

    }
}
