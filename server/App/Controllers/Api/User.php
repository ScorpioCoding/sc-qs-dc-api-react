<?php

namespace App\Controllers\Api;

use App\Core\Controller;

use App\Models\mUser;
use App\Models\mCommon;
use App\Utils\Functions;

/**
 *  Api User
 */
class User extends Controller
{
  protected function before()
  {
  }

  public function createAction($args = array())
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $method = $_SERVER['REQUEST_METHOD'];
    if ('POST' === $method) {
      $data = json_decode(file_get_contents('php://input'), true);
      if ($data) {
        $res = mUser::validate($data);
        $response = array();
        if ($res) {
          //There are errors 
          header('HTTP/1.1 200 OK');
          $response = $res;
        } else {
          // THere are no errors thus create user and redirect
          mUser::create($data);
          header('HTTP/1.1 200 OK');
          $response = "done";
        }
      } else {
        // No movie title was provided, we cannot get the movie
        header('HTTP/1.1 400 Bad Request');
        $response = "No data was provided!";
      }
    } else {
      header('HTTP/1.1 405 Method not allowed');
      $response = "Invalid Method";
    }
    // Display Results
    echo (json_encode($response));
  }

  public function updateAction($args = array())
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $method = $_SERVER['REQUEST_METHOD'];
    if ('PUT' === $method) {
      $data = json_decode(file_get_contents('php://input'), true);
      if ($data) {
        $res = mUser::validateUpdate($data);
        $response = array();
        if ($res) {
          //There are errors 
          header('HTTP/1.1 200 OK');
          $response = $res;
        } else {
          // THere are no errors thus create user and redirect
          mUser::update($data);
          header('HTTP/1.1 200 OK');
          $response = "done";
        }
      } else {
        // No movie title was provided, we cannot get the movie
        header('HTTP/1.1 400 Bad Request');
        $response = "No data was provided!";
      }
    } else {
      header('HTTP/1.1 405 Method not allowed');
      $response = "Invalid Method";
    }
    // Display Results
    echo (json_encode($response));
  }



  protected function after()
  {
  }
  //
  //END CLASS
}
