<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Music;
use App\PlayList;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class MusicController extends Controller
{
    //
    public function addMusic() {
        $category = Category::all();
        $playlist = PlayList::all();
        return view('admin.music.add_music', compact('category','playlist'));
    }

    public function uploadMusic(Request $request) {
        $this->validate(request(), [
            'cat_id'            => 'required',
            'playlist_id'       => 'required',
            'files'             => 'required',
            'files.*'           => 'mimetypes:audio/mpeg'
        ]);

        if($request->hasfile('files')) {
            foreach($request->file('files') as $file) {
//                $namefile = str_replace('.mp3','',$file->getClientOriginalName());
//                $extfile = $file->getClientOriginalExtension();
//                $name = $namefile . 'stark' . str_replace(' ','/',) .'.'.$extfile;
//                Storage::makeDirectory('files/'.$request->playlist_id);
//                $uploadfile = $file->storeAs('files/'.$request->playlist_id.'/', $name);
                $name = str_replace('.mp3','',$file->getClientOriginalName());
                Storage::makeDirectory('files/'.$request->playlist_id);
                $uploadfile = $file->storeAs('files/'.$request->playlist_id.'/', $name);
                $fileName = str_replace('.mp3','',$file->getClientOriginalName());
                Music::create([
                    'user_id'           => auth()->guard('admin')->user()->id,
                    'cat_id'            => $request->cat_id,
                    'playlist_id'       => $request->playlist_id,
                    'path'              => 'upload/files/'.$request->playlist_id,
                    'file'              => $name,
                    'file_name'         => $fileName,
                    'size'              => Storage::size($uploadfile),
                ]);
            }
        }
        return redirect('admin/view/music');

    }

//    public function editMusic(Request $request, $id) {
//        if($request->isMethod('post')){
//            $this->validate(request(), [
//                'cat_id'         => 'required',
//                'playlist_id'    => 'required',
//                'file'           => 'mimetypes:audio/mpeg'
//            ]);
//
//        }
//
//        if($request->hasFile('file')){
//            $music_url = Music::whereId($id)->first()->file_name;
//            dd($music_url);
//            Storage::makeDirectory('files/'.$request->playlist_id);
//        }
//
//        $playlist   = PlayList::all();
//        $category   = Category::all();
//        $music      = Music::where('id', $id)->first();
//        return view('admin.music.edit_music',compact('playlist','category','music'));
//    }

    public function editMusic($id) {
        $music      = Music::whereId($id)->first();
        $playlist   = PlayList::all();
        $category   = Category::all();
        return view('admin.music.edit_music',compact('playlist','category','music'));
    }

//    public function UpdateMusic($id,Request $request) {
//
//        $this->validate(request(), [
//            'name'          => 'required',
//            'cat_id'        => 'required',
//            'playlist_id'   => 'required',
//            'file'          => 'mimetypes:audio/mpeg'
//        ]);
//
//        $music = Music::whereId($id)->first();
//
//        if($request->hasfile('file')) {
//
//            $music_url = $music->file;
//            unlink( 'upload/files/'.$music->playlist_id.'/' . $music_url);
//
//            $file           = $request->file('file');
//            $name           = str_replace('.mp3','',$file->getClientOriginalName());
//            Storage::makeDirectory('files/'.$request->playlist_id);
//            $uploadfile     = $file->storeAs('files/'.$request->playlist_id.'/', $name);
//            $fileName       = str_replace('.mp3','',$file->getClientOriginalName());
//            $size           = Storage::size($uploadfile);
//            $request->name  = $fileName;
//
//        }
//
//        if ($music->playlist_id != $request->playlist_id ) {
//            File::move('upload/files/' . $music->playlist_id . '/' . $music->file,
//                      'upload/files/' . $request->playlist_id . '/' . $music->file);
//        }
//
//        Music::whereId($id)->first()->update([
//
//            'user_id'           => auth()->guard('admin')->user()->id,
//            'cat_id'            => $request->cat_id,
//            'playlist_id'       => $request->playlist_id,
//            'path'              => 'upload/files/'.$music->playlist_id,
//            'file'              => $name ?? $music->file,
//            'file_name'         => $request->name,
//            'size'              => $size ?? $music->size,
//
//        ]);
//
//
//
//
//
//        $categories = Category::get();
//        $playlists = PlayList::get();
//        return redirect('admin/view/music');
//        /*
//        return view('admin.music.view_musics', compact('categories', 'playlists'))->with('sucess',"files uploded is Update");
//        */
//
//
//
//    }

    public function delMusic($id) {
        //Music::find($id)->delete();
        Storage::delete('upload/files/'.$id);
    }

    public function viewMusic() {
        $musics = Music::all();
        return view('admin.music.view_musics', compact('musics'));
    }


}
