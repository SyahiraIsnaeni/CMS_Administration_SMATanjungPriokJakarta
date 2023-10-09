<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\Staf;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function guru()
    {
        $guru = Guru::all();

        return response()->json($guru);
    }

    public function staf()
    {
        $staf = Staf::all();

        return response()->json($staf);
    }
}
