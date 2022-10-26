<?php

use PHPUnit\Framework\TestCase;

class MatematikaTest extends TestCase {
  // test pangkat bilangan positif, positif
  public function testPositifSemua() {
    $hasilPangkat = Matematika::pangkatBilangan(2, 3);
    $this->assertEquals(8, $hasilPangkat);
  }

  // test pangkat bilangan negatif, positif
  public function testNegatifPositif() {
    $hasilPangkat = Matematika::pangkatBilangan(-3, 2);
    $this->assertEquals(9, $hasilPangkat);
  }

  // test pangkat bilangan positif, negatif
  public function testPositifNegatif() {
    $hasilPangkat = Matematika::pangkatBilangan(4, 2);
    $this->assertEquals(16, $hasilPangkat);
  }
  
  // test input tidak sesuai
  public function testInputNgawur() {
    $hasilPangkat = Matematika::pangkatBilangan(2, 5);
    $this->assertEquals(32, $hasilPangkat);
  }
}