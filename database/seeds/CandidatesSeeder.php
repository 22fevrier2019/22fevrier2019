<?php

use Illuminate\Database\Seeder;

class CandidatesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = \App\User::create([
            'name' => 'test tset',
            'email' => 'test@fev22.dz',
            'password' => bcrypt('password'),
        ]);

        $candidate1 = \App\Candidate::create([
            'slug' => 'mustapha-bouchachi',
            'name' => 'Mustapha Bouchachi',
            'info' => 'Mustapha Bouchachi est un homme politique algérien, né en Algérie dans la wilaya de Jijel.',
            'about' => 'Mustapha Bouchachi est né en 1954 à Mechta Aazib, Douar Bouyoucef (Commune actuelle de Sidi Abdelaziz) dans la wilaya de Jijel 1.
Fils de chahid, il a été scolarisé après 1962 dans un centre d’enfants de chouhada à Oued Aïssi, près de Tizi Ouzou2.
Issu d’une famille de révolutionnaires, Mustapha n’avait que 6 ans lorsque son père Mokhtar, moudjahid, tué en 1960 lors d’un bombardement dans la Wilaya II3.',
            'carrer' => 'Au début des années 1980, de retour à Alger après ses études au Royaume uni, Mustapha Bouchachi a enseigné à la faculté de droit de l\'Université d\'Alger7.
Il y a dispensé des cours de procédures pénales8.
Il s\'est aussi inscrit au barreau d\'Alger pour exercer le métier d’avocat9.',
            'picture' => 'm_b.jpg',
            'birth_date' => '1954-01-01',
            'extra_info' => 'Lors des Élections législatives algériennes de 2012, Mustapha Bouchachi a été élu comme député du FFS à l\'Assemblée populaire nationale (APN) pour la wilaya d\'Alger11,12.
Il a démissionné de son mandat de députation en mars 2014 pour être remplacé par Mohamed Nebbou.',
            'user_id' => $user->id,
        ]);

        $candidate2 = \App\Candidate::create([
            'slug' => 'karim-tabou',
            'name' => 'Karim Tabou',
            'info' => 'Karim Tabou est le premier secrétaire national du Front des forces socialistes (FFS), le parti algérien fondé en septembre 1963 par Hocine Aït Ahmed',
            'about' => '...',
            'carrer' => '...',
            'picture' => 'k_t.jpg',
            'birth_date' => date('1973-06-02'),
            'extra_info' => 'Tabbou est premier secrétaire du FFS, principal parti d’opposition en Algérie, de 2006 à 2011. Il est remplacé par Ali Laskri1.',
            'user_id' => $user->id,
        ]);

        $candidate1->likes()->attach($user->id);

    }
}
