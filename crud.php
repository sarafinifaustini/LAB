<?php
interface Crud
{
// all methods have to be implemented by any class that implemented
// by any that implementes these interfaces
  public function save($con);
  public static function readAll($con);
  public function readUnique();
  public function search();
  public function update();
  public function removeOne();
  public function removeAll();
//   lab2
  public function valiteForm();
  public function createFormErrorSessions();
}
?>
