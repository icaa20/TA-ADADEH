<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mkaryawan extends Model
{
    function viewData()
    {
        $query = DB::table('tb_karyawan')
        ->select("nik AS kode_karyawan","nama AS nama_karyawan","alamat AS alamat_karyawan","telepon AS telepon_karyawan","jabatan AS jabatan_karyawan")
        ->orderBy("nik")
        ->get();

        return $query;
    }

    function detailData($parameter)
    {
        $query = DB::table('tb_karyawan')
        ->select("nik AS kode_karyawan","nama AS nama_karyawan","alamat AS alamat_karyawan","telepon AS telepon_karyawan","jabatan AS jabatan_karyawan")
        //->where("md5(nik)","=",$parameter)

        //gunakan md5(nik)
        //->whereRaw("md5(nik) = '$parameter'")
//--------------------------------------------------\\
        // cara ke-2 gunakan md5(nik) 
        //->where(DB ::raw("md5(nik)"),"=",$parameter)

        //gunakan base64(nik)
        ->where(DB ::raw("TO_BASE64(nik)"),"=",$parameter)
        ->orderBy("nik")
        ->get();

        return $query;
    }

    //fungsi untuk delete dadta
    function deleteData($parameter)
    {
        DB::table("tb_karyawan")
        ->where(DB::raw("TO_BASE64(nik)"), "=", $parameter)
        ->delete();
    }
    // Buat Fungsi untuk Simpan Data
    function saveData($nik, $nama, $alamat, $telepon, $jabatan)
    {
        DB::table("tb_karyawan")
        ->insert([
            "nik" => $nik,
            "nama" => $nama,
            "alamat" => $alamat,
            "telepon" => $telepon,
            "jabatan" => $jabatan,
        ]);
    }
    
    //buat fungsi untuk cek ubah data
    function checkUpdate($nik_lama, $nik_baru)
    {
        $query = DB::table("tb_karyawan")
        ->select("nik")
        ->where("nik", "=", $nik_baru)
        ->where(DB::raw("TO_BASE64(nik)"), "!=", $nik_lama)
        ->get();

        return $query;
    }
    function updateData($nik, $nama, $alamat, $telepon, $jabatan, $nik_lama)
    {
        DB::table("tb_karyawan")
        ->where(DB::raw("TO_BASE64(nik)"), "=", $nik_lama)
        ->update([
            "nik" => $nik,
            "nama" => $nama,
            "alamat" => $alamat,
            "telepon" => $telepon,
            "jabatan" => $jabatan,
        ]);
    }
}
