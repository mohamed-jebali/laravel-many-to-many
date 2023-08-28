<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $id = Auth::id();
        $user = Auth::user();
        return view ('admin.projects.home',compact('id','user'));
    }
}
