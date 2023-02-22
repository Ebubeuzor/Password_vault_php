<?php

    function validate_input_text($textInput){
        if (!empty($textInput)) {
            
            $trim_input = trim($textInput);
            $sanitize_var = filter_var($trim_input, FILTER_SANITIZE_STRING);

            return $sanitize_var;

        }
        return "";
    }

    function validate_input_email($emailInput){
        if (!empty($emailInput)) {
            
            $trim_input = trim($emailInput);
            $sanitize_var = filter_var($trim_input, FILTER_SANITIZE_EMAIL);

            return $sanitize_var;

        }
        return "";
    }

?>




