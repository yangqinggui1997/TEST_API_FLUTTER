<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    private $prefix = "";

     /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->prefix = env("DB_PREFIX");
    }

    public function getContact($id)
    {
        $query = DB::table("contact")->where("id", $id)->select("*")->first();
        if(!$query)
            return false;
        return $query;
    }

    public function createContact($args = [])
    {
        $query = false;

        DB::transaction(function () use(&$query, $args) {
            $query = DB::table("contact")->insert([
                "name" => $args['name'],
                "email" => $args['email'],
                "birth_day" => $args['birth_day'],
                "sex" => $args['sex'],
                "phone_number" => $args['phone_number'],
                "address" => $args['address']]);
        }, 3);
        if($query)
            return true;
        return false;
    }

    public function updateContact($args = [])
    {
        $query = false;

        DB::transaction(function () use(&$query, $args) {
            $query = DB::table("contact")->where("id", $args["id"])->update([
                "name" => $args['name'],
                "email" => $args['email'],
                "birth_day" => $args['birth_day'],
                "sex" => $args['sex'],
                "phone_number" => $args['phone_number'],
                "address" => $args['address']]);
        }, 3);
        if($query)
            return true;
        return false;
    }

    public function deleteContact($id)
    {
        $query = false;

        DB::transaction(function () use(&$query, $id) {
            $query = DB::table("contact")->where("id", $id)->delete();
        }, 3);
        if($query)
            return true;
        return false;
    }
}

