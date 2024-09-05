<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\multimedia;
use App\Models\like;
use Illuminate\Support\Facades\Auth;

class BulletinController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $multimedia = multimedia::where('category_id', '6')->get();
        $boletin = multimedia::where('category_id', '7')->get();

        $likes = like::where('user_id', $userId)->pluck('multimedia_id')->toArray();

        return view('users.bulletin', [
            'multimedia' => $multimedia,
            'boletin' => $boletin,
            'likes' => $likes,
        ]);
    }

}
