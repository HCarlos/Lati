<?php

use App\Models\Editorial;
use Illuminate\Database\Seeder;

class AgregarEditorialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Editorial::query()->truncate();
        // $edito->truncate();

        // Editorial::create(['no' => 0, 'editorial' => 'prueba', 'representante' => '',]);
        Editorial::create(['no'=>1,'editorial'=>'Editorial Nueva Imagen','representante'=>'',]);
        Editorial::create(['no'=>2,'editorial'=>'Editorial Santillana','representante'=>'',]);
        Editorial::create(['no'=>3,'editorial'=>'Ediciones SM','representante'=>'',]);
        Editorial::create(['no'=>4,'editorial'=>'Editorial Nuevo México','representante'=>'',]);
        Editorial::create(['no'=>5,'editorial'=>'Editorial Esfinge','representante'=>'',]);
        Editorial::create(['no'=>6,'editorial'=>'Publicaciones Cultural','representante'=>'',]);
        Editorial::create(['no'=>7,'editorial'=>'Thomson','representante'=>'',]);
        Editorial::create(['no'=>8,'editorial'=>'Prentice Hall','representante'=>'',]);
        Editorial::create(['no'=>9,'editorial'=>'Editorial Norma','representante'=>'',]);
        Editorial::create(['no'=>10,'editorial'=>'Limusa / Noriega editores','representante'=>'',]);
        Editorial::create(['no'=>11,'editorial'=>'SEP','representante'=>'',]);
        Editorial::create(['no'=>12,'editorial'=>'LAROUSSE','representante'=>'',]);
        Editorial::create(['no'=>13,'editorial'=>'Trillas','representante'=>'',]);
        Editorial::create(['no'=>14,'editorial'=>'Mc Graw Hill','representante'=>'',]);
        Editorial::create(['no'=>16,'editorial'=>'Libris Editores','representante'=>'',]);
        Editorial::create(['no'=>17,'editorial'=>'ST Editorial','representante'=>'',]);
        Editorial::create(['no'=>18,'editorial'=>'OXFORD','representante'=>'',]);
        Editorial::create(['no'=>19,'editorial'=>'FERNÁNDEZ editores','representante'=>'',]);
        Editorial::create(['no'=>20,'editorial'=>'CASTILLO','representante'=>'',]);
        Editorial::create(['no'=>21,'editorial'=>'Editorial PATRIA','representante'=>'',]);
        Editorial::create(['no'=>22,'editorial'=>'MACMILLAN','representante'=>'',]);
        Editorial::create(['no'=>23,'editorial'=>'Ediciones Angeles','representante'=>'',]);
        Editorial::create(['no'=>24,'editorial'=>'NUEVA EDITORIAL LUCERO','representante'=>'',]);
        Editorial::create(['no'=>25,'editorial'=>'Editorial PROGRESO','representante'=>'',]);
        Editorial::create(['no'=>26,'editorial'=>'CONACULTA','representante'=>'',]);
        Editorial::create(['no'=>27,'editorial'=>'CECSA','representante'=>'',]);
        Editorial::create(['no'=>28,'editorial'=>'CENGAGE Learning','representante'=>'',]);
        Editorial::create(['no'=>29,'editorial'=>'Pearson Educación','representante'=>'',]);
        Editorial::create(['no'=>30,'editorial'=>'UNESCO','representante'=>'',]);
        Editorial::create(['no'=>31,'editorial'=>'SDI','representante'=>'',]);
    }
}
