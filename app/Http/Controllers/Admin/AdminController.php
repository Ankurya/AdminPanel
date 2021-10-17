<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\UserPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function dropdown()
    {
        $users = User::join('posts', 'posts.user_id', 'users.id')
        ->select('users.*','posts.description')
        ->get();
    return View("includes.header")->with([
        "users" => $users,
    ]);
    }
    
    public function index()
    {
        return view('index');
    }
    public function activeUsers()
    {


        $users = User::join('posts', 'posts.user_id', 'users.id')
            ->select('users.*','posts.description')
            ->get();
        return View("active-users")->with([
            "users" => $users,
        ]);
    }

    public function register(Request $request)
    {
        // Storage::disk('public');

     
        if ($request->isMethod("get")) {
            return view('register');
        }

        if ($request->isMethod("post")) {
            // $roles = Role::all();
            // foreach($roles as $role){
            //     $role->id;
            // }
            $data = [

                'username' => $request->username,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'role_id' => Role::skip(1)->first()->id,
               
                

            ];



            if ($request->hasFile("profile_pic")) {

                $file = $request->file("profile_pic");
                $imageName = uniqid() . "_" . $file->getClientOriginalName();
                $destinationPath = 'images'; 

                $file->move($destinationPath, $imageName);
                $data["profile_pic"] = $imageName;
            }

            $user = User::create($data);
            if($user)
            {
                return redirect('login')->with('success','User Registered Successfully.');
            }
            else{
                return redirect('register')->with('error','User Unable to register.');

            }
        }
    }

    public function login(Request $request)
    {
        if ($request->isMethod("get")) {
            return view('login');
        }
        if ($request->isMethod("post")) {
        
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('index')->with('success','User loggedin successfully');
            }else{
                return redirect('login')->with('error','User Unable to login.');
            }
        }
    }


    public function editDetail(Request $request, $id)
    {
        if ($request->isMethod("GET")) {
            $user = User::whereId($id)->first();
            return view('edit')->with('user', $user);
        }
        if ($request->isMethod("POST")) {
            // dd($request->all());

            $updateData = [
                "username" => $request->username,
                "email" =>  $request->email,
                "address" => $request->address,
            ];

            if ($request->hasFile("profile_pic")) {

                $file = $request->file("profile_pic");
                $imageName = uniqid() . "_" . $file->getClientOriginalName();
                $destinationPath = 'images';
                $file->move($destinationPath, $imageName);
                $updateData["profile_pic"] = $imageName;
            }


            $isUpdated = User::whereId($id)->update($updateData);
            if($isUpdated)
            {
                return redirect('active-users')->with('success','User Updated Successfully.');

            }
            else{
                return redirect('active-users')->with('error','Update user failed.');

            }
        }
    }

    public function viewDetail($id)
    {
        $user = User::whereId($id)->first();
        return view('view')->with('user', $user);
    }

    public function blockUser($id)
    {

        $user = User::find($id);

        if ($user->isblocked == '0') {
            $updatedata = [
                'isblocked' => '1',
            ];

            User::whereId($id)->update($updatedata);
        }
    }

    public function unblockUser($id)
    {
        $user = User::find($id);

        if ($user->isblocked == '1') {
            $updatedata = [
                'isblocked' => '0',
            ];

            User::whereId($id)->update($updatedata);
        }
    }

    public function blockedUser()
    {
        $users = User::join('posts', 'posts.user_id', 'users.id')
            ->select('users.*','posts.description')
            ->where('users.isblocked','<>',1)
            ->get();

        return View("blocked-user")->with([
            "users" => $users,
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
