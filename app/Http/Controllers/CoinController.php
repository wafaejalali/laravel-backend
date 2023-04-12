<?php

namespace App\Http\Controllers;
use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function index()
    {
        $coins = Coin::all();

        return response()->json($coins);
    }
}
