<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $view = view('home');
        $todos = todo::query()->where('user_id', '=', \Auth::id())->get();
        $view->with("todos", $todos);
        return $view;

    }

    public function postIndex() {
        $id = Input::get('id');

        $todo = todo::findOrFail($id);


            $todo->mark();


        return Redirect::route('home');


    }

    public function getNew(){
        return View::make('new');
    }

    public function postNew() {
        $rules = array('name' => 'required|min:3|max:300');
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()){
            return Redirect::route('new')->withErrors($validator);
        }

        $todo = new Todo;
        $todo->todo_eintrag = Input::get('name');

        $todo->user_id = Auth::user()->id;

        $todo->save();

        return Redirect::route('home');

    }

    public function getDelete(todo $task){

        $task->delete();
        return Redirect::route('home');
    }

    public function getEdit(todo $task){
        $view=view('edit');
        $view->with("todo_eintrag", $task);
        return $view;
    }

    public function save(Request $request, todo $task){
        $data = $request->all();
        $name = $data['name'];

        $task->todo_eintrag = $name;
        $task->save();

        return Redirect::route('home');
    }

}
