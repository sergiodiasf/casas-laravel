<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\AvisoPromocional;

class EmailController extends Controller
{
    public function enviaEmail(){
        $destinatario = "beckermarcieleduardo@gmail.com";
        Mail::to($destinatario)->send(new AvisoPromocional());
    }
}
