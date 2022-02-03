<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Book;
use App\Models\Space;
use App\Models\Notice;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $asset = Asset::count();
        $book = Book::count();
        $space = Space::count();
        $notices = Notice::all();
        return view('index', [
            'asset' => $asset,
            'book' => $book,
            'space' => $space,
            'notices' => $notices,
        ]);
    }
}
