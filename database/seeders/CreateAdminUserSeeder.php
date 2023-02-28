<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            "role" => "superadmin",
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'password' => bcrypt('Sup3rAdm!nF4!s4l')
        ]);
        $user = User::create([
            'name' => 'Admin',
            "role" => "admin",
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('Adm!nF4!s4l')
        ]);
        $user = User::create([
            'name' => 'User',
            "role" => "staff",
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => bcrypt('Us3rUn!c4s3')
        ]);

        // $role = Role::create(['name' => 'admin']);

        // $permissions = Permission::pluck('id','id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);

        $user = User::create([
            "name" => "Nurul Ulum",
            "role" => "staff",
            "email" => "ulum.unitech@gmail.com",
            "username" => "nurul_ulum",
            "password" => bcrypt("Nurul123456")
            ]);
        $user = User::create([
            "name" => "Achmad Richie Syahputra",
            "role" => "staff",
            "email" => "richiesyahputra01@gmail.com",
            "username" => "achmad_richie_syahputra",
            "password" => bcrypt("Achmad123456")
            ]);
        $user = User::create([
            "name" => "Halimatus Sa'dia",
            "role" => "staff",
            "email" => "dyah.unicase@gmail.com",
            "username" => "halimatus_sa'dia",
            "password" => bcrypt("Halimatus123456")
            ]);
        $user = User::create([
            "name" => "Syahrul Brian Ardana",
            "role" => "staff",
            "email" => "briansyahrul@gmail.com",
            "username" => "syahrul_brian_ardana",
            "password" => bcrypt("Syahrul123456")
            ]);
        $user = User::create([
            "name" => "Ariliana Yuniar Sulistyani",
            "role" => "staff",
            "email" => "arilianayuniar28@gmail.com",
            "username" => "ariliana_yuniar_sulistyani",
            "password" => bcrypt("Ariliana123456")
            ]);
        $user = User::create([
            "name" => "Laily Mumtahana",
            "role" => "staff",
            "email" => "laily.unicase@gmail.com",
            "username" => "laily_mumtahana",
            "password" => bcrypt("Laily123456")
            ]);
        $user = User::create([
            "name" => "Niyyo Candra Putri",
            "role" => "staff",
            "email" => "niyyo.unicase@gmail.com",
            "username" => "niyyo_candra_putri",
            "password" => bcrypt("Niyyo123456")
            ]);
        $user = User::create([
            "name" => "Ella Ryanta Karina",
            "role" => "staff",
            "email" => "ellaryanta@gmail.com",
            "username" => "ella_ryanta_karina",
            "password" => bcrypt("Ella123456")
            ]);
        $user = User::create([
            "name" => "M Adam Adi Nugroho",
            "role" => "staff",
            "email" => "adam.unicase@gmail.com",
            "username" => "m_adam_adi_nugroho",
            "password" => bcrypt("Adam123456")
            ]);
        $user = User::create([
            "name" => "Ronny Setyawan",
            "role" => "staff",
            "email" => "ronnysetyawan62@gmail.com",
            "username" => "ronny_setyawan",
            "password" => bcrypt("Ronny123456")
            ]);
        $user = User::create([
            "name" => "Silvi Luthfiana",
            "role" => "staff",
            "email" => "silviunicase@gmail.com",
            "username" => "silvi_luthfiana",
            "password" => bcrypt("Silvi123456")
            ]);
        $user = User::create([
            "name" => "Nur Lailatul Azizah",
            "role" => "staff",
            "email" => "Lailatula503@gmail.com",
            "username" => "nur_lailatul_azizah",
            "password" => bcrypt("Nur123456")
            ]);
        $user = User::create([
            "name" => "Mukhammad Amirul  Mu Minin",
            "role" => "staff",
            "email" => "amirul.creator@gmail.com",
            "username" => "mukhammad_amirul__mu_minin",
            "password" => bcrypt("Mukhammad123456")
            ]);
        $user = User::create([
            "name" => "Wahyu Robi Nurul Aeni",
            "role" => "staff",
            "email" => "Wahyurobi428@gmail.com",
            "username" => "wahyu_robi_nurul_aeni",
            "password" => bcrypt("Wahyu123456")
            ]);
        $user = User::create([
            "name" => "Amin Yudhispratama",
            "role" => "staff",
            "email" => "amin.yudhispratama@gmail.com",
            "username" => "amin_yudhispratama",
            "password" => bcrypt("Amin123456")
            ]);
        $user = User::create([
            "name" => "Laylatul Maghfiroh",
            "role" => "staff",
            "email" => "laylatul.unicase@gmail.com",
            "username" => "laylatul_maghfiroh",
            "password" => bcrypt("Laylatul123456")
            ]);
        $user = User::create([
            "name" => "Muhammad Edo Firmansyah",
            "role" => "staff",
            "email" => "edofirmansyah655@gmail.com",
            "username" => "muhammad_edo_firmansyah",
            "password" => bcrypt("Muhammad123456")
            ]);
        $user = User::create([
            "name" => "Widiah",
            "role" => "staff",
            "email" => "widiah.id@gmail.com",
            "username" => "widiah",
            "password" => bcrypt("Widiah123456")
            ]);
        $user = User::create([
            "name" => "Ella Septa Pratiwi",
            "role" => "staff",
            "email" => "ella.unicase@gmail.com",
            "username" => "ella_septa_pratiwi",
            "password" => bcrypt("Ella123456")
            ]);
        $user = User::create([
            "name" => "Sari Asiningrum",
            "role" => "staff",
            "email" => "asiningrumsari@gmail.com",
            "username" => "sari_asiningrum",
            "password" => bcrypt("Sari123456")
            ]);
        $user = User::create([
            "name" => "Rita Mei Rini",
            "role" => "staff",
            "email" => "ritaunitec72@gmail.com",
            "username" => "rita_mei_rini",
            "password" => bcrypt("Rita123456")
            ]);
        $user = User::create([
            "name" => "Eveline Indra Santoso",
            "role" => "staff",
            "email" => "eveline.unicase@gmail.com",
            "username" => "eveline_indra_santoso",
            "password" => bcrypt("Eveline123456")
            ]);
        $user = User::create([
            "name" => "Muh Andhika Pratama",
            "role" => "staff",
            "email" => "dika.unitech@gmail.com",
            "username" => "muh_andhika_pratama",
            "password" => bcrypt("Muh123456")
            ]);
        $user = User::create([
            "name" => "Wahyu Firmansah",
            "role" => "staff",
            "email" => "wahyu.firmansah27@gmail.com",
            "username" => "wahyu_firmansah",
            "password" => bcrypt("Wahyu123456")
            ]);
        $user = User::create([
            "name" => "Reinald Alvin Hariyanto",
            "role" => "staff",
            "email" => "alvin14.unitech@gmail.com",
            "username" => "reinald_alvin_hariyanto",
            "password" => bcrypt("Reinald123456")
            ]);
        $user = User::create([
            "name" => "Keren Egidhaea Talenta",
            "role" => "staff",
            "email" => "keren.unicase@gmail.com",
            "username" => "keren_egidhaea_talenta",
            "password" => bcrypt("Keren123456")
            ]);
        $user = User::create([
            "name" => "Khusnul Nurmala",
            "role" => "staff",
            "email" => "khusnul.nurmala88@gmail.com",
            "username" => "khusnul_nurmala",
            "password" => bcrypt("Khusnul123456")
            ]);
        $user = User::create([
            "name" => "Churin 'In",
            "role" => "staff",
            "email" => "churin.unitech@gmail.com",
            "username" => "churin_'in",
            "password" => bcrypt("Churin123456")
            ]);
        $user = User::create([
            "name" => "Imas Renanti",
            "role" => "staff",
            "email" => "renan.imas18@gmail.com",
            "username" => "imas_renanti",
            "password" => bcrypt("Imas123456")
            ]);
        $user = User::create([
            "name" => "Muhammad Aly Fikri",
            "role" => "staff",
            "email" => "Muhamadalyfikri@gmail.com",
            "username" => "muhammad_aly_fikri",
            "password" => bcrypt("Muhammad123456")
            ]);
        $user = User::create([
            "name" => "Wahyu Prastya Amanda",
            "role" => "staff",
            "email" => "w.amandaputra@gmail.com",
            "username" => "wahyu_prastya_amanda",
            "password" => bcrypt("Wahyu123456")
            ]);
        $user = User::create([
            "name" => "Fadzilah Lailatus Saada",
            "role" => "staff",
            "email" => "fadzilah2102@gmail.com",
            "username" => "fadzilah_lailatus_saada",
            "password" => bcrypt("Fadzilah123456")
            ]);
        $user = User::create([
            "name" => "Hamidha Okta Listyaningrum",
            "role" => "staff",
            "email" => "hamidhaokta@gmail.com",
            "username" => "hamidha_okta_listyaningrum",
            "password" => bcrypt("Hamidha123456")
            ]);
        $user = User::create([
            "name" => "Edwin Aristyawan",
            "role" => "staff",
            "email" => "Edwinaristyawan@gmail.com",
            "username" => "edwin_aristyawan",
            "password" => bcrypt("Edwin123456")
            ]);
        $user = User::create([
            "name" => "Astika Rahmawati Ardini",
            "role" => "staff",
            "email" => "astikaaa63@gmail.com",
            "username" => "astika_rahmawati_ardini",
            "password" => bcrypt("Astika123456")
            ]);
        $user = User::create([
            "name" => "Monica Pricilia",
            "role" => "staff",
            "email" => "monicapr806@gmail.com",
            "username" => "monica_pricilia",
            "password" => bcrypt("Monica123456")
            ]);
        $user = User::create([
            "name" => "Iqbal Aulia",
            "role" => "staff",
            "email" => "iqbalaulia@pm.me",
            "username" => "iqbal_aulia",
            "password" => bcrypt("Iqbal123456")
            ]);
        $user = User::create([
            "name" => "Bayu Dwi Pratama",
            "role" => "staff",
            "email" => "bayudptama@gmail.com",
            "username" => "bayu_dwi_pratama",
            "password" => bcrypt("Bayu123456")
            ]);
        $user = User::create([
            "name" => "Virliana Cindhy Mei Arabella",
            "role" => "staff",
            "email" => "Virlianacindhymei@gmail.com",
            "username" => "virliana_cindhy_mei_arabella",
            "password" => bcrypt("Virliana123456")
            ]);
        $user = User::create([
            "name" => "Najmun Niswah",
            "role" => "staff",
            "email" => "nnajmunniswah@gmail.com",
            "username" => "najmun_niswah",
            "password" => bcrypt("Najmun123456")
            ]);
        $user = User::create([
            "name" => "Anggita Rizania",
            "role" => "staff",
            "email" => "Anggitarisaramadhania@gmail.com",
            "username" => "anggita_rizania",
            "password" => bcrypt("Anggita123456")
            ]);
        $user = User::create([
            "name" => "Ar Rizal Fikri Firdaus",
            "role" => "staff",
            "email" => "rizalfirdaus029@gmail.com",
            "username" => "ar_rizal_fikri_firdaus",
            "password" => bcrypt("Rizal123456")
            ]);
        $user = User::create([
            "name" => "Ibnu Wardana",
            "role" => "staff",
            "email" => "ibnuwardana1705@gmail.com",
            "username" => "ibnu_wardana",
            "password" => bcrypt("Ibnu123456")
            ]);
        $user = User::create([
            "name" => "Yonas Dwiki Septarinto",
            "role" => "staff",
            "email" => "yonasexcellent@gmail.com",
            "username" => "yonas_dwiki_septarinto",
            "password" => bcrypt("Yonas123456")
            ]);
        $user = User::create([
            "name" => "Mohammad Mazar",
            "role" => "staff",
            "email" => "mohammadmazar12345@gmail.com",
            "username" => "mohammad_mazar",
            "password" => bcrypt("Mohammad123456")
            ]);
        $user = User::create([
            "name" => "Achmad Saputra",
            "role" => "staff",
            "email" => "Adullsptr12@gmail.com",
            "username" => "achmad_saputra",
            "password" => bcrypt("Achmad123456")
            ]);
        $user = User::create([
            "name" => "Yogi Setiawan",
            "role" => "staff",
            "email" => "setiawanyogi085@gmail.com",
            "username" => "yogi_setiawan",
            "password" => bcrypt("Yogi123456")
            ]);
        $user = User::create([
            "name" => "Ilham Wahyudi",
            "role" => "staff",
            "email" => "ilhamwahyudi2319@gmail.com",
            "username" => "ilham_wahyudi",
            "password" => bcrypt("Ilham123456")
            ]);
        $user = User::create([
            "name" => "Diana Fathul Izzah",
            "role" => "staff",
            "email" => "dianafazah01@gmail.com",
            "username" => "diana_fathul_izzah",
            "password" => bcrypt("Diana123456")
            ]);
        $user = User::create([
            "name" => "Edwin Christian",
            "role" => "staff",
            "email" => "Edwinchristian70@gmail.com",
            "username" => "edwin_christian",
            "password" => bcrypt("Edwin123456")
            ]);
        $user = User::create([
            "name" => "Putri Islamiyah",
            "role" => "staff",
            "email" => "Putriislamiyah23@gmail.com",
            "username" => "putri_islamiyah",
            "password" => bcrypt("Putri123456")
            ]);
        $user = User::create([
            "name" => "Rani Sumantri",
            "role" => "staff",
            "email" => "ranitsu96@gmail.com",
            "username" => "rani_sumantri",
            "password" => bcrypt("Rani123456")
            ]);
        $user = User::create([
            "name" => "Padantya Amanda Evelina",
            "role" => "staff",
            "email" => "padantya.unicase@gmail.com",
            "username" => "padantya_amanda_evelina",
            "password" => bcrypt("Padantya123456")
            ]);
        $user = User::create([
            "name" => "Nona Bimbi Sevilla",
            "role" => "staff",
            "email" => "nonabimbi10@gmail.com",
            "username" => "nona_bimbi_sevilla",
            "password" => bcrypt("Nona123456")
            ]);
        $user = User::create([
            "name" => "Ifan Dwi Saputra",
            "role" => "staff",
            "email" => "ifandwi17@gmail.com",
            "username" => "ifan_dwi_saputra",
            "password" => bcrypt("Ifan123456")
            ]);
        $user = User::create([
            "name" => "Dwi Nurwiji",
            "role" => "staff",
            "email" => "dwinurwiji8@gmail.com",
            "username" => "dwi_nurwiji",
            "password" => bcrypt("Dwi123456")
            ]);
        $user = User::create([
            "name" => "Aprilian Pusphita Shari",
            "role" => "staff",
            "email" => "puspa.aprilia62@gmail.com",
            "username" => "aprilian_pusphita_shari",
            "password" => bcrypt("Aprilian123456")
            ]);
        $user = User::create([
            "name" => "Kevin Niken Andrean",
            "role" => "staff",
            "email" => "kevinnandrean@gmail.com",
            "username" => "kevin_niken_andrean",
            "password" => bcrypt("Kevin123456")
            ]);
        $user = User::create([
            "name" => "Revanda Audyna Gunadi",
            "role" => "staff",
            "email" => "Revandaaudyna@gmail.com",
            "username" => "revanda_audyna_gunadi",
            "password" => bcrypt("Revanda123456")
            ]);
        $user = User::create([
            "name" => "Defi Mulianingsih",
            "role" => "staff",
            "email" => "Defimulia4@gmail.com",
            "username" => "defi_mulianingsih",
            "password" => bcrypt("Defi123456")
            ]);
        $user = User::create([
            "name" => "Nur Wahyuni Maulidiah",
            "role" => "staff",
            "email" => "nurwahyuni.maulidiah.nm@gmail.com",
            "username" => "nur_wahyuni_maulidiah",
            "password" => bcrypt("Nur123456")
            ]);
        $user = User::create([
            "name" => "Gadis Lovitasari",
            "role" => "staff",
            "email" => "gadislovitasari@gmail.com",
            "username" => "gadis_lovitasari",
            "password" => bcrypt("Gadis123456")
            ]);
        $user = User::create([
            "name" => "Sekar Puspitasari",
            "role" => "staff",
            "email" => "Puspitaitta1@gmail.com",
            "username" => "sekar_puspitasari",
            "password" => bcrypt("Sekar123456")
            ]);
        $user = User::create([
            "name" => "Chika Mutia Paramesti",
            "role" => "staff",
            "email" => "chikamutiap@gmail.com",
            "username" => "chika_mutia_paramesti",
            "password" => bcrypt("Chika123456")
            ]);
        $user = User::create([
            "name" => "Sidky Ramadhan",
            "role" => "staff",
            "email" => "ramadhansidky72@gmail.com",
            "username" => "sidky_ramadhan",
            "password" => bcrypt("Sidky123456")
            ]);
        $user = User::create([
            "name" => "Yuni Marliana",
            "role" => "staff",
            "email" => "yuniimarlianaa@gmail.com",
            "username" => "yuni_marliana",
            "password" => bcrypt("Yuni123456")
            ]);
        $user = User::create([
            "name" => "Alfina Putri Maulody",
            "role" => "staff",
            "email" => "alfinamaulody03@gmail.com",
            "username" => "alfina_putri_maulody",
            "password" => bcrypt("Alfina123456")
            ]);
        $user = User::create([
            "name" => "Moh Faisal Fariq",
            "role" => "staff",
            "email" => "mfaisalf.unitech@gmail.com",
            "username" => "moh_faisal_fariq",
            "password" => bcrypt("Moh123456")
            ]);
        $user = User::create([
            "name" => "Yudit Krista Pradipta",
            "role" => "staff",
            "email" => "yuditkristap@gmail.com",
            "username" => "yudit_krista_pradipta",
            "password" => bcrypt("Yudit123456")
            ]);
        $user = User::create([
            "name" => "Gracia Putri Marenda JS",
            "role" => "staff",
            "email" => "graciamarenda@gmail.com",
            "username" => "gracia_putri_marenda_js",
            "password" => bcrypt("Gracia123456")
            ]);
        $user = User::create([
            "name" => "Reivansyah Syafendra Jaya",
            "role" => "staff",
            "email" => "rsyahfendra@gmail.com",
            "username" => "reivansyah_syafendra_jaya",
            "password" => bcrypt("Reivansyah123456")
            ]);
        $user = User::create([
            "name" => "Farhan Zidan Soebiyanto",
            "role" => "staff",
            "email" => "farhanzidan129@gmail.com",
            "username" => "farhan_zidan_soebiyanto",
            "password" => bcrypt("Farhan123456")
            ]);
        $user = User::create([
            "name" => "Muhammad Sulthan Tazakka",
            "role" => "staff",
            "email" => "sulthan.unitech@gmail.com",
            "username" => "muhammad_sulthan_tazakka",
            "password" => bcrypt("Muhammad123456")
            ]);
        $user = User::create([
            "name" => "Yudi Setiawan",
            "role" => "staff",
            "email" => "yudistwn51@gmail.com",
            "username" => "yudi_setiawan",
            "password" => bcrypt("Yudi123456")
            ]);
        $user = User::create([
            "name" => "Alvin Marina",
            "role" => "staff",
            "email" => "contact.alvmarina@gmail.com",
            "username" => "alvin_marina",
            "password" => bcrypt("Alvin123456")
            ]);
        $user = User::create([
            "name" => "Aditiya Julian",
            "role" => "staff",
            "email" => "aditiyajulian848@gmail.com",
            "username" => "aditiya_julian",
            "password" => bcrypt("Aditiya123456")
            ]);
        $user = User::create([
            "name" => "Angelina Maria Barek Udjan",
            "role" => "staff",
            "email" => "angelinamaria009@gmail.com",
            "username" => "angelina_maria_barek_udjan",
            "password" => bcrypt("Angelina123456")
            ]);
        $user = User::create([
            "name" => "Moh. David Fajar Baskoro",
            "role" => "staff",
            "email" => "mohammaddavid095@gmail.com",
            "username" => "moh._david_fajar_baskoro",
            "password" => bcrypt("Moh.123456")
            ]);
        $user = User::create([
            "name" => "Fajar Djularfah",
            "role" => "staff",
            "email" => "Fajardzularfah@gmail.com",
            "username" => "fajar_djularfah",
            "password" => bcrypt("Fajar123456")
            ]);
        $user = User::create([
            "name" => "Dintania Yuliandari",
            "role" => "staff",
            "email" => "dintaniayuliandari@gmail.com",
            "username" => "dintania_yuliandari",
            "password" => bcrypt("Dintania123456")
            ]);
        $user = User::create([
            "name" => "Donna Friztianti Suwondo",
            "role" => "staff",
            "email" => "donnatianti@gmail.com",
            "username" => "donna_friztianti_suwondo",
            "password" => bcrypt("Donna123456")
            ]);
        $user = User::create([
            "name" => "Rethanda Wahyu Ardiansyah",
            "role" => "staff",
            "email" => "wa647522@gmail.com",
            "username" => "rethanda_wahyu_ardiansyah",
            "password" => bcrypt("Rethanda123456")
            ]);
        $user = User::create([
            "name" => "Erika Triswanda",
            "role" => "staff",
            "email" => "erikatriswanda@gmail.com",
            "username" => "erika_triswanda",
            "password" => bcrypt("Erika123456")
            ]);
        $user = User::create([
            "name" => "Dinda Ayu Elvariani",
            "role" => "staff",
            "email" => "dinda.ayuelvariani@gmail.com",
            "username" => "dinda_ayu_elvariani",
            "password" => bcrypt("Dinda123456")
            ]);
        $user = User::create([
            "name" => "Ni Luh Trisna Wardani",
            "role" => "staff",
            "email" => "Niluhtrisnawardani@gmail.com",
            "username" => "ni_luh_trisna_wardani",
            "password" => bcrypt("Niluh123456")
            ]);
        $user = User::create([
            "name" => "Muhamad Fitra Nugraha",
            "role" => "staff",
            "email" => "fitranugraha51@gmail.com",
            "username" => "muhamad_fitra_nugraha",
            "password" => bcrypt("Muhamad123456")
            ]);
        $user = User::create([
            "name" => "Bayu Febriyanto",
            "role" => "staff",
            "email" => "febriyantobay03@gmail.com",
            "username" => "bayu_febriyanto",
            "password" => bcrypt("Bayu123456")
            ]);
        $user = User::create([
            "name" => "Sasha Nadya Chairunnisa",
            "role" => "staff",
            "email" => "sashanadya24@gmail.com",
            "username" => "sasha_nadya_chairunnisa",
            "password" => bcrypt("Sasha123456")
            ]);
        $user = User::create([
            "name" => "Fildzah Maghvirah Aprilia",
            "role" => "staff",
            "email" => "fildzah.aprilia17@gmail.com",
            "username" => "fildzah_maghvirah_aprilia",
            "password" => bcrypt("Fildzah123456")
            ]);
        $user = User::create([
            "name" => "Rizky Aulia Amanta Putri",
            "role" => "staff",
            "email" => "Amantaauliaa@gmail.com",
            "username" => "rizky_aulia_amanta_putri",
            "password" => bcrypt("Rizky123456")
            ]);
        $user = User::create([
            "name" => "Muchamad Kukuh Sulistya",
            "role" => "staff",
            "email" => "muchamadkukuh04@gmail.com",
            "username" => "muchamad_kukuh_sulistya",
            "password" => bcrypt("Muchamad123456")
            ]);
        $user = User::create([
            "name" => "Lia Putri Bahari",
            "role" => "staff",
            "email" => "liaputrib99@gmail.com",
            "username" => "lia_putri_bahari",
            "password" => bcrypt("Lia123456")
            ]);
        $user = User::create([
            "name" => "Mercury Aura Prima",
            "role" => "staff",
            "email" => "auraprma@gmail.com",
            "username" => "mercury_aura_prima",
            "password" => bcrypt("Mercury123456")
            ]);
        $user = User::create([
            "name" => "James Abed Nego",
            "role" => "staff",
            "email" => "Abedkuts@gmail.com",
            "username" => "james_abed_nego",
            "password" => bcrypt("James123456")
            ]);
        $user = User::create([
            "name" => "Alif Pratama",
            "role" => "staff",
            "email" => "aliffpratama13@gmail.com",
            "username" => "alif_pratama",
            "password" => bcrypt("Alif123456")
            ]);
        $user = User::create([
            "name" => "Adinda Tahta Mustika Risky",
            "role" => "staff",
            "email" => "adindatahta.el@gmail.com",
            "username" => "adinda_tahta_mustika_risky",
            "password" => bcrypt("Adinda123456")
            ]);
        $user = User::create([
            "name" => "Danny Pratama Suhaimi",
            "role" => "staff",
            "email" => "dannypratamaa@gmail.com",
            "username" => "danny_pratama_suhaimi",
            "password" => bcrypt("Danny123456")
            ]);
        $user = User::create([
            "name" => "Andia Sofa Sofiannaja",
            "role" => "staff",
            "email" => "andianaja@gmail.com",
            "username" => "andia_sofa_sofiannaja",
            "password" => bcrypt("Andia123456")
            ]);
        $user = User::create([
            "name" => "Rayhan Altama",
            "role" => "staff",
            "email" => "altamaray123@gmail.com",
            "username" => "rayhan_altama",
            "password" => bcrypt("Rayhan123456")
            ]);
        $user = User::create([
            "name" => "Mochamad Fayakunul Rosy",
            "role" => "staff",
            "email" => "fayakunulrosi13@gmail.com",
            "username" => "mochamad_fayakunul_rosy",
            "password" => bcrypt("Mochamad123456")
            ]);
        $user = User::create([
            "name" => "Rehan Hidayat",
            "role" => "staff",
            "email" => "rehan.unitech@gmail.com",
            "username" => "rehan_hidayat",
            "password" => bcrypt("Rehan123456")
            ]);
        $user = User::create([
            "name" => "Ummatul Firdausi",
            "role" => "staff",
            "email" => "firda.unicase@gmail.com",
            "username" => "ummatul_firdausi",
            "password" => bcrypt("Ummatul123456")
            ]);
        $user = User::create([
            "name" => "Inka Dia Rista",
            "role" => "staff",
            "email" => "inkadr.unicase@gmail.com",
            "username" => "inka_dia_rista",
            "password" => bcrypt("Inka123456")
            ]);
        $user = User::create([
            "name" => "Zidni Ilma Khusnia",
            "role" => "staff",
            "email" => "zidni1728@gmail.com",
            "username" => "zidni_ilma_khusnia",
            "password" => bcrypt("Zidni123456")
            ]);
        $user = User::create([
            "name" => "Nur Laili Maghfirah",
            "role" => "staff",
            "email" => "nurlailim97@gmail.com",
            "username" => "nur_laili_maghfirah",
            "password" => bcrypt("Nur123456")
            ]);
        $user = User::create([
            "name" => "Nabila Indah",
            "role" => "staff",
            "email" => "nmarshaw109@gmail.com",
            "username" => "nabila_indah",
            "password" => bcrypt("Nabila123456")
            ]);
        $user = User::create([
            "name" => "Galuh Ayu Widiyandita",
            "role" => "staff",
            "email" => "galuhwidiyandita@gmail.com",
            "username" => "galuh_ayu_widiyandita",
            "password" => bcrypt("Galuh123456")
            ]);
        $user = User::create([
            "name" => "Arum Mega Pertiwi",
            "role" => "staff",
            "email" => "arummegapertiwi2@gmail.com",
            "username" => "arum_mega_pertiwi",
            "password" => bcrypt("Arum123456")
            ]);
        $user = User::create([
            "name" => "Panji Ramadhani Nofebrian",
            "role" => "staff",
            "email" => "panjiramadhani2402@gmail.com",
            "username" => "panji_ramadhani_nofebrian",
            "password" => bcrypt("Panji123456")
            ]);
        $user = User::create([
            "name" => "Muhammad Irzam Zam",
            "role" => "staff",
            "email" => "ipangk9@gmail.com",
            "username" => "muhammad_irzam_zam",
            "password" => bcrypt("Muhammad123456")
            ]);
        $user = User::create([
            "name" => "Farah Tri Vania",
            "role" => "staff",
            "email" => "farahtrivania66@gmail.com",
            "username" => "farah_tri_vania",
            "password" => bcrypt("Farah123456")
            ]);
        $user = User::create([
            "name" => "Erina Wahyu Cahyaning Putri",
            "role" => "staff",
            "email" => "Erinaputri732@gmail.com",
            "username" => "erina_wahyu_cahyaning_putri",
            "password" => bcrypt("Erina123456")
            ]);
        $user = User::create([
            "name" => "Hoiri",
            "role" => "staff",
            "email" => "Herymhmd1@gmail.com",
            "username" => "hoiri",
            "password" => bcrypt("Hoiri123456")
            ]);
        $user = User::create([
            "name" => "Devi Ayu Prasetyaningrum",
            "role" => "staff",
            "email" => "deyudevi@gmail.com",
            "username" => "devi_ayu_prasetyaningrum",
            "password" => bcrypt("Devi123456")
            ]);
        $user = User::create([
            "name" => "Muhammad Renaldi Pratama Putra",
            "role" => "staff",
            "email" => "renaldiunicase@gmail.com",
            "username" => "muhammad_renaldi_pratama_putra",
            "password" => bcrypt("Muhammad123456")
            ]);
        $user = User::create([
            "name" => "Riska Anggreany Puspita Ayu",
            "role" => "staff",
            "email" => "riska_anggreany@yahoo.com",
            "username" => "riska_anggreany_puspita_ayu",
            "password" => bcrypt("Riska123456")
            ]);
        $user = User::create([
            "name" => "Della Amelinda Chaniago",
            "role" => "staff",
            "email" => "damelinda33@gmail.com",
            "username" => "della_amelinda_chaniago",
            "password" => bcrypt("Della123456")
            ]);
        $user = User::create([
            "name" => "Wukir Prasasti",
            "role" => "staff",
            "email" => "sasawukir@gmail.com",
            "username" => "wukir_prasasti",
            "password" => bcrypt("Wukir123456")
            ]);
        $user = User::create([
            "name" => "Apriyanda Albadri",
            "role" => "staff",
            "email" => "Apriyanda_albadri@yahoo.com",
            "username" => "apriyanda_albadri",
            "password" => bcrypt("Apriyanda123456")
            ]);
        $user = User::create([
            "name" => "Fani Kurnia Sari",
            "role" => "staff",
            "email" => "fanikurniasari073@gmail.com",
            "username" => "fani_kurnia_sari",
            "password" => bcrypt("Fani123456")
            ]);
        $user = User::create([
            "name" => "A'an Lutfi Ardiansyah",
            "role" => "staff",
            "email" => "aanlutfiardiansyah@gmail.com",
            "username" => "a'an_lutfi_ardiansyah",
            "password" => bcrypt("Ardiansyah123456")
            ]);
        $user = User::create([
            "name" => "Luciana Eka Rahayu",
            "role" => "staff",
            "email" => "lucianaekarahayu@gmail.com",
            "username" => "luciana_eka_rahayu",
            "password" => bcrypt("Luciana123456")
            ]);
        $user = User::create([
            "name" => "Arnando Redian Widijanto",
            "role" => "staff",
            "email" => "arnandoredian00@gmail.com",
            "username" => "arnando_redian_widijanto",
            "password" => bcrypt("Arnando123456")
            ]);
        $user = User::create([
            "name" => "Elen Manura Wijaya",
            "role" => "staff",
            "email" => "elen.unicase@gmail.com",
            "username" => "elen_manura_wijaya",
            "password" => bcrypt("Elen123456")
            ]);
        $user = User::create([
            "name" => "Nurul Aida",
            "role" => "staff",
            "email" => "eaksiaidha77@gmail.com",
            "username" => "nurul_aida",
            "password" => bcrypt("Nurul123456")
            ]);
        $user = User::create([
            "name" => "Lutfiatur Rizqi Faradina",
            "role" => "staff",
            "email" => "Lurifa21@gmail.com",
            "username" => "lutfiatur_rizqi_faradina",
            "password" => bcrypt("Lutfiatur123456")
            ]);
        $user = User::create([
            "name" => "R. Achmad Sutan Hamdhany",
            "role" => "staff",
            "email" => "hamdhanysutan@gmail.com",
            "username" => "r._achmad_sutan_hamdhany",
            "password" => bcrypt("Hamdhany123456")
            ]);
        $user = User::create([
            "name" => "Brian Hanif Ariza",
            "role" => "staff",
            "email" => "brian.unicase@gmail.com",
            "username" => "brian_hanif_ariza",
            "password" => bcrypt("Brian123456")
            ]);
        $user = User::create([
            "name" => "Talita Yasmin Hayu Marheni",
            "role" => "staff",
            "email" => "talitayasminh@gmail.com",
            "username" => "talita_yasmin_hayu_marheni",
            "password" => bcrypt("Talita123456")
            ]);
        $user = User::create([
            "name" => "Aulia Risanjani",
            "role" => "staff",
            "email" => "auliaarisanjani@gmail.com",
            "username" => "aulia_risanjani",
            "password" => bcrypt("Aulia123456")
            ]);
        $user = User::create([
            "name" => "Andyka Rifqi Ardiyanto",
            "role" => "staff",
            "email" => "andykagento@gmail.com",
            "username" => "andyka_rifqi_ardiyanto",
            "password" => bcrypt("Andyka123456")
            ]);
        $user = User::create([
            "name" => "Ramadanu Arianto",
            "role" => "staff",
            "email" => "Ramadanuarianto125@gmail.com",
            "username" => "ramadanu_arianto",
            "password" => bcrypt("Ramadanu123456")
            ]);
        $user = User::create([
            "name" => "Yoga Wahyu Dyatmika",
            "role" => "staff",
            "email" => "yogawahyu234@gmail.com",
            "username" => "yoga_wahyu_dyatmika",
            "password" => bcrypt("Yoga123456")
            ]);
        $user = User::create([
            "name" => "Diah Ardani",
            "role" => "staff",
            "email" => "ardani.diah@gmail.com",
            "username" => "diah_ardani",
            "password" => bcrypt("Diah123456")
            ]);
        $user = User::create([
            "name" => "Sukesi Handayani",
            "role" => "staff",
            "email" => "kesi.unitech@gmail.com",
            "username" => "sukesi_handayani",
            "password" => bcrypt("Sukesi123456")
            ]);
        $user = User::create([
            "name" => "Husen Bahrul Nur Majid",
            "role" => "staff",
            "email" => "bahrulclevo99@gmail.com",
            "username" => "husen_bahrul_nur_majid",
            "password" => bcrypt("Husen123456")
            ]);
        $user = User::create([
            "name" => "Muhammad Yunus Dwi Waskito",
            "role" => "staff",
            "email" => "Yunusdwi2497@gmail.com",
            "username" => "muhammad_yunus_dwi_waskito",
            "password" => bcrypt("Muhammad123456")
            ]);
        $user = User::create([
            "name" => "Fauziyyah Ismayanti",
            "role" => "staff",
            "email" => "Ziyahs06@gmail.com",
            "username" => "fauziyyah_ismayanti",
            "password" => bcrypt("Fauziyyah123456")
            ]);
        $user = User::create([
            "name" => "Muhamad Al Had Asyhari",
            "role" => "staff",
            "email" => "asyhari011@gmail.com",
            "username" => "muhamad_al_had_asyhari",
            "password" => bcrypt("Muhamad123456")
            ]);
        $user = User::create([
            "name" => "Okky Sahrudin",
            "role" => "staff",
            "email" => "okkysn19@gmail.com",
            "username" => "okky_sahrudin",
            "password" => bcrypt("Okky123456")
            ]);
        $user = User::create([
            "name" => "Noviana Komalasari",
            "role" => "staff",
            "email" => "Sarinovi336@gmail.com",
            "username" => "noviana_komalasari",
            "password" => bcrypt("Noviana123456")
            ]);
        $user = User::create([
            "name" => "Riska Kumala Dewi",
            "role" => "staff",
            "email" => "riskakumalad2101@gmail.com",
            "username" => "riska_kumala_dewi",
            "password" => bcrypt("Riska123456")
            ]);
        $user = User::create([
            "name" => "Febrian Dwi Cahyo",
            "role" => "staff",
            "email" => "Fdcryan15@gmail.com",
            "username" => "febrian_dwi_cahyo",
            "password" => bcrypt("Febrian123456")
            ]);
        $user = User::create([
            "name" => "Maulana Sidiq",
            "role" => "staff",
            "email" => "maulanasidd@gmail.com",
            "username" => "maulana_sidiq",
            "password" => bcrypt("Maulana123456")
            ]);
        $user = User::create([
            "name" => "Mohammad Andrian Rizky",
            "role" => "staff",
            "email" => "andrianrizky000@gmail.com",
            "username" => "mohammad_andrian_rizky",
            "password" => bcrypt("Mohammad123456")
        ]);
    }
}