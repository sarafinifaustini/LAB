<?php
 interface Crud
 {
   public function save($con, $target_file);
   public static function readAll($con);
   public function readUnique();
   public function search();
   public function update();
   public function removeOne();
   public function removeAll();

   public function validateForm();
   public function createFormErrorSessions();
 }
?>
