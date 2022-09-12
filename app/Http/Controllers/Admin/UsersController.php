<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Spatie\Permission\Traits\HasRoles;

class UsersController extends Controller
{
    use HasRoles;

    function __construct()
    {
        $this->middleware('permission:عرض المستخدمين', ['only' => ['index']]);
        $this->middleware('permission:اضافة مستخدم', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل مستخدم', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'roles_name' => 'required',
            'status' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
            ->with('success','تم إضافة مستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
//        $user = User::find($id);
//        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm_password',
            'roles_name' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
            ->with('success','تم تحديث بيانات المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','تم حذف المستخدم بنجاح');
    }

    public function changePassword(){
        return view('auth.changepassword');
    }
    public function updatePassword(Request $request){
        $user = Auth::guard('admin')->user();
        $userPass = $user->password;
        $validator = $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|confirmed|min:6',
            'new_password_confirmation' => 'required|min:6'
        ]);

        if ($validator){
            if(Hash::check($request->current_password,$userPass)){
                $user->update([
                    'password' => bcrypt($request->new_password)
                ]);
                return redirect()->route('admin.dashboard')->with(['success' => 'تم تغيير كلمة المرور بنجاح']);
            }else{
                return redirect()->route('admin.dashboard')->with(['error' => 'عفواً كلمة المرور القديمة خاطئة']);
            }
        }

    }

    public function baned()
    {
        return view('auth.baned');
    }

    public function banedLogout(){
        auth('admin')->logout();
        return redirect()->route('login');
    }

}
