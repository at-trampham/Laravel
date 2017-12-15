<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  public function index(){
    $arrayUser=Auth::user();
    $idUser=$arrayUser->id;
    $arrTasks=Task::all()->where('user_id', $idUser);
    return view('tasks.index',['tasks'=>$arrTasks]);
  }
    public function create(){
      return view("tasks.create");
    }
    public function store(Request $request){
      $arrUsers=Auth::user();
      $idUser=$arrUsers->id;
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
    public function edit($id){
        $arrItem=Task::find($id);
        return view('tasks.edit',['tasks'=>$arrItem]);
    }
    public function update($id,Request $request){
        $arrItem=Task::find($id);
        $useridTask=$arrItem->user_id;
        $arrUsers=Auth::user();
        $idUser=$arrUsers->id;
        if($useridTask==$idUser||$idUser==1){
            $arrItem->name=$request->name;
            if($arrItem->update()){
                $request->session()->flash('msg','Cập nhật thành công');
                return redirect()->route('task.index');
            }
        }else{
            $request->session()->flash('msg','Bạn không có quyền sửa bài này');
            return redirect()->route('task.index');
        }

    }
    public function destroy($id,Request $request){
        $arrItem=Task::find($id);
        $useridTask=$arrItem->user_id;
        $arrUsers=Auth::user();
        $idUser=$arrUsers->id;
        if($useridTask==$idUser||$idUser==1){
           if($arrItem->delete()){
                $request->session()->flash('msg','Xóa thành công');
                return redirect()->route('task.index');
            }else{
                $request->session()->flash('msg','Có lỗi khi xóa');
                return redirect()->route('task.index');
            } 
        }else{
            $request->session()->flash('msg','Bạn không có quyền xóa bài này');
            return redirect()->route('task.index');
        }

        
    }

}
