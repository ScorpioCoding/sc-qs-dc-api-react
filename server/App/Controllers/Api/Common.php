<?php

namespace App\Controllers\Api;

use App\Core\Controller;

use App\Models\mCommon;

use App\Utils\Functions;

/**
 *  Api Common
 */
class Common extends Controller
{
  protected function before()
  {
  }

  public function readByIdAction($args = array())
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $method = $_SERVER['REQUEST_METHOD'];
    if ('GET' === $method) {
      parse_str(file_get_contents('php://input'), $_GET);
    }

    if ($args["id"] && $args["id"] > 0) {

      $res = mCommon::readTableById($args['table'], $args['id']);
      // Functions::pre_dump($res);
      // exit();
      $response = array();
      if ($res) {
        //Successfully  
        header('HTTP/1.1 200 OK');
        // foreach ($res as $key => $value) {
        //   $response[$key] = $value;
        // }
        $response = $res;
      } else {
        // There was an error
        header('HTTP/1.1 500 Internal Server Error');
        $response['error'] = "Could not execute query";
      }
    } else {
      // No movie title was provided, we cannot get the movie
      header('HTTP/1.1 400 Bad Request');
      $response['error'] = "Please provide a exact table & id?";
    }
    // Display Results
    echo (json_encode($response));
  }

  public function readAllAction($args = array())
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $res = mCommon::readTable($args['table']);
    $response = array();
    if ($res) {
      //Successfully  
      header('Content-Type: application/json');
      header('HTTP/1.1 200 OK');
      foreach ($res as $key => $value) {
        $response[$key] = $value;
      }
    } else {
      // There was an error
      header('Content-Type: application/json');
      header('HTTP/1.1 500 Internal Server Error');
      $response['error'] = "Could not execute query";
    }

    // Display Results
    echo (json_encode($response));
  }

  public function deleteByIdAction($args = array())
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $method = $_SERVER['REQUEST_METHOD'];
    if ('DELETE' === $method) {
      //$data = json_decode(file_get_contents('php://input'), true);
      if (isset($args['table']) && isset($args['id'])) {
        $res = mCommon::readTableById($args['table'], $args['id']);
        if ($res) {
          $res = mCommon::deleteById($args['table'], $args['id']);
          if ($res) {
            header('HTTP/1.1 200 OK');
            $response = 'done';
          } else {
            header('HTTP/1.1 500 Internal Server Error');
            $response = "Could not execute query";
          }
        } else {
          header('HTTP/1.1 400 Bad Request');
          $response = "Record does not exists";
        }
      } else {
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
