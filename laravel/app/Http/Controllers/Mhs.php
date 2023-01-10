<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelMhs;

class Mhs extends Controller
{
    public function index()
    {
        
        $data=[
            'dataMhs' => Modelmhs::all()
        ];

        return View('mahasiswa.data', $data);
    }

    public function add(){
        return View('mahasiswa.formtambah');
    }

    public function save(Request $r){
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;

        try{
            $mhs = new Modelmhs;
            $mhs->mhsnim = $nim;
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();

            //echo 'Data berhasil disimpan';
            $r->session()->flash('msg', "Data dengan mahasiswa $nama berhasil tersimpan");
            return redirect('/mhs/tambah');
        }catch(Throwable $r){
            echo $e;
        }
    }
    public function edit($nim){
        $mhs = Modelmhs::find($nim);
        $data =[
            'nim' => $nim,
            'nama' => $mhs->mhsnama,
            'telp' => $mhs->mhstelp,
            'alamat' => $mhs->mhsalamat

        ];
        return View('mahasiswa.edit', $data);
    }
    public function update(Request $r){
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;

        try{
            $mhs = Modelmhs::find($nim);
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();

            //echo 'Data berhasil diupdate';
            $r->session()->flash('msg', "Data dengan mahasiswa $nama berhasil terupdate");
            return redirect('/mhs/index');
        }catch(Throwable $r){
            echo $e;
        }
    }

}
