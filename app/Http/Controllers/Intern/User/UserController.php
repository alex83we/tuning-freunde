<?php

namespace App\Http\Controllers\Intern\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(20);
        return view('intern.user.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('intern.user.create',compact('roles'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        toastr()->success('Benutzer erfolgreich erstellt');
        return redirect()->route('intern.user.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('intern.user.show',compact('user'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('intern.user.edit',compact('user','roles','userRole'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
//            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        /*if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }*/
        if (!empty($input['banned'])) {
            $input['banned'] = Carbon::parse($input['banned'])->toDateTimeLocalString();
        } else {
            $input['banned'] = NULL;
        }
        if (!empty($input['is_checked'])) {
            $input['is_checked'] = 1;
        } else {
            $input['is_checked'] = 0;
        }

        $user = User::findOrFail($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        toastr()->success('Benutzer erfolgreich aktualisiert');
        return redirect()->route('intern.user.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        toastr()->success('Benutzer erfolgreich gelöscht');
        return redirect()->route('intern.user.index');
    }
}
