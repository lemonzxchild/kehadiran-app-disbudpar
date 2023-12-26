<?php

namespace Database\Seeders;

use App\Models\Partof;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(PartofSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(AttendancePositionSeeder::class);


        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => Role::where('name', 'admin')->first('id'),
            'position_id' => Position::where('name', 'Kepala')->where('partof_id', 1)->first('id'),
            'facedata' => '[0.008541805669665337, 0.01697305217385292, -0.0037744040600955486, -0.01186316180974245, -0.014635336585342884, -0.03342742845416069, -0.06043894588947296, 0.019046137109398842, -0.06817487627267838, -0.025414980947971344, -0.008479088544845581, 0.004059316590428352, 0.0015517367282882333, -0.024245135486125946, -0.00224917009472847, -0.09397633373737335, -0.024643592536449432, -0.0067940764129161835, 0.005673392675817013, 0.004400263540446758, 0.22998151183128357, -0.021417133510112762, -0.11522737145423889, 0.006760552525520325, 0.037461057305336, 0.01325337216258049, -0.01937074027955532, 0.15695953369140625, -0.04362248256802559, 0.033225297927856445, 0.0060843853279948235, 0.20907573401927948, 0.002736729569733143, -0.0036260373890399933, -0.187993586063385, 0.087423175573349, 0.02361557073891163, 0.011867553927004337, -0.0092204250395298, 0.23140957951545715, 0.000561270397156477, -0.0011129222111776471, 0.005825182888656855, -0.002671346068382263, -0.0017610852373763919, -0.03405563905835152, -0.2261146605014801, -0.0071282703429460526, -0.0031377251725643873, 0.02890845574438572, 0.0837424248456955, -0.00356990285217762, -0.20360223948955536, -0.0014847764978185296, -0.08882967382669449, 0.008100543171167374, 0.05006229504942894, 0.0010103710228577256, -0.00464845122769475, 0.005706604104489088, -0.01140807569026947, 0.05621400102972984, -0.10619334876537323, 0.2452288568019867, -0.002572508528828621, 0.192861869931221, 0.00034963994403369725, -0.005296130198985338, 0.012186052277684212, -0.002258940367028117, -0.00712662935256958, -0.34160828590393066, -0.13793276250362396, 0.002657518023625016, -0.139888733625412, 0.0055542755872011185, -0.000025342535082018003, 0.00022574661124963313, 0.1711352914571762, 0.0484030656516552, 0.008868055418133736, 0.06028912588953972, -0.005637946538627148, 0.04976514354348183, -0.029357681050896645, 0.0014789265114814043, -0.0014412271557375789, -0.03491619601845741, 0.02809438481926918, -0.05781292915344238, 0.04554056003689766, -0.0010029320837929845, -0.0011617507552728057, -0.016612567007541656, -0.17832930386066437, 0.012408794835209846, 0.03444015607237816, 0.09430332481861115, -0.005890256259590387, 0.02828376740217209, 0.003236146178096533, -0.0009940641466528177, 0.002385899657383561, -0.0022597918286919594, 0.004134782124310732, 0.007643408142030239, -0.03713942691683769, -0.0014062795089557767, 0.0057718511670827866, 0.009627016261219978, 0.061654478311538696, 0.0030746199190616608, 0.005093468818813562, -0.028144441545009613, 0.002943814964964986, -0.019914887845516205, 0.0029839968774467707, 0.001208338886499405, 0.09713496267795563, -0.20467057824134827, 0.1343524008989334, 0.007900966331362724, 0.13951359689235687, -0.002375836716964841, -0.002380657009780407, 0.00045780243817716837, 0.00839119404554367, 0.00016927026445046067, 0.015721863135695457, 0.05314059928059578, 0.0041250791400671005, 0.012385750189423561, 0.0009719945956021547, -0.0151087436825037, 0.011146469041705132, -0.0030647716484963894, -0.029004625976085663, -0.02205575816333294, 0.004250607453286648, -0.002799136331304908, 0.005035844165831804, -0.004816751927137375, 0.007724327500909567, -0.02349740080535412, -0.00244206003844738, 0.03449506685137749, -0.013880115933716297, 0.006662079133093357, 0.005618400406092405, 0.009880373254418373, -0.01860945113003254, 0.043086882680654526, -0.1962699592113495, -0.019285054877400398, -0.0019311452051624656, -0.001983536407351494, 0.010169138200581074, 0.010387562215328217, 0.1398760974407196, 0.0012471308000385761, 0.0021581612527370453, 0.003726197639480233, 0.0025033338461071253, -0.0026270882226526737, -0.0005836696363985538, 0.004002145957201719, 0.0043920003809034824, 0.014314964413642883, -0.007041397038847208, -0.005012662149965763, -0.1259041428565979, 0.01340469066053629, 0.0019040866754949093, -0.11292397230863571, 0.010070431977510452, 0.0005214390112087131, -0.02591719850897789, 0.006072438322007656, -0.006598580162972212, 0.0019457946764305234, 0.07536166161298752, -0.007116599939763546, 0.004491655621677637, -0.0028283679857850075, -0.05064010992646217, -0.18635378777980804, -0.06511928141117096, 0.03214085474610329, 0.17094114422798157, -0.017192935571074486, -0.026307426393032074, -0.007444214541465044]',
        ]);

        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Sub Bagian Kepegawaian dan Umum')->where('partof_id', 1)->first('id')
        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Sub Bagian Keuangan')->where('partof_id', 1)->first('id'),

        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Sub Bagian Perencanaan, Evaluasi, dan Pelaporan')->where('partof_id', 1)->first('id'),

        ]);

        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Kepala')->where('partof_id', 2)->first('id')
        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Seksi Kelembagaan Kepariwisataan')->where('partof_id', 2)->first('id'),

        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Seksi Pemasaran Pariwisata')->where('partof_id', 2)->first('id'),

        ]);

        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Kepala')->where('partof_id', 3)->first('id')
        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Seksi Kesenian')->where('partof_id', 3)->first('id'),

        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Seksi Pelestarian Cagar Budaya, Sejarah, dan Permuseuman')->where('partof_id', 3)->first('id'),

        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Seksi Warisan Cagar Budaya')->where('partof_id', 3)->first('id'),

        ]);

        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Kepala')->where('partof_id', 4)->first('id'),

        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Seksi Destinasi Wisata')->where('partof_id', 4)->first('id'),

        ]);
        \App\Models\User::factory(1)->create([
            'role_id' => Role::where('name', 'user')->first('id'), // user === employee
            'position_id' => Position::where('name', 'Seksi Industri Pariwisata')->where('partof_id', 4)->first('id'),
        ]);


        $this->call(PresenceSeeder::class);
        $this->call(RekapUser1Seeder::class);
        $this->call(RekapUser2Seeder::class);
        $this->call(RekapUser3Seeder::class);
        $this->call(RekapUser4Seeder::class);
        $this->call(RekapUser5Seeder::class);
        $this->call(RekapUser6Seeder::class);
        $this->call(RekapUser7Seeder::class);
        $this->call(RekapUser8Seeder::class);
        $this->call(RekapUser9Seeder::class);
        $this->call(RekapUser10Seeder::class);
        $this->call(RekapUser11Seeder::class);
        $this->call(RekapUser12Seeder::class);
        $this->call(RekapUser13Seeder::class);
        $this->call(RekapUser14Seeder::class);
        $this->call(TodayUserSeeder::class);
    }
}
