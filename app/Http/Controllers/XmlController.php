<?php

namespace youCollections\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use youCollections\Channel;
use youCollections\xml;
use Illuminate\Http\Request;

class XmlController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('xml.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $xml = new xml();
        $xml->idUser    = Auth::user()->id;
        $xml->filePath  = $request->file('file')->store('xmls');
        $xml->save();


        $file = Storage::get($xml->filePath);
        $lista = simplexml_load_string($file);

        //Encurtando a url para apenas o ID do canal no youtube
        foreach ($lista->body->outline->outline as $canal) {
            $urlCanal = str_replace("https://www.youtube.com/feeds/videos.xml?channel_id="
                , "", $canal[0]['xmlUrl']);

            //se canal já existe não faça nada
            if(Channel::find($urlCanal)){

            }else{
                Channel::create(
                    [
                        'url' => $urlCanal,
                        'nomeCanal' => $canal[0]['text'],
                    ]
                );
            }


        }
        Session::flash('message', 'XML e canais salvos com sucesso');
        return Redirect::to('collections/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \youCollections\xml  $xml
     * @return \Illuminate\Http\Response
     */
    public function show(xml $xml)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \youCollections\xml  $xml
     * @return \Illuminate\Http\Response
     */
    public function edit(xml $xml)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \youCollections\xml  $xml
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, xml $xml)
    {
        $xml->idUser    = Auth::user()->id;
        $xml->filePath  = $request->file('file')->store('xmls');
        $xml->save();

        Session::flash('message', 'XML salvo com sucesso');
        return Redirect::to('collections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \youCollections\xml  $xml
     * @return \Illuminate\Http\Response
     */
    public function destroy(xml $xml)
    {
        //
    }
}
