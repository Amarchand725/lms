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

    public function create()
    {
        return view('mail_setting.create');
    }

    public function store(Request $request)
    {
       /*  $this->validate($request, [
            'mail_mailer' => '["required",max:255]',
            'mail_host' => '["requited","max:255"]',
            'mail_port' => '["requited","max:255"]',
            'mail_username' => '["requited","max:255"]',
            'mail_password' => '["requited","max:255"]',
            'mail_encryption' => '["max:255"]',
            'mail_from_name' => '["max:255"]',
        ]); */

        $model = MailSetting::create([
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
            'mail_from_name' => $request->mail_from_name,
        ]);

        \LogActivity::addToLog('SMTP setting Added');
        return redirect()->back()->withStatus(__('SMTP setting Added Successfully !.'));
    }

    public function edit($id)
    {
        $mail_setting = MailSetting::where('id', $id)->first();
        return view('mail_setting.edit', compact('mail_setting'));
    }

    public function update(Request $request, $id)
    {
        $model = MailSetting::where('id', $id)->first();
        $model->mail_mailer = $request->mail_mailer;
        $model->mail_host = $request->mail_host;
        $model->mail_port = $request->mail_port;
        $model->mail_username = $request->mail_username;
        $model->mail_password = $request->mail_password;
        $model->mail_encryption = $request->mail_encryption;
        $model->mail_from_address = $request->mail_from_address;
        $model->mail_from_name = $request->mail_from_name;
        $model->update();

        \LogActivity::addToLog('SMTP setting Updated');
        return redirect()->back()->withStatus(__('SMTP setting Updated Successfully !.'));
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
