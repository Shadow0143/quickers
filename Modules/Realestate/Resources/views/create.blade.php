@extends('layouts.app')

@section('title')
<title> Add Realestates</title>
@endsection

@section('content')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> Add Realestates</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Realestates </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}



        <!-- end page title -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add New / Old Realestate </h4>
                    <div class="flex-shrink-0">
                        <a class="btn btn-danger add-btn" href="javaScript:void(0);" onclick="window.history.back()">
                            Back</a>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{route('submitProperty')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if($data)
                        <input type="hidden" name="id" id="id" value="{{$data->id}}">

                        @endif
                        <div class="row">
                            <div class="col-12">
                                <label for="type">Appatment for <span class="text-danger">*</span> </label>
                                <br>
                                <input type="radio" name="apartment_for" id="type " value="new" @if($data)
                                    @if($data->appartment_for=='new') checked @endif @endif class="typefield
                                @error('apartment_for') is-invalid @enderror">
                                Sell
                                <input type="radio" name="apartment_for" id="type " value="existing"
                                    class="typefield @error('apartment_for') is-invalid @enderror" @if($data)
                                    @if($data->appartment_for=='existing') checked @endif @endif> Rent
                                @error('apartment_for')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="type">Type</label>
                                <input type="text" name="apartment_type" id="apartment_type" class="form-control"
                                    placeholder="Type" @if($data) value="{{$data->type}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" placeholder="Title"
                                    class="form-control  @error('title') is-invalid @enderror" @if($data)
                                    value="{{$data->title}}" @endif>
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="bedrooms">Bedrooms <span class="text-danger">*</span></label>
                                <input type="number" name="bedrooms" id="bedrooms" placeholder="Bedrooms"
                                    class="form-control @error('bedrooms') is-invalid @enderror" @if($data)
                                    value="{{$data->bedrooms}}" @endif>
                                @error('bedrooms')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="bathrooms">Bathrooms <span class="text-danger">*</span></label>
                                <input type="number" name="bathrooms" id="bathrooms" placeholder="Bathrooms"
                                    class="form-control @error('bathrooms') is-invalid @enderror" @if($data)
                                    value="{{$data->bathrooms}}" @endif>
                                @error('bathrooms')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="utilities"> Utilities Include </label>
                                <select name="utilities[]" class="form-control" id="choices-multiple-default"
                                    data-choices name="choices-multiple-default" multiple>
                                    @if($data)
                                    {{-- @foreach(explode(',',$data->utilities) as $key2=>$option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach --}}
                                    @else
                                    <option value="hydro">Hydro</option>
                                    <option value="heat">Heat</option>
                                    <option value="water">Water</option>
                                    @endif
                                </select>
                            </div>


                            <div class="col-6">
                                <label for="wifi">Wifi</label>
                                <input type="text" name="wifi" id="wifi" placeholder="Wifi" class="form-control"
                                    @if($data) value="{{$data->wifi}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="price">price <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" placeholder="Price"
                                    class="form-control  @error('price') is-invalid @enderror" @if($data)
                                    value="{{$data->price}}" @endif>
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="price">Parking Include </label>
                                <input type="number" name="parking" id="parking" placeholder="Parking"
                                    class="form-control" @if($data) value="{{$data->parking}}" @endif>
                            </div>


                            <div class="col-12 durationfield" @if($data) @if($data->duration) style="display: block"
                                @else
                                style="display: none" @endif @else style="display: none" @endif>
                                <label for="duration">Duration</label>
                                <input type="text" name="duration" id="duration" class="form-control"
                                    placeholder="Duration" @if($data) value="{{$data->duration}}" @endif>
                            </div>
                            <div class="col-12">
                                <label for="description">Description (Facilities)<span class="text-danger">*</span>
                                </label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Address">@if($data) {{$data->description}} @endif</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="pet_friendly">Pet Friendly</label>
                                <input type="text" name="pet_friendly" id="pet_friendly" class="form-control" @if($data)
                                    value="{{$data->pet_friendly}}" @endif>
                            </div>

                            <div class="col-6">
                                <label for="move_in_date">Moving Date</label>
                                <input type="date" name="move_in_date" id="move_in_date" class="form-control" @if($data)
                                    value="{{$data->move_in_date}}" @endif>
                            </div>
                            <div class="col-3">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" id="city" placeholder="City"
                                    class="form-control @error('city') is-invalid @enderror" @if($data)
                                    value="{{$data->city}}" @endif>
                                @error('city')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="state">State <span class="text-danger">*</span></label>
                                <input type="text" name="state" id="state" placeholder="State"
                                    class="form-control @error('state') is-invalid @enderror" @if($data)
                                    value="{{$data->state}}" @endif>
                                @error('state')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" cols="30" rows="1"
                                    class="form-control @error('address') is-invalid @enderror">@if($data) {{$data->address}} @endif</textarea>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="pin">Pin <span class="text-danger">*</span></label>
                                <input type="number" name="pin" id="pin" placeholder="Pin"
                                    class="form-control @error('pin') is-invalid @enderror" maxlength="5" @if($data)
                                    value="{{$data->pin}}" @endif>
                                @error('pin')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="co-12">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image[]" id="image"
                                    class="form-control @error('image') is-invalid @enderror" multiple
                                    placeholder="Images">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if($image)
                            <div class="col-12">
                                <div class="row">

                                    @foreach ($image as $key3=>$val3)
                                    <div class="card col-3 updateimg{{$val3->id}}">
                                        <a href="javaScript:void(0);" title="delete" data-id="{{$val3->id}}"
                                            class="deleteimage">X</a>
                                        <img src="{{asset('houseImage')}}/{{$val3->image}}" alt="images" width="200px">
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            @endif

                            <div class="col-6">
                                <label for="size">Size</label>
                                <input type="text" name="size" id="size" class="form-control" @if($data)
                                    value="{{$data->size}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="furnished">Furnished</label>
                                <input type="text" name="furnished" id="furnished" class="form-control" @if($data)
                                    value="{{$data->furnished}}" @endif>
                            </div>

                            <div class="col-6">
                                <label for="appliances">Appliances</label>
                                <input type="text" name="appliances" id="appliances" class="form-control" @if($data)
                                    value="{{$data->appliances}}" @endif>
                            </div>

                            <div class="col-6">
                                <label for="air_conditioning">Air Conditioning</label>
                                <input type="text" name="air_conditioning" id="air_conditioning" class="form-control"
                                    @if($data) value="{{$data->air_conditioning}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="outdoor_space">Personal Outdoor Space</label>
                                <input type="text" name="outdoor_space" id="outdoor_space" class="form-control"
                                    @if($data) value="{{$data->outdoor_space}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="smoking_permit">Smoking Permit</label>
                                <input type="text" name="smoking_permit" id="smoking_permit" class="form-control"
                                    @if($data) value="{{$data->smoking_permit}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="amenties">Amenties</label>
                                <textarea name="amenities" id="amenities" cols="30" rows="2"
                                    class="form-control"> @if($data) {{$data->amenities}} @endif </textarea>
                            </div>
                            <div class="col-6">
                                <label for="latitude">Latitude</label>
                                <input type="text" name="latitude" id="latitude" class="form-control" @if($data)
                                    value="{{$data->latitude}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="longitude">Longitude</label>
                                <input type="text" name="longitude" id="longitude" class="form-control" @if($data)
                                    value="{{$data->longitude}}" @endif>
                            </div>

                            <div class="col-6">
                                <label for="availabel"> Availabel</label>
                                <select name="availabel" id="availabel" class="form-control">
                                    <option value="available" @if($data) {{ $data->availabel == 'available' ? 'selected'
                                        : '' }} @endif> Available</option>
                                    <option value="occupied" @if($data) {{ $data->availabel == 'occupied' ? 'selected' :
                                        '' }} @endif> Occupied</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="status"> Status</label>
                                <select name="status" id="statuss" class="form-control">
                                    <option value="active" @if($data) {{ $data->status == 'active' ? 'selected' : '' }}
                                        @endif>Active</option>
                                    <option value="inactive" @if($data) {{ $data->status == 'inactive' ? 'selected' : ''
                                        }} @endif>inactive</option>
                                </select>
                            </div>

                            <div class="col-12 text-center mt-5">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->







@endsection

@section('js')

<script>
    $('.deleteimage').on('click',function(){
        var id = $(this).data('id');
        $.ajax({
            url:"{{route('deleteImage')}}",
            type:'GET',
            data:{id:id},
            success:function(data){
                $('.updateimg'+id).hide();
            }
        });
    });

    $(document).ready(function() {
    $("input[name$='apartment_for']").click(function() {
        var test = $(this).val();
        if(test=='new'){
            $('.durationfield').css('display','none');
        }else{
            $('.durationfield').css('display','block');

        }
    });
});
</script>
@endsection