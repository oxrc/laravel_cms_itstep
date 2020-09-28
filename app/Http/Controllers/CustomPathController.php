<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaticPage;
use App\YoutubePage;
use App\Tag;
use Illuminate\Support\Facades\Redirect;

class CustomPathController extends Controller
{
  // public function loadPath(Request $request, $path)
  public function loadPath($path)
  {
    // Prepare the content to be shown
    $data['path'] = $path;
    $data['lead_image'] = '';
    $data['title'] = '';
    $data['content'] = '';

    $where = [
      'url' => '/' . $path
    ];

    // Try loading a static page.
    $page = StaticPage::where($where)->first();
    if (null === $page) {
      $page = YoutubePage::where($where)->first();
    }
    // Do something is $page is still null
    if (null === $page) {
      dd($page);
    }

    $data['title'] = $page->title;
    $data['content'] = $page->content ?? '';
    $data['lead_image'] = $page->youtube_link ? YoutubePage::embedYoutubeLink($page->youtube_link) : $data['lead_image'];

    // Load the generic single page template
    /**
     * $data keys:
     * 'title'
     * 'content'
     * 'lead_image'
     */
    return view('public.single', $data);
  }
}