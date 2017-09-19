<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Anak;
use App\FotoKeteranganAnak;
use DB;
use Illuminate\Http\Request;
use Session;

class AnakController extends Controller
{
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
            $anak = Anak::where('nama_lengkap', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $anak = Anak::paginate($perPage);
        }

        return view('anak.index', compact('anak'));
    }

    public function indexPengurus(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $anak = Anak::where([['nama_lengkap', 'LIKE', "%$keyword%"],
                                 ['admin_id', auth()->user()->id ]])
                ->paginate($perPage);
        } else {
            $anak = Anak::where('admin_id', auth()->user()->id)
                    ->paginate($perPage);
        }

        return view('anak.index', compact('anak'));
    }

    public function listAnak(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $anak = Anak::where(['nama_lengkap', 'LIKE', "%$keyword%"])
                ->paginate($perPage);
        } else {
            $anak = Anak::paginate($perPage);
        }
//        echo "<pre>"; print_r(Anak::count()); die();
        return view('anak.list', compact('anak'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $state = DB::table("provinces")
                    ->pluck("name","id");

        $cities = DB::table("regencies")
                    ->where("province_id",11)
                    ->pluck("name","id");

        $cities_born = DB::table("regencies")
            ->pluck("name","id");

        return view('anak.create', compact(['state', 'cities_born', 'cities']));

    } 

    public function createFotoKeterangan($id)
    {
        $nama_anak = Anak::findOrFail($id)->nama_lengkap;
        return view('anak.create-foto-keterangan', compact(['id', 'nama_anak']));

    }

    public function fotoKeterangan($id)
    {
        $perPage = 25;
        $foto_keterangan_anak = FotoKeteranganAnak::where(['anak_id' => $id])->paginate($perPage);
        $nama_anak = Anak::findOrFail($id)->nama_lengkap;
        return view('anak.foto_keterangan_index', compact(['foto_keterangan_anak','nama_anak','id']));
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

        $rand = rand (1000 , 9999);

        if($request->file('image')!= null){
            $file = $request->file('image');
            $fileName = $rand."-".$requestData["nama_lengkap"]."-".$file->getClientOriginalName();
            $request->file('image')->move("images/anak/", $fileName);
            $path_file = "images/anak/". $fileName;
            $this->thumbnailImage($path_file, $fileName);
        } else {
            $fileName = $user['image']; 
        }
        $result = explode(".", $fileName);
        $requestData['image'] = $result[0].".jpeg"; 

        if(Anak::create($requestData)){
            $data_persebaran = DB::table('persebaran_anak_terlantar')->select('kode', 'jumlah')
                                ->where('kode', $requestData['state_id'])
                                ->get();
            $kode_provinsi = $data_persebaran[0]->kode; 
            $jumlah_after = $data_persebaran[0]->jumlah +1;
            DB::table('persebaran_anak_terlantar')
                ->where('kode', $kode_provinsi)
                ->update(['jumlah' => $jumlah_after]);
        }

        Session::flash('flash_message', 'Anak added!');

        return redirect('anak-list-pengurus');
    } 

    public function storeFotoKeteranganAnak(Request $request)
    {
        $requestData = $request->all();

        $rand = rand (1000 , 9999);

        $file = $request->file('image');
        $fileName = $rand."-".$requestData["anak_id"]."-".$file->getClientOriginalName();
        $request->file('image')->move("images/anak/keterangan/".$requestData['anak_id'], $fileName);
        $path_file = "images/anak/keterangan/".$requestData['anak_id']."/". $fileName;
        $this->thumbnailImage($path_file, $fileName);
        
        $result = explode(".", $fileName);

        $requestData['image'] = $result[0].".jpeg"; 

        FotoKeteranganAnak::create($requestData);

        Session::flash('flash_message', 'Foto Keterangan added!');
        return redirect()->action(
            'AnakController@fotoKeterangan', ['id' => $requestData['anak_id']]
        );
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
        $anak = Anak::findOrFail($id);

        $foto_caption = DB::table("foto_keterangan_anaks")
                    ->where("anak_id",$anak->id)
                    ->select('image', 'deskripsi as caption')->get();

        return view('anak.show', compact(['anak','foto_caption']));
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
        $anak = Anak::findOrFail($id);

        return view('anak.edit', compact('anak'));
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
        
        $anak = Anak::findOrFail($id);
        $anak->update($requestData);

        Session::flash('flash_message', 'Anak updated!');

        return redirect('anak');
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
        Anak::destroy($id);

        Session::flash('flash_message', 'Anak deleted!');

        return redirect('anak-list-pengurus');
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
        imagejpeg($image_tmb, "images/anak/tmb/kecil_" . $result[0].".jpeg");
         
         
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
