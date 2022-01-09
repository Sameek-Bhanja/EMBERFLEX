<?php
class FormSanitizer{
    public static function sanitizeFormString($inputText) {
       $inputText = strip_tags($inputText);
       //$inputText = str_replace (" ", "", $inputText)
       $inputText = trim($inputText);
       return $inputText;
   }

    public static function sanitizeFormUsername($inputText) {
       $inputText = strip_tags($inputText);
       //$inputText = str_replace (" ", "", $inputText)
       $inputText = trim($inputText);
       return $inputText;
   }

    public static function sanitizeFormPassword($inputText) {
       $inputText = strip_tags($inputText);
       return $inputText;
   } 
    public static function sanitizeFormEmail($inputText) {
       $inputText = strip_tags($inputText);
       //$inputText = str_replace (" ", "", $inputText)
       $inputText = trim($inputText);
       return $inputText;
   }
}

?>