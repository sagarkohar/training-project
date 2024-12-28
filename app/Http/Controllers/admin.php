<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\vlogs;
use Illuminate\Http\Request;

class admin extends Controller
{
    function adminHome()
    {
        return view("adminFolder.admin_home");
    }

    function customerPermission()
    {

        $product_per = products::where("role", "customer")->first();
        $vlogs_per = vlogs::where("role", "customer")->first();
        return view("adminFolder.customerpermission", compact("product_per", "vlogs_per"));
    }

    function sellerPermission()
    {
        return view("adminFolder.sellerpermission");
    }

    function adminPermission()
    {
        return view("adminFolder.adminpermission");
    }

    function editCustomerPermission(Request $request)
    {


        $delp = products::where("role", "customer")->first();
        $delv = vlogs::where("role", "customer")->first();


        if ($delp) {
            $delp->delete();
        }

        $insert_pro_per = new products();

        $insert_pro_per->role = "customer";
        $insert_pro_per->view = $request['pview'];
        $insert_pro_per->delete = $request['pdelete'];
        $insert_pro_per->edit = $request['pedit'];
        $insert_pro_per->create = $request['pcreate'];


        $insert_pro_per->save();



        if ($delv) {
            $delv->delete();
        }


        $insert_vl_per = new vlogs();

        $insert_vl_per->role = "customer";
        $insert_vl_per->view = $request['vview'];
        $insert_vl_per->delete = $request['vdelete'];
        $insert_vl_per->edit = $request['vedit'];
        $insert_vl_per->create = $request['vcreate'];
        $insert_vl_per->save();




        return response()->json(["result" => "Success"]);
    }
}
