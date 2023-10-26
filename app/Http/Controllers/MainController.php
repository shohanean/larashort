<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function short(Request $request)
    {
        $insert_status = 0;
        do {
            $generated_link = Str::random(5);
            $insert_status = Link::insertOrIgnore([
                'orignal' => $request->link,
                'generated' => $generated_link,
                'valid_till' => Carbon::now()->addDays(3),
                'used' => true,
                'created_at' => Carbon::now()
            ]);
        } while ($insert_status == 0);
        $final_link = url('/') . "/" . $generated_link;
        return view('short', compact('final_link'));
    }
    public function redirect($generated_link)
    {
        $link = Link::where('generated', $generated_link)->first();
        $link->increment('noc');
        return redirect($link->orignal);
    }
}
