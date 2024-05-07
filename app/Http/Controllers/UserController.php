<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\ChFavorite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function dataUsers()
    {
        $user = auth()->user();
        $admin = $user->admin;
        $customer = $user->customer;
        $dataUser = User::all();
        return view('Admin.user', [
            "dataUser" => $dataUser,
        ]);
    }

    public function create(Request $request)
    {
        $message = [
            'id.unique' => 'ID User sudah digunakan',
            'roles.required' => 'Data Level tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'gender.required' => 'Data Gender tidak boleh kosong',
            'email.required' => 'Data Email tidak boleh kosong',
            'password.required' => 'Data Password tidak boleh kosong',
        ];

        $this->validate($request, [
            'id' => 'unique:dataUser',
            'roles' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], $message);

        $data = new User();
        $data->id = $request->id;
        $data->roles = $request->roles;
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        $data->save();
        if ($request->roles == "admin") {
            $admin = new Admin();
            $admin->user_id = $data->id;
            $admin->save();
        } else {
            ChFavorite::create([
                'user_id' => $data->id,
                'favorite_id' => 2,
            ]);
            ChFavorite::create([
                'user_id' => $data->id,
                'favorite_id' => 3,
            ]);
            $customer = new customer();
            $customer->user_id = $data->id;
            $customer->save();
        }
        return redirect('/users')->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $message = [
            'roles.required' => 'Data Level tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'gender.required' => 'Data Gender tidak boleh kosong',
            'email.required' => 'Data Email tidak boleh kosong',
        ];

        $this->validate($request, [
            'roles' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
        ], $message);

        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->roles = $request->roles;

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

        if ($request->roles == "admin") {
            $admin = new Admin();
            $admin->user_id = $data->id;
            $existingAdmin = Admin::where('user_id', $data->id)->count();

            if ($existingAdmin == 0) {
                $admin->save();
            }

            $customer = Customer::where('user_id', $data->id)->first();

            if ($customer) {
                $customer->delete();
            }
        } else {
            $customer = new customer();
            $customer->user_id = $data->id;
            $existingcustomer = Customer::where('user_id', $data->id)->count();

            if ($existingcustomer == 0) {
                $customer->save();
            }

            $admin = Admin::where('user_id', $data->id)->first();

            if ($admin) {
                $admin->delete();
            }
        }

        $data->save();
        return redirect('/users')->with('success', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->admin) {            
            $user->admin()->delete();
            $user->delete();
            Cache::flush();
            return redirect('/users')->with('success', 'Data berhasil dihapus');
        }

        // if (
        //     $user->admin->role_admint()->exists()
        // ) {
        //     return redirect('/users')->with('warning', 'Data memiliki relasi!');
        // }

        // if (
        //     $user->customer->alamat()->exists() ||
        //     $user->customer->NoTlp()->exists()
        // ) {
        //     return redirect('/users')->with('warning', 'Data memiliki relasi!');
        // }
    
        // $user->customer->request()->forceDelete();
        if($user->customer){
            $user->customer()->delete();
            $user->delete();
            Cache::flush();

            return redirect('/users')->with('success', 'Data berhasil dihapus');
        }
    }
}
