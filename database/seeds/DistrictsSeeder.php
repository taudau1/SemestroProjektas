<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rajonaiRaw = 'Aleksotas,Amaliai,Aukštieji Šančiai,Aukštutiniai Kaniūkai,Centras,Dainava,Eiguliai,Freda,Kalniečiai,Kleboniškis,Lampėdžiai,Marvelė,Palemonas,Panemunė,Petrašiūnai,Rokai,Romainiai,Sargėnai,Senamiestis,Šilainiai,Vaišvydava,Vičiūnai,Vilijampolė,Vytėnai,Žaliakalnis,Žemieji Šančiai,Žemutiniai Kaniūkai';
        $rajonai = explode(',', $rajonaiRaw);
        
        foreach ($rajonai as $rajonas) {
            $district = new District(['name' => $rajonas]);
            $district->save();
        }
    }
}
