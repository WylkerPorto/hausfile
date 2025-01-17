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
        return Inertia::render('Welcome');
    }

    public function Dashboard()
    {
        $data = ['form' => Auth::user(), 'isLogged' => Auth::check()];
        return Inertia::render('Dashboard', $data);
    }

    public function Admin()
    {
        $data = ['title' => 'Painel'];
        return Inertia::render('Admin/Home', $data);
    }
}
