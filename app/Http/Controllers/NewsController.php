<?php

namespace App\Http\Controllers;
use App\Models\News;

use Illuminate\Http\Request;
use DateTime;

class NewsController extends Controller
{
  public function add_news(Request $request,$agency)
  {
    $news = $request['latestnews'];
    foreach ($news as $news_) {
      $created = News::create([
        'source' => $agency,
        'title' => $news_['title'],
        'Content' => $news_['Content '],
        'datetime' => new DateTime($news_['datetime ']),
        'rating' => explode("/",$news_['rating '])[0],
      ]);
    }
    return 'News Added Successfully';
  }

  public function get_all_news()
  {
    $news = News::orderBy('datetime')->get();
    return view('welcome',compact('news'));
  }
  public function sort_news($column,$order)
  {
    if ($order == 'asc') {
      $news = News::orderBy($column)->get();
    }
    else {
      $news = News::orderByDesc($column)->get();
    }

    return view('welcome',compact('news'));
  }
}
