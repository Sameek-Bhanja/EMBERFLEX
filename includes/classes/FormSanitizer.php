<?php
class FormSanitizer{
    public static function sanitizeFormString($inputText) {
       $inputText = strip_tags($inputText);
       //$inputText = str_replace (" ", "", $inputText)
       $inputText = trim($inputText);
       return $inputText;
   }

}

?>