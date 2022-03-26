<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class mailController extends Controller
{
    public function send()
    {
    	Mail::send(['text'=>'mail'],['name'=>'Sarthak'],function($message){
    		$message->to('sandipbalpande.09@gmail.com','To Home')->subject('Test Email');
    		$message->from('sandipbalpande.09@gmail.com','To Home');
    	});
    }
}
