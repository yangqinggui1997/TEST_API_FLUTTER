<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $prefix = "";
    public function __construct()
    {
        $this->prefix = env("DB_PREFIX");
    }
    public function run()
    {
        for($i = 0; $i < 10; ++$i)
            DB::insert("INSERT INTO ".$this->prefix."contact (name,email,birth_day,sex,phone_number,address) values (?, ?, ?, ?, ?, ?)", [Str::random(20), Str::random(20).".".Str::random(20)."@".Str::random(10).".com", date('Y-m-d'), mt_rand(0,1), "0".mt_rand(100000000, 999999999),Str::random(30)]);
    }
}
