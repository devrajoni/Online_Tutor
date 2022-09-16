<?php

namespace App\Http\Controllers;

use App\Models\GurdianRecom;
use Illuminate\Http\Request;
use Image;

class GurdianRecomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommends = GurdianRecom::orderBy('id','desc')->get();
        return view('Backend.gurdian_recom.index',compact('recommends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.gurdian_recom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = new GurdianRecom();
            $data->name = $request->name;
            $data->description = $request->description;
            $data->status = $request->status;
            if($request->hasFile('image')) {
                $image = $request->image;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                   mkdir($folder, 0777, true);
                }

                $m_image = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->resize(110,138)->save($m_image);
                $data->image = asset($m_image);
            }
            $data->save();
            return back()->with("message", "Inserted successfully");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = GurdianRecom::find($id);
        return view('Backend.gurdian_recom.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = GurdianRecom::find($id);
            $data->name = $request->name;
            $data->description = $request->description;
            $data->status = $request->status;
            if($request->hasFile('image')) {
                $image = $request->image;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                   mkdir($folder, 0777, true);
                }

                $m_image = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->resize(110,138)->save($m_image);
                $data->image = asset($m_image);
            }
            $data->save();
            return back()->with("message", "Updated successfully");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
