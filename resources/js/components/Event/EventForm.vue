<template>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
            <div class="form-content">
                <form action="" >
                    <h3 class="form-title"><i class="fa-solid fa-align-left"></i> General Information</h3>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="mb-5">
                                <label  class="form-label">Course Type <span>*</span></label>
                                <select class="form-select" aria-label="Default select example" v-model="eventData.typeId" :disabled="isEdit">
                                    <option value="" selected disabled>Course Type</option>
                                    <option v-for="courseType in courseTypes" :key="courseType.id" :value="courseType.id">{{courseType.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Course Name <span>*</span></label>
                                <input type="text" class="form-control mb-3"  placeholder="English Language" v-model="eventData.titleEn">
                                <input type="text" class="form-control "  placeholder="Arabic Language" v-model="eventData.titleAr">
                            </div>

                            <div class="mb-4"  :class="{'field-disabled' :[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent,courseTypeEnum.hybrid,courseTypeEnum.physical].indexOf(eventData.typeId) == -1 }" >
                                <div id="list1" class="input-content">
                                    <div class="title">
                                        <label>Course Date and time <span>*</span></label>
                                        <button type="button" class="add-new" @click="onAddEventDateTimeRow" :style="{'  pointer-events: none;' : [courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent,courseTypeEnum.hybrid,courseTypeEnum.physical].indexOf(eventData.typeId) == -1 }" :disabled="[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent,courseTypeEnum.hybrid,courseTypeEnum.physical].indexOf(eventData.typeId) == -1 " >Add new</button>
                                    </div>
                                    <div class="input-group row" v-for="(dateTimeData,idx) in eventData.eventDateTimeData" :key="idx">
                                        <div class="mb-2 col-md-5 col-sm-12">
                                            <label  class="form-label">Date</label>
                                            <input type="date" class="form-control" :value="dateTimeData.date" id="date" data-toggle="datepicker" placeholder="Date" aria-label="Date" @change="onEventDateTimeChange(idx,'date',$event)" :disabled="[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent,courseTypeEnum.hybrid,courseTypeEnum.physical].indexOf(eventData.typeId) == -1 ">
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="mb-2 col-md col-sm-12">
                                                    <label  class="form-label">Time From</label>
                                                    <div >
                                                        <input type="time" class="form-control" id="from" :value="dateTimeData.from_time" @change="onEventDateTimeChange(idx,'from_time',$event)" :disabled="[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent,courseTypeEnum.hybrid,courseTypeEnum.physical].indexOf(eventData.typeId) == -1 ">
                                                    </div>
                                                </div>
                                                <div class="mb-2 col-md col-sm-12">
                                                    <label  class="form-label">Time To</label>
                                                    <div >
                                                        <input type="time" class="form-control" id="to" :value="dateTimeData.to_time" @change="onEventDateTimeChange(idx,'to_time',$event)" :disabled="[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent,courseTypeEnum.hybrid,courseTypeEnum.physical].indexOf(eventData.typeId) == -1 ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="remove" v-if="idx > 0" @click="onRemoveEventDateTimeRow(idx,$event)"><i class="fa-solid fa-trash-can"></i></button>

                                    </div>

                                </div>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Country <span>*</span></label>
                                <select class="form-select" aria-label="Default select example" @change="onCountryChange" v-model="eventData.countryId" id="country">
                                    <option selected value="" disabled>Country</option>
                                    <option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Address</label>
                                <input type="text" class="form-control"  placeholder="" v-model="eventData.address" :disabled="[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent].indexOf(eventData.typeId) != -1">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-4 ">
                                        <label  class="form-label">Available seats</label>
                                        <input type="number" class="form-control"  placeholder=""  v-model="eventData.seats">
                                        <span class="message">Leave blank for unlimited seats</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-4">
                                        <label  class="form-label">CME's</label>
                                        <input type="number" class="form-control"  placeholder="" v-model="eventData.cmeCount">
                                        <span class="message">Leave blank for none CME's</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Certification availability %  <span>*</span></label>
                                <input type="number" class="form-control"  placeholder="" v-model="eventData.certificate">
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Course survey</label>
                                <select class="form-select" aria-label="Default select example" v-model="eventData.survey_id">
                                    <option value="" selected disabled>Survey</option>
                                    <option v-for="survey in surveys" :key="survey.id" :value="survey.id">{{survey.title}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Speciality <span>*</span></label>
                                <select class="form-select" aria-label="Default select example" multiple id="speciality-selector">
                                    <option v-for="speciality in specialities" :selected="eventData.specialities.includes(+speciality.id)" :key="speciality.id" :value="speciality.id">{{speciality.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Event Owner  <span>*</span></label>
                                <select class="form-select" aria-label="Default select example" v-model="eventData.organization_id">
                                    <option selected value="" disabled>Event Owner</option>
                                    <option v-for="owner in owners" :key="owner.id" :value="owner.id">{{owner.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">City</label>
                                <select class="form-select" aria-label="Default select example" id="city" v-model="eventData.cityId" :disabled="!cities.length">
                                    <option selected value="" disabled>City</option>
                                    <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Location</label>
                                <input type="text" class="form-control"  placeholder="" v-model="eventData.location" :disabled="[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent].indexOf(eventData.typeId) != -1">
                            </div>
                        </div>

                        <div class="col-lg-9 col-12" v-if="[courseTypeEnum.recorded,courseTypeEnum.hybrid].indexOf(eventData.typeId) != -1">
                            <div class="mb-4">
                                <div id="list2" class="input-content">
                                    <div class="title">
                                        <label>Recorded event sections</label>
                                        <button type="button" class="add-new" @click="onAddEventRecordedSessionRow" >Add new</button>
                                    </div>
                                    <div class="input-group row" v-for="(recordedSessionData,idx) in eventData.recordedSessions" :key="idx">
                                        <div class="mb-2 col-md-4 col-sm-12">
                                            <label  class="form-label">Title</label>
                                            <input type="text" class="form-control" placeholder="Brain of the socilology " :value="recordedSessionData.title" @change="onEventRecordedSessionChange(idx,'title',$event)">
                                        </div>
                                        <div class="mb-2 col-md col-sm-12">
                                            <label  class="form-label">Section URL</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="http://www,youtube.com/ghhYg" :value="recordedSessionData.url" @change="onEventRecordedSessionChange(idx,'url',$event)">
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md col-sm-12">
                                            <label  class="form-label">Type</label>
                                            <div class="input-group">
                                                <select class="form-select" aria-label="Default select example" @change="onEventRecordedSessionChange(idx,'is_free',$event)">
                                                    <option  selected disabled>Type</option>
                                                    <option  value="1" :selected="recordedSessionData.is_free == 1">Free</option>
                                                    <option value="0" :selected="recordedSessionData.is_free == 0">Paid</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button class="remove" v-if="idx > 0" @click="onRemoveEventRecordedSessionRow(idx,$event)"><i class="fa-solid fa-trash-can"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade " id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
            <div class="form-content">
                <form action="">
                    <h3 class="form-title"><i class="fa-solid fa-credit-card"></i> Payments and Discounts</h3>
                    <div class="row">
                        <div class="col-xl-6 col-12">
                            <div class="mb-4">
                                <label  class="form-label">Course fees    <span class="fees">0 SAR</span></label>
                                <input type="number" class="form-control"  placeholder="" v-model="eventData.price">
                                <span class="message">Fees in SAR | Leave blank for free course</span>
                            </div>

                            <div class="row" >
                                <div class="col-lg-6 col-12">
                                    <label  class="form-label">Course Discount</label>
                                    <div class="input-group row">
                                        <div class="mb-2 col-md-7 col-12">
                                            <input type="number" class="form-control"  v-model="eventData.discount.price">
                                        </div>
                                        <div class="mb-2 col-md-5 col-12">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected> SAR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-4">
                                        <label  class="form-label">Activate discount before date</label>
                                        <input type="date" class="form-control"  placeholder="" v-model="eventData.discount.date">
                                        <span class="message">Please select a date  </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade " id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
            <div class="form-content">
                <form action="">
                    <h3 class="form-title"><i class="fa-solid fa-keynote"></i>   Chair persons, speakers </h3>
                    <div class="row">
                        <div class="col-xl-10 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box">
                                        <div class="mb-4">
                                            <label  class="form-label">Chair Person</label>
                                            <select class="form-select" aria-label="Default select example" @change="onChairPersonChange">
                                                <option selected></option>
                                                <option v-for="chairPerson in chairPersons" :key="chairPerson.id" :value="chairPerson.id">{{chairPerson.name}}</option>
                                            </select>
                                            <span class="message">Select multiple chair person</span>
                                        </div>
                                        <ul class="list-unstyled user-list">
                                            <li v-for="chairPerson in selectedChairPersons" :key="chairPerson.id">
                                                <i class="fa-solid fa-user"></i> {{chairPerson.name}}
                                                <br>
                                                <i class="fa-solid fa-trash" @click="onDeleteSelectedChairPerson(chairPerson.id)"></i>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="box">
                                        <div class="mb-4">
                                            <label  class="form-label">Course speakers</label>
                                            <select class="form-select" aria-label="Default select example" @change="onSpeakerChange">
                                                <option selected></option>
                                                <option v-for="speaker in speakers" :key="speaker.id" :value="speaker.id">{{speaker.name}}</option>
                                            </select>
                                            <span class="message">Select multiple course speakers</span>
                                        </div>
                                        <ul class="list-unstyled user-list">
                                            <li v-for="speaker in selectedSpeakers" :key="speaker.id">
                                                <i class="fa-solid fa-user"></i>
                                                {{speaker.name}}
                                                <br>
                                                <i class="fa-solid fa-trash" @click="onDeleteSelectedSpeaker(speaker.id)"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade " id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
            <div class="form-content">
                <form action="">
                    <h3 class="form-title"><i class="fa-solid fa-file-certificate"></i> Sponsors</h3>
                    <div class="row sponsors-w" v-for="(eventSponsor,idx) in eventData.sponsors" :key="idx">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <select class="form-select" aria-label="Default select example" @change="onSponsorChange(idx,'sponsor_id',$event)">
                                    <option selected> </option>
                                    <option :value="sponsor.id" v-for="sponsor in sponsors" :key="sponsor.id" :selected="sponsor.id == eventSponsor.sponsor_id">{{sponsor.name}}</option>
                                </select>
                                <span class="message">Fees in SAR | Leave blank for free course</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <select class="form-select" aria-label="Default select example" @change="onSponsorChange(idx,'sponsor_type',$event)">
                                    <option selected>Type</option>
                                    <option v-for="sponsorType in sponsorTypes" :key="sponsorType.value" :value="sponsorType.value" :selected="sponsorType.value == eventSponsor.sponsor_type">{{sponsorType.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <button type="button" class="btn btn-primary d-block w-100" @click="onAddSponsorRow" v-if="idx == eventData.sponsors.length -1">Add</button>
                            <button type="button" class="btn btn-primary d-block w-100" @click="onRemoveSponsorRow(idx,$event)" v-if="eventData.sponsors.length > 1 ">Remove</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <div class="tab-pane fade " id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
            <div class="form-content">
                <form action="sadsadsad" method="post" enctype="multipart/form-data" id="material-form">
                    <h3 class="form-title"><i class="fa-solid fa-file"></i> Materials</h3>
                    <div class="upload-file">
                        <div class="custom-file">
                            <input class="custom-file-input materials-input"  type="file"  id="material-input" name="materials[]" multiple @change="onSelectMaterials($event)"/>
                            <label class="custom-file-label" ></label>
                        </div>

                        <div class="message">
                            <span>Maximum size 50 MB</span>
                            <span>Extensions available jpg, png, pdf,  doc, docx, xls, pts</span>
                        </div>

                        <ul>
                            <li v-for="(material,idx) in materials">
                                <p>{{material.name}} <i class="fa-solid fa-trash" @click="onDeleteMaterials(idx)" style="cursor: pointer"></i></p>

                            </li>
                        </ul>
                    </div>

                </form>
            </div>
        </div>

        <div class="tab-pane fade " id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
            <div class="form-content">
                <form action="">
                    <h3 class="form-title"><i class="fa-solid fa-info"></i> Event description <span style="color: #FF0000;">*</span></h3>
                    <div class="dis">
                        <div class="mb-4">
<!--                            <textarea class="form-control" placeholder="English description"></textarea>-->
                            <vue-editor v-model="eventData.descriptionEn" :editorToolbar="customToolbar"></vue-editor>
                        </div>
                        <div class="mb-4">
<!--                            <textarea class="form-control" placeholder="Arabic description" style="direction: rtl;"></textarea>-->
                            <vue-editor v-model="eventData.descriptionAr" :editorToolbar="customToolbar" style="direction: rtl;"></vue-editor>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="tab-pane fade " id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab">
            <div class="form-content">
                <form action="">
                    <h3 class="form-title"><i class="fa-solid fa-photo-film"></i> Event Media</h3>
                    <div class="mb-5">
                        <label  class="form-label">TOP SIDE</label>
                        <div class="upload-file">
                            <div class="custom-file">
                                <input class="custom-file-input"  type="file"/>
                                <label class="custom-file-label" ></label>
                            </div>
                            <div class="action">
                                <button type="button" class="btn btn-primary">Upload</button>
                            </div>
                            <div class="message">
                                                            <span>Dimension: Width (1920px) - Height (400px)
                                                            </span>
                                <span>Maximum size: 10 MB</span>
                            </div>
                        </div>
                        <div class="result-file">
                            <i class="fa-solid fa-photo-film"></i>
                            <span>header.jpg  - 5 MB  ( Top side )</span>
                            <button type="button" class="remove-file" ><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label">LEFT SIDE</label>
                        <div class="upload-file">
                            <div class="custom-file">
                                <input class="custom-file-input"  type="file"/>
                                <label class="custom-file-label" ></label>
                            </div>
                            <div class="action">
                                <button type="button" class="btn btn-primary">Upload</button>
                            </div>
                            <div class="message">
                                                            <span>Dimension: Width (1920px) - Height (400px)
                                                            </span>
                                <span>Maximum size: 10 MB</span>
                            </div>
                        </div>
                        <div class="result-file">
                            <i class="fa-solid fa-photo-film"></i>
                            <span>header.jpg  - 5 MB  ( Top side )</span>
                            <button type="button" class="remove-file" ><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="tab-pane fade " id="pills-8" role="tabpanel" aria-labelledby="pills-7-tab">
            <div class="form-content">
                <form action="" @submit.prevent="onFormSubmit">
                    <h3 class="form-title"><i class="fa-solid fa-calendar-star"></i> Publish schedule</h3>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked value="0" v-model="eventData.is_publish_scheduled">
                            <label class="form-check-label" for="exampleRadios1">
                                Publish now
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"  value="1"  v-model="eventData.is_publish_scheduled">
                            <label class="form-check-label" for="exampleRadios2">
                                Schedule publish
                            </label>
                            <input type="datetime-local" v-if="eventData.is_publish_scheduled == 1" v-model="eventData.published_at">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" v-model="eventData.is_views_hidden">
                            <label class="form-check-label" for="flexCheckDefault">
                                Hide how many view
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault2" v-model="eventData.confirmed">
                            <label class="form-check-label" for="flexCheckDefault2">
                                I confirm to create the event
                            </label>
                        </div>
                    </div>
                    <div class="form-action">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { VueEditor } from "vue2-editor";

export default {
    name: "EventForm",
    props: ['courseTypes', 'specialities', 'owners', 'countries', 'sponsorTypes', 'sponsors', 'speakers', 'chairPersons', "isEdit",'dbData','formSubmitUrl','surveys'],
    components:{VueEditor},
    mounted() {
        if(this.isEdit)
        {
            Object.keys(this.eventData).forEach(key=>{
                this.eventData[key] = this.dbData[key];
            })
            this.syncEventChairPersons();
            this.syncEventSpeakers();
            this.onCountryChange();
            this.eventData.is_publish_scheduled = 1;
            $('#speciality-selector').val(this.eventData.specialities).trigger('change')
            this.materials = this.dbData['materials']
        }
        this.initCitySelector()
        this.initCountrySelector()
        this.initSpecialitySelector()

        $('#country').on('select2:select', ()=>{
            this.eventData.countryId = $('#country').val();
            this.onCountryChange()
        })
        $('#city').on('select2:select', ()=>{
            this.eventData.cityId = $('#city').val();
        })
        $('#speciality-selector').on('select2:select select2:unselect', ()=>{
            this.eventData.specialities = $('#speciality-selector').val();
        })

    },
    data(){
        return {
            eventData : {
                titleAr:"",
                titleEn:"",
                certificate :'',
                typeId : '',
                seats :'',
                cmeCount :'',
                specialities:[],
                organization_id:'',
                location:'',
                address:'',
                eventDateTimeData : [{}],
                recordedSessions : [{}],
                countryId : "",
                cityId : "",
                descriptionEn:'',
                descriptionAr:'',
                is_publish_scheduled:0,
                is_views_hidden:0,
                confirmed : 0,
                published_at:null,
                sponsors : [{}],
                speakers : [],
                chairPersons : [],
                discount : {

                },
                price:null,
                survey_id : null,
                is_discount_available:false
            },
            cities:[],
            materials : [],
            materialsFormData:null,
            courseTypeEnum : {
                onlineEvent: 1,
                onlineCourse: 2,
                recorded: 3,
                physical: 4,
                hybrid: 5,
            },
            customToolbar: [
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["code-block"]
            ],
            selectedChairPersons : [],
            selectedSpeakers:[]
        }
    },
    methods : {
        onAddEventDateTimeRow(){
            this.eventData.eventDateTimeData.push({})
        },
        onRemoveEventDateTimeRow(idx,event){
            event.preventDefault();
            this.eventData.eventDateTimeData = this.eventData.eventDateTimeData.filter((_,itemIdx)=>{
                return idx != itemIdx;
            })
        },
        onEventDateTimeChange(idx,property,event){
            if(this.eventData.eventDateTimeData[idx])
                this.eventData.eventDateTimeData[idx][property] = event.target.value
        },
        onAddEventRecordedSessionRow(){
            this.eventData.recordedSessions.push({})
        },
        onRemoveEventRecordedSessionRow(idx,event){
            event.preventDefault();
            this.eventData.recordedSessions = this.eventData.recordedSessions.filter((_,itemIdx)=>{
                return idx != itemIdx;
            })

        },
        onEventRecordedSessionChange(idx,property,event){
            if(this.eventData.recordedSessions[idx])
                this.eventData.recordedSessions[idx][property] = event.target.value
        },
        onAddSponsorRow(){
            this.eventData.sponsors.push({})
        },
        onRemoveSponsorRow(idx,event){
            event.preventDefault();
            this.eventData.sponsors = this.eventData.sponsors.filter((_,itemIdx)=>{
                return idx != itemIdx;
            })
        },
        onSponsorChange(idx,property,event){
            if(this.eventData.sponsors[idx])
                this.eventData.sponsors[idx][property] = event.target.value
        },
        onCountryChange(){
            if(!this.isEdit)
                this.eventData.cityId = ''
            axios.get(`/api/cities?country=${this.eventData.countryId}`).then(res=>{
                this.cities = res.data.data
            })
        },
        onChairPersonChange(event){
            this.eventData.chairPersons.push(event.target.value)
            this.syncEventChairPersons();
            event.target.value = null
        },
        syncEventChairPersons(){
            this.selectedChairPersons = this.chairPersons.filter(chairPerson=>{
                return this.eventData.chairPersons.find(eventDataPerson => eventDataPerson == chairPerson.id)
            })
        },
        onSpeakerChange(event){
            this.eventData.speakers.push(event.target.value)
            this.syncEventSpeakers();
            event.target.value = null
        },
        syncEventSpeakers(){
            this.selectedSpeakers = this.speakers.filter(speaker=>{
                return this.eventData.speakers.find(eventDataSpeaker => eventDataSpeaker == speaker.id)
            })
        },
        onDeleteSelectedChairPerson(chairPersonId){
            this.eventData.chairPersons =  this.eventData.chairPersons.filter(chairPerson=>{
                return chairPerson != chairPersonId
            })
            this.syncEventChairPersons()
        },
        onDeleteSelectedSpeaker(speakerId){
            this.eventData.speakers =  this.eventData.speakers.filter(speaker=>{
                return speaker != speakerId
            })
            this.syncEventSpeakers()
        },
        onFormSubmit(){
            let formData = buildFormData(new FormData(),this.eventData,'');
            formData = this.appendMaterials(formData)
            if (this.isEdit){
                formData.append('_method','PUT')
                if(this.eventData.sponsors.length == 1 &&  !this.eventData.sponsors[0].sponsor_type && !this.eventData.sponsors[0].sponsor_id){
                    formData.delete('sponsors[0][name]')
                }
            }

            axios.post(this.formSubmitUrl,formData).then(({data})=>{
                if (data && data.data && data.data.redirect)
                    successRedirectTimeout = setTimeout(function () {
                        redirect(data.data.redirect);
                    }, 1000);

                if (data && data.message)
                    toastr.success(data.message);

            }).catch(({response})=>{
                const {data,status} = response;
                if(status == 422){
                    toastr.clear();
                    toastr.error(Object.values(data.errors)[0][0])
                }

                if ([401,402,403,429].indexOf(status) != -1) {
                    toastr.clear();
                    toastr.error(data.message);
                }


                if(status == 500)
                    toastr.error("Internal Server Error");
            })
        },
        appendMaterials(formData){
            if (this.materialsFormData)
                this.materialsFormData.forEach(file=>{
                    formData.append('materials[]',file)
                })
            return formData;
        },
        initCountrySelector(){
            $('#country').select2({
                placeholder: "Country",
                allowClear: false,
                ajax: {
                    url: function() {
                        return `/api/countries`;
                    },
                    // global : false,
                    dataType: "json",
                    processResults: function(data) {
                        return mapSelect2Data(data);
                    },
                },
            });
        },
        initCitySelector(){
            $('#city').select2({
                placeholder: "City",
                allowClear: false,
                ajax: {
                    url: ()=> {
                        return `/api/cities?country=${this.eventData.countryId}`;
                    },
                    // global : false,
                    dataType: "json",
                    processResults: function(data) {
                        return mapSelect2Data(data);
                    },
                },
            });
        },
        initSpecialitySelector(){
            $('#speciality-selector').select2({
                placeholder : "Specialities"
            })
        },
        onSelectMaterials(event){
            if (!this.materialsFormData)
                this.materialsFormData = new FormData();


            Array.from(event.target.files).forEach(file=>{
                this.materialsFormData.append(`files[${file.name}]`,file)
                this.materials.push(file)
            })
        },
        onDeleteMaterials(idx){
            if (this.materials[idx].id){
                axios.delete(this.materials[idx].deleteUrl).then(({data})=>{

                    if (data && data.message)
                        toastr.success(data.message);

                }).catch(({response})=>{
                    const {data,status} = response;
                    if(status == 422){
                        toastr.clear();
                        toastr.error(Object.values(data.errors)[0][0])
                    }

                    if ([401,402,403,429].indexOf(status) != -1) {
                        toastr.clear();
                        toastr.error(data.message);
                    }


                    if(status == 500)
                        toastr.error("Internal Server Error");
                })

            }
            else{
            this.materialsFormData.delete(`files[${this.materials[idx].name}]`)
            }
            this.materials = this.materials.filter((material,index)=>{
                return idx != index;
            })

        }


    },
}




function mapSelect2Data(data) {
    var data2 = [];
    data.data.forEach(function (item) {
        data2.push({
            id: item.id,
            text: item.name
        })
    });
    return {
        results: data2
    };
}
</script>

<style scoped>

</style>
