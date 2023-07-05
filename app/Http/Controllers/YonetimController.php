<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteriler;

class YonetimController extends Controller
{
    public function index() {
        return view("include.home");
    }

    public function musteriEkle() {
        return view("include.musteri-ekle");
    }

    public function MusteriEklePost(Request $request)
    {   
        $request->validate([
            'adsoyad'=>'required',
            'mail'=>'required|email:rfc,dns'
        ]);
        Musteriler::create([
            'adsoyad'=>$request->adsoyad,
            'mail'=>$request->mail,
            'telefon'=>$request->telefon,
        ]);
        return redirect()->route('musteri-ekle')->with('succes','Müşteri başarıyla eklendi');
    }
    public function musteriListe()
    {
        $musteriler=Musteriler::all();
        return view("include.musteri-liste",compact('musteriler'));    
    }
    public function musteriDuzenle($id)
    {
        $musteriBilgisi=Musteriler::whereId($id)->first();
        if($musteriBilgisi)
        {
            return view("include.musteri-duzenle",compact('musteriBilgisi'));
        }else{
            return redirect()->route("musteri-liste");
        } 
    }
    public function musteriDuzenlePost(Request $request,$id)
    {
        $request->validate([
            'adsoyad'=>'required',
            'mail'=>'required|email:rfc,dns'
        ]);
        Musteriler::wherId($id)->update([
            'adsoyad'=>$request->adsoyad,
            'mail'=>$request->mail,
            'telefon'=>$request->telefon,
        ]);
        return redirect()->route('musteri-duzenle',$id)->with('succes','Müşteri başarıyla güncellendi');

}
public function musteriSil($id)
{
    $musteriBilgisi=Musteriler::whereId($id)->first();
    if($musteriBilgisi)
    {
        Musteriler::whereId($id)->delete();
    }
    return redirect()->route('musteri-ekle')->with('success','Müşteri başarıyla silindi');
}
}
