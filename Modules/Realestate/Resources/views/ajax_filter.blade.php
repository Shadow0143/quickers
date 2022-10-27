<div class="container">
    @foreach ($allhouse as $key => $val)
    <div class="card-new ">
        @if ($val->appartment_for=='new')
        <img src="{{asset('assets/blink.gif')}}" alt="blink-new" class="blinkimg">
        @else

        @endif
        <div class="card-header">
            <div id="carouselExampleIndicators{{$val->id}}" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    @foreach ($val->posts as $key2=>$val2)
                    <div class="carousel-item @if($key2==0)active @endif">
                        <img src="{{asset('houseImage')}}/{{$val2->image}}" alt="{{$val2->image}}" />
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators{{$val->id}}" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators{{$val->id}}" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col ">
                    <h4>
                        {{$val->title}}
                    </h4>
                </div>
                <div class="col">
                    <span class="tag tag-teal"> {{$val->available}} </span>
                </div>
                <div class="col ">
                    <h4>
                        <a href="{{route('editProperty',['id'=>$val->id])}}" title="Edit" class="">
                            <i class="las la-ellipsis-v"> </i>
                        </a>
                    </h4>

                </div>
            </div>

            <p>Price :
                <i class="las la-rupee-sign"></i> {{$val->price}} /-
                @if($val->appartment_for=='new')

                @else
                <span> for {{$val->duration}} </span>
                @endif


            </p>
            <p>
                @if ($val->bedrooms)
                <i class=" las la-bed" title="Bedrooms"></i> {{$val->bedrooms}} &nbsp;
                @endif
                @if ($val->bathrooms)
                <i class=" las la-bath" title="Bathrooms"></i> {{$val->bathrooms}} &nbsp;
                @endif
                @if ($val->size)
                <i class=" las la-hotel" title="Size"></i>{{$val->size}}
                @endif
            </p>
            <p>
                Address : {{$val->city}},{{$val->state}},{{$val->address}},{{$val->pin}}
            </p>
            <p>

            <div class="form-check form-switch form-switch-secondary">
                <input class="form-check-input checkable" type="checkbox" role="switch" id="SwitchCheck2"
                    @if($val->status== 'active') checked value="inactive"
                @else value="active" @endif data-id="{{$val->id}}">
                <label class="form-check-label" for="SwitchCheck2" id="status{{$val->id}}">
                    {{ucfirst($val->status)}}</label>
            </div>
            </p>
            <p>
                {{date('d M ,Y',strtotime($val->created_at))}}
                <br>
                <a href="javaScript:void(0);" data-id="{{$val->id}}" class="knowmore">
                    Know more <i class=" las la-arrow-ri moregh"></i>
                </a><br>
                @if ($val->latitude && $val->longitude)

                <iframe
                    src="https://www.google.com/maps?q={{$val->latitude}},{{$val->longitude}}&hl=en&z=14&amp;output=embed"
                    width="250" height="150" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="yes"
                    loading="lazy">
                </iframe>
                @endif


            </p>

        </div>

    </div>
    @endforeach
</div>