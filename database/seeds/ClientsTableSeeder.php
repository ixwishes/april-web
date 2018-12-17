<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $defaultClients = [
          [
              'name' => 'Pikachu',

          ],
          [
              'name' => 'Squirtle',

          ],
          [
              'name' => 'Charmander',

          ],
          [
              'name' => 'Eevee',

          ], 
      ];

      foreach ($defaultClients as $client)
          DB::table('clients')->insert($client);

    }
}
