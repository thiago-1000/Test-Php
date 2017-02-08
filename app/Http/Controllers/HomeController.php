<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
 
class HomeController extends Controller
{
 
	/**
	 * Criar uma nova instância do controlador.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	}

	/**
	 * Apresenta página Home.
	 *
	 * @return Response
	 */
	public function index()
	{ 
            try {
                return \View::make('home');
            } catch (Exception $e) {
                    return \View::make('errors.503');
            }
	}
	         
        /**
        * Busca Google RSS.
        *
        * @return JSON
        */
        public function googlerss()
	{
                    $feeds["success"] = false;
                    
                    $news = simplexml_load_file("https://news.google.com/news/section?cf=all&hl=pt-BR&pz=1&ned=pt-BR_br&topic=n&output=rss");
                    
                    $feeds = array();
                    $i = 0;
                    if(isset($news->channel->item)){
                        $feeds["success"] = true;
                        foreach ($news->channel->item as $item) 
                        {
                            preg_match('@src="([^"]+)"@', $item->description, $match);
                            $parts = explode('<font size="-1">', $item->description);

                            $feeds[$i]['title'] = (string) $item->title;
                            $feeds[$i]['link'] = (string) $item->link;
                            $feeds[$i]['image'] = $match[1];
                            $feeds[$i]['site_title'] = strip_tags($parts[1]);
                            $feeds[$i]['story'] = strip_tags($parts[2]);                    
                            $i++;
                        }
                        $feeds['lenght'] = count($feeds);
                    }
                    return response()->json($feeds);
            
	}
        
}
