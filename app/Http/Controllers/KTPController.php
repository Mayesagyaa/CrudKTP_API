<?php

namespace App\Http\Controllers;

use App\Models\KTP;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\formatAPI;

class KTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //menampilkan semua data pada model siswa
      $data = KTP::all();

      //check data is valid? return data : failed
      if($data){
         return formatAPI::createAPI(200, 'Success', $data);
      }
      else{
         return formatAPI::createAPI(400, 'Failed');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //untuk create data ke database
            $ktp = KTP::create($request->all());

            //get data siswa where id_siswa = id_siswa
            $data = KTP::where('nik','=',$ktp->nik)->get();

            //check data is valid? return data : failed
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
             }
             else{
                return formatAPI::createAPI(400,'Failed');
             }
    }catch(Exception $error){
    
        return formatAPI::createAPI(400,'Failed',$error);
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KTP  $kTP
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = KTP::where('id', '=', $id)->first();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
             }
             else{
                return formatAPI::createAPI(400,'Failed');
             }
        }
    catch(Expection $error){
        return formatAPI::createAPI(400,'Failed',$error);
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KTP  $kTP
     * @return \Illuminate\Http\Response
     */

     public function update (Request $request, $id)
    {
        try{
            $ktp = KTP::findorfail($id);
            $ktp->update($request->all());

            $data = KTP::where('nik', '=',$ktp->nik)->get();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
             }
             else{
                return formatAPI::createAPI(400,'Failed');
             }
        }catch(exception $error){
            return formatAPI::createAPI(400,'Failed'. $error);
        }
    }

    public function destroy($id)
    {
        try{
            $ktp = KTP::findorfail($id);

            $data = $ktp->delete();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
             }
             else{
                return formatAPI::createAPI(400,'Failed');
             }
        }catch(exception $error){
            return formatAPI::createAPI(400,'Failed'. $error);
        }
    }
}
