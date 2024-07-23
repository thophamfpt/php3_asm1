<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaiVietRequest;
use App\Models\BaiViet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $listBaiViet = BaiViet::query()
            ->when($search, function ($query, $search) {
                return $query->where('tieu_de', 'like', "%{$search}%")
                    ->orwhere('noi_dung', 'like', "%{$search}%");
            })
            ->paginate(3);
        return view('admins.baiviets.index', compact('listBaiViet'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.baiviets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaiVietRequest $request)
    {

        if ($request->isMethod('POST')) {
            $params = $request->except('_token');

            if ($request->hasFile('img_bai_viet')) {
                $fileName = $request->file('img_bai_viet')->store('uploads/baiviet', 'public');
            } else {
                $fileName = null;
            }

            $params['hinh_anh'] = $fileName;

            BaiViet::create($params);

            return redirect()->route('baiviet.index')->with('success', 'them thanh cong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $baiViet = BaiViet::findOrfail($id);

        if (!$baiViet) {
            return redirect()->route('baiviet.index')->with('error', 'Bai viet khong ton tai');
        }

        return view('admins.baiviets.update', compact('baiViet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BaiVietRequest $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_method', '_token');

            $baiViet = BaiViet::findOrfail($id);
            if ($request->hasFile('img_bai_viet')) {
                if ($baiViet->hinh_anh) {
                    Storage::disk('public')->delete('$SanPham->hinh_anh');
                }

                $params['hinh_anh'] = $request->file('img_bai_viet')->store('uploads/baiviet', 'public');
            } else {
                $params['hinh_anh'] = $baiViet->hinh_anh;
            }

            $baiViet->update($params);

            return redirect()->route('baiviet.index')->with('success', 'Cap nhat thanhc cong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        if ($request->isMethod('DELETE')) {
            $baiViet = BaiViet::findOrfail($id);

            if ($baiViet) {
                $baiViet->delete();

                return redirect()->route('baiviet.index')->with('success', 'cap nhat thanh cong');
            }

            return redirect()->route('baiviet.index')->with('error', 'khong co san pham');
        }
    }
}
