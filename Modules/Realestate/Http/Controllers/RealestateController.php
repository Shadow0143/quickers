<?php

namespace Modules\Realestate\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\Realestate\Entities\Property;
use Modules\Realestate\Entities\PropertyImage;

class RealestateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function realestateIndex()
    {
        $allhouse = Property::orderBy('id', 'desc')->paginate(2);
        return view('realestate::index', compact('allhouse'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createProperty()
    {
        $data = '';
        $image = '';
        return view('realestate::create', compact('data', 'image'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function submitProperty(Request $request)
    {
        if (!empty($request->id)) {
            try {
                $home = Property::find($request->id);
                $home->appartment_for = $request->apartment_for;
                $home->title = $request->title;
                $home->price = $request->price;
                $home->duration = $request->duration;
                $home->description = $request->description;
                $home->city = $request->city;
                $home->state = $request->state;
                $home->address = $request->address;
                $home->pin = $request->pin;
                $home->available = $request->availabel;
                $home->status = $request->status;
                $home->type = $request->apartment_type;
                $home->bedrooms = $request->bedrooms;
                $home->bathrooms = $request->bathrooms;
                $home->utilities = $request->utilities;
                $home->wifi = $request->wifi;
                $home->parking = $request->parking;
                $home->pet_friendly = $request->pet_friendly;
                $home->move_in_date = $request->move_in_date;
                $home->size = $request->size;
                $home->furnished = $request->furnished;
                $home->appliances = $request->appliances;
                $home->air_conditioning = $request->air_conditioning;
                $home->outdoor_space = $request->outdoor_space;
                $home->smoking_permit = $request->smoking_permit;
                $home->amenities = $request->amenities;
                $home->latitude = $request->latitude;
                $home->longitude = $request->longitude;
                $home->created_by = Auth::user()->id;
                $home->save();

                if ($request->hasfile('image')) {
                    foreach ($request->file('image') as $key => $image) {
                        $name = 'Property' . time() . $request->type . '-' . $home->id . '-' . $key . '.' . $image->getClientOriginalExtension();
                        $result = public_path('houseImage');
                        $image->move($result, $name);
                        $houseImage = new PropertyImage();
                        $houseImage->property_id = $home->id;
                        $houseImage->image  = $name;
                        $houseImage->save();
                    }
                }
                return redirect()->route('realestateIndex')->with('message', 'Updated successfully!');
            } catch (\Exception $e) {
                return back()->with('error', 'Please try again!');;
            }
        } else {

            $validator = $request->validate([
                'apartment_for' => 'required',
                'title' => 'required',
                'bedrooms' => 'required',
                'bathrooms' => 'required',
                'price' => 'required',
                'description' => 'required',
                'city' => 'required',
                'state' => 'required',
                'address' => 'required',
                'image' => 'required',
                'pin' => 'required|max:6',

            ]);

            try {
                $property = new Property();
                $property->appartment_for = $request->apartment_for;
                $property->title = $request->title;
                $property->price = $request->price;
                $property->duration = $request->duration;
                $property->description = $request->description;
                $property->city = $request->city;
                $property->state = $request->state;
                $property->address = $request->address;
                $property->pin = $request->pin;
                $property->available = $request->availabel;
                $property->status = $request->status;
                $property->type = $request->apartment_type;
                $property->bedrooms = $request->bedrooms;
                $property->bathrooms = $request->bathrooms;
                if (!empty($request->utilities)) {
                    $new_utilitie = implode(',', $request->utilities);
                    $property->utilities = $new_utilitie;
                }
                $property->wifi = $request->wifi;
                $property->parking = $request->parking;
                $property->pet_friendly = $request->pet_friendly;
                $property->move_in_date = $request->move_in_date;
                $property->size = $request->size;
                $property->furnished = $request->furnished;
                $property->appliances = $request->appliances;
                $property->air_conditioning = $request->air_conditioning;
                $property->outdoor_space = $request->outdoor_space;
                $property->smoking_permit = $request->smoking_permit;
                $property->amenities = $request->amenities;
                $property->latitude = $request->latitude;
                $property->longitude = $request->longitude;
                $property->created_by = Auth::user()->id;
                $property->save();

                if ($request->hasfile('image')) {
                    foreach ($request->file('image') as $key => $image) {
                        $name = 'Property' . time() . $request->type . '-' . $property->id . '-' . $key . '.' . $image->getClientOriginalExtension();
                        $result = public_path('houseImage');
                        $image->move($result, $name);
                        $houseImage = new PropertyImage();
                        $houseImage->property_id = $property->id;
                        $houseImage->image  = $name;
                        $houseImage->save();
                    }
                }
                return redirect()->route('realestateIndex')->with('message', 'Created successfully!');
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
    public function show($id)
    {
        return view('realestate::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editProperty($id)
    {
        $data = Property::find($id);
        $image = PropertyImage::where('property_id', $id)->get();
        return view('realestate::create', compact('data', 'image'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function deleteimage(Request $request)
    {
        $delete  = PropertyImage::find($request->id);
        $delete->delete();
        return back();
    }

    public function updateStatus(Request $request)
    {
        $update = Property::find($request->id);
        $update->status = $request->value;
        $update->save();
        $data = $request->value;
        return $data;
    }

    public function viewMore(Request $request)
    {
        $data = Property::find($request->id);

        $image = PropertyImage::where('property_id', $request->id)->get();

        $slider = '  <div id="carouselExampleIndicator" class="carousel slide"
        data-ride="carousel">
        <div class="carousel-inner">';
        foreach ($image as $key => $val) {

            $slider .= '<div class="carousel-item ';
            if ($key == 0) {
                $slider .= 'active ';
            }
            $slider .= '"><img class="d-block w-100" src="' . url('') . '/houseImage/' . $val->image . '" alt="First slide"></div>';
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
    }

    public function searchKeyWords(Request $request)
    {
        $allhouse = Property::where($request->type, 'like', '%' . $request->keyword . '%')->get();
        return view('realestate::ajax_filter', compact('allhouse'));
    }

    public function searchByPriceOrder(Request $request)
    {
        if ($request->type) {
            $allhouse = Property::where($request->type, 'like', '%' . $request->keyword . '%')->orderBy('price', $request->order)->get();
        } else {
            $allhouse = Property::orderBy('price', $request->order)->get();
        }
        return view('realestate::ajax_filter', compact('allhouse'));
    }
}