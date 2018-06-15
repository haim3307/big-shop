<div class="filterUnit">
    <h4 class="toggleFilterDrop"><i class="fa fa-angle-down"
                                    style="margin-right: 10px;"></i><strong>Brand</strong></h4>
    <div class="brandsFilter dropFilter">
        <ul style="padding: 20px 30px 0 30px;">

            @foreach($brands as $brandCheck)
                <li class="d-flex justify-content-between" style="padding-bottom: 13px;">
                    <input id="checkBox{{ucfirst($brandCheck->name)}}"
                           name="check-box-{{$brandCheck->id}}"
                           @if(old('check-box-'.$brandCheck->id) == 'on') checked
                           @endif class="hiddenCheckbox"
                           type="checkbox">
                    <label for="checkBox{{ucfirst($brandCheck->name)}}">{{ucfirst($brandCheck->name)}}</label>
                    <label for="checkBox{{ucfirst($brandCheck->name)}}"
                           class="allCentered customCheckbox">
                        <img class="{{old('check-box-'.$brandCheck->id) == 'on'?'d-block':'d-none-unimportant'}}"
                             src="{{asset('_img/Shape_21.png')}}" alt="">
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>