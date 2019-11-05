<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseUser;

class LoginController extends Controller
{
    public function __construct()
    {
        $app_id = 'U2Ww602X94dlT8biFvPMw16mkJM9yDHH6SMQo5O3';
        $rest_key  = 'Nc3nIB1tt4Txx7mdhkilkihxgzA8phdSqo4wQ6G5';
        $master_key = '2d7xAAEoZDlufvBFewT4f1vzjZ3nzcm6nraLDz9q';

        ParseClient::initialize($app_id, $rest_key, $master_key);
        ParseClient::setServerURL('https://parseapi.back4app.com/', '/');
    }

    public function userRegistration(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');

        $user = new ParseUser();
        $user->set("username", $username);
        $user->set("password", $password);
        $user->set("email", $email);

        try {
            $signUpUser = $user->signUp();
            if ($signUpUser) {
                echo 'berhasil sign up';
            } else {
                echo 'error';
            }
        } catch (ParseException $ex) {
            echo $ex->getMessage() . " gagal";
        }
    }

    public function showForm()
    {
        return view('register');
    }

    public function userLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        try {
            $userLogin = ParseUser::logIn($username, $password);
            if ($userLogin) {
                return 'Success';
            } else {
                return 'Failed';
            }
        } catch (ParseException $e) {
            return $e->getMessage();
        }
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
