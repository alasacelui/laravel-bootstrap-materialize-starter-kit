<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Role;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\User\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(User::with('role', 'employee.department')->get())
            ->addIndexColumn()
            ->addColumn('actions', function($row)
            {
                if($row->is_activated !== 1)
                {
                    $btn = "
                    <a href='javascript:void(0)' class='text-decoration-none btn btn-sm btn-success rounded'
                    onclick='crud_activate_deactivate($row->id, `admin.user.update` , `activate`, `.user_dt`, `Activate this User`)'>Activate</a>";   
                }
                else
                {
   
                    $btn = "
                    <a href='javascript:void(0)' class='text-decoration-none btn btn-sm btn-danger rounded'
                    onclick='crud_activate_deactivate($row->id, `admin.user.update` , `deactivate`, `.user_dt`, `Deactivate this User`)'>Deactivate</a>";
                }

                if(!$row->hasRole('admin')) {
                    $btn .= " <a href='javascript:void(0)' class='text-decoration-none btn  btn-sm btn-danger' 
                    onclick='c_destroy($row->id,`admin.user.destroy`,`.user_dt`)'><i class='fas fa-trash fa-lg'></i></a>
                    </div>"; // crud destroy param [row or model ID, route name, datatableID]
                } else {
                    $btn .= " <a href='javascript:void(0)' class='text-decoration-none btn  btn-sm btn-secondary' disabled><i class='fas fa-trash fa-lg'></i></a>
                    </div>"; // crud destroy param [row or model ID, route name, datatableID]
                }
              
                return $btn;
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('admin.user.index');
    }

    public function create()
    {
        return $this->res(['results' => [Employee::all(), Role::where('name', '!=', 'admin')->get()]]);
    }


    public function store(UserRequest $request)
    {
        // check if the user account already exist
        $user = User::where('role_id', $request->role_id)->where('employee_id', $request->employee_id)->first();

        if($user) {
            return $this->error('User account already exist!', 422);
        }

        $employee = Employee::find($request->employee_id);

        $employee->user()->create(['name' => $employee->full_name, 
        'email' => $employee->email, 
        'password' => Hash::make('test1234'), 
        'role_id' => $request->role_id
    ]);

        return $this->res(['message' => 'User Account Registered Successfully']);
    }

    public function update(UserRequest $request, User $user)
    {
        if(request('option'))
        {
            // Activate || Deactivate User
            return request('option') == 'activate' ? $user->update(['is_activated' => 1]) 
            : $user->update(['is_activated' => 0]);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return $this->res(['message' => 'User Acount Deleted Successfully']);

    }
}
