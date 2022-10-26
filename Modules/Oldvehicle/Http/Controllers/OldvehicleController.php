<?php

namespace Modules\Oldvehicle\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

use Modules\Oldvehicle\Entities\OldVehicle;
use Modules\Oldvehicle\Entities\OldVehicleImage;
use RealRashid\SweetAlert\Facades\Alert;

class OldvehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('oldvehicle::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createVehicle()
    {
        $data = '';
        $image = '';
        return view('oldvehicle::create', compact('data', 'image'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeVehicle(Request $request)
    {
        $validator = $request->validate([
            'type' => 'required',
            'category' => 'required',
            'title' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address' => 'required',
            'image' => 'required',
            'pin' => 'required|max:6',

        ]);

        try {
            $vehicle = new OldVehicle();
            $vehicle->vehicle_type = $request->type;
            $vehicle->category = $request->category;
            $vehicle->title = $request->title;
            $vehicle->price = $request->price;
            $vehicle->brand = $request->brand;
            $vehicle->year = $request->year;
            $vehicle->km_driven = $request->km_driven;
            $vehicle->servicing_remain = $request->servicing_remain;
            $vehicle->color = $request->color;
            $vehicle->any_damage = $request->any_damage;
            $vehicle->description = $request->description;
            $vehicle->city = $request->city;
            $vehicle->state = $request->state;
            $vehicle->address = $request->address;
            $vehicle->pin = $request->pin;
            $vehicle->available = $request->available;
            $vehicle->status = $request->status;
            $vehicle->latitude = $request->latitude;
            $vehicle->longitude = $request->longitude;
            $vehicle->created_by = Auth::user()->id;
            $vehicle->save();

            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $key => $image) {
                    $name = 'vehicle' . time() . $request->type . '-' . $vehicle->id . '-' . $key . '.' . $image->getClientOriginalExtension();
                    $result = public_path('vehicleImages');
                    $image->move($result, $name);
                    $vehicleImage = new OldVehicleImage();
                    $vehicleImage->vehicle_id = $vehicle->id;
                    $vehicleImage->image  = $name;
                    $vehicleImage->save();
                }
            }
            return redirect()->route('vehicleIndex')->with('message', 'Created successfully!');;
        } catch (\Exception $e) {
            return back()->with('error', 'Please try again!');;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showVehicle($id)
    {
        return view('oldvehicle::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editVehicle($id)
    {
        return view('oldvehicle::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateVehicle(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyVehicle($id)
    {
        //
    }
}
