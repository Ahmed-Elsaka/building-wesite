<?php

namespace App\Http\Controllers;
use App\BU;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use  App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Contracts\DataTable;
use DataTables;

class UsersController extends Controller
{

    public function index(){
      return view('admin.user.index');
    }
    public function create(){
        return view('admin.user.add');
    }


    protected function store(AddUserRequestAdmin $request, User $user)
    {
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return  redirect('/users')->withFlashMessage('the member has added successfully');
    }

    public function edit(  $id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
     }

   // public function update(  $id, User $user, Request $request){
    public function update(  Request $request, User $user){

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'admin' =>$request->admin
             ]);

            return  redirect('/users')->withFlashMessage('the member has added successfully');
        /*
        $userUpdated = $user->find($id) ;
        $userUpdated = $user->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('done ya man ');
        
        return 'iam xxxx method';
        */
    }
    public function show(User $user)
    {
        return 'iam in show message';
    }

    public function destroy($id, User $user){
        $user->find($id)->delete();
        BU::where('user_id',$id)->delete();  //dlete buildings related to this user
        return  redirect('/users')->withFlashMessage('the User '.$user->name.' has deleted successfully');
    }


    public function UpdatePassword(Request $request , User $user){


        $userUpdated = $user->find($request->user_id);
        $password = Hash::make($request->password);
        $userUpdated->fill(['password'=>$password])->save();
        return Redirect::back()->withFlashMessage('the password changed successfully');

    }

    public function anyData(User $user){
        $users = $user->all();
        return DataTables::of($users)
            ->editColumn('name', function($model){
                return $model->name;
            //return \Html::link('/users/'. $model->id .'/edit',$model->name, '/edit', $model->name);
            })
            ->editColumn('admin', function($model) {
                return $model->admin==0? "Member"    :'Manager';
               // return $model->admin == 0 ? '<span class="badge badge-info">' . 'member' . '</span>' : '<span class="badge badge-warning">' . 'Manager' . '</span>';
               // return $model->admin == 0 ? \Html::link('','member',array('class'=>'badge badge-info')):\Html::link('','Manager',array('class'=>'badge badge-info'));

            })

            ->editColumn('control', function($model){
                if($model->id !=1){
                    $var =\Html::link('/users/'. $model->id .'/edit','Edit/Delete',array('class'=>'btn btn-info btn-circle'));
                }else{
                    $var =\Html::link('/users/'. $model->id .'/edit','Edit Admin',array('class'=>'btn btn-danger btn-circle'));
                }

                return  $var;
            })
            ->make(true);


    }
}
