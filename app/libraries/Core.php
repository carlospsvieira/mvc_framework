<?php
//  * App Core Class
//  * Creates Url and loads core Controller
//  * URL FORMAT - /controller/method/params

class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->getUrl();

    // // Handle URL without without controller class name in it //
    //  if ($url[0] === 'add-product') {
    //   // Set controller to Pages
    //   $this->currentController = 'Pages';
    //   // Set method to newProduct
    //   $this->currentMethod = 'addProduct';
    //   // Unset 0 index
    //   unset($url[0]);
    // } else {
    //   // Look in controllers for first value
    //   if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
    //     // If exists, set as controller
    //     $this->currentController = ucwords($url[0]);
    //     // Unset 0 index
    //     unset($url[0]);
    //   }
    // }

    // Look in controllers for first value
    if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
      // If exists, set as controller
      $this->currentController = ucwords($url[0]);
      // Unset 0 index
      unset($url[0]);
    }

    // Require controller
    require_once '../app/controllers/' . $this->currentController . '.php';
    // Instantiate controller class
    $this->currentController = new $this->currentController;

    // Check for second part of url
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        // Unset 1 index
        unset($url[1]);
      }
    }

    // Get params
    $this->params = $url ? array_values($url) : [];
    // Callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
