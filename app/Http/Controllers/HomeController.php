<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\SendEmailNotification;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function send()
    {
        $user = User::find(2);
        $details=[
            "greeting" => "hi i m mohammed from laravel",
            "body" => "body line",
            "actiontext" => "clik her",
            "actionurl" => "www.facebook.com",
            "lastline" => "last line",
        ];
        Notification::route('mail', "mohammed.el-abidi@elephant-vert.com")->notify(new SendEmailNotification($details));
        //Notification::send(array(=> 'med'),new SendEmailNotification($details));
    }
}
