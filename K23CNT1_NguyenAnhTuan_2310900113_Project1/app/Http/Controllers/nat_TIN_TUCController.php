<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_TIN_TUC;  // Assuming you have the model for TIN_TUC
use Illuminate\Support\Facades\Storage;

class nat_TIN_TUCController extends Controller
{
    // List all news ----------------------------------------------------------------------
 // List all news with pagination
public function natList()
{
    $nattinTucs = nat_TIN_TUC::all();
        
    // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
    $nattinTucs = nat_TIN_TUC::paginate(10);
    
    
    // Return the view with the paginated data
    return view('natAdmins.nattintuc.nat-list', ['nattinTucs' => $nattinTucs]);
}

    

    // Show the detail of a specific news item -------------------------------------------
    public function natDetail($id)
    {
        $nattinTuc = nat_TIN_TUC::findOrFail($id);
        return view('natAdmins.nattintuc.nat-detail', ['nattinTuc' => $nattinTuc]);
    }

    // Show the create form for a new news item ----------------------------------------
    public function natCreate()
    {
        return view('natAdmins.nattintuc.nat-create');
    }

    // Handle the form submission for creating a new news item ---------------------------
    public function natCreateSubmit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'natMaTT' => 'required|unique:nat_TIN_TUC,natMaTT',
            'natTieuDe' => 'required|string|max:255',
            'natMoTa' => 'required|string',
            'natNoiDung' => 'required|string',
            'natNgayDangTin' => 'required|date',
            'natNgayCapNhap' => 'required|date',
            'natHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Optional image
            'natTrangThai' => 'required|in:0,1',  // 0 - inactive, 1 - active
        ]);

        // Create the new news item
        $nattinTuc = new nat_TIN_TUC();
        $nattinTuc->natMaTT = $request->natMaTT;
        $nattinTuc->natTieuDe = $request->natTieuDe;
        $nattinTuc->natMoTa = $request->natMoTa;
        $nattinTuc->natNoiDung = $request->natNoiDung;
        $nattinTuc->natNgayDangTin = $request->natNgayDangTin;
        $nattinTuc->natNgayCapNhap = $request->natNgayCapNhap;

        // Check if there's an image and save it
        if ($request->hasFile('natHinhAnh')) {
            $imagePath = $request->file('natHinhAnh')->store('public/img/tin_tuc');
            $nattinTuc->natHinhAnh = 'img/tin_tuc/' . basename($imagePath);
        }

        $nattinTuc->natTrangThai = $request->natTrangThai;
        $nattinTuc->save();

        return redirect()->route('natadmins.nattintuc')->with('success', 'Tin tức đã được tạo thành công.');
    }

    // Delete a news item ----------------------------------------------------------------
    public function natDelete($id)
    {
        $nattinTuc = nat_TIN_TUC::findOrFail($id);
        $nattinTuc->delete();

        return back()->with('success', 'Tin tức đã được xóa thành công.');
    }

    // Show the edit form for a specific news item --------------------------------------
    public function natEdit($id)
    {
        $nattinTuc = nat_TIN_TUC::findOrFail($id);
        return view('natAdmins.nattintuc.nat-edit', ['nattinTuc' => $nattinTuc]);
    }

    // Handle the form submission for updating an existing news item ---------------------
    public function natEditSubmit(Request $request, $id)
{
    $validated = $request->validate([
        'natTieuDe' => 'required|string|max:255',
        'natMoTa' => 'required|string|max:500',
        'natNoiDung' => 'required|string',
        'natHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'natNgayDangTin' => 'required|date',
        'natNgayCapNhap' => 'nullable|date',
        'natTrangThai' => 'required|in:0,1',
    ]);

    // Retrieve the news article to update
    $nattinTuc = nat_TIN_TUC::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('natHinhAnh')) {
        // Delete old image if exists
        if ($nattinTuc->natHinhAnh) {
            Storage::delete('public/' . $nattinTuc->natHinhAnh);
        }

        $imagePath = $request->file('natHinhAnh')->store('nattinTuc', 'public');
        $nattinTuc->natHinhAnh = $imagePath;
    }

    // Update the news article
    $nattinTuc->natTieuDe = $request->natTieuDe;
    $nattinTuc->natMoTa = $request->natMoTa;
    $nattinTuc->natNoiDung = $request->natNoiDung;
    $nattinTuc->natNgayDangTin = $request->natNgayDangTin;
    $nattinTuc->natNgayCapNhap = $request->natNgayCapNhap ?? now();
    $nattinTuc->natTrangThai = $request->natTrangThai;
    $nattinTuc->save();

    return redirect()->route('natadmins.nattintuc')->with('success', 'Tin tức đã được cập nhật!');
}

}