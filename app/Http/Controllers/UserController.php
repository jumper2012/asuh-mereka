<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use DB;

use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorize');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $user = User::where('name', 'LIKE', "%$keyword%")
				->orWhere('gender', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $user = User::paginate($perPage);
        }

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        User::create($requestData);

        Session::flash('flash_message', 'User added!');

        return redirect('user');
    }

    public function changePassword($id, Request $request)
    {
        
        $requestData = $request->all();

        if($requestData['password']!=$requestData['re_password']){
            return redirect('user/'.$id)->with('error','Password gagal diperbaharui, password tidak sesuai.');

        } 

        $user = User::findOrFail($id);
        $requestData['password']= \Hash::make($requestData['password']);
        $user->update($requestData);

        return redirect('user/'.$user->id)->with('message','Password berhasil diperbaharui.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $state = DB::table("provinces")
                    ->pluck("name","id");

        if($user->state_id!=null){
            $cities = DB::table("regencies")
                        ->where("province_id",$user->state_id)
                        ->pluck("name","id");            
        }  else {
            $cities = DB::table("regencies")
                        ->where("province_id",11)
                        ->pluck("name","id");
        }

        return view('user.show', compact(['state', 'user', 'cities']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $user = User::findOrFail($id);

        if($request->file('image')!= null){
            $file = $request->file('image');
            $fileName = $id."-".$file->getClientOriginalName();
            $request->file('image')->move("images/user/", $fileName);
            $path_file = "images/user/". $fileName;
            $this->thumbnailImage($path_file, $fileName);
        } else {
            $fileName = $user['image']; 
        }
        $result = explode(".", $fileName);
        $user['image'] = $result[0].".jpeg"; 
        $user->update($requestData);

        return redirect('user/'.$user->id)->with('message','Data user berhasil diperbaharui.');
//        return redirect('user/'.$user->id)->with("message", "Data user berhasil diperbaharui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('user');
    }

    public function thumbnailImage($path_file, $nama_file) {
        $image   = $this->convertImage($path_file, $path_file, 100);
        
        $gambar_asli = imagecreatefromjpeg($image);
        $lebar       = imageSX($gambar_asli);
        $tinggi      = imageSY($gambar_asli);
         
        $tmb_lebar   = 110;
        $tmb_tinggi  = 110;
         
        $image_tmb   = imagecreatetruecolor($tmb_lebar,$tmb_tinggi);
        imagecopyresampled($image_tmb,$gambar_asli,0,0,0,0,$tmb_lebar,$tmb_tinggi,$lebar,$tinggi);
        
        $result = explode(".", $nama_file);
        imagejpeg($image_tmb, "images/user/tmb/kecil_" . $result[0].".jpeg");
         
         
        imagedestroy($gambar_asli);
        imagedestroy($image_tmb);
        return true;
    }    

    public function convertImage($originalImage, $outputImage, $quality)
    {
        // jpg, png, gif or bmp?
        $exploded = explode('.',$originalImage);
        $ext = $exploded[count($exploded) - 1]; 

        if (preg_match('/jpg|jpeg/i',$ext))
            $imageTmp=imagecreatefromjpeg($originalImage);
        else if (preg_match('/png/i',$ext))
            $imageTmp=imagecreatefrompng($originalImage);
        else if (preg_match('/gif/i',$ext))
            $imageTmp=imagecreatefromgif($originalImage);
        else if (preg_match('/bmp/i',$ext))
            $imageTmp=imagecreatefrombmp($originalImage);
        else
            return 0;

        $result = explode(".", $outputImage);
        // quality is a value from 0 (worst) to 100 (best)
        imagejpeg($imageTmp, $result[0].".jpeg" , $quality);
        imagedestroy($imageTmp);
        unlink($originalImage);
        return $result[0].".jpeg";
    }
}
