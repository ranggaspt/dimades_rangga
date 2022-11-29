<?php
namespace App\Http\Controllers\Mitra;
namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class MitraController implements ControllerInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mitra::orderBy('name', 'ASC')->paginate(10);
        $this->data['data']=$data;
        return view ('admin.mitra.index',$this->data());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mitra.create');
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
            if(Mitra::crete($request->all())){
                Session::flash('success','Berhasil Disimpan');
            }else{
                Session::flash('error','Gagal Disimpan');
            }
            return redirect()->route('mitra.index');
        }catch (\Throwable $th){
            Session::flash('error', "Periksa kembali isian");
            return redirect()->back();
        }
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
        $data = Mitra::findOrFail(Crypt::decrypt($id));
        $this->data['data']=$data;
        return view('admin.mitra.edit', $this->data);
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
        try{
            $data = Mitra::findOrFail(Crypt::decrypt($id));
            if($data->update($request->all())){
                Session::flash('success','Berhasil Disimpan');
            }else{
                Session::flash('error','Gagal Disimpan');
            }
            return redirect()->route('mitra.index');
        }catch (\Throwable $th){
            Session::flash('error', "Periksa kembali isian");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mitra::findOrFail(Crypt::decrypt($id));
            if($data->delete()){
                Session::flash('success','Berhasil Dihapus');
            }else{
                Session::flash('error','Gagal Dihapus');
            }
            return redirect()->route('mitra.index');
    }
}
