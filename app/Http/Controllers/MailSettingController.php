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
     self::putPermanentEnv("MAIL_MAILER",null);
     self::putPermanentEnv("MAIL_HOST",null);
     self::putPermanentEnv("MAIL_PORT"," ");
     self::putPermanentEnv("MAIL_USERNAME"," ");
     self::putPermanentEnv("MAIL_PASSWORD"," ");
     self::putPermanentEnv("MAIL_ENCRYPTION"," ");
     self::putPermanentEnv("MAIL_FROM_ADDRESS"," ");
     self::putPermanentEnv("MAIL_FROM_NAME","");
      
    self::putPermanentEnv("MAIL_MAILER",$data->mail_mailer);
    self::putPermanentEnv("MAIL_HOST",$data->mail_host);
    self::putPermanentEnv("MAIL_PORT",$data->mail_port);
    self::putPermanentEnv("MAIL_USERNAME",$data->mail_username);
    self::putPermanentEnv("MAIL_PASSWORD",$data->mail_password);
    self::putPermanentEnv("MAIL_ENCRYPTION",$data->mail_encryption);
    self::putPermanentEnv("MAIL_FROM_ADDRESS",$data->mail_from_address);
    self::putPermanentEnv("MAIL_FROM_NAME",$data->mail_from_name);
      

     return ".env updated successfullly";


    }
}
