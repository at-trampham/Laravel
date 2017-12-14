<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
	public function index(){
		$arrTasks=Task::all();
		return view('task.index',['tasks'=>$arrTasks]);
	}
    public function create(){
    	return view("task.create");
    }
    public function store(Request $request){
    	$arrUser=Auth::user();
    	$idUser=$arrUser->id;
    	$arrItem=array(
    		'name'=>$request->name,
    		'user_id'=>$idUser,
    	);
    	if(Task::insert($arrItem)){
    	  $request->session()->flash('msg','Thêm thành công');
          return redirect()->route('task.index');

      }else{
          $request->session()->flash('msg','Có lỗi khi thêm');
          return redirect()->route('task.create');
      }
    }

}
