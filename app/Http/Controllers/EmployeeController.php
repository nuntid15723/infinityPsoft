<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use phpDocumentor\Reflection\PseudoTypes\False_;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;
use App\Models\Department;
use Illuminate\Support\Facades\File;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'updateemployee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //

    //     $departmentList = Department::all();
    //     $users = User::whereNotIn('roleid',[0,2])->get();
    //     $users_not = User::whereNotIn('roleid',[1,3])->get();
    //     // $sum_salary = $users->sum('salary');
    //     return view('admin.employee.Employee', compact('users', 'departmentList','users_not'));
    // }
    public function index()
    {
        //
        $departmentList = Department::all();
        $users = User::whereNotIn('roleid',[0,2])->where('emtype',0)->get();
        $users_not = User::whereNotIn('roleid',[1,3])->get();
        $users_admin = User::where('emtype',1)->get();
        return view('admin.employee.Employee', compact('users', 'departmentList','users_not','users_admin'));
    }
    public function index1()
    {
        //

        $departmentList = Department::all();
        $users_not = User::whereNotIn('roleid',[1,3])->get();
        // $sum_salary = $users->sum('salary');
        return view('admin.setting.employeesetting', compact('departmentList','users_not'));
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
    public function storeEmployee(Request $request)
    {
        //
        // dd(';dfsd');
        try {
            // dd($request->all());
            DB::beginTransaction();
            $table = new User;
            $table->emtype =  $request->emType;
            $table->roleid =  $request->roleId;
            if ($request->hasFile('emImg')) {
                $image = $request->file('emImg');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;
                $location = "imguse/" . $fileName;
                $img = Image::make($image)->save($location);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $table->emimg =  $fileName;
            }
            // if ($request->hasfile('emImg')) {
            //     $file = $request->file('emImg');
            //     $extention = $file->getClientOriginalExtension();
            //     $filename = time() . '.' . $extention;
            //     $file->move('imguse/', $filename);
            //     $table->emimg = $filename;
            // }
            $table->emid =  IdGenerator::generate(['table' => 'users', 'field' => 'emid', 'length' => 5, 'prefix' => "IP"]);
            $table->pnid =  $request->PnID;
            $table->fullname = $request->fullname;
            // $table->birthday = date('Y-m-d', strtotime($request->birthday));
            $birthday = $request->birthday;
            $arry1 = explode("/", $birthday);
            // dd($arry1);
            $day1 = $arry1[2] - 543;
            $table->birthday = $day1 . '-' . $arry1[1] . '-' . $arry1[0];
            // dd($day1);

            $table->gender = $request->gender;
            $table->bankimg =  $request->bankImg;
            if ($request->hasFile('bankImg')) {
                $image = $request->file('bankImg');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;
                $location = "imgbank/" . $fileName;
                $img = Image::make($image)->save($location);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $table->bankimg =  $fileName;
            }
            // if ($request->hasfile('bankImg')) {
            //     $file = $request->file('bankImg');
            //     $extention = $file->getClientOriginalExtension();
            //     $filename = time() . '.' . $extention;
            //     $file->move('imgbank/', $filename);
            //     $table->bankimg = $filename;
            // }
            $table->bankname =  $request->bankname;
            $table->banknumber =  $request->banknumber;
            $table->salary =  $request->salary;
            $table->taxname = $request->taxname;
            $table->department = $request->department;
            // $table->startwork = date('Y-m-d', strtotime($request->startwork));
            $startwork = $request->startwork;
            $arry = explode("/", $startwork);
            // dd($arry);
            $year = $arry[2] - 543;
            $table->startwork = $year . '-' . $arry[1] . '-' . $arry[0];
            $table->email = $request->email;
            $table->phonenumber =  $request->Phonenumber;
            $table->password = Hash::make($request->password);
            $table->save();
            Alert::success('บันทึกเรียบร้อย');
            DB::commit();
            return redirect()->routr('employee')->with('success', 'เพิ่มสำเสร็จ');
            // return response()->json([
            //     'successful' => true
            // ]);
            // DB::commit();
        } catch (\Throwable $th) {
            // DB::rollback();
            // // dd($th->getMessage());
            // return response()->json([
            //     'successful' => False,
            //     'msg' => $th->getMessage()
            // ]);
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
        // dd('fgdfg');
        $user = User::find($id);
        $user->birthday = Carbon::parse($user->birthday)->thaidate('j M Y');
        $user->startwork = Carbon::parse($user->startwork)->thaidate('j M Y');
        return response()->json($user);
        // return view('admin.employee.employee', ['users' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editemployee($id)
    {
        //
        // dd(';dfsd');
        // $departmentList = Department::get();
        $departmentList = Department::where('dpstatus', [1])->get();
        $user = User::find($id);
        // dd($user);
        return view('admin.employee.editEmployee', compact('user', 'departmentList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateemployee(Request $request, $id)
    {
        //
        try {

            // dd($request->all());
            $table = User::find($id);
            // dd($request->id);
            $table->emtype =  $request->emType;
            $table->roleid =  $request->roleId;
            if ($request->hasfile('cusImg')) {
                $destination = 'imguse/' . $table->emimg;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $image = $request->file('cusImg');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;
                $location = "imguse/" . $fileName;
                $img = Image::make($image)->save($location);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $table->emimg =  $fileName;
            }
            $table->emid =  $request->emId;
            $table->pnid =  $request->PnID;
            $table->fullname = $request->fullname;
            // $table->birthday = date('Y-m-d', strtotime($request->birthday));
            $birthday = $request->input('birthday');
            $arry1 = explode("/", $birthday);
            //   dd($arry1);
            $day1 = $arry1[2] - 543;
            $table->birthday = $day1 . '-' . $arry1[1] . '-' . $arry1[0];
            // dd($table->birthday);
            $table->gender = $request->gender;
            $table->bankimg =  $request->bankImg;
            if ($request->hasfile('bankImg')) {

                $destination = 'imgbank/' . $table->bankimg;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                // $file = $request->file('bankImg');
                // $extention = $file->getClientOriginalExtension();
                // $filename = time() . '.' . $extention;
                // $file->move('imgbank/', $filename);
                // $table->bankimg = $filename;
                $image = $request->file('bankImg');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;
                $location = "imgbank/" . $fileName;
                $img = Image::make($image)->save($location);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $table->bankimg =  $fileName;
            }
            $table->bankname =  $request->bankname;
            $table->banknumber =  $request->banknumber;
            $table->salary =  $request->salary;
            $table->taxname = $request->taxname;
            $table->department = $request->department;
            // $table->startwork = date('Y-m-d', strtotime($request->startwork));
            $startwork = $request->input('startwork');
            $arry = explode("/", $startwork);
            // dd($arry);
            $year1 = $arry[2] - 543;
            $table->startwork = $year1 . '-' . $arry[1] . '-' . $arry[0];
            // dd($year1);
            $table->email = $request->email;
            $table->phonenumber =  $request->Phonenumber;
            if (!empty($request->password)) {
                $table->password = $request->password;
            }
            $table->save();
            //  DB::commit();
            Alert::success('แก้ไขเรียบร้อย');
            // Alert::success('แก้ไขเรียบร้อย     ', 'You\'ve Successfully Registered');
            // return redirect()->back()->with('success', 'เพิ่มสำเสร็จ');
            return redirect()->route('employee')->with('success', 'เพิ่มสำเสร็จ');
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th->getMessage());
            return response()->json([
                'successful' => False,
                'msg' => $th->getMessage()
            ]);
            // return redirect()->back()->with('error', 'ไม่สำเร็จ');
        }
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
        $table = User::find($id);
        $table->delete(); // Easy right?

        return redirect('/employee')->with('success', 'Stock removed.');
    }
}
