<?php

namespace App\Services;

use Hashids\Hashids;

class HashService
{
  public function instance()
  {
    $hashids = new Hashids('abibleblue', 15);

    return $hashids;
  }

  static function encode($id)
  {
    $hashids = new HashService();

    $hashids = $hashids->instance();

    return  $hashids->encode($id);
  }

  static function decode($id)
  {
    $hashids = new HashService();

    $hashids = $hashids->instance();

    return  $hashids->decode($id)[0];
  }
}
