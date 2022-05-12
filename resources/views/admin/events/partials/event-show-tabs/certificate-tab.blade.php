<div class="tab-pane fade " id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
    <div class="certificate-content">
        <h3>Event Certificate</h3>
        <div class="image-content">
            @if($event->certificate_image_url)
                <img src="{{$event->certificate_image_url}}" class="img-fluid" alt="image" id="certificate-img">
            @else
                <img src="/admin/assets/img/certificate.png" class="img-fluid" alt="image" id="certificate-img">
            @endif
        </div>
        <div class="image-info">
            {{--                                <span>my certificate.png  2 MB <button class="remove-btn"><i class="fa-solid fa-trash-can"></i></button></span>--}}
            <span>
                                    Dimension: Width (793px) - Height (521px) <br>
                                    Name X:(400px) Y:(340px) <br>
                                    Maximum size: 10 MB
                                </span>
            <form action="{{route('admin.events.upload-certificate',$event->id)}}" method="POST" enctype="multipart/form-data" id="certificate-form">
                <input type='file' class="imageUpload"  id="certificate-input" accept=".png, .jpg, .jpeg"  data-url="{{route('admin.events.upload-certificate',$event->id)}}" name="certificate_img" />
            </form>
        </div>
        <div class="badge-content">
            <h3>Event Badge</h3>
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <form action="{{route('admin.events.upload-certificate',$event->id)}}" method="POST" enctype="multipart/form-data" id="badge-form">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"  data-url="{{route('admin.events.upload-certificate',$event->id)}}" name="badge" />
                    </form>
                    <label for="imageUpload">Upload new Badge</label>
                </div>
                <div class="avatar-preview" style="display: none;">
                    <div id="imagePreview">
                    </div>
                </div>
            </div>
            <div class="image-info">
                                <span>Dimension: Width (200px) - Height (500px)
                                </span>
                <span>
                                    Maximum size: 3 MB
                                </span>
            </div>
        </div>
        <div class="tab-action">
            <button type="submit" class="btn btn-primary" id="save-certificate-img-btn" form="certificate-form">Save</button>
        </div>
    </div>
</div>
