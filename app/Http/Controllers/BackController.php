<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;
use PDO;

class BackController extends Controller
{

  public function __construct()
  {
    $app_id = 'U2Ww602X94dlT8biFvPMw16mkJM9yDHH6SMQo5O3';
    $rest_key  = 'Nc3nIB1tt4Txx7mdhkilkihxgzA8phdSqo4wQ6G5';
    $master_key = '2d7xAAEoZDlufvBFewT4f1vzjZ3nzcm6nraLDz9q';

    ParseClient::initialize($app_id, $rest_key, $master_key);
    ParseClient::setServerURL('https://parseapi.back4app.com/', '/');
  }

  // public function index()
  // {
  //   $myFirstClass = new ParseObject("MyFirstClass");

  //   $myFirstClass->set("name", "I'm able to save objects!");

  //   try {
  //     $myFirstClass->save();
  //     echo 'New object created with objectId: ' . $myFirstClass->getObjectId();
  //   } catch (ParseException $ex) {
  //     echo 'Failed to create new object, with error message: ' . $ex->getMessage();
  //   }
  // }

  public function createDikaProgrammer(Request $request)
  {
    $programmer = new ParseObject('Programmers');
    $programmer->set('name', $request->input('name'));
    $programmer->set('yearOfBirth', (int) $request->input('dob'));
    $programmer->set('email', $request->input('email'));
    $programmer->set('language', $request->input('language'));

    try {
      $programmer->save();
      return back();
      echo "Success";
    } catch (ParseException $e) {
      echo $e->getMessage();
    }
  }

  public function show()
  {
    return view('create');
  }

  public function programmersData()
  {
    $query = new ParseQuery("Programmers");
    // $query->includeAllKeys();
    $results = $query->find();

    // foreach ($results as $x) {
    //   # code...
    for ($i = 0; $i < count($results); $i++) {
      $objects = $results[$i];
      $id = $objects->getObjectId();
      $name = $objects->get('name');
      $email = $objects->get('email');
      $dob = $objects->get('yearOfBirth');
      $language = $objects->get('language');

      echo $id . " " . $name . " " . $email . " " . $dob . " " . $language . " " . "<br>";
      // return response()->json([
      //   'objectId' => $id,
      //   'name' => $name,
      //   'email' => $email,
      //   'yearOfBirth' => $dob,
      //   'language' => $language
      // ]);
    }

    // return response()->json([
    //   'objectId' => $id,
    //   'name' => $name,
    //   'email' => $email,
    //   'yearOfBirth' => $dob,
    //   'language' => $language
    // ]);
    // foreach ($results as $x) {
    //   # code...
    //   $id = $x->getObjectId();
    //   $name = $x->get('name');
    //   $email = $x->get('email');
    //   $dob = $x->get('yearOfBirth');
    //   $language = $x->get('language');

    //   return response()->json([
    //     'objectId' => $id,
    //     'name' => $name,
    //     'email' => $email,
    //     'yearOfBirth' => $dob,
    //     'language' => $language
    //   ]);
    // }

    // for ($i = 0; $i < count($results); $i++) {
    //   $object = $results[$i];
    //   echo $object->getObjectId() . " " . $object->get('name');
    //   // return response()->json($name);
    // }
    // return response()->json($results);
    // echo "Successfully retrieved " . count($results) . " scores.";
    // Do something with the returned ParseObject values
    // for ($i = 0; $i < count($results); $i++) {
    //   $object = $results[$i];
    //   echo $object->getObjectId() . ' - ' . $object->get('name') . " ";
    // }
  }
}
