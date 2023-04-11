<?php
  class Pages {
    public function __construct() {

    }

    public function index() {
      echo 'Index work';
    }

    public function about($id) {
      echo $id;
    }
  }