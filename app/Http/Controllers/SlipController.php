<?php

namespace App\Http\Controllers;

use App\Models\Slip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class SlipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slip = Slip::all();
        return view('admin.setting.tax', compact('slip'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            // dd($request->all());
            DB::beginTransaction();
            $table = new Slip();
            $table->pay_id =  $request->pay_id;
            $table->pay_company =  $request->pay_company;
            if ($request->hasFile('pay_imglogo')) {
                $image = $request->file('pay_imglogo');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;
                $location = "imguse/" . $fileName;
                $img = Image::make($image)->save($location);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $table->pay_imglogo =  $fileName;
            }
            $table->pay_address =  $request->pay_address;
            $table->salaries_id = $request->salaries_id;
            $table->save();
            Alert::success('Congrats', 'You\'ve Successfully Registered');
            DB::commit();
            return redirect()->back()->with('success', 'เพิ่มสำเสร็จ');
            return response()->json([
                'successful' => true
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            return response()->json([
                'successful' => False,
                'msg' => $th->getMessage()
            ]);
            return redirect()->back()->with('error', 'ไม่สำเร็จ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $slip = Slip::find($id);
        return response()->json($slip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd('fgdfgf');
        $slip = Slip::find($id);
        return view('admin.setting.tax1', compact('slip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $table = Slip::find($id);
        $table->pay_id =  $request->input('pay_id');
        $table->pay_company =  $request->input('pay_company');
        if ($request->hasfile('pay_imglogo')) {
            $destination = 'imguse/' . $table->pay_imglogo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('pay_imglogo');
            $extention = $image->getClientOriginalExtension();
            $fileName  = time() . '.' . $extention;
            $location = "imguse/" . $fileName;
            $img = Image::make($image)->save($location);
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);
            $table->pay_imglogo =  $fileName;
        }
        $table->pay_address =  $request->input('pay_address');
        $table->salaries_id = $request->input('salaries_id');
        $table->update();
        Alert::success('แก้ไขเรียบร้อย');
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
