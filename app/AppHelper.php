<?php
namespace App;

use Illuminate\Support\Facades\DB;

class AppHelper
{

      public static function RANDOM_chuoi($val)
      {
         $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
         $text = substr(str_shuffle($alphanum), 0, $val);
         return $text;
      }

      public static function STRIP_tag_text($text){
            $text = strip_tags($text);
            $text = str_replace("<script>", "", $text);
            $text = str_replace('"', "&quot;", $text);
            return stripslashes(trim($text));
      }

      public static function ACTION_db($array, $table, $kieu = 'add', $array_remove = array(), $condition = NULL){
            try {
                  $table = env("DB_PREFIX") . $table;
                  if ($kieu == 'delete') {
                        $sqldel = DB_que("DELETE FROM ". $table ." WHERE " .$condition . "");
                        return true;
                  }
                  $bang_db = "";
                  $bang_value = "";
                  $soluong = count($array);
                  foreach ($array as $key => $value) {
                        if ($kieu == 'add') {
                              if (@in_array($key, $array_remove)) continue;
                              $bang_db .= "`$key`,";
                              $bang_value .= "'" . $value . "',";
                        }
                        if ($kieu == 'update') {
                              if (@in_array($key, $array_remove)) continue;
                              $bang_db .= "`$key`='" . $value . "',";
                        }
                  }
                  $bang_db = substr($bang_db, 0, -1);
                  $bang_value = substr($bang_value, 0, -1);
                  if ($kieu == 'add') {
                        DB::insert("INSERT INTO ". $table ." (".$bang_db.") VALUES(". $bang_value. ")");
                  }
                  if ($kieu == 'update') {
                        DB::update("UPDATE ". $table. " SET ".$bang_db." WHERE ".$condition."");
                  }
                  return true;
            } catch (Throwable $exception){
                  return false;
            }
      }

      public static function LOC_char($val){
          $val = addslashes(trim($val));
          $val = htmlentities($val, ENT_QUOTES, "UTF-8");
          return $val;
      }

      public static function AOK($sql, $table, $where = "", $order_by = "", $limit = "", $col = "", $where_clear = "", $returnsql = false)
      {
            if ($where != "" && $where_clear != '') $where = "WHERE $where ";
            elseif ($where == "" && $where_clear != '') $where = "";
            else {
                  $where = "WHERE `showhi` = 1 " . ($where != "" ? " AND $where " : "");
            }
            if ($order_by != "") $order_by = "ORDER BY $order_by ";
            if (!empty($limit)) $limit = "LIMIT $limit ";
            $where_keys = "SELECT $sql FROM $table $where $order_by $limit ";
            return $where_keys;
      }

    public static function GET_ip()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public static function LOC_charnew_v2($val){
        $val = addslashes(trim($val));
        $val = html_entity_decode($val, ENT_QUOTES, "UTF-8");
        $val = strip_tags($val);
        return $val;
    }

    public static function SHOW_text($text)
    {
        if ($_SESSION['sub_demo_check']) {
            $text = str_replace($_SESSION['sub_demo'], "", $text);
        }
        $text = preg_replace("/\[mp4](.*)\[mp4]/i", '<div class="video_id_1">
                <video width="100%" controls>
                    <source src="$1" type="video/mp4">
                </video>
                </div>', $text);

        if (defined("MOTTY")) {
            $text = preg_replace("/<table(.*?)>/i", '<div class="dv-table-reposive-n"><table$1>', $text);
            $text = preg_replace("/<\/table>/i", '</table></div>', $text);
            $text = preg_replace("/\[check]/i", '<img class="img_tich" src="images/icon-check-pink.png">', $text);
        }

        $text = preg_replace("/\[mp3](.*)\[mp3]/i", '<div class="video_id_1">
                audio controls>
                    <source src="$1" type="audio/mpeg">
                    </audio>
                </div>', $text);
        $text = str_replace("<script>", "", $text);
        return stripslashes(trim($text));
    }
    public static function buildTree(array $elements, $parentId = 0)
    {
        $branch = array();
        foreach ($elements as $element)
        {
            if ($element->id_parent == $parentId)
            {
                $children = self::buildTree($elements, $element->id);
                if ($children)
                    $element->children = $children;
                $branch[] = $element;
            }
        }
        return $branch;
    }

    public static function CONVERT_vn($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/( )/", '-', $str);
        $str = preg_replace("/%/", 'Phan-Tram', $str);
        $str = preg_replace("@[^A-Za-z0-9./\-_]+@i", "", $str);
        $str = preg_replace("/(--)/", '-', $str);
        $str = preg_replace("/:/", '-', $str);
        $str = str_replace("/", '-', $str);
        return trim($str, "-");
    }
}
