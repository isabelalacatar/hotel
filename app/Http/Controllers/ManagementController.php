<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Input\Input;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::paginate(2);
        return view('management.index', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {


        return view('management.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hotel = new Hotel();
        $hotel->name = $request->get('name');
        $hotel->city = $request->get('city');
        $hotel->country = $request->get('country');
        $hotel->street = $request->get('street');
        $hotel->phone = $request->get('phone');
        $hotel->email = $request->get('email');
        $hotel->save();
        return redirect()->route("management.index");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels = Hotel::with(["rooms"])->where("id", $id)->first();

        return view('management.edit')
            ->with('hotel', $hotels)
            ->with('roomTypes', Room::ROOM_TYPES)
            ->with('roomViews', Room::ROOM_VIEWS);


    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'street' => 'required',
            'phone' => 'required',
            'email' => 'required',


        ]);
        $hotel = Hotel::find($id);
        $hotel->name = $request->get('name');
        $hotel->email = $request->get('email');
        $hotel->country = $request->get('country');
        $hotel->city = $request->get('city');
        $hotel->street = $request->get('street');
        $hotel->phone = $request->get('phone');

        $hotel->save();


        return redirect()->route("management.index");
    }


    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect()->route("home");
    }


    public function upload(Request $request)
    {


        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $hotel_id = $request->get('hotelId');
        //$path = hash('sha256', time());
        $fileName = time().'_'.$name;
        Storage::putFileAs('public/hotels/' . $hotel_id . '/', $image,$fileName);
        $upload = new Upload();
        $upload->path = $fileName;
        $upload->hotel_id = $hotel_id;
        $upload->save();

        return response()->json([
            'success' => true,
            'id' => $upload->id
        ], 200);

    }

}
