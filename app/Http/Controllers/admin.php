<?php

namespace App\Http\Controllers;

use App\Models\designation;
use App\Models\models;
use App\Models\permission;
use App\Models\permmissions;
use App\Models\products;
use App\Models\vlogs;
use Illuminate\Http\Request;

class admin extends Controller
{
    function adminHome()
    {
        $designations = designation::all();
        return view("adminFolder.admin_home", compact("designations"));
    }


    function addDesignationView()
    {
        return view("adminFolder.add_designation");
    }

    function addDesignationMethod(Request $request)
    {

        $insert = new designation();

        $insert->designation_name = $request['designation'];
        $insert->save();
        return redirect("/admin-home");
    }

    function rolePermission($role)
    {


        $data = models::with(['getPermission' => function ($query) use ($role) {
            $query->where('role', $role);
        }])->get();



        return view("adminFolder.editpermission", compact("data", "role"));
    }

    public function editPermissionRole(Request $request)
    {
        foreach ($request->input('model') as $md) {
            // Check if the permission already exists
            $permission = Permission::where('role', $request->input('role'))
                ->where('models_id', $md['m'])
                ->first();


            if ($permission) {
                $permission->delete();
            }
            // Create a new permission if it doesn't exist
            $permission = new Permission();
            $permission->role = $request->input('role');
            $permission->models_id = $md['m'];

            // Update the permission fields
            $permission->view = $md['v'] ?? 'no';
            $permission->edit = $md['e'] ?? 'no';
            $permission->delete = $md['d'] ?? 'no';
            $permission->add = $md['a'] ?? 'no';

            // Save the permission
            $permission->save();
        }

        // Redirect or return response
        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }
}
