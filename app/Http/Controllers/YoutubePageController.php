<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\YoutubePage;
use Illuminate\Support\Facades\Redirect;
use PDF;

class YoutubePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = YoutubePage::orderBy('id', 'desc')->paginate(10);

        return view('admin.youtube-page.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.youtube-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'youtube_link' => 'required',
        ]);

        $new_page = $request->all();
        YoutubePage::create($new_page);

    //     return Redirect::to('admin/youtube-pages')
    //    ->with('success','Greate! Static page added to database.');
       return redirect()->route('admin_youtube_pages')
       ->with('success','Greate! Static page added to database.');
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
        $where = [
        'id' => $id
        ];
        $data['page'] = YoutubePage::where($where)->first();
 
        return view('admin.youtube-page.edit', $data);
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
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'youtube_link' => 'required',
        ]);
         
        $updated_page = [
            'title' => $request->title,
            'url' => $request->url,
            'youtube_link' => $request->youtube_link,
        ];
        YoutubePage::where('id', $id)->update($updated_page);
   
    //     return Redirect::to('admin/youtube-pages')
    //    ->with('success', 'Static Page with id ' . $id . ' has been updated.');
       return redirect()->route('admin_youtube_pages')
       ->with('success','Greate! Youtube page added to database.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        YoutubePage::where('id', $id)->delete();

        // return Redirect::to('admin/youtube-pages')->with('success','Static page deleted successfully');
        return redirect()->route('admin_youtube_pages')
       ->with('success','Greate! Youtube page removed from database.');
    }
}
