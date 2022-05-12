<div class="tab-pane fade active show event-details-tab" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="box-date">
                <h3><i class="fa-solid fa-align-left"></i>  General Information</h3>
                <div class="list-date">
                    <ul class="list-unstyled">
                        <li>
                            <span class="left-side">Course type:</span>
                            <span class="right-side">{{$event->type_string}}</span>
                        </li>
                        <li>
                            <span class="left-side">Course Name:</span>
                            <span class="right-side">
                                                    <p>{{$event->title_en}}</p>
                                                    <p>{{$event->title_ar}}</p>
                                                </span>
                        </li>
                        <li>
                            <span class="left-side">Course Date:</span>
                            <span class="right-side">
                                                    <p>{{$event->formatted_start_date}}</p>
                                                    <p>{{$event->formatted_end_date}}</p>
                                                </span>
                        </li>
                        <li>
                            <span class="left-side">Available seats:</span>
                            <span class="right-side">{{$event->seats}} seats</span>
                        </li>
                        <li>
                            <span class="left-side">Accreditation number (CME's)</span>
                            <span class="right-side">{{$event->cme_count}}</span>
                        </li>
                        <li>
                            <span class="left-side">Certification Availabilty:</span>
                            <span class="right-side">
                                                    {{$event->certificate}}%
                                                    {{-- (show on) --}}
                                                </span>
                        </li>

                        <li>
                            <span class="left-side">Course Survey:</span>
                            @if($event->survey_id)
                                <a href="{{route('admin.events.surveys.export-answers',['event'=>$event->id,'survey' => $event->survey->id])}}" class="right-side">{{$event->survey->title}}</a>
                            @endif
                        </li>
                        <li>
                            <span class="left-side">Speciality:</span>
                            <span class="right-side">{{$event->specialities_string}}</span>
                        </li>
                        <li>
                            <span class="left-side">Event Qwner:</span>
                            <span class="right-side">{{optional($event->organization)->name}}</span>
                        </li>
                        <li>
                            <span class="left-side">Zoom Link:</span>
                            <span class="right-side">No Available</span>
                        </li>
                        <li>
                            <span class="left-side">Publish date:</span>
                            <span class="right-side">{{$event->formatted_published_at}}     </span>
                        </li>
                        <li>
                            <span class="left-side">Create date:</span>
                            <span class="right-side">{{$event->formatted_created_at}}     </span>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="box-date">
                <div class="box-muli-date">
                    <h3><i class="fa-solid fa-keynote"></i>  Chair persons & speakers </h3>
                    <div class="list-date">
                        <ul class="list-unstyled">
                            @foreach ($event->speakers as $speaker)
                                <li>
                                    <span class="left-side-full">{{$speaker->name}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="box-muli-date">
                    <h3><i class="fa-solid fa-keynote"></i>  Sponsors </h3>
                    {{-- <h4>Gold sponsors</h4> --}}
                    <div class="list-date">
                        <ul class="list-unstyled">
                            @foreach ($event->sponsors as $sponsor)
                                <li>
                                    <span class="left-side-full">{{$sponsor->name}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- <div class="box-muli-date">
                    <h4>Bronze sponsors</h4>
                    <div class="list-date">
                        <ul class="list-unstyled">
                            <li>
                                <span class="left-side-full">Madeha Clinic</span>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>

            <div class="box-date">
                <div class="box-muli-date">
                    <h3><i class="fa-solid fa-file"></i>  Event Materials </h3>
                    <div class="list-date">
                        <ul class="list-unstyled">
                            @foreach ($event->materials as $material)
                                <li>
                                    <span class="left-side-full">{{$material->name}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- <div class="box-muli-date">
                    <h3><i class="fa-solid fa-photo-film"></i> Event Media </h3>
                    <div class="list-date">
                        <ul class="list-unstyled">
                            @foreach ($event->videos as $video)
                            <li>
                                <span class="left-side-full">{{$video->name}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="box-date">
                <h3><i class="fa-solid fa-credit-card"></i>  Payments and Discounts</h3>
                <div class="list-date">
                    <ul class="list-unstyled">
                        <li>
                            <span class="left-side">Fees:</span>
                            <span class="right-side">
                                                        @foreach ($event->discounts as $discount)
                                    @if ($discount->date)
                                        @if ($discount->date->gt(now()))
                                            <p>
                                                                    {{$event->price}} SAR    [ {{$event->price -= $discount->price}} SAR before {{$discount->formatted_date}} ] <br> Discount {{$discount->price}} SAR
                                                                </p>
                                        @endif
                                    @else
                                        <p>
                                                                    <del>{{$event->price}}SAR</del>    {{$event->price -=$discount->price}} SAR  <br> Discount {{$discount->price}} SAR
                                                                </p>
                                    @endif

                                @endforeach
                                                    </span>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="box-date">
                <h3><i class="fa-solid fa-file-certificate"></i>  Certificates and Badges</h3>
                <div class="list-date">
                    <ul class="list-unstyled">
                        <li>
                            <span class="left-side">Certificate: </span>
                            {{-- <span class="right-side">Sociology certificate</span> --}}
                        </li>
                        <li>
                            <span class="left-side">Badges:</span>
                            <span class="right-side">Not Available</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="box-date">
                <h3><i class="fa-solid fa-info"></i>  Event Description</h3>
                <div class="dis en-dis">
                    {!!$event->description_en  !!}
                </div>

                <div class="dis ar-dis">
                    {!!$event->description_ar  !!}
                </div>
            </div>

            <div class="box-date">
                <h3><i class="fa-solid fa-video"></i> Recorded Event List</h3>
                <div class="list-date">
                    <div class="list-text">
                        <span>Section Name</span>
                        <span>Type</span>
                    </div>

                    @foreach ($event->videos as $video)
                        <li>
                            <span class="left-side">{{$video->name}}</span>
                            <span class="right-side">{{$video->type}}</span>
                        </li>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <div class="tab-action">
        <button type="button" class="btn btn-primary">Update information</button>
    </div>
</div>
