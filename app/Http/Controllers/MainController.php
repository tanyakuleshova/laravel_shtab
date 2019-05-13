<?php

namespace App\Http\Controllers;

use App\Investigations;
use App\Members;
use App\Volunteers;
use Illuminate\Http\Request;
use App\News;

class MainController extends Controller
{
    public function index(News $news, Investigations $investigations){

        $last_news = $news->first();
        $all_news = $news->all();
        $last_investigation = $investigations->first();
        $all_investigations = $investigations->all();
        return view('main', compact('all_news','last_news', 'all_investigations', 'last_investigation' ));
    }

    public function news(News $news){

        $last_news = $news->first();

        $all_news = $news->orderBy('id', 'desc')->take(6)->get();
        return view('news.news', compact('last_news', 'all_news'));
    }

    public function show_news(News $news_by_id){
        $all_news = News::orderBy('id', 'desc')->take(6)->get();
        return view('news.show', compact('news_by_id', 'all_news'));
    }

    public function investigations(Investigations $investigations){
        $last_investigations = $investigations->first();
        $all_investigations = Investigations::orderBy('id', 'desc')->take(6)->get();
        return view('investigations.investigations', compact('all_investigations','last_investigations'));
    }

    public function show_investigations(Investigations $investigation_by_id){
        $all_investigations = Investigations::orderBy('id', 'desc')->take(6)->get();
        return view('investigations.show', compact('investigation_by_id', 'all_investigations'));
    }

    public function join_us(){
        return view('join_us');
    }
    public function support_us(){
        return view('join_us');
    }
    public function about(Members $members, Volunteers $volunteers, News $news){
        $members = $members->all();
        $volunteers = $volunteers->all();
        $news = News::orderBy('id', 'desc')->take(6)->get();
        return view('about', compact('members', 'volunteers', 'news'));
    }
    public function contacts(){
        return view('contacts');
    }
}
