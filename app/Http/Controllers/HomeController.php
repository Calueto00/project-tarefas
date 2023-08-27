<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){

            if($request->date){
                $filteredDate = $request->date;
            }else{
                $filteredDate = date('Y-m-d');
            }

        $carbonDate = Carbon::createFromDate($filteredDate);
        $data['date_as_string'] = $carbonDate->format('d \d\e M');
        $data['prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['next_button'] = $carbonDate->addDay(2)->format('Y-m-d');
        $data['tasks'] = Task::whereDate('due_date', date($filteredDate))->get();
        $data['tasks_count'] = $data['tasks']->count();
        $data['AuthUser'] = Auth::user();

        return view('home',$data);
    }
}
