<?php

namespace App\Http\Controllers\Intern\Role;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * RoleController constructor.
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(20);
        return view('intern.role.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $permission = Permission::get();
        return view('intern.role.create',compact('permission'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        toastr()->success('Rolle erfolgreich erstellt');
        return redirect()->route('intern.role.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('intern.role.show',compact('role','rolePermissions'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('intern.role.edit',compact('role','permission','rolePermissions'));
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
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        toastr()->success('Rolle erfolgreich aktualisiert');
        return redirect()->route('intern.role.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();

        toastr()->success('Rolle erfolgreich gelöscht');
        return redirect()->route('intern.role.index');
    }
}
