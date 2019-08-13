<?php
/*
 *
 *base Controller
 *loads the models and views
 */
class Controller
{
  public function model($model)
  {
    // Require model file
    require_once '../app/models/' . $model . '.php';
    //  Instantiate mode
    return new $model();
  }
  // load view
  public function view($view, $data = [])
  {
// if view file
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      die('View does not exists');
    }
  }
}