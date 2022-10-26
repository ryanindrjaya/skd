<?php

class Matematika {
  /**
   * ===============================================================
   * @param integer $bilanganBasic
   * @param integer $bilanganExponen
   * 
   * @return integer
   */

  public static function pangkatBilangan($bilanganBasic, $bilanganExponen) {
    $nilaiSekarang = 1;

    for ($i = 0; $i < $bilanganExponen; $i++) {
      $nilaiSekarang = $nilaiSekarang * $bilanganBasic;
    }

    return $nilaiSekarang;
  }
}