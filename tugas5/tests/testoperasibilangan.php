<?php
use PHPUnit\Framework\TestCase;

class testoperasibilangan extends TestCase {
  // test penambahan
  public function testTambah() {
    $this->assertEquals(10, 5+5);
  }

  //test pengurangan
  public function testPengurangan() {
    $this->assertEquals(-2, 5-7);
  }
}