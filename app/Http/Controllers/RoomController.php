<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::get();
        return view('rooms.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route("management.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Room $id)
    {
        try {

            $room = new Room();
            $room->name = $request->get('roomName');
            $room->floor = $request->get('floor');
            $room->type = $request->get('roomType');
            $room->view = $request->get('roomView');
            $room->hotel_id = $request->get('hotelId');

            $room->save();
            $rooms = Room::where("hotel_id",  $request->get('hotelId'))->get();
            return Response::json(['data' => $rooms]);

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";


        }
        // return Response::json(['data' => $room]);
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
        $rooms = Room::where("hotel_id", $id)->get();
        return Response::json(['data' => $rooms]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
