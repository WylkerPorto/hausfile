<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function Home()
    {
        $data = [
            'isLogged' => Auth::check(),
        ];
        return Inertia::render('Welcome', $data);
    }

    public function Admin()
    {
        $data = ['title' => 'Painel'];
        return Inertia::render('Admin/Home', $data);
    }

    public function Profile()
    {
        $data = ['title' => 'My Account', 'form' => Auth::user()];
        return Inertia::render('Account', $data);
    }
}
