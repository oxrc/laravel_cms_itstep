<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaticPage;
use Illuminate\Support\Facades\Redirect;
use PDF;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = StaticPage::orderBy('id', 'desc')->paginate(10);

        return view('admin.static-page.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.static-page.create');
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
            'content' => 'required',
            'url' => 'required',
        ]);

        $new_page = $request->all();
        $new_page['published'] = $page['published'] ?? 0;

        StaticPage::create($new_page);

        return Redirect::to('admin/static-pages')
       ->with('success','Greate! Static added to database.');
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
        $data['static_page'] = StaticPage::where($where)->first();
 
        return view('admin.static-page.edit', $data);
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
            'content' => 'required',
            'url' => 'required',
        ]);
         
        $updated_page = [
            'title' => $request->title,
            'content' => $request->content,
            'url' => $request->url,
            'published' => ($request->published ?? 0),
        ];
        StaticPage::where('id', $id)->update($updated_page);
   
        return Redirect::to('admin/static-pages')
       ->with('success', 'Static Page with id ' . $id . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaticPage::where('id', $id)->delete();

        return Redirect::to('admin/static-pages')->with('success','Static page deleted successfully');
    }
}
