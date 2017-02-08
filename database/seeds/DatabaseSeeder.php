<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

	/**
	 * Insere os dados nescessários para o sistema rodar a primeira vez.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
                        
		Model::reguard();
	}

}
