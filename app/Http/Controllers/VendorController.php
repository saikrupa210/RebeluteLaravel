<?php

namespace App\Http\Controllers;
use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {

        $vendorList = Vendor::orderBy('id')->get();
        return response()->json($vendorList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $newVendor  = new Vendor([
            'vname' => $request->input('vname'),
            'vaddress' => $request->input('vaddress')
        ]);
        $newVendor->save();
        $newVendor->customers()->attach($request->input('vlist') === null ? [] : $request->input('clist'));
        return response()->json($newVendor);
    }
}
