<?php


use Illuminate\Database\Seeder;

class StateCitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\State::truncate();
        \App\City::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $json = File::get("database/data/json/state-city.json");
        $data = json_decode($json);

        foreach ($data as $state=>$cities) {
            $dState = \App\State::create([
                'name' => $state
            ]);

            $c = [];
            foreach ($cities as $city) {
                $c[] = [
                    'name' => $city,
                    'state_id' => $dState->id,
                ];
            }
            \App\City::insert($c);
        }
    }
}
