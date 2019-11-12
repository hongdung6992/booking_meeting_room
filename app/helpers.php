<?php

// show error message validate
function errorMessage($fillable){
  if(isset($_SESSION['errors']) && isset($_SESSION['errors'][$fillable])){
    return  "<span class='invalid-feedback d-block'>".$_SESSION['errors'][$fillable]."</span>";
  }
}