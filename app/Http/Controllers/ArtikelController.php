<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Alert;
Use Image;



class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.artikel.index',['artikel'=>Artikel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create',['category'=>Kategori::all()]);
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
            'artikel'=>'required|max:1000',
            'slug'=>'required|max:255|unique:artikel',
            'kategori'=>'required',
            'image'=>'required|image|file|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $image=$request->file('image');

        if(!$image)
        {
            // $validatedData['image']=$request->file('image')->store('artikel-images');
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

            $fileName='artikel-images/'.$randomString.$extension;
            $thumbImage = Image::make($image->getRealPath())->resize(600, 600);
            $thumbPath = public_path('storage/'. $fileName);
            $thumbImage = Image::make($thumbImage)->save($thumbPath);

        }

        $validatedData['image']=$fileName;
        $validatedData['category_id']=$request->get('kategori');
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['penulis']=auth()->user()->username;

        Artikel::create($validatedData);

        Alert::success('Sukses','Artikel Baru Berhasil Ditambah');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        return view('admin.artikel.preview',['artikel'=>$artikel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit',['artikel'=>$artikel,'category'=>Kategori::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $update=[
            'title'=>'required|max:255',
            'category_id'=>'required|max:255',
            'artikel'=>'required|max:1000',
            'image'=>'image|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        if($request->slug != $artikel->slug)
        {
            $update['slug']='required|unique:artikel';
        }


        $fileName=$artikel->image;
        $image=$request->file('image');

        if($image)
        {
            if(!$artikel->image='no-images/no-images.jpg')Storage::delete($artikel->image);

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

            $fileName='artikel-images/'.$randomString.$extension;

            $thumbImage = Image::make($image->getRealPath())->resize(300, 300);
            $thumbPath = public_path('storage/'. $fileName);
            $thumbImage = Image::make($thumbImage)->save($thumbPath);
        }

        $request->validate($update);

        $validatedData=[
            'slug'=>$request->slug,
            'title'=>$request->title,
            'category_id' =>$request->category_id,
            'image'=>$fileName,
            'user_id'=>auth()->user()->id,
            'penulis'=>auth()->user()->username
        ];

        Artikel::where('id',$artikel->id)->update($validatedData);

        Alert::success('Sukses','Artikel Berhasil Diubah');

        return redirect('admin/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        Artikel::destroy($artikel->id);

        if(!$artikel->image='no-images/no-images.jpg')
        {
            Storage::delete($artikel->image);
        }

        Alert::success("Sukses","Artikel Berhasil Dihapus");

        return back();
    }

    public function checkSlug(Request $request)
    {
         $slug = SlugService::createSlug(Artikel::class, 'slug', $request->title);
         return response()->json(['slug'=>$slug]);
    }

    public function previewArtikel(Artikel $artikel)
    {
        return view('admin.artikel.preview',['artikel'=>$artikel]);
    }
}
