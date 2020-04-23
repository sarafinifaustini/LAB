<?php
interface Crud
{
  public function save($con);
  public static function readAll($con);
  public function readUnique();
  public function search();
  public function update();
  public function removeOne();
  public function removeAll();
}
?>