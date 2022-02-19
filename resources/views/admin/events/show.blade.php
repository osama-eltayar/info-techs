@extends('admin.layouts.app')
@section('content')
<!-- Start Content -->
<div class="content-side">
    <div class="page-title">
        <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon">Event details</h1></div>

    </div>
    <div class="container-fluid bg-blue">
        <div class="content-body">
            <div class="event-title">
                <span><strong>Event Title:</strong>  About Sociology</span>
                <ul class="list-unstyled">
                    <li>In progress</li>
                    <li>Not started</li>
                    <li>Ready</li>
                    <li>Finished</li>
                </ul>
                <div class="event-status">
                    <span>Event Online</span>
                </div>
            </div>

            <div class="tabs-event">
                <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa-solid fa-square-info"></i> Event Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa-solid fa-file-certificate"></i> Certificate & Badges</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fa-solid fa-video"></i> Zoom Link</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="true"><i class="fa-solid fa-flag"></i> Event status</button>
                    </li>
                     
                  </ul>

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="box-date">
                                    <h3><i class="fa-solid fa-align-left"></i>  General Information</h3>
                                    <div class="list-date">
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="left-side">Course type:</span>
                                                <span class="right-side">Event online</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Course Name:</span>
                                                <span class="right-side">
                                                    <p>About sociology ?</p>
                                                    <p>ماهو السوسيولوجي</p>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="left-side">Course Date:</span>
                                                <span class="right-side">
                                                    <p>15/11/2021      05:00 pm to 06:00 pm</p>
                                                    <p>16/11/2021      05:00 pm to 06:00 pm</p>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="left-side">Available seats:</span>
                                                <span class="right-side">20 seats</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Accreditation number (CME's)</span>
                                                <span class="right-side">6</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Certification Availabilty:</span>
                                                <span class="right-side">70% (show on)</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Course Survey:</span>
                                                <span class="right-side">Yes ( Survey sociology)</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Speciality:</span>
                                                <span class="right-side">Doctors, Pharma,</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Event Qwner:</span>
                                                <span class="right-side">جمعية التوحد بمكة</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Zoom Link:</span>
                                                <span class="right-side">No Available</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Publish date:</span>
                                                <span class="right-side">16/11/2021     </span>
                                            </li>
                                            <li>
                                                <span class="left-side">Create date:</span>
                                                <span class="right-side">16/11/2021     </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="box-date">
                                    <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-keynote"></i>  Chair persons & speakers </h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side-full">Ahmed Metwaly</span>
                                                </li>
                                                <li>
                                                    <span class="left-side-full">Sameh Abdalah</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-keynote"></i>  Sponsors </h3>
                                        <h4>Gold sponsors</h4>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side-full">جمعية التوحد بمكة</span>
                                                </li>
                                                <li>
                                                    <span class="left-side-full">Nour Clinic</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="box-muli-date">
                                        <h4>Bronze sponsors</h4>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side-full">Madeha Clinic</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-date">
                                    <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-file"></i>  Event Materials </h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side-full">Document reads.pdf   10 MB</span>
                                                </li>
                                                <li>
                                                    <span class="left-side-full">Scenario.jpg   5 MB</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-photo-film"></i> Event Media </h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side-full">Poster1.jpg   200kb    (top side)</span>
                                                </li>
                                                <li>
                                                    <span class="left-side-full">Smallpic.jpg   50kb    (right side)</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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
                                                        <p>200 SAR    [ 150 SAR before 15/10/2021 ] <br> Discount 50 SAR
                                                        </p>

                                                        <p>
                                                            <del>200 SAR</del>    150 SAR  <br> Discount 50 SAR
                                                        </p>
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
                                                    <span class="right-side">Sociology certificate</span>
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
                                           <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                           </p>
                                           <p>
                                            1) Lorem Ipsum has been the industry's standard dummy text ever since the <br>
                                            2) 1500s, when an unknown printer took a galley of type and scrambled it to <br>
                                            3) make a type specimen book. It has survived not only five centuries,
                                           </p>
                                       </div>

                                       <div class="dis ar-dis">
                                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة
                                            </p>
                                            <p> ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة 
                                            </p>
                                            <p>التي يقرأها. ولذلك يتم استخدام
                                            </p>
                                            <p>التي يقرأها. ولذلك يتم استخدام
                                            </p>
                                        </div>
                                </div>

                                <div class="box-date">
                                    <h3><i class="fa-solid fa-video"></i> Recorded Event List</h3>
                                        <div class="list-date">
                                            <div class="list-text">
                                                <span>Section Name</span>
                                                <span>Type</span>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side">Brain of the socilology </span>
                                                    <span class="right-side">Free</span>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-action">
                            <button type="button" class="btn btn-primary">Update information</button>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                        <div class="certificate-content">
                            <h3>Event Certificate</h3>
                            <div class="image-content">
                                <img src="assets/img/certificate.png" class="img-fluid" alt="image">
                            </div>
                            <div class="image-info">
                                <span>my certificate.png  2 MB <button class="remove-btn"><i class="fa-solid fa-trash-can"></i></button></span>
                                <span>
                                    Dimension: Width (1024px) - Height (800px) <br> Maximum size: 10 MB
                                </span>
                            </div>
                        </div>
                        <div class="badge-content">
                            <h3>Event Badge</h3>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
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
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                        <div class="title">
                            <p class="message-zoom">No zoom link available to this event</p>
                            <h3>Create Zoom link for this event</h3>
                        </div>
                        <div class="zoom-form">
                            <form action="">
                                <div class="row">
                                    <div class="col-xl-6 col-12">
                                        <div class="mb-4">
                                            <label for="" class="form-label"><strong>Date 1:</strong> <span>15/11/2021      05:00 pm to 06:00 pm</span></label>
                                            <input type="text" class="form-control" id="" placeholder="" value="https://zoom.us/j/93018069971?pwd=YytmV1lyMG9QZjRMSTA5bWUyUnZyQT09">
                                            <span class="message">Add zoom link here</span>
                                          </div>
                                          <div class="mb-4">
                                            <label for="" class="form-label"><strong>Date 2:</strong> <span>15/11/2021      05:00 pm to 06:00 pm</span></label>
                                            <input type="text" class="form-control" id="" placeholder="" value="https://zoom.us/j/93018069971?pwd=YytmV1lyMG9QZjRMSTA5bWUyUnZyQT09">
                                            <span class="message">Add zoom link here</span>
                                          </div>
                                    </div>
                                </div>
                                <div class="tab-action">
                                    <button type="button" class="btn btn-primary">Attach Zoom link</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade " id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                        <div class="boxes-section">
                            <h4>Ahmed Sameh Mohamed </h4>
                            <ul class="list-unstyled">
                                <li>
                                    <p><strong>Certificate</strong></p>
                                    <h5 class="red">
                                        0/2
                                        <small>No certificate</small>
                                    </h5>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Enable
                                        </label>
                                    </div>
                                    <span class="message-status">Certificate available</span>
                                </li>
                                <li>
                                    <p><strong>Badge Status</strong></p>
                                    <h5>0/2</h5>
                                    <span>Send by mail | Download</span>
                                </li>
                                <li>
                                    <p><strong>Certificate Print</strong> </p>
                                    <h5>1/2</h5>
                                    <span>Send by mail | Download</span>
                                </li>
                                <li>
                                    <p><strong>Invoice</strong></p>
                                    <h5>
                                        <span>SAR</span> 2,000
                                        <small>Early Pay | On time</small>
                                    </h5>
                                    <span>Send by mail | Download</span>
                                </li>
                                <li>
                                    <p><strong>Promocode</strong></p>
                                    <span>No discount used </span>
                                    <span>25FOff (-200 SAR)</span>
                                </li>
                            </ul>
                        </div>
                        <div class="table-title">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <h3>Course Progress</h3>
                                </div>
                                <div class="col-lg-6 col-12 text-end">
                                    <h3>
                                        Export report    
                                        <a class="btn-file btn-pdf" href="#"><i class="fa-solid fa-file-pdf"></i></a>
                                        <a class="btn-file btn-excel" href="#"><i class="fa-solid fa-file-excel"></i></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" >
                                <thead>
                                    <th scope="col"># <i class="fa-solid fa-sort"></i></th>
                                    <th scope="col">Session List  </th>
                                    <th scope="col">Start time</th>
                                    <th scope="col">Out of Session</th>
                                    <th scope="col">Total</th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>15/11/2015</td>
                                        <td>03:00 AM</td>
                                        <td>03:10 AM</td>
                                        <td>0:Hours - 10 min</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>15/11/2015</td>
                                        <td>03:00 AM</td>
                                        <td>03:10 AM</td>
                                        <td>0:Hours - 10 min</td>
                                      </tr>
                                  </tbody>
                            </table>
                          </div>
                          <div class="table-info text-end">
                            <h3>Total Amount   23 Hours</h3>
                        </div>
                          
                          
                          <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link active" href="#">page 2 / 3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
                                </a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                    
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('/admin/assets/js/owners/show.min.js')}}"></script>
@endsection
