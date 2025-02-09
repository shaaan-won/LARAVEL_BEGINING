<?php

namespace App\Http\Controllers\Hospital_List;

use App\Http\Controllers\Controller;
use App\Models\Hospital_List\HospitalList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $hospitals = DB::select('select * from hms_hospitals');
        // $hospitals = DB::table('hms_hospitals')->get(); // Fetch all hospitals
        // $hospitals = DB::table('hms_hospitals')->paginate(5);
        $hospitals = HospitalList::all();
        // $hospitals = HospitalList::paginate(5);
        return view('pages.hospital_list.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.hospital_list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hospital-name' => 'required|unique:hms_hospitals,name',
            'country' => 'required',
            'address' => 'required|string',
            'website' => 'required',
            'phone' => 'required|numeric|min:9',
            'email' => 'required|email',
            'description' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10024',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10024',

        ]);

        $hospitals = new HospitalList();
        $hospitals->name = $request->input('hospital-name');
        $hospitals->country = $request->input('country');
        $hospitals->address = $request->input('address');
        $hospitals->website = $request->input('website');
        $hospitals->phone = $request->input('phone');
        $hospitals->email = $request->input('email');
        $hospitals->description = $request->input('description');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = $hospitals->name . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('img/hospital_list/logos'), $logoName);
            $hospitals->logo = $logoName;
            // session()->flash('logo', $logoName);
        }

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = $hospitals->name . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('img/hospital_list/banners'), $bannerName);
            $hospitals->banner = $bannerName;
            // session()->flash('banner', $bannerName);
        }

        $success = $hospitals->save();

        if ($success) {
            return redirect('/hospital_list')->with('success', 'Hospital created successfully.');
        } else {
            return redirect('/hospital_list')->with('error', 'Hospital created failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_id = HospitalList::find($id);
        if (!$data_id) {
            return redirect('/hospital_list')->with('error', 'Hospital record not found.');
        }
        return view('pages.hospital_list.show', compact('data_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hospitals = HospitalList::find($id);
        return view('pages.hospital_list.update', compact('hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'hospital-name' => 'required',
            'country' => 'required',
            'address' => 'required|string',
            'website' => 'required',
            'phone' => 'required|min:9',
            'email' => 'required|email',
            'description' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10024',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10024',

        ]);

        // $hospitals = new HospitalList();//Question arise
        $hospitals = HospitalList::find($id);
        $hospitals->name = $request->input('hospital-name');
        $hospitals->country = $request->input('country');
        $hospitals->address = $request->input('address');
        $hospitals->website = $request->input('website');
        $hospitals->phone = $request->input('phone');
        $hospitals->email = $request->input('email');
        $hospitals->description = $request->input('description');

        function handleFileUpload($request, $fileKey, $destinationPath, $hospital, $attribute)
        {
            if ($request->hasFile($fileKey)) {
                $file = $request->file($fileKey);
                $fileName = $hospital->name . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($destinationPath), $fileName);
                $hospital->$attribute = $fileName;
            }
        }

        handleFileUpload($request, 'logo', 'img/hospital_list/logos', $hospitals, 'logo');
        handleFileUpload($request, 'banner', 'img/hospital_list/banners', $hospitals, 'banner');





        // if ($request->hasfile('logo')) {
        //     $logoName=$request->name.".".$request->file('logo')->extension();

        //     $photoPath = public_path('img/hospital_list/logos/' . $logoName);
        //     if (file_exists($photoPath)) {
        //         unlink($photoPath);
        //     }


        //     $request->file('logo')->move(public_path('img/hospital_list/logos/'), $logoName);

        //     $hospitals->photo= $logoName;
        // }else{
        //     $hospitals->photo=  $hospitals->photo;
        // }

        // if ($request->hasfile('banner')) {
        //     $bannerName=$request->name.".".$request->file('banner')->extension();

        //     $bannerPath = public_path('img/hospital_list/banners/' . $bannerName);
        //     if (file_exists($bannerPath)) {
        //         unlink($bannerPath);
        //     }

        //     $request->file('banner')->move(public_path('img/hospital_list/banners/'), $bannerName);

        //     $hospitals->banner= $bannerName;
        // }else{
        //     $hospitals->banner=  $hospitals->banner;
        // }





        // if ($request->hasFile('logo')) {
        //     $logoName = $hospitals->name . '.' . $request->file('logo')->extension();
        //     $photoPath = public_path('img/hospital_list/logos/' . $logoName);

        //     if (file_exists($photoPath)) {
        //         unlink($photoPath);
        //     }

        //     $request->file('logo')->move(public_path('img/hospital_list/logos/'), $logoName);
        //     $hospitals->photo = $logoName;
        // }

        // if ($request->hasFile('banner')) {
        //     $bannerName = $hospitals->name . '.' . $request->file('banner')->extension();
        //     $bannerPath = public_path('img/hospital_list/banners/' . $bannerName);

        //     if (file_exists($bannerPath)) {
        //         unlink($bannerPath);
        //     }

        //     $request->file('banner')->move(public_path('img/hospital_list/banners/'), $bannerName);
        //     $hospitals->banner = $bannerName;
        // }



        $success = $hospitals->update();
        if ($success) {
            return redirect('/hospital_list')->with('success', 'Hospital updated successfully.');
        } else {
            return redirect('/hospital_list')->with('error', 'Hospital updated failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    //  soft delete by confirmation
    public function delete($id)
    {
        $data_id = HospitalList::find($id);
        // $Message = "Are you sure you want to delete this record?";

        // Check if the hospital exists
        if (!$data_id) {
            return redirect('/hospital_list')->with('error', 'Hospital record not found.');
        }

        return view('pages.hospital_list.delete', compact('data_id'));
    }


    // hard delete without confirmation only by id
    public function destroy(string $id)
    {
        $hospitals = HospitalList::find($id);
        $success = $hospitals->delete();
        if ($success) {
            return redirect('/hospital_list')->with('success', 'Hospital deleted successfully.');
        } else {
            return redirect('/hospital_list')->with('error', 'Hospital deleted failed.');
        }
    }
}
