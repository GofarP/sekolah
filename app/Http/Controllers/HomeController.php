<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Pengumuman;
use App\Models\Agenda;
use Image;
use File;

use Illuminate\Support\Facades\URL;


class HomeController extends Controller
{
    public function index()
    {
        
        $getLatestImage=Artikel::select('image')->orderBy('created_at','DESC')->take(3)->get();

        foreach($getLatestImage as $latestImage)
        {
            $thumbImage=Image::make('storage/'.$latestImage->image)->resize(2000, 783);
            $formatPath=str_replace('artikel-images/','',$latestImage->image);
            $thumbPath = public_path('storage/carousel-images/'.$formatPath );
            $thumbImage = Image::make($thumbImage)->save($thumbPath);
        }
        
        return view('guest.index.index',[
            'artikel'=>Artikel::orderBy('created_at','DESC')->paginate(4),
            'pengumuman'=>Pengumuman::orderBy('created_at','DESC')->paginate(3),
            'agenda'=>Agenda::orderBy('created_at','DESC')->paginate(3)
        ]);
    }

    public function artikel()
    {
        return view('guest.artikel.artikel',['artikel'=>Artikel::paginate(3), 'kategori'=>Kategori::all()]);
    }

    public function artikelDetail(Artikel $artikel)
    {
        return view('guest.artikel.artikel_detail',['artikel'=>$artikel,'kategori'=>Kategori::all()]);
    }

    public function artikelSearch(Request $request)
    {
       $keyword=$request->search;
       $result=Artikel::where('title','like',"%".$keyword)->paginate(3);
       return view('guest.artikel.artikel',['artikel'=>$result,'kategori'=>Kategori::all()])->with('i', (request()->input('page', 1) - 1) * 3);
    }

    public function kategoriSearch($slug)
    {
        $result=Artikel::select('artikel.*')->join('kategori','artikel.category_id','=','kategori.id')
        ->where('kategori.slug',$slug)->paginate(3);
        return view('guest.artikel.artikel',['artikel'=>$result,'kategori'=>Kategori::all()])->with('i', (request()->input('page', 1)-1)*3);
    }

    public function pengumuman()
    {
        return view('guest.pengumuman.index',['pengumuman'=>Pengumuman::orderBy('created_at','DESC')->paginate(5)]);
    }


    public function agenda()
    {
        return view('guest.agenda.index',['agenda'=>Agenda::orderBy('created_at','DESC')->paginate(5)]);
    }

    public function testImage()
    {
        // $getImage=Artikel::select('image')->take(1)->first();

        // $processImage=$getImage->image;

        // $makeImage=Image::make('storage/kategori-images/WfcDJUhqwAMgMzb0eEGUKXjCJWZ0oU.jpg')
        // ->resize(2000,783)->response();

        // // return view('guest.index.test',['img'=>$makeImage]);

        // return $makeImage;

        $files = File::files(public_path('storage/carousel-images'));
        $filecount = 0;
        
        if ($files !== false) {
            $filecount = count($files);
        }
        
        return $filecount;

       

    }

    public function showKategori()
    {
        return view('guest.kategori.index',['kategori'=>Kategori::paginate(10)]);
    }
    
}
