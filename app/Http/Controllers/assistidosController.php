<?php

namespace youCollections\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
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
    public function store(Request $id)
    {
        //função chamada quando o usuario clicar no botão MARCAR COMO VISTO
        if(videosAssistido::find($id)){

            if(videosAssistido::where('idVideo',$id)->where('idUser',Auth::user()->id)->first()){

            }else{
                videosAssistido::create(
                    [
                        'idVideo' => $id,
                        'idUser' => Auth::user()->id,
                    ]
                );
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

            if(videosAssistido::where('idVideo',$id)->where('idUser',Auth::user()->id)->first()){
               echo 'existe';
            }else{
                videosAssistido::create(
                    [
                        'idVideo' => $id,
                        'idUser' => Auth::user()->id,
                    ]
                );
            }

        }else{
            videosAssistido::create(
                [
                    'idVideo' => $id,
                    'idUser' => Auth::user()->id,
                ]
            );
        }
        $video = Youtube::getVideoInfo($id);

        return View::make('collections/video.show')->with('dados',$video);
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
