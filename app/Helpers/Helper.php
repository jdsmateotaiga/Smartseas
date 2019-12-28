<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Auth;
use DateTime;

class Helper
{

    public static function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
          'y' => 'year',
          'm' => 'month',
          'w' => 'week',
          'd' => 'day',
          'h' => 'hour',
          'i' => 'minute',
          's' => 'second',
        );
        foreach ($string as $k => &$v) {
          if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
          } else {
                unset($string[$k]);
          }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public static function the_excerpt($string, int $limit)
    {
        if($string != null) {
          $strlen = strlen($string);
          if( $strlen > $limit ) {
            $content = substr($string, 0, $limit).'...';
          } else {
            $content = $string;
          }
          return $content;
        } else {
          return '--';
        }
    }

    public static function encrypt_id($id) {
        return Crypt::encrypt($id);
    }

    public static function decrypt_id($id) {
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {

        }
    }

    public function active_deactivate($model, $id, $value) {
      $decrypt_id = Helper::decrypt_id($id);
      $result = $model::find($decrypt_id);
      if( auth()->user()->hasRole('admin') || auth()->user()->id == $result->user_id ) {
        $result->active = $value;
        $result->update();
        return back();
      }
    }

    public static function activate($model, $id)
    {
        return (new self)->active_deactivate($model, $id, 1);
    }

    public static function deactivate($model, $id)
    {
        return (new self)->active_deactivate($model, $id, 0);
    }



}
