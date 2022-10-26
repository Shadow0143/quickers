{{-- @extends('oldvehicle::layouts.master') --}}
@extends('layouts.app')

@section('title')
<title>Old Vehicles</title>

@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Vehicles </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Vehicles </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="tasksList">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1"></h5>
                            <div class="flex-shrink-0">
                                <a class="btn btn-danger add-btn" href="javaScript:void(0);"
                                    onclick="window.history.back()">
                                    Back</a>
                            </div>
                        </div>
                    </div>


                    <!--end card-body-->
                    <div class="card-body" id="resultdata">

                        <div class="container">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Add New / Old Vehicles</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <form action="{{route('storeVehicle')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="type">Type <span class="text-danger">*</span>
                                                    </label>
                                                    <br>
                                                    <input type="radio" name="type" id="type " value="new" @if($data)
                                                        @if($data->type=='new') checked @endif
                                                    @endif class="typefield @error('title') is-invalid @enderror">
                                                    New &nbsp;
                                                    <input type="radio" name="type" id="type " value="old"
                                                        class="typefield @error('type') is-invalid @enderror" @if($data)
                                                        @if($data->type=='old') checked
                                                    @endif @endif>
                                                    Old


                                                    @error('type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="category">Category <span
                                                            class="text-danger">*</span></label>
                                                    <select name="category" id="category"
                                                        class="form-control @error('category') is-invalid @enderror">
                                                        <option value="">Please Select</option>
                                                        <option value="motorCycle">Motor cycle</option>
                                                        <option value="adaptedVehicle">Adapted Vehicle</option>
                                                        <option value="" eRickshaw>E-Rickshaw</option>
                                                        <option value="eCart">E-cart </option>
                                                        <option value="cars">Cars</option>
                                                        <option value="transportVehicle">Transport Vehicle</option>

                                                    </select>
                                                    @error('category')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="title">Title <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" id="title" placeholder="Title"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        @if($data) value="{{$data->title}}" @endif>
                                                    @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-6">
                                                    <label for="price">Price <span class="text-danger">*</span></label>
                                                    <input type="number" name="price" id="price" placeholder="Price"
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        @if($data) value="{{$data->price}}" @endif>
                                                    @error('price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="brand">Brand <span class="text-danger">*</span></label>
                                                    <input type="text" name="brand" id="brand" placeholder="Brand"
                                                        class="form-control @error('brand') is-invalid @enderror"
                                                        @if($data) value="{{$data->brand}}" @endif>
                                                    @error('brand')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="col-6">
                                                    <label for="year">Year</label>
                                                    <input type="text" name="year" id="year" placeholder="Year"
                                                        class="form-control" @if($data) value="{{$data->year}}" @endif>
                                                </div>

                                                <div class="col-6">
                                                    <label for="km_driven">KM Driven </label>
                                                    <input type="number" name="km_driven" id="km_driven"
                                                        placeholder="km_driven" class="form-control" @if($data)
                                                        value="{{$data->km_driven}}" @endif>
                                                </div>


                                                <div class="col-6">
                                                    <label for="servicing_remain">Servicing Remain</label>
                                                    <input type="text" name="servicing_remain" id="servicing_remain"
                                                        class="form-control" placeholder="Servicing Remain" @if($data)
                                                        value="{{$data->servicing_remain}}" @endif>
                                                </div>
                                                <div class="col-6">
                                                    <label for="color">colour</label>
                                                    <input type="text" name="color" id="color" class="form-control"
                                                        @if($data) value="{{$data->color}}" @endif>
                                                </div>

                                                <div class="col-6">
                                                    <label for="description">Description <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <textarea name="description" id="description" cols="30" rows="10"
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        placeholder="Address">@if($data) {{$data->description}} @endif</textarea>
                                                    @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="any_damage">Any Damage
                                                    </label>
                                                    <textarea name="any_damage" id="any_damage" cols="30" rows="10"
                                                        class="form-control "
                                                        placeholder="Address">@if($data) {{$data->any_damage}} @endif</textarea>
                                                </div>



                                                <div class="col-3">
                                                    <label for="city">City <span class="text-danger">*</span></label>
                                                    <input type="text" name="city" id="city" placeholder="City"
                                                        class="form-control @error('city') is-invalid @enderror"
                                                        @if($data) value="{{$data->city}}" @endif>
                                                    @error('city')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <label for="state">State <span class="text-danger">*</span></label>
                                                    <input type="text" name="state" id="state" placeholder="State"
                                                        class="form-control @error('state') is-invalid @enderror"
                                                        @if($data) value="{{$data->state}}" @endif>
                                                    @error('state')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <label for="address">Address <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="address" id="address" cols="30" rows="1"
                                                        class="form-control @error('address') is-invalid @enderror">@if($data) {{$data->address}} @endif</textarea>
                                                    @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <label for="pin">Pin <span class="text-danger">*</span></label>
                                                    <input type="number" name="pin" id="pin" placeholder="Pin"
                                                        class="form-control @error('pin') is-invalid @enderror"
                                                        maxlength="6" @if($data) value="{{$data->pin}}" @endif>
                                                    @error('pin')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="co-12">
                                                    <label for="image">Image <span class="text-danger">*</span></label>
                                                    <input type="file" name="image[]" id="image"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        multiple placeholder="Images" @if($data) @else @endif
                                                        accept=".jpg,.JPEG,.png,.PNG">
                                                    @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                @if($image)
                                                <div class="col-12">
                                                    <div class="row">

                                                        @foreach ($image as $key3=>$val3)
                                                        <div class="card col-3 updateimg{{$val3->id}}">
                                                            <a href="javaScript:void(0);" title="delete"
                                                                data-id="{{$val3->id}}" class="deleteimage">X</a>
                                                            <img src="{{asset('houseImage')}}/{{$val3->image}}"
                                                                alt="images">
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                                @endif

                                                <div class="col-6">
                                                    <label for="latitude">Latitude</label>
                                                    <input type="text" name="latitude" id="latitude"
                                                        class="form-control" @if($data) value="{{$data->latitude}}"
                                                        @endif>
                                                </div>
                                                <div class="col-6">
                                                    <label for="longitude">Longitude</label>
                                                    <input type="text" name="longitude" id="longitude"
                                                        class="form-control" @if($data) value="{{$data->longitude}}"
                                                        @endif>
                                                </div>

                                                <div class="col-6">
                                                    <label for="availabel"> Available</label>
                                                    <select name="available" id="available" class="form-control">
                                                        <option value="available" @if($data) {{ $data->available ==
                                                            'available' ? 'selected'
                                                            : '' }} @endif> Available</option>
                                                        <option value="occupied" @if($data) {{ $data->available ==
                                                            'occupied' ? 'selected' :
                                                            '' }} @endif> Occupied</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="status"> Status</label>
                                                    <select name="status" id="statuss" class="form-control">
                                                        <option value="active" @if($data) {{ $data->status == 'active' ?
                                                            'selected' : '' }}
                                                            @endif>Active</option>
                                                        <option value="inactive" @if($data) {{ $data->status ==
                                                            'inactive' ? 'selected' : ''
                                                            }} @endif>inactive</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 text-center mt-5">
                                                    <button type="submit"
                                                        class="btn btn-outline-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>

        </div>
        <!-- container-fluid -->
    </div>

</div>
@endsection