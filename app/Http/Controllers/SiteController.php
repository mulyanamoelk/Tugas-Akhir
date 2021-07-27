<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;



class SiteController extends Controller
{

    const API_BASE="https://blog-api.stmik-amikbandung.ac.id/api/v2/blog/_table/";
    const API_KEY=
    'ef9187e17dce5e8a5da6a5d16ba760b75cadd53d19601a16713e5b713e5b7c4f683e1b';
    private $apiClient;
    public function __construct(){
        $this->apiClient=new Client([
            'base_uri' => self::API_BASE,
            'headers' =>
            ['X-DreamFactory-API-Key' =>self::API_KEY]
        ]);
    }
    public function index(){
        @csrf_token();
        $data=Cache::get('index', function(){
            try{
                $reqData=$this->apiClient->get('artikel');
                $resource=json_decode($reqData->getBody())->resource;
                Cache::add('index', $resource);
                return $resource;
            }catch (RequestException $e){
                return[];
            }
        });

    return view('index', ['data'=>$data]);

    }

public function getArticles(Request $id){
    @csrf_token();
    $key="artikel/{$id}";
    $data=Cache::get($key, function() use($key){
        try{
            $reqData=$this->apiClient->get($key);
            $resource=json_decode($reqData->getBody());
            Cache::add($key, $resource);
            return $resource;
        }catch(Exception $e){
            abort(404);
        }
    });
    return view('viewArticle', ['data'=>$data]);
    }

    public function newArticles(Request $request){
        @csrf_token();
        if ($request->isMethod('post')) {
            $title=$request->input('frm-title');
            $content=$request->input('frm-content');
            $dataModel=[
                'resource'=>[
                ]
            ];
            $dataModel['resource'][]=[
                'author'=>'1',
                'title'=>$title,
                'contet'=>$content
            ];
            try{
                $reqData=$this->apiClient->post('artikel',[
                    'json'=>$dataModel
                ]);
                $apiResponse=json_decode($reqData->getBody())->resource;
                $newId=$apiResponse[0]->id;
                Cache::forget('index');
                return redirect("/artikel/{$newId}");
            }catch (Exception $e){
                abort(501);
            }
        }
        return view('newArticle');
    }

   public function about(){
       return view('about');
   }
   public function dashboard(){
       return view('home.dashboard');
   }
   public function baru(Request $request){
       $title=$request->get('frm-title');
       return "dengan judul ".$title;
   }
}
