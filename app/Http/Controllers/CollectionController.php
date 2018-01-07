<?php

namespace youCollections\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use youCollections\Channel;
use youCollections\Collection;
use youCollections\videosAssistido;
use youCollections\xml;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collec = Collection::where('idUser', Auth::user()->id)->get();

        return View::make('collections.index')
            ->with('collec', $collec);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $xml = xml::find(Auth::user()->id);
        $file = Storage::get($xml->filePath);
        $lista = simplexml_load_string($file);
        return View::make('collections.create')->with('xml',$lista);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $collec = new Collection();
            $collec->idUser     =   Auth::user()->id;
            $collec->nomeCollec =   $request->get('name');

            //pegando e salvando apenas os ids dos canais
            $lista = str_replace(',,','', $request->get('hlista'));
            $urls = explode('@',$lista);

                $canais = '';
            foreach ($urls as $url){
                $canal =  DB::table('channels')->where('url', $url)->value('idCanal');
                $canais = $canal.",".$canais;
            }

            $collec->canais     =  $canais;



            $collec->save();

            Session::flash('message','Collection criada com sucesso');
            return Redirect::to('collections');
    }

    /**
     * Display the specified resource.
     *
     * @param  \youCollections\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {

        $videosA = videosAssistido::where('idUser', Auth::user()->id)->get();
        if($videosA){
            foreach ($videosA as $videoA){
                $assistidos = $videoA->idVideo;
            }
        }

        $lista = str_replace(',,','', $collection->canais);
        $canais = explode(',',$lista);


        $i=0;
        foreach ($canais as $canal){
            $canal = DB::table('channels')->where('idCanal', $canal)->value('url');
            $url = 'https://www.youtube.com/feeds/videos.xml?channel_id='.$canal;
            $xml = simplexml_load_file($url);
            foreach ($xml->entry as $video){
                $urlVideo = $video->id;
                $video->id = str_replace ("yt:video:", "", $video->id);
                $feed[$i]= $video;
                $i++;
           }
        }

        return View::make('collections.show')->with('videos',$feed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \youCollections\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        return View::make('collections.edit')->with('collec',$collection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \youCollections\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {

        $collection->idUser     =   Auth::user()->id;
        $collection->nomeCollec =   $request->get('name');
        $collection->canais     =   $request->get('hlista');
        $collection->save();

        Session::flash('message','Collection editada com sucesso');
        return Redirect::to('collections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \youCollections\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
