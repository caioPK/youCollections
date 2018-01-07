<?php

namespace youCollections\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use youCollections\videosAssistido;

class assistidosController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(videosAssistido::find($id)){
            $teste =videosAssistido::where('idVideo',$id)->where('idUser',Auth::user()->id)->first();
            $ids = Auth::user()->id;
            if($teste){
                echo 'já existe';
            }

        }else{
            videosAssistido::create(
                [
                    'idVideo' => $id,
                    'idUser' => Auth::user()->id,
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if(videosAssistido::find($id)){
            $teste =videosAssistido::where('idVideo',$id)->where('idUser',Auth::user()->id)->first();
            $ids = Auth::user()->id;
            if($teste){
                echo 'já existe';
            }

        }else{
            videosAssistido::create(
                [
                    'idVideo' => $id,
                    'idUser' => Auth::user()->id,
                ]
            );
        }
        return View::make('collections/video.show')->with('dados',$request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}
