<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Review;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::with(['uploads'])->get();
        return view('hotel.index', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::with(['rooms', 'uploads'])->where('id', $id)->first();
        $reviews = Review::with(['user'])->where('hotel_id', $id)->get();
        return view('hotel.show', ['reviews' => $reviews, 'hotel' => $hotel]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
//    public function removeUpload($id)
//    {
//
//        $uploads = Upload::find($id);
//        Storage::delete($uploads['id']);
//        $uploads->delete();
//        return response()->json([
//            'success' => true,
//            'data' => $uploads
//        ], 200);
//    }

    public function check(Request $request)
    {
        $check_in_date = $request->get('check_in_date');
        $check_out_date = $request->get('check_out_date');
        $hotel_id = $request->get('hotel_id');

        $rooms = Room::whereNotIn('id', function ($query) use ($check_in_date, $check_out_date, $hotel_id) {
            $query->from('reservations')
                ->select('room_id')
                ->where('check_out_date', '<=', $check_out_date)
                ->where('check_in_date', '>=', $check_in_date)
                ->where('hotel_id', $hotel_id);
        })->where('hotel_id', $hotel_id)->get();
        $test = Room::where('hotel_id', $hotel_id)->get();


        if (count($rooms) === 0) {
            $request->session()->flash(
                'flash.message.first',
                ['type' => 'success', 'message' => 'Sorry, there is no empty rooms!']
            );
        } else {
            $reservation = new Reservation();
            $reservation->check_in_date = $check_in_date;
            $reservation->check_out_date = $check_out_date;
            $reservation->room_id = $rooms[0]->id;
            $reservation->user_id = Auth::User()->id;
            $reservation->save();

            $request->session()->flash(
                'flash.message.first',
                ['type' => 'success', 'message' => 'Congrats! Your reservation is activated!']
            );
        }

        return redirect()->back();


    }

    public function images($id)
    {
        $uploads = Upload::where('hotel_id', $id)->get();

        $images = [];
        foreach ($uploads as $upload) {
            $images[] = [

                'id' => $upload->id,
                'name' => $upload->path,
                'image_path' => url(Storage::url("public/hotels/" . $upload->hotel_id . "/" . $upload->path))
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $images
        ], 200);

    }

}
