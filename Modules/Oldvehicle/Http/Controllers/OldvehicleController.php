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
        $vehicle = OldVehicle::orderBy('id', 'desc')->paginate(12);
        return view('oldvehicle::index', compact('vehicle'));
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

        if (!empty($request->id)) {
            try {
                $vehicle =  OldVehicle::find($request->id);
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
                $vehicle->save();

                if ($request->hasfile('image')) {
                    foreach ($request->file('image') as $key => $image) {
                        $name = 'vehicle' . time() . $request->type . '-' . $vehicle->id . '-' . $key . '.' . $image->getClientOriginalExtension();
                        $result = public_path('vehicleImages');
                        $image->move($result, $name);
                        $vehicleImage = new OldVehicleImage();
                        $vehicleImage->vehicle_id = $request->id;
                        $vehicleImage->image  = $name;
                        $vehicleImage->save();
                    }
                }
                return redirect()->route('vehicleIndex')->with('message', 'Updated successfully!');
            } catch (\Exception $e) {
                return back()->with('error', 'Please try again!');
            }
        } else {
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
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showVehicle(Request $request)
    {
        // dd($request->all());
        $data = OldVehicle::find($request->id);
        $image = OldVehicleImage::where('vehicle_id', $request->id)->get();
        $slider = '  <div id="carouselExampleIndicator" class="carousel slide"
        data-ride="carousel">
        <div class="carousel-inner">';
        foreach ($image as $key => $val) {

            $slider .= '<div class="carousel-item ';
            if ($key == 0) {
                $slider .= 'active ';
            }
            $slider .= '"><img class="d-block w-100" src="' . url('') . '/vehicleImages/' . $val->image . '" alt="First slide"></div>';
        }
        $slider .= '</div>
        <a class="carousel-control-prev" href="#carouselExampleIndicator"
            role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicator"
            role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>';


        $data->slider = $slider;
        return $data;




        // return view('oldvehicle::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editVehicle($id)
    {
        $data = OldVehicle::find($id);
        $image = OldVehicleImage::where('vehicle_id', $id)->get();
        return view('oldvehicle::create', compact('data', 'image'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyVehicle($id)
    {
        //
    }

    public function destroyVehicleImage(Request $request)
    {
        $delete = OldVehicleImage::find($request->id);
        $delete->delete();
        return back();
    }

    public function statusVehicle(Request $request)
    {
        $update = OldVehicle::find($request->id);
        $update->status = $request->value;
        $update->save();
        $data = $request->value;
        return $data;
    }

    public function searchKeyWordsVehicle(Request $request)
    {
        $vehicle = OldVehicle::where($request->type, 'like', '%' . $request->keyword . '%')->get();
        return view('oldvehicle::ajax_filter', compact('vehicle'));
    }

    public function searchByPriceOrderVehicle(Request $request)
    {
        if ($request->type) {
            $vehicle = OldVehicle::where($request->type, 'like', '%' . $request->keyword . '%')->orderBy('price', $request->order)->get();
        } else {
            $vehicle = OldVehicle::orderBy('price', $request->order)->get();
        }
        return view('oldvehicle::ajax_filter', compact('vehicle'));
    }
}