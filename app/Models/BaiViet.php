<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class BaiViet extends Model
{
    use HasFactory;

    public function getList()
    {
        $getList = DB::table('bai_viets')->get();
        return $getList;
    }

    public function createBaiViet($data)
    {
        DB::table('bai_viets')->insert($data);
    }

    public function getDetailBaiViet($id)
    {
        $bai_viets = DB::table('bai_viets')->where('id', $id)->first();
        return $bai_viets;
    }

    public function updateBaiViet($id, $data)
    {
        DB::table('bai_viets')->where('id', $id)->update($data);
    }

    public function deleteBaiViet($id)
    {
        DB::table('bai_viets')->where('id', $id)->delete();
    }

    use SoftDeletes;
    protected $fillable = [
        'tieu_de',
        'hinh_anh',
        'ngay_dang',
        'noi_dung',
    ];
}
