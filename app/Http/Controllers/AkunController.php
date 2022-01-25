<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.akun.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
      
    }

    public function updateUsername(Request $request)
    {
        $validateUpdate=[
            'username'=>'required|max:255',
            'password'=>'required|max:255'
        ];

        $errorMessage=[
            'required'=>'wajib diisi'
        ];

        $getUserPassword=User::select('password')->where('id',Auth()->user()->id)->first();
        $hashedPass=$getUserPassword->password;
        $plainPass=$request->password;

        $request->validate($validateUpdate, $errorMessage);

        if(Hash::check($plainPass,$hashedPass))
        {
            $newUsername=['username'=>$request->username];
            User::where('id',auth()->user()->id)->update($newUsername);

            Alert::success('Sukses','Sukses Mengganti Username');
            return back();
        }

        else
        {
            Alert::error("Gagal","Gagal Mengganti Username Karena Password Salah");
            return back();
        }
    }

    public function updatePassword(Request $request)
    {
        $validateUpdate=[
            'passwordlama'=>'required|max:255',
            'passwordbaru'=>'required|max:255|required_with:konfirmasipassword|same:konfirmasipassword',
            'konfirmasipassword'=>'required|max:255'
        ];


        $errorMessage=[
            'required'=>'Wajib diisi',
            'same'=>'Silahkan Cocokkan Password Baru Dan Konfirmasi Password Baru',
            'required_with'=>'Perlu sama'
        ];

        $request->validate($validateUpdate,$errorMessage);

        $getUserPassword=User::select('password')->where('id',Auth()->user()->id)->first();
        $hashedPass=$getUserPassword->password;
        $plainPass=$request->passwordlama;


        if(Hash::check($plainPass,$hashedPass))
        {
            $newPassword=['password'=>Hash::make($request->passwordbaru,['rounds'=>10])];

            User::where('id',auth()->user()->id)->update($newPassword);

            Alert::success("Sukses","Sukses Mengganti Password Anda");
            return back();
        }

        else
        {
           Alert::error('Gagal Mengubah Password','Password Lama Anda Salah');
           return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
