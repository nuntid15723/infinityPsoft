<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Inventory;
use App\Models\Leave;
use App\Models\Notify;
use App\Models\Stock;
use App\Models\User;
use App\Models\Unit;
use App\Models\Slip;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function show()
    {

        $data = Notify::join('users', 'users.id', '=', 'notifies.user_id')->where('status_read', 0)
            ->select('notifies.id', 'notifies.status_read', 'notifies.type', 'notifies.created_at', 'users.fullname',)->get();
        // dd($data);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        Notify::where('status_read', 0)->update(['status_read' => 1]);

        return response()->json([
            'success' => true
        ]);
    }

    public function index()
    {
        // $data = [];
        $data['users'] = User::whereNotIn('roleid', [0, 2])->get();
        $data['leaves'] = Leave::get();
        $data['stock'] = Stock::whereNotIn('ststatus', [0])->get();
        $leaves = Leave::where(DB::raw('YEAR(created_at)'), '=', date('Y'))->where('pnid', 1)->get();;
        $user = User::whereNotIn('roleid', [0, 2])->get();
        $stock = Stock::get();
        $data['count_users'] = $user->count();
        $data['count_leavesum'] = $leaves->count();
        $leaves = Leave::where(DB::raw('YEAR(created_at)'), '=', date('y'))->get();

        $data['count_stocksprice'] = 0;
        foreach ($data['stock'] as $stock) {
            $data['count_stocksprice'] += $stock->stprice;
            // dd($data['count_stocksprice']);
        }
        $data['count_salary'] = 0;
        foreach ($data['users'] as $user) {
            $data['count_salary'] += $user->salary;
        }
        $data['resultt'] = 0;
        foreach ($data['stock'] as $key_stock => $stock) {
            $date = strtotime(date('Y-m-d'));    //?????????????????????????????????
            $stdaybuy =  strtotime($stock->stdaybuy);   //??????????????????????????????
            $year = ($date - $stdaybuy);    //??????????????????????????????????????????????????????????????????
            $amont = abs(round($year / 86400));     // ???????????????????????????????????????
            $stmath = floatval($stock->stmath);     //??????????????????????????????????????????????????????????????????
            $strprice = floatval($stock->stprice);  //????????????????????????
            $stageuse = floatval($stock->stageuse) - $amont;    //???????????????????????????????????????????????? ?????? ???????????????????????????????????????
            $depreciation = ($stmath * $amont);     //?????????????????????????????????????????????????????????????????? ????????? ???????????????????????????????????????
            $resultt =  $data['count_stocksprice'] - $depreciation;
            $data['resultt'] = $resultt;
            // dd( $data['resultt']);
        }
        return view('admin.dashboard', $data);
    }
    public function profile()
    {
        $dp = Department::get();
        $stockList = User::join('stocks', 'stocks.stusers', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->get();
        $departList = User::join('department', 'department.id', '=', 'users.department')
            // ->join('stocks', 'stocks.stusers', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            // ->select('stocks.stusers')
            ->first();
        // dd($departList);
        return view('admin.profile', compact('departList', 'dp', 'stockList'));
    }
    public function updateprofile(Request $request)
    {
        try {
            // dd($request->all());
            $table = User::find($request->id);
            if ($request->hasfile('emImg')) {
                $destination = 'imguse/' . $table->emimg;
                $image = $request->file('emImg');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;
                $location = "imguse/" . $fileName;
                $img = Image::make($image)->save($location);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $table->emimg = $fileName;
                $table->save();
                File::delete($destination);
            }
            // dd($request->all());
            // $table->save();
            //  DB::commit();
            Alert::success('??????????????????????????????????????????');
            return redirect()->route('profilee')->with('success', '????????????????????????????????????');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('profilee')->with('error', '???????????????????????????');
        }
    }
    public function chart($year)

    {

        // $year = intval($yearr)-543;
        $year = intval($year);
        // dd($year);
        $months = collect();
        $round_l1 = collect();
        $round_l2 = collect();
        $round_l3 = collect();

        $period = new DatePeriod(
            new DateTime(date(strval($year) . '-01-01')),
            new DateInterval('P1M'),
            new DateTime(date(strval($year) . '-12-31')),
        );
        foreach ($period as $key => $value) {
            // dump($value->format('m'));
            $a = Leave::whereNotIn('pnid', [0, 2, 3])->whereYear('created_at', $value->format('Y'))->whereMonth('created_at', $value->format('m'))->where('typeleave', [1])->count('typeleave');
            $b = Leave::whereNotIn('pnid', [0, 2, 3])->whereYear('created_at', $value->format('Y'))->whereMonth('created_at', $value->format('m'))->where('typeleave', [2])->count('typeleave');
            $c = Leave::whereNotIn('pnid', [0, 2, 3])->whereYear('created_at', $value->format('Y'))->whereMonth('created_at', $value->format('m'))->where('typeleave', [3])->count('typeleave');
            // $val = [
            //     'round_l1' => $round_l1,
            //     'round_l2' => $round_l2,
            //     'round_l3' => $round_l3,
            // ];
            $months->push(Carbon::parse($value->format('Y-m-d'))->thaidate('M'));
            $round_l1->push($a);
            $round_l2->push($b);
            $round_l3->push($c);
        }
        return response()->json([
            'success' => true,
            'months' => $months,
            'round_l1' => $round_l1,
            'round_l2' => $round_l2,
            'round_l3' => $round_l3,
        ]);
    }

    // public function index()
    // {
    //     return view('admin.dashboard');
    // }
    public function addInventory()
    {
        $data = [];
        $data['unit'] = Unit::where('unstatus', 1)->get();
        $data['user'] = User::whereNotIn('roleid', [0, 2])->get();
        $data['stid'] = IdGenerator::generate(['table' => 'stocks', 'field' => 'stid', 'length' => 7, 'prefix' => "IPAS"]);
        $data['inventoryList'] = Inventory::where('ststatus', 1)->get();
        // dd($data['user']);
        return view('admin.Inventory.addInventory', $data);
    }
    public function editInventory()
    {
        // dd('hngjgf');
        $data = [];
        $data['unit'] = Unit::where('ststatus', [1])->get();
        $data['inventoryList'] = Inventory::where('ststatus', [1])->get();
        return view('admin.Inventory.editInventory', $data);
    }
    public function stock()
    {
        return view('admin.Inventory.stock');
    }
    public function sumleavework()
    {
        // dd('hgbfg0');
        return view('admin.sumleavework');
    }
    public function employee1()
    {
        return view('admin.employee.employee1');
    }
    public function employee()
    {
        return view('admin.employee.employee');
    }
    public function addEmployee1()
    {

        $data = [];
        $data['departmentList'] = Department::where('dpstatus', [1])->get();
        $data['emid'] = IdGenerator::generate(['table' => 'users', 'field' => 'emid', 'length' => 5, 'prefix' => "IP"]);
        return view('admin.employee.addEmployee1', $data);
    }
    public function editEmployee()
    {
        $data = [];
        $data['departmentList'] = Department::get();

        return view('admin.employee.editEmployee', $data);
    }
    public function salary()
    {
        return view('admin.salary');
    }
    public function slip()
    {
        dd('fdfd');

        $user = User::all();
        $slip = Slip::all();
        return view('admin.slip', compact('user', 'slip'));
    }
    public function absent()
    {
        // dd('hngjgf');
        $data = [];
        $data['departList'] = Department::where('dpstatus', 1)->get();
        $data['user'] = User::whereNotIn('roleid', [2, 0])->get();
        $data['stock'] = Stock::get();
        return view('admin.absent', $data);
    }
    public function stockmath()
    {
        $inventorys = Inventory::get();
        $inventory = [];
        $price = Stock::all();
        $sum_stprice = 0;
        $sum_stpricee = 0;
        $sum_stprice = Stock::whereNotIn('stocks.ststatus', [0])->sum('stprice');
        $sum_stpricee = Stock::whereNotIn('stocks.ststatus', [0])->sum('stmath');
        $sumdepreciation = 0;
        foreach ($inventorys as $key => $value) {
            $inventory[$key]['id'] = $value->id;
            $inventory[$key]['stname'] = $value->stname;
            $inventory[$key]['list'] = Stock::where('sttype', $value->id)->whereNotIn('stocks.ststatus', [2])->get();
            $data['count_depreciation'] = $price->count();

            foreach ($inventory[$key]['list'] as $key_stock => $stock) {
                $date = strtotime(date('Y-m-d'));    //?????????????????????????????????
                $stdaybuy =  strtotime($stock->stdaybuy);   //??????????????????????????????
                $year = ($date - $stdaybuy);    //??????????????????????????????????????????????????????????????????
                $amont = abs(round($year / 86400));     // ???????????????????????????????????????
                $stmath = floatval($stock->stmath);     //??????????????????????????????????????????????????????????????????
                $strprice = floatval($stock->stprice);  //????????????????????????
                $stageuse = floatval($stock->stageuse) - $amont;    //???????????????????????????????????????????????? ?????? ???????????????????????????????????????
                $depreciation = ($stmath * $amont);     //?????????????????????????????????????????????????????????????????? ????????? ???????????????????????????????????????
                $resultt = (($strprice - $depreciation) - 1) / $stageuse;
                $inventory[$key]['list'][$key_stock]['depreciation'] = ($depreciation);

                $sumdepreciation += $depreciation;
                // $sumdepreciation = $inventory[$key]['list'][$key_stock]->sum('depreciation');
                // $sumdepreciation = $inventory[$key]['list']->sum('depreciation');
                // dd($sumdepreciation);
            }
            // dump($depreciation);

            // $sumdepreciation = $inventory[$key]['list']->sum('depreciation');
        }
        // exit;
        // dd($inventorys);
        return view('admin.Inventory.stockmath', compact('inventory', 'sum_stprice', 'sumdepreciation', 'sum_stpricee'));
    }
    public function departsetting()
    {
        return view('admin.setting.departsetting');
    }
    public function stocksetting()
    {
        return view('admin.setting.stocksetting');
    }
    public function employeesetting()
    {
        return view('admin.setting.employeesetting');
    }
    public function tax()
    {

        $slip = Slip::all();
        return view('admin.setting.tax', compact('slip'));
    }

    public function cutSalary()
    {
        return view('admin.cutSalary');
    }
    public function work()
    {
        // $user = User::where('roleid', '!=', 2)->get();
        $user = User::whereNotIn('roleid', [0, 2])->get();
        $lastdate = date('t'); // ??????????????????????????????????????????????????????
        $data = [];
        // loop user
        foreach ($user  as $key => $value) {
            // $leave = Leave::where([['emid',$value->emid],['pnid',1]])->orderBy('created_at','desc')->first();
            $leave = Leave::where([['emid', $value->emid], ['pnid', 1]])->get();
            $checkdate = collect();
            foreach ($leave as $e => $val) {
                $period = new DatePeriod(
                    new DateTime(date('Y-m-d', strtotime($val->daystartla))),
                    new DateInterval('P1D'),
                    new DateTime(date('Y-m-d', strtotime($val->dayendla . '+1 day')))
                );
                foreach ($period as $k => $perdate) {
                    // dump($perdate->format('Y-m-d'));
                    $checkdate->push([
                        'perdate' => $perdate->format('Y-m-d'),
                        'type' => $val->typeleave
                    ]);
                }
            }

            $datemonth = collect(); // ??????????????? collection ?????????????????? (???????????????????????? array ???????????????)
            for ($i = 1; $i <= $lastdate; $i++) {
                $date = date('Y-m-' . $i);
                if ($i < 10) {
                    $date = date('Y-m-0' . $i);
                }
                // type 1 ??????????????? 2 ??????????????????????????? 3 ??????????????????
                $check = $checkdate->where('perdate', $date)->first();
                // dump($check);
                $type = $check == null ? null : $check['type'];
                // push ??????????????????????????????????????????????????????????????? array
                $datemonth->push([
                    'date' => $date,
                    'type' => $type
                ]);
            }
            // exit;
            $data[$key]['id'] = $value->id;
            $data[$key]['fullname'] = $value->fullname;
            $data[$key]['date'] = $datemonth;
        }
        // dd($data);

        return view('admin.work', compact('data'));
    }
}
