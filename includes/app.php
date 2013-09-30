<?php
  function setPage () {
    $page = "";
    if (isset($_GET['q'])) {
      $q = explode("/", $_GET['q']);
      var_dump($q);
      $q = str_replace("-", " ", $q);
      var_dump($q);

    }
    return $page;
  }
  
  function getXML () {
    
  }