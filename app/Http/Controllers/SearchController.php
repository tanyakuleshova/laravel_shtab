<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class SearchController extends Controller
{

    function search(Request $request)
    {

        if($request->ajax()){
            $param_term = $request->get('term');
            $rows = News::where('h1', 'like', '%'.$param_term.'%')
                            ->orderBy('id', 'desc')->get();
            if($rows){
                \Session::put('res', $rows);
                foreach($rows as $row){
                    echo "<p>" . $row['h1'] . "</p>";
                }
            }
                echo "<p>No matches found</p>";

        } else {
            $rows = \Session::get('res');
            return view('search_result', compact('rows'));
        }

    }

}
