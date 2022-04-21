<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailSetting;

class MailSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function putPermanentEnv($key, $value)
{
    $path = base_path('.env');

        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key), $key . '='."", file_get_contents($path)
            ));

            file_put_contents($path, str_replace(
                $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
            ));
        }
}

    public function setting(){

     $data = MailSetting::first();

    

     putenv ("MAIL_MAILER=".$data->mail_mailer);
     putenv ("MAIL_HOST=".$data->mail_host);
     putenv ("MAIL_PORT=".$data->mail_port);
     putenv ("MAIL_USERNAME=".$data->mail_username);
     putenv ("MAIL_PASSWORD=".$data->mail_password);
     putenv ("MAIL_ENCRYPTION=".$data->mail_encryption);
     putenv ("MAIL_FROM_ADDRESS=".$data->mail_from_address);
     putenv ("MAIL_FROM_NAME=".$data->mail_from_name);
      
      $x = array(
        "MAIL_MAILER" =>  env("MAIL_MAILER"),
        "MAIL_HOST" =>  env("MAIL_HOST"),
        "MAIL_PORT" =>  env("MAIL_PORT"),
        "MAIL_USERNAME" =>  env("MAIL_USERNAME"),
        "MAIL_PASSWORD" =>  env("MAIL_PASSWORD"),
        "MAIL_ENCRYPTION" =>  env("MAIL_ENCRYPTION"),
        "MAIL_FROM_ADDRESS" => env("MAIL_FROM_ADDRESS"),
        "MAIL_FROM_NAME" =>  env("MAIL_FROM_NAME"),
      );

      print_r($x);


    }
}
