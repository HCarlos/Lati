<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class InitUserProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idemp  = 1;
        $perm = Permission::findOrCreate('profesor_consulta','web');
        $role = Role::findOrCreate('profesor','web');
        if ( !$role->hasPermissionTo($perm) ){
            $role->givePermissionTo($perm);
        }

        User::findOrCreateUserWithRole('pro0318','ALARCON MUGICA CYNTHIA ESTHER','liberiasum@gmail.com','pro0318',1508,$idemp,$role);
        User::findOrCreateUserWithRole('pro0333','ARIAS HERNANDEZ GUADALUPE','pro0333@mail.com','pro0333',4736,$idemp,$role);
        User::findOrCreateUserWithRole('pro0106','ARIAS HERNANDEZ SOFIA ELENA','sofiaelena71@gmail','pro0106',1361,$idemp,$role);
        User::findOrCreateUserWithRole('pro0108','ARIAS LOPEZ LUIS','luis_ariaslopez@hotmail.com','pro0108',1359,$idemp,$role);
        User::findOrCreateUserWithRole('pro0109','BAEZA ALEJANDRO VICENTA MARIA','vicenta.baeza@hotmail.com','pro0109',1358,$idemp,$role);
        User::findOrCreateUserWithRole('pro0112','BARCENAS SANTANA ANA CAROLINA','pro0112@mail.com','pro0112',1355,$idemp,$role);
        User::findOrCreateUserWithRole('pro0322','BARRAGAN CASTILLO GLORIA CAROLINA','pro0322@mail.com','pro0322',4378,$idemp,$role);
        User::findOrCreateUserWithRole('pro0113','BATALLA QUINTANA JESUS RAUL','rulbatalla@hotmail.com','pro0113',1354,$idemp,$role);
        User::findOrCreateUserWithRole('pro0115','BOLON TUN ISABEL DEL CARMEN','isabolon@gmail.com','pro0115',1352,$idemp,$role);
        User::findOrCreateUserWithRole('pro0116','BUSTILLOS RODRIGUEZ CARLA','cbustillosr@gmail.com','pro0116',1288,$idemp,$role);
        User::findOrCreateUserWithRole('pro0117','CAB CABRERA WENDY PATRICIA','marycaracoles_@hotmail.com','pro0117',1351,$idemp,$role);
        User::findOrCreateUserWithRole('pro0119','CANABAL RUSSI ELIA TERESA','elicanru@gmail.com','pro0119',1349,$idemp,$role);
        User::findOrCreateUserWithRole('pro0122','CARDENAS LARA MARTHA ESTHELA','martha.cardenas.lara@hotmai.com','pro0122',3859,$idemp,$role);
        User::findOrCreateUserWithRole('pro0123','CARRERA JIMENEZ MARIA CRYSTELL','crystell03@live.com.mx','pro0123',1345,$idemp,$role);
        User::findOrCreateUserWithRole('pro0125','CASTAÑEDA HERNANDEZ CARMEN JULIA','carmenju.87@gmail.com','pro0125',1343,$idemp,$role);
        User::findOrCreateUserWithRole('pro0126','CASTRO ACEVEDO VERONICA BEATRIZ','bever_7333@hotmail.com','pro0126',1342,$idemp,$role);
        User::findOrCreateUserWithRole('pro0129','CASTRO ROMERO MARIA GUADALUPE','castroguadalupe65@gmail.com','pro0129',1339,$idemp,$role);
        User::findOrCreateUserWithRole('pro0131','CECEÑA FOJACO PAMELA','pamelacf85@gmail.com','pro0131',1337,$idemp,$role);
        User::findOrCreateUserWithRole('pro0132','CHABLE GARCIA LISSYE NATALIA','misslissyechable@gmail.com','pro0132',1289,$idemp,$role);
        User::findOrCreateUserWithRole('pro0133','CHACON PEREZ FRANCISCA GUADALUPE','lupitachaconperez@hotmail.com','pro0133',1336,$idemp,$role);
        User::findOrCreateUserWithRole('pro0137','COLLADO MAYO JACQUELINE','jac_emy@hotmail.com','pro0137',1332,$idemp,$role);
        User::findOrCreateUserWithRole('pro0143','DE ALBA BELLIZZIA NANCY GUADALUPE','nancydealbab@gmail.com','pro0143',1286,$idemp,$role);
        User::findOrCreateUserWithRole('pro0146','DE LA FUENTE LOZANO ALMA JENEUSSE','pro0146@mail.com','pro0146',1324,$idemp,$role);
        User::findOrCreateUserWithRole('pro0150','DE YGARTUA Y MONTEVERDE EMILIO A.','eaygartua@hotmail.com','pro0150',1320,$idemp,$role);
        User::findOrCreateUserWithRole('pro0335','DIAZ ALVAREZ MAYRA','pro0335@mail.com','pro0335',4739,$idemp,$role);
        User::findOrCreateUserWithRole('pro0152','DIAZ LEZAMA GUADALUPE','ludiazle@hotmail.com','pro0152',1318,$idemp,$role);
        User::findOrCreateUserWithRole('pro0153','DIAZ LEZAMA MARIA TERESA','pro0153@mail.com','pro0153',1317,$idemp,$role);
        User::findOrCreateUserWithRole('pro0155','ESCOBAR BRAVO HAYDEE MARIA DEL CARMEN','haydeescobar@yahoo.com','pro0155',1315,$idemp,$role);
        User::findOrCreateUserWithRole('pro0158','ESPINOSA GALLEGOS FRANCISCO JAVIER','fcojeg@hotmail.com','pro0158',1312,$idemp,$role);
        User::findOrCreateUserWithRole('pro0160','EVIA AVALOS FRANCISCO JAVIER','paquitocas@hotmail.com','pro0160',1310,$idemp,$role);
        User::findOrCreateUserWithRole('pro0161','FLORES DORLES ESTHER','tetearjii2@hotmail.com','pro0161',1309,$idemp,$role);
        User::findOrCreateUserWithRole('pro0162','FLORES MAGON GARCIA GABRIELA','gabyfmg80@gmail.com','pro0162',1308,$idemp,$role);
        User::findOrCreateUserWithRole('pro0319','FRAWLEY . KRYSTAL MIREILLE','pebbleslloo@hotmail.com','pro0319',1509,$idemp,$role);
        User::findOrCreateUserWithRole('pro0331','GARCIA LEON SCARLETT ADRIANA','pro0331@mail.com','pro0331',4735,$idemp,$role);
        User::findOrCreateUserWithRole('pro0316','GARCIA LEYVA MARCIA','mgl18464@gmail.com','pro0316',1506,$idemp,$role);
        User::findOrCreateUserWithRole('pro0169','GIORGANA LEON WENDY MARIA','wendy_giorgana@hotmail.com','pro0169',1302,$idemp,$role);
        User::findOrCreateUserWithRole('pro0330','GOMEZ HINOJOSA CARLOS ROBERTO','pro0330@mail.com','pro0330',4640,$idemp,$role);
        User::findOrCreateUserWithRole('pro0172','GOMEZ ZUÑIGA IVONNE','m23igz@yahoo.com.mx','pro0172',1269,$idemp,$role);
        User::findOrCreateUserWithRole('pro0174','GONZALEZ CASTELLANOS TERESA DE JESUS','tere.gonzalez.castellanos@yahoo.com.mx','pro0174',1296,$idemp,$role);
        User::findOrCreateUserWithRole('pro0175','GONZALEZ COVARRUBIAS SARA','saracovarrubias.g@gmail.com','pro0175',1295,$idemp,$role);
        User::findOrCreateUserWithRole('pro0181','GONZALEZ PULIDO GUILLERMO','memos.23@hotmail.com','pro0181',1369,$idemp,$role);
        User::findOrCreateUserWithRole('pro0186','HERNANDEZ HERNANDEZ MARTHA ALICIA','aly.hdez.2@gmail.com','pro0186',1374,$idemp,$role);
        User::findOrCreateUserWithRole('pro0187','HERNANDEZ LOPEZ MARTIN','martin.hernandez126@gmail.com','pro0187',1375,$idemp,$role);
        User::findOrCreateUserWithRole('pro0189','HERNANDEZ SANCHEZ ALMA DELIA','alma_delia_60@hotmail.com','pro0189',1377,$idemp,$role);
        User::findOrCreateUserWithRole('pro0328','HERNANDEZ SANTOS ABIGAIL','margallita@gmail.com','pro0328',4635,$idemp,$role);
        User::findOrCreateUserWithRole('pro0190','HERRERA CASANOVA TOMAS','musicaviva@live.com.mx','pro0190',1378,$idemp,$role);
        User::findOrCreateUserWithRole('pro0194','ISLAS HERNANDEZ HILDA ENRIQUETA','quetaislas@hotmail.com','pro0194',1382,$idemp,$role);
        User::findOrCreateUserWithRole('pro0195','JAUME PRIEGO TANIA GABRIELA','pro0195@mail.com','pro0195',1383,$idemp,$role);
        User::findOrCreateUserWithRole('pro0336','JERONIMO CARRILLO SWEMY DE JESUS','pro0336@mail.com','pro0336',4740,$idemp,$role);
        User::findOrCreateUserWithRole('pro0196','JIMENEZ DE LA CRUZ ALEJANDRO','arjii.prof.alexx@gmail.com','pro0196',1384,$idemp,$role);
        User::findOrCreateUserWithRole('pro0197','JIMENEZ MAYO MANUELA','manny.jm71@gmail.com','pro0197',1385,$idemp,$role);
        User::findOrCreateUserWithRole('pro0200','LAMOYI VILLAMIL LOURDES BEATRIZ','blamoyi@gmail.com','pro0200',1503,$idemp,$role);
        User::findOrCreateUserWithRole('pro0201','LANESTOSA CONTRERAS SARAY','abi1976@hotmail.com','pro0201',1388,$idemp,$role);
        User::findOrCreateUserWithRole('pro0337','LARA JIMENEZ GABRIELA CRISTELL','pro0337@mail.com','pro0337',4744,$idemp,$role);
        User::findOrCreateUserWithRole('pro0202','LASTRA GONZALEZ MARIA ELENA','ldgmalenalastra@hotmail.com','pro0202',1389,$idemp,$role);
        User::findOrCreateUserWithRole('pro0204','LEON ANDRADE LAURA VERONICA','laurisvla@hotmail.com','pro0204',1391,$idemp,$role);
        User::findOrCreateUserWithRole('pro0205','LEON GONZALEZ LEONOR ALEJANDRA','leon_leonor@hotmail.com','pro0205',1392,$idemp,$role);
        User::findOrCreateUserWithRole('pro0208','LIRA ORTIZ MARIA DE LOURDES','lululiraortiz@hotmail.com','pro0208',1395,$idemp,$role);
        User::findOrCreateUserWithRole('pro0211','LOPEZ LOPEZ BETY','betyllopez@hotmail.com','pro0211',1398,$idemp,$role);
        User::findOrCreateUserWithRole('pro0212','LOZANO BALDERAS ALMA ROSA','pro0212@mail.com','pro0212',1399,$idemp,$role);
        User::findOrCreateUserWithRole('pro0213','LUCIO ANDRADE MARIA GUADALUPE','lupitalucioandrade@yahoo.com','pro0213',1400,$idemp,$role);
        User::findOrCreateUserWithRole('dclutzow','LUTZOW LUNA DORA CONSUELO','doralutzow@gmail.com','dclutzow',1287,$idemp,$role);
        User::findOrCreateUserWithRole('pro0215','MACIAS GUEVARA GUADALUPE NINFA','lupita_fejc@hotmail.com','pro0215',1401,$idemp,$role);
        User::findOrCreateUserWithRole('pro0216','MADRIGAL AGUILAR LORIEN CRISTINA','lorienma71@hotmail.com','pro0216',1402,$idemp,$role);
        User::findOrCreateUserWithRole('pro0343','MALDONADO GUILLEN JENIFFER YAJABIBE','jenmalgui@yahoo.mx','pro0343',6435,$idemp,$role);
        User::findOrCreateUserWithRole('pro0221','MANZUR RECHY ROCIO','rochymr40@hotmail.com','pro0221',1407,$idemp,$role);
        User::findOrCreateUserWithRole('pro0223','MARRERO ROSALES ISMAEL','ishmarrero@gmail.com','pro0223',1409,$idemp,$role);
        User::findOrCreateUserWithRole('pro0224','MARTINEZ ALVAREZ PABLO','pablomartinez_54@hotmail.com','pro0224',1410,$idemp,$role);
        User::findOrCreateUserWithRole('pro0225','MARTINEZ MOGUEL EDITH DEL SOCORRO','pro0225@mail.com','pro0225',1411,$idemp,$role);
        User::findOrCreateUserWithRole('pro0226','MENA HERNANDEZ MARIA DE LOS ANGELES','pro0226@mail.com','pro0226',1412,$idemp,$role);
        User::findOrCreateUserWithRole('pro0235','MONDRAGON MARTINEZ ELIZABETH','pro0235@mail.com','pro0235',1421,$idemp,$role);
        User::findOrCreateUserWithRole('pro0236','MONTERO GARDUZA CLAUDIA GUADALUPE','missklau4u@hotmail.com','pro0236',1422,$idemp,$role);
        User::findOrCreateUserWithRole('pro0237','MONTERO GARDUZA SELENY','selymontero@yahoo.com','pro0237',1423,$idemp,$role);
        User::findOrCreateUserWithRole('pro0238','MONTOYA TREJO ROGELIO','imtfitness.80@hotmail.com','pro0238',1424,$idemp,$role);
        User::findOrCreateUserWithRole('pro0239','MORA FRANCO MINERVA EUNICE','mineymora00@hotmail.com','pro0239',1425,$idemp,$role);
        User::findOrCreateUserWithRole('pro0240','MORALES AGUILAR CARLOS MARIO','carlosmmorales3@gmail.com','pro0240',1426,$idemp,$role);
        User::findOrCreateUserWithRole('pro0243','MORALES LOPEZ ROSA IDALIA','ri.morales@hotmail.com','pro0243',1429,$idemp,$role);
        User::findOrCreateUserWithRole('pro0244','MORALES MISS LORENA DEL CARMEN','misslorena74@hotmail.com','pro0244',1430,$idemp,$role);
        User::findOrCreateUserWithRole('pro0245','MORALES SANCHEZ GRACIELA','mosag07@hotmail.com','pro0245',1431,$idemp,$role);
        User::findOrCreateUserWithRole('pro0321','MOZQUEDA ALVAREZ KAREN MERCEDES','pro0321@mail.com','pro0321',4377,$idemp,$role);
        User::findOrCreateUserWithRole('pro0246','NARANJO PEREZ ERIKA KARINA','karinaranjo79@gmail.com','pro0246',1432,$idemp,$role);
        User::findOrCreateUserWithRole('pro0247','NARVAEZ SILVA VENERANDA ISKRA','pro0247@mail.com','pro0247',1433,$idemp,$role);
        User::findOrCreateUserWithRole('pro0329','OLIVIER ORTIZ JENITD','futbol26_1@hotmail.com','pro0329',4634,$idemp,$role);
        User::findOrCreateUserWithRole('pro0250','ORDOÑEZ GUTIERREZ MARIA GUADALUPE','pro0250@mail.com','pro0250',1436,$idemp,$role);
        User::findOrCreateUserWithRole('pro0252','PARRILLAT FIGUEROA JIMENA PAOLA','mrsjimeparrillat@gmail.com','pro0252',1438,$idemp,$role);
        User::findOrCreateUserWithRole('pro0254','PAZ LOPEZ YOEL','yoepazlo@gmail.com','pro0254',1440,$idemp,$role);
        User::findOrCreateUserWithRole('pro0259','PEREZ LOPEZ ILIANA','lilip1975@hotmail.com','pro0259',1445,$idemp,$role);
        User::findOrCreateUserWithRole('pro0261','PEREZ MARTINEZ CLAUDIA DEL CARMEN','claudiaarji@gmail.com','pro0261',1447,$idemp,$role);
        User::findOrCreateUserWithRole('pro0264','PRIEGO MORALES YOCELIN','pro0264@mail.com','pro0264',1450,$idemp,$role);
        User::findOrCreateUserWithRole('pro0265','PULIDO PADILLA JOSUE','josuepulido11@gmail.com','pro0265',1451,$idemp,$role);
        User::findOrCreateUserWithRole('pro0267','QUE ZETINA JUAN','juan-que67@hotmail.com','pro0267',1453,$idemp,$role);
        User::findOrCreateUserWithRole('pro0268','RAMIREZ GARCIA MONICA ALICIA','pro0268@mail.com','pro0268',1454,$idemp,$role);
        User::findOrCreateUserWithRole('pro0269','RAMIREZ SOTO JOSE DOMINGO','jumapilly001@gmail.com','pro0269',1455,$idemp,$role);
        User::findOrCreateUserWithRole('pro0270','RAMON ALVARADO JOYCE EUNICE','pro0270@mail.com','pro0270',1456,$idemp,$role);
        User::findOrCreateUserWithRole('pro0370','RAMON HERNANDEZ JHONATAN','jhona_panda94@hotmail.com','pro0370',7254,$idemp,$role);
        User::findOrCreateUserWithRole('pro0271','REVUELTAS RODRIGUEZ TANIA','taniarevueltas@hotmail.com','pro0271',1457,$idemp,$role);
        User::findOrCreateUserWithRole('pro0281','ROMAN CAMARA JUANA MARIA','pro0281@mail.com','pro0281',1467,$idemp,$role);
        User::findOrCreateUserWithRole('pro0282','ROMAN SANCHEZ MARIA DE LOURDES','pro0282@mail.com','pro0282',1468,$idemp,$role);
        User::findOrCreateUserWithRole('pro0284','ROMERO MAGAÑA ROGER','royerdelgadoms@hotmail.com','pro0284',1470,$idemp,$role);
        User::findOrCreateUserWithRole('pro0286','ROMERO TAPIA ESTRELLA','pro0286@mail.com','pro0286',1472,$idemp,$role);
        User::findOrCreateUserWithRole('pro0289','SAN MIGUEL GARCIA MELINA','mesamiga@gmail.com','pro0289',1475,$idemp,$role);
        User::findOrCreateUserWithRole('pro0294','SARAO PEREZ WILBER','matematiconoaburrido@gmail.com','pro0294',1480,$idemp,$role);
        User::findOrCreateUserWithRole('pro0295','SERAFIN FERIA BASILIO','bacho.arji@gmail.com','pro0295',1481,$idemp,$role);
        User::findOrCreateUserWithRole('pro0297','SOLA ROSAS BEATRIZ EUGENIA','beasolarosas@hotmail.com','pro0297',1483,$idemp,$role);
        User::findOrCreateUserWithRole('pro0298','SOLANO PINEDA ALEJANDRA','alejandrasolanopineda@gmail.com','pro0298',1484,$idemp,$role);
        User::findOrCreateUserWithRole('pro0323','SOLER LANZ ARAMINTA CRISTINA','aramintasoler@gmail.com','pro0323',4397,$idemp,$role);
        User::findOrCreateUserWithRole('pro0299','TELLAECHE MERINO ANDREA','latellaeche@hotmail.com','pro0299',1485,$idemp,$role);
        User::findOrCreateUserWithRole('pro0300','TLAPA FALFAN AGUSTIN','agustintlapa@gmail.com','pro0300',1486,$idemp,$role);
        User::findOrCreateUserWithRole('pro0326','TOSCA ESPARZA GEORGINA','geo_tosca@hotmail.com','pro0326',4602,$idemp,$role);
        User::findOrCreateUserWithRole('pro0303','VALENZUELA RODRIGUEZ ANGEL ALBERTO','pro0303@mail.com','pro0303',1489,$idemp,$role);
        User::findOrCreateUserWithRole('pro0315','ZURITA RANGEL ESTELA','estelazurita1@hotmail.com','pro0315',1502,$idemp,$role);

    }
}
