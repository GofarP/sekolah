<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Alert;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Pengumuman.index',['pengumuman'=>Pengumuman::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|max:255|unique:pengumuman',
            'tanggal'=>'required|date',
            'pengumuman'=>'required|max:500'
            
        ]);

        $formattedDate=strtotime($request->input('tanggal'));

        $validatedData['untuk_tanggal']=date('Y-m-d H:i',$formattedDate);
        
        Pengumuman::create($validatedData);

        Alert::success('sukses','Pengumuman Baru Berhasil Ditambah');
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.Pengumuman.edit',['pengumuman'=>$pengumuman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validateUpdate=[
                    'title'=>'required|max:255',
                    'untuk_tanggal'=>'required|date',
                    'pengumuman'=>'required|max:500',
        ];
        
        if($request->slug != $pengumuman->slug)
        {
            $validateUpdate['slug']='required|unique:pengumuman';
        }

        $formattedDate=strtotime($request->input('tanggal'));

        $validateUpdate['untuk_tanggal']=date('Y-m-d H:i',$formattedDate);

        $validatedData=$request->validate($validateUpdate);
        Pengumuman::where('id',$pengumuman->id)->update($validatedData);

        Alert::success('Sukses','Sukses Mengubah Pengumuman');

        return redirect('admin/pengumuman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);

        Alert::success('Sukses','Sukses Menghapus Pengumuman');
        return back();
    }

    public function checkSlug(Request $request)
    {
       $slug = SlugService::createSlug(Pengumuman::class, 'slug', $request->title);
         return response()->json(['slug'=>$slug]);
    }
}
