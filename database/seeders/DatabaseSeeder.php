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
            'title' => 'Silver',
            'min_invest' => 100,
            'max_invest' => 500,
            'profit' => 0.7,
            'deposit_term' => 21,
            'description_ru' => 'Инвестиционные сделки в области коммуникаций и IT технологий',
            'description_en' => 'Withdrawal is available from $50',
            'description_zh' => '可从50美元起提现',
            'description_fr' => 'Retraits disponibles à partir de 50 USD',
            'description_de' => 'Abhebungen sind ab US$50 möglich'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Platinum',
            'min_invest' => 1000,
            'max_invest' => 5000,
            'profit' => 3,
            'deposit_term' => 50,
            'description_ru' => 'Инвестиции в коммерческую недвижимость',
            'description_en' => 'Withdrawal is available from $50',
            'description_zh' => '可从50美元起提现',
            'description_fr' => 'Retraits disponibles à partir de 50 USD',
            'description_de' => 'Abhebungen sind ab US$50 möglich'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Gold',
            'min_invest' => 550,
            'max_invest' => 1000,
            'profit' => 1.5,
            'deposit_term' => 40,
            'description_ru' => ' Инвестиции в криптовалюту и торгово-валютные сделки',
            'description_en' => 'Withdrawal is available from $50',
            'description_zh' => '可从50美元起提现',
            'description_fr' => 'Retraits disponibles à partir de 50 USD',
            'description_de' => 'Abhebungen sind ab US$50 möglich'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Infinity',
            'min_invest' => 5000,
            'max_invest' => 10000,
            'profit' => 5,
            'deposit_term' => 60,
            'description_ru' => 'Инвестиции в ценные бумаги и облигации',
            'description_en' => 'Withdrawal is available from $50',
            'description_zh' => '可从50美元起提现',
            'description_fr' => 'Retraits disponibles à partir de 50 USD',
            'description_de' => 'Abhebungen sind ab US$50 möglich'
        ]);
        DB::table('tariff_plans')->insert([
            'title' => 'Invest Case',
            'min_invest' => 10000,
            'description_ru' => ' Индивидуальные условия для инвесторов
            <p>
              Для получения инвестиционного предложения свяжитесь с
              инвестиционным советником
            </p>',
            'description_en' => 'Business offers for existing investors',
            'description_zh' => '为现有投资者提供的商业机会',
            'description_fr' => 'Opportunités commerciales pour les investisseurs existants',
            'description_de' => 'Geschäftsmöglichkeiten für bestehende Investoren'
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
