<?php
    function verifInput($input,$pattern = "")
    {
        if($pattern == "")
            return !empty($input);
        else
            return preg_match("#^$pattern$#",$input);
    }

    function inputValue($input,$option = "")
    {
        return isset($_POST[$input]) ? " value = '{$_POST[$input]}'" : "";
    }

    function isActive($link,$active)
    {
        return ($link == $active) ? 'class="active"' : '';
    }

    function upload()
    {
        
    }