<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Facade\FlareClient\Time\Time;
use Faker\Core\Number;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Petro',
            'lastname' => 'Danilko',
            'email' => 'mrb13022001@gmail.com',
            'phone' => '+12302317312321',
            'ip' => '192.168.1.1',
            'phone_code' => 'U' . mb_strtoupper(Str::random(4)),
            'password' => Hash::make('244275665'),
            'login' => 'petro_first',
            'referral_link' => User::create_referral_link(),
            'tariff_plan' => '1,2,3',
            'confirmed' => true
        ]);
//        for ($i = 0; $i < 200; $i++)
//        {
//            DB::table('users')->insert([
//                'name' => Str::random(10),
//                'email' => Str::random().'@gmail.com',
//                'password' => Hash::make('244275665'),
//                'login' => Str::random(10),
//                'referral_link' => User::create_referral_link(),
//                'tariff_plan' => '1,2,3'
//            ]);
//        }
        DB::table('users')->insert([
            'name' => 'Admin',
            'lastname' => '',
            'email' => 'daniil77864@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'phone' => '+12302313312321',
            'phone_code' => 'U' . mb_strtoupper(Str::random(4)),
            'login' => 'Admin',
            'password' => Hash::make('244275665'),
            'referral_link' => User::create_referral_link(),
            'tariff_plan' => '',
            'is_admin' => true,
            'confirmed' => true
        ]);


        DB::table('tariff_plans')->insert([
            'title' => 'Portfolio 1',
            'min_invest' => 50,
            'max_invest' => 300,
            'profit' => 0.5,
            'deposit_term' => 14,
            'description_ru' => 'Инвестиционные сделки в области коммуникаций и IT технолигий',
            'description_en' => 'Investment transactions in the field of communications and IT technologies',
            'description_zh' => '通信和IT技术领域的投资交易',
            'description_fr' => 'Opérations d`investissement dans le domaine des communications et des technologies de l`information',
            'description_de' => 'Investitionstransaktionen im Bereich der Kommunikations- und IT-Technologien'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Portfolio 2',
            'min_invest' => 300,
            'max_invest' => 1000,
            'profit' => 1,
            'deposit_term' => 30,
            'description_ru' => 'Инвестиции в криптовалюту и торгово-валютные сделки',
            'description_en' => 'Investments in cryptocurrency and trade and currency transactions',
            'description_zh' => '投资于加密货币以及贸易和货币交易',
            'description_fr' => 'Investissements dans la crypto-monnaie et les transactions commerciales et monétaires',
            'description_de' => 'Investitionen in Kryptowährung sowie Handels- und Währungstransaktionen'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Portfolio 3',
            'min_invest' => 1000,
            'max_invest' => 3000,
            'profit' => 2,
            'deposit_term' => 45,
            'description_ru' => 'Инвестиции в коммерческую недвижимость',
            'description_en' => 'Investments in commercial real estate',
            'description_zh' => '商业地产投资',
            'description_fr' => 'Investissements dans l`immobilier commercial',
            'description_de' => 'Investitionen in Gewerbeimmobilien'
        ]);

        DB::table('tariff_plans')->insert([
            'title' => 'Portfolio 4',
            'min_invest' => 3000,
            'max_invest' => 5000,
            'profit' => 3,
            'deposit_term' => 60,
            'description_ru' => 'Инвестиции в ценные бумаги и облигации',
            'description_en' => 'Investments in securities and bonds',
            'description_zh' => '证券和债券投资',
            'description_fr' => 'Placements en titres et obligations',
            'description_de' => 'Anlagen in Wertpapieren und Obligationen'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Portfolio 5',
            'min_invest' => 5000,
            'max_invest' => 10000,
            'profit' => 5,
            'deposit_term' => 75,
            'description_ru' => 'Инвестиции в APO, ICO и нейросети',
            'description_en' => 'Investments in securities and bonds',
            'description_zh' => '证券和债券投资',
            'description_fr' => 'Placements en titres et obligations',
            'description_de' => 'Anlagen in Wertpapieren und Obligationen'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Invest Portfolio',
            'min_invest' => 5000,
            // 'max_invest' => 10000,
            'profit' => 7,
            // 'deposit_term' => 75,
            'description_ru' => 'Для инвесторов финансист подбирает индивидуальное Portfolio с более выгодной процентной ставкой   ',
            'description_en' => 'Investments in securities and bonds',
            'description_zh' => '证券和债券投资',
            'description_fr' => 'Placements en titres et obligations',
            'description_de' => 'Anlagen in Wertpapieren und Obligationen'
        ]);

        DB::table('payment_currencies')->insert([
           'title' => 'USD',
           'payee_account' => 'U25123194',
           'payment_id' => 'unique_usd_payment',
            'payee_name' => 'Unique USD Payment',
        ]);
//        E25519821


    }
}
