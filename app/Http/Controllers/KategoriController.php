<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Alert;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



use Cviebrock\EloquentSluggable\Services\SlugService;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.index',["category"=>Kategori::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'kategori'=>'required|max:255',
            'slug'=>'required|max:255|unique:kategori',
            'image'=>'image|file|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        
        $image=$request->file('image');

        if(!$image)
        {
            $validatedData['image']='no-images/no-images.jpg';
        }

        else
        {
            $mime=Image::make($image)->mime();

            switch($mime)
            {
                case $mime=='image/jpeg':
                    $extension=".jpeg";
                    break;

                case $mime='image/jpg':
                    $extension=".jpg";
                    break;

                case $mime='image/png':
                    $extension=".png";
                    break;

                case $mime='image/svg':
                    $extension=".svg";
                    break;

                default:
                    $extension="";            
            }

            $randomString = Str::random(30);

            $fileName='kategori-images/'.$randomString.$extension;

            $thumbImage = Image::make($image->getRealPath())->resize(300, 300);
            $thumbPath = public_path('storage/'. $fileName);
            $thumbImage = Image::make($thumbImage)->save($thumbPath);
            $validatedData['image']=$fileName;

        }

        Kategori::create($validatedData);

        Alert::success('success','Kategori Baru Berhasil Ditambahkan');
        return redirect()->back();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit',['kategori'=>$kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validateUpdate=[
           'kategori' =>'required|max:255',
           'image'=>'image|file|mimes:jpeg,png,jpg,svg|max:1024'
        ]; 


        if($request->slug != $kategori->slug)
        {
            $validateUpdate['slug']='required|unique:kategori';
        }

        $fileName=$kategori->image;
        $image=$request->file('image');

        if($image)
        {

            if(!$kategori->image=='no-images/no-images.jpg') Storage::delete($kategori->image);
            
            $mime=Image::make($image)->mime();

            switch($mime)
            {
                case $mime=='image/jpeg':
                    $extension=".jpeg";
                    break;

                case $mime='image/jpg':
                    $extension=".jpg";
                    break;

                case $mime='image/png':
                    $extension=".png";
                    break;

                case $mime='image/svg':
                    $extension=".svg";
                    break;

                default:
                    $extension="";            
            }

            $randomString = Str::random(30);

            $fileName='kategori-images/'.$randomString.$extension;

            $thumbImage = Image::make($image->getRealPath())->resize(300, 300);
            $thumbPath = public_path('storage/'. $fileName);
            $thumbImage = Image::make($thumbImage)->save($thumbPath);
        }

        $request->validate($validateUpdate);

        $validatedData=['kategori'=>$request->kategori,'slug'=>$request->slug,'image'=>$fileName];

        Kategori::where('id',$kategori->id)->update($validatedData);
        
        Alert::success('success','Kategori Berhasil Diubah');
        return redirect('admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $cekArtikel=Artikel::where('category_id',$kategori->id)->get();

        if($cekArtikel->count()>0)
        {
            Alert::error("Gagal Mnghapus Kategori","Kategori Tidak Bisa Dihapus, Karena Ada Artikel Yang Berhubungan");
            return back();
        }

        else
        {
            if(!$kategori->image=='no-images/no-images.jpg') Storage::delete($kategori->image);

            Kategori::destroy($kategori->id);
            Alert::success("Sukses Menghapus Kategori"," Kategori ".$kategori->kategori."Berhasil Dihapus");
            return back();
        }
        
    }

    public function checkSlug(Request $request)
    {
        $slug=SlugService::createSlug(Kategori::class, 'slug', $request->kategori);
        return response()->json(['slug'=>$slug]);
    }

    public function checkMemes()
    {

    }
}
