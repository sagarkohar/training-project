<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\CssSelector\Node\FunctionNode;

class rolepermission extends Controller
{


    // to show designations 

    public function designation()
    {

        $user = User::first();

        $super_admin = Role::where("name", "SuperAdmin")->first();

        if ($super_admin) {

            $user->assignRole([$super_admin->name]);
        }

        $designations = Role::orderBy("created_at", "ASC")->paginate(6);

        return view("rolepermission.designation", compact("designations"));
    }

    // show the form to add designations

    public function addDesignationView()
    {
        return view("rolepermission.add_designation");
    }

    // to call the method to add the designations

    public function addDesignationMethod(Request $request)
    {

        $request->validate(
            [
                "designation_name" => "required|min:2|max:20|unique:roles,name",
            ]
        );

        $insert = new Role();

        $insert->name = $request['designation_name'];
        $insert->save();

        return redirect("/designations")->with("success", "New Designations has been added");
    }

    // to show the permissions

    public function permissions()
    {

        $permissions = Permission::orderBy("created_at", "asc")->paginate(10);
        return view("rolepermission.permission", compact("permissions"));
    }

    public function addPermissionView()
    {
        return view("rolepermission.add_permission");
    }

    public function addPermissionMethod(Request $request)
    {
        $request->validate(
            [
                "permission_name" => "required|min:2|max:20|unique:permissions,name",
            ]
        );

        $insert = new Permission();

        $insert->name = $request['permission_name'];
        $insert->save();


        return redirect("/permissions")->with("success", "New permissions has been added");
    }
    public function showPermissionRole($r)
    {


        $permissions = Permission::orderBy("name", "ASC")->get();
        $role = Role::where('name', $r)->first(); // Replace `$r` with the role name or ID.

        return view("rolepermission.show_permission_role", compact("permissions", "r", "role"));
    }

    public function assignPermission(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'role' => 'required|exists:roles,id',  // Ensure the role exists in the database
            'rolepermission' => 'array',  // Ensure rolepermission is an array
            'rolepermission.*' => 'exists:permissions,name',  // Ensure each permission exists in the permissions table
        ]);

        // Find the role by its ID
        $role = Role::find($request->role);

        // Sync the permissions to the role
        $role->syncPermissions($request->rolepermissions);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Permissions assigned successfully!');
    }


    public function users()
    {

        $user_details = User::orderBy("created_at", "asc")->paginate(10);
        return view("rolepermission.user_view", compact("user_details"));
    }

    public function userRole($user_email)
    {


        $roles = Role::all();

        $user = User::where("email", $user_email)->first();

        $user_roles = $user->getRoleNames();
        return view("rolepermission.assign_role", compact("user_email", "roles", "user_roles"));
    }

    public function  assignRoles(Request $request)
    {

        $user_email = $request['user_email'];

        $user = User::where("email", $user_email)->first();

        $user->syncRoles($request['roles']);

        return redirect()->back()->with("success", "Role has been assigned successfully");
    }


    public function profile()
    {
        $roles = Role::all();

        $permissions = Permission::orderBy("name", "ASC")->get();


        return view("rolepermission.profile", compact("roles", "permissions"));
    }

    public function viewUser($name)
    {
        echo "This is view page of " . $name . " user";
    }

    public function deleteUser($name)
    {
        echo "This is delete page of " . $name . " user";
    }
    public function editUser($name)
    {
        echo "This is edit page of " . $name . " user";
    }
    public function createUser()
    {
        echo "This is create page of  user";
    }

    public function assets()
    {
        return view("rolepermission.assets_table");
    }

    public function viewAssets()
    {
        echo "this is viewAssets page";
    }

    public function deleteAssets()
    {
        echo "this is deleteAssets page";
    }
    public function editAssets()
    {
        echo "this is editAssets page";
    }
    public function createAssets()
    {
        echo "this is createAssets page";
    }
    public function recordAssets()
    {
        echo "this is recordAssets page";
    }

    public function rec_ownAssets()
    {
        echo "this is rec_ownAssets page";
    }
}
