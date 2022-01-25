<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Alert;


class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agenda.index',['agenda'=>Agenda::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agenda.create');
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
            'title' => 'required|max:255',
            'slug'=>'required|max:255|unique:agenda',
            'tanggal'=>'required|date',
            'agenda'=>'required|max:500'
        ]);

        $formattedDate=strtotime($request->input('tanggal'));
        $validatedData['untuk_tanggal']=date('Y-m-d H:i',$formattedDate);
        $validatedData['user_id']=Auth()->user()->id;
        Agenda::create($validatedData);

        Alert::success('Sukses','Sukses Menambah Agenda Baru');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('admin.agenda.index', ["agenda"=>$agenda]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit',['agenda' => $agenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
         $validateUpdate=[
            'title' => 'required|max:255',
            'tanggal'=>'required|date',
            'agenda'=>'required|max:500'
         ];

        if($request->slug != $agenda->slug)
        {
            $update['slug']='required|unique:agenda';
        }

        $request->validate($validateUpdate);

        $formattedDate=strtotime($request->input('tanggal'));

        $validatedData=[
            'title'=>$request->title,
            'slug'=>$request->slug,
            'user_id'=>auth()->user()->id,
            'agenda'=>$request->agenda,
            'untuk_tanggal'=>date('Y-m-d H:i',$formattedDate)
        ];
        
        Agenda::where('id',$agenda->id)->update($validatedData);

        Alert::success('Sukses','Sukses Mengubah Agenda');

        return redirect('/admin/agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);

        Alert::success('Sukses','Sukses Menghapus Agenda');
        return back();
    }

    public function checkSlug(Request $request)
    {
        $slug=SlugService::createSlug(Agenda::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
