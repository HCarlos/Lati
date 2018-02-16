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

        // Editorial::create(['no' => 0, 'nombre' => 'prueba', 'representante' => '',]);
        Editorial::create(['no'=>1,'nombre'=>'Editorial Nueva Imagen','representante'=>'',]);
        Editorial::create(['no'=>2,'nombre'=>'Editorial Santillana','representante'=>'',]);
        Editorial::create(['no'=>3,'nombre'=>'Ediciones SM','representante'=>'',]);
        Editorial::create(['no'=>4,'nombre'=>'Editorial Nuevo México','representante'=>'',]);
        Editorial::create(['no'=>5,'nombre'=>'Editorial Esfinge','representante'=>'',]);
        Editorial::create(['no'=>6,'nombre'=>'Publicaciones Cultural','representante'=>'',]);
        Editorial::create(['no'=>7,'nombre'=>'Thomson','representante'=>'',]);
        Editorial::create(['no'=>8,'nombre'=>'Prentice Hall','representante'=>'',]);
        Editorial::create(['no'=>9,'nombre'=>'Editorial Norma','representante'=>'',]);
        Editorial::create(['no'=>10,'nombre'=>'Limusa / Noriega editores','representante'=>'',]);
        Editorial::create(['no'=>11,'nombre'=>'SEP','representante'=>'',]);
        Editorial::create(['no'=>12,'nombre'=>'LAROUSSE','representante'=>'',]);
        Editorial::create(['no'=>13,'nombre'=>'Trillas','representante'=>'',]);
        Editorial::create(['no'=>14,'nombre'=>'Mc Graw Hill','representante'=>'',]);
        Editorial::create(['no'=>16,'nombre'=>'Libris Editores','representante'=>'',]);
        Editorial::create(['no'=>17,'nombre'=>'ST Editorial','representante'=>'',]);
        Editorial::create(['no'=>18,'nombre'=>'OXFORD','representante'=>'',]);
        Editorial::create(['no'=>19,'nombre'=>'FERNÁNDEZ editores','representante'=>'',]);
        Editorial::create(['no'=>20,'nombre'=>'CASTILLO','representante'=>'',]);
        Editorial::create(['no'=>21,'nombre'=>'Editorial PATRIA','representante'=>'',]);
        Editorial::create(['no'=>22,'nombre'=>'MACMILLAN','representante'=>'',]);
        Editorial::create(['no'=>23,'nombre'=>'Ediciones Angeles','representante'=>'',]);
        Editorial::create(['no'=>24,'nombre'=>'NUEVA EDITORIAL LUCERO','representante'=>'',]);
        Editorial::create(['no'=>25,'nombre'=>'Editorial PROGRESO','representante'=>'',]);
        Editorial::create(['no'=>26,'nombre'=>'CONACULTA','representante'=>'',]);
        Editorial::create(['no'=>27,'nombre'=>'CECSA','representante'=>'',]);
        Editorial::create(['no'=>28,'nombre'=>'CENGAGE Learning','representante'=>'',]);
        Editorial::create(['no'=>29,'nombre'=>'Pearson Educación','representante'=>'',]);
        Editorial::create(['no'=>30,'nombre'=>'UNESCO','representante'=>'',]);
        Editorial::create(['no'=>31,'nombre'=>'SDI','representante'=>'',]);
    }
}
