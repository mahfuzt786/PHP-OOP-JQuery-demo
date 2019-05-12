<?php

    function getRequest( $varName)
    {
        if (isset($_REQUEST[$varName]))
            return $_REQUEST[$varName];
        else 
            return "null"; 
    }

    function getRequestDefault( $varName, $default)
    {
        if (isset($_REQUEST[$varName]))
            return $_REQUEST[$varName];
        else 
            return $default; 
    }
    
    function getPost( $varName)
    {
        if (isset($_POST[$varName]))
            return $_POST[$varName];
        else 
            return "null"; 
    }
       
    function getPostDefault( $varName, $default)
    {
        if (isset($_POST[$varName]))
            return $_POST[$varName];
        else 
            return $default; 
    }
    
    function getRequestPost( $varName) {
        if (isset($_REQUEST[$varName]))
            return $_REQUEST[$varName];
        elseif (isset($_POST[$varName]))
            return $_POST[$varName];
        else 
            return "null"; 
    }
    
    function getRequestPostDefault( $varName, $default) {
        if (isset($_REQUEST[$varName]))
            return $_REQUEST[$varName];
        elseif (isset($_POST[$varName]))
            return $_POST[$varName];
        else 
            return $default; 
    }
    
    function getSession ($varName)
    {
        if (isset($_SESSION[$varName] ))
            return $_SESSION[$varName] ;
        else 
            return "null";         
    }
     
    function getSessionDefault ($varName, $default)
    {
        if (isset($_SESSION[$varName] ))
            return $_SESSION[$varName] ;
        else 
            return $default;         
    }
    
    function cleanValue ($varName)
    {
        return (trim(stripslashes($varName)));
    }
    
    function removeNonNumbers($String)
    {
        return preg_replace("/[^0-9]/", "", $String);
    }
?>
