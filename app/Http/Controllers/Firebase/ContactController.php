<?php

namespace App\Http\Controllers\Firebase;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
     public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tableName = 'contacts';
    }

    public function index()
    {
        $contact = $this->database->getReference($this->tableName)->getValue();
        $total_contact = $this->database->getReference($this->tableName)->getSna;
        return view('firebase.contact.index',compact('contact'));
    }

    public function create()
    {
        return view('firebase.contact.create');
    }

    public function store(Request $request)
    {
        $postData = [
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
        ];
        $postRef = $this->database->getReference($this->tableName)->push($postData);
        if($postRef){
            return redirect('/')->with('status','Berhasil menambahkan contact');
        }else{
            return redirect('/add-contact')->with('status','Tidak berhasil menambahkan contact');
        }
    }

    public function edit($id)
    {
        $key = $id;
        $contact = $this->database->getReference($this->tableName)->getChild($key)->getValue();
        if($contact){
            return view('firebase.contact.edit',compact('contact','key'));
        }else{
            return redirect('/')->with('status','Id contact ini tidak ditemukan');
        }
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
        ];

        $file_updated = $this->database->getReference($this->tableName.'/'.$key)->update($updateData);
        if($file_updated){
            return redirect('/')->with('status','Berhasil mengedit contact');
        }else{
            return redirect('/')->with('status','Tidak berhasil mengedit contact');
        }
    }

    public function destroy($id)
    {
        $key = $id;
        $removeContact = $this->database->getReference($this->tableName.'/'.$key)->remove();
        if($removeContact){
            return redirect('/')->with('status','Berhasil menghapus contact');
        }else{
            return redirect('/')->with('status','Contact tidak ditemukan');
        }

    }
}
