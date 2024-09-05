<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
      {
          try {
              
              if (Auth::check()) {
                  
                  $user = Auth::user();

                  
                  $email = $user->email;
                  $password = $user->password;

                  Log::info('Usuario autenticado: ' . $email);

                  return view('admin.dashboard', compact('email', 'password'));
              } else {

                  return redirect()->route('login')->with('error', 'Debes estar autenticado para acceder a esta página.');
              }
          } catch (\Exception $e) {

              return "Error: " . $e->getMessage();
          }
      }


  	
}
