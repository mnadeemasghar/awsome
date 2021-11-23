<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_data(Request $request){

        $url = $request->url;

        $html =  file_get_contents($url);
        $apprun_position = strpos($html,'app.run');
        $apprun_string = substr($html,$apprun_position + 8);
        $apprun_ending = strpos($apprun_string,"catch");

        $apprun_string = substr($apprun_string, 0, $apprun_ending-14);


        //convert into string to array
        $data_array = json_decode($apprun_string, TRUE);

        return redirect()->back()->with("data",$data_array['data']['root'])->with('url',$request->url);
    }
}
