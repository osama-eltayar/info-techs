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
                                <select class="form-select" aria-label="Default select example" v-model="eventData.typeId">
                                    <option value="" selected disabled>Course Type</option>
                                    <option v-for="courseType in courseTypes" :key="courseType.id" :value="courseType.id">{{courseType.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Course Name <span>*</span></label>
                                <input type="text" class="form-control mb-3"  placeholder="English Language" v-model="eventData.titleEn">
                                <input type="text" class="form-control "  placeholder="Arabic Language" v-model="eventData.titleAr">
                            </div>

                            <div class="mb-4">
                                <div id="list1" class="input-content">
                                    <div class="title">
                                        <label>Course Date and time <span>*</span></label>
                                        <button type="button" class="add-new" @click="onAddEventDateTimeRow">Add new</button>
                                    </div>
                                    <div class="input-group row" v-for="(dateTimeData,idx) in eventData.eventDateTimeData" :key="idx">
                                        <div class="mb-2 col-md-5 col-sm-12">
                                            <label  class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" data-toggle="datepicker" placeholder="Date" aria-label="Date" @change="onEventDateTimeChange(idx,'date',$event)">
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="mb-2 col-md col-sm-12">
                                                    <label  class="form-label">Time From</label>
                                                    <div >
                                                        <input type="time" class="form-control" id="from" value="" @change="onEventDateTimeChange(idx,'from_time',$event)">
                                                    </div>
                                                </div>
                                                <div class="mb-2 col-md col-sm-12">
                                                    <label  class="form-label">Time To</label>
                                                    <div >
                                                        <input type="time" class="form-control" id="to" value="" @change="onEventDateTimeChange(idx,'to_time',$event)">
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
                                <select class="form-select" aria-label="Default select example" @change="onCountryChange" v-model="eventData.countryId">
                                    <option selected value="" disabled>Country</option>
                                    <option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Address</label>
                                <input type="text" class="form-control"  placeholder="" v-model="eventData.address">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-4 field-disabled">
                                        <label  class="form-label">Available seats</label>
                                        <input type="number" class="form-control"  placeholder="20"  v-model="eventData.seats">
                                        <span class="message">Leave blank for unlimited seats</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-4">
                                        <label  class="form-label">Available seats</label>
                                        <input type="number" class="form-control"  placeholder="20" v-model="eventData.cmeCount">
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
                                <select class="form-select" aria-label="Default select example">
                                    <option selected="">About infotechs v1</option>
                                    <option value="1">test1</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Speciality <span>*</span></label>
                                <select class="form-select" aria-label="Default select example" v-model="eventData.specialityId">
                                    <option value="" selected disabled>Speciality</option>
                                    <option v-for="speciality in specialities" :key="speciality.id" :value="speciality.id">{{speciality.name}}</option>

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
                                <select class="form-select" aria-label="Default select example" v-model="eventData.cityId" :disabled="!cities.length">
                                    <option selected value="" disabled>City</option>
                                    <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label  class="form-label">Location</label>
                                <input type="text" class="form-control"  placeholder="" v-model="eventData.location">
                            </div>
                        </div>

                        <div class="col-lg-9 col-12" v-if="[courseTypeEnum.onlineCourse,courseTypeEnum.onlineEvent,courseTypeEnum.hybrid].indexOf(eventData.typeId) != -1">
                            <div class="mb-4">
                                <div id="list2" class="input-content">
                                    <div class="title">
                                        <label>Recorded event sections</label>
                                        <button type="button" class="add-new" @click="onAddEventRecordedSessionRow">Add new</button>
                                    </div>
                                    <div class="input-group row" v-for="(recordedSessionData,idx) in eventData.recordedSessions" :key="idx">
                                        <div class="mb-2 col-md-4 col-sm-12">
                                            <label  class="form-label">Title</label>
                                            <input type="text" class="form-control" placeholder="Brain of the socilology " @change="onEventRecordedSessionChange(idx,'title',$event)">
                                        </div>
                                        <div class="mb-2 col-md col-sm-12">
                                            <label  class="form-label">Section URL</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="http://www,youtube.com/ghhYg" @change="onEventRecordedSessionChange(idx,'url',$event)">
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md col-sm-12">
                                            <label  class="form-label">Type</label>
                                            <div class="input-group">
                                                <select class="form-select" aria-label="Default select example" @change="onEventRecordedSessionChange(idx,'type',$event)">
                                                    <option selected value="free">Free</option>
                                                    <option value="paid">Paid</option>
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

                            <div class="row">
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
                            <input class="custom-file-input"  type="file"  id="material-input" name="materials[]" multiple/>
                            <label class="custom-file-label" ></label>
                        </div>
                        <div class="action">
                            <button type="button" class="btn btn-primary">Upload</button>
                        </div>
                        <div class="message">
                            <span>Maximum size 50 MB</span>
                            <span>Extensions available jpg, png, pdf,  doc, docx, xls, pts</span>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="tab-pane fade " id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
            <div class="form-content">
                <form action="">
                    <h3 class="form-title"><i class="fa-solid fa-info"></i> Event description</h3>
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
                    <h3 class="form-title"><i class="fa-solid fa-calendar-star"></i> Publish sceduale</h3>
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
                            <input type="datetime-local" v-if="eventData.is_publish_scheduled == 1">
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
    props : ['courseTypes','specialities','owners','countries','sponsorTypes','sponsors','speakers','chairPersons'],
    components:{VueEditor},
    mounted() {
        console.log(this.courseTypes)
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
                specialityId:'',
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
                sponsors : [{}],
                speakers : [],
                chairPersons : [],
                discount : {
                    date : null,
                    price :null
                },
                price:null
            },
            cities:[],
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
            console.log({idx,property,event})
            console.log(this.eventData.sponsors[idx])
            if(this.eventData.sponsors[idx])
                this.eventData.sponsors[idx][property] = event.target.value
        },
        onCountryChange(){
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
                return this.eventData.chairPersons.indexOf(chairPerson.id + '')!= -1
            })
        },
        onSpeakerChange(event){
            this.eventData.speakers.push(event.target.value)
            this.syncEventSpeakers();
            event.target.value = null
        },
        syncEventSpeakers(){
            this.selectedSpeakers = this.speakers.filter(speaker=>{
                return this.eventData.speakers.indexOf(speaker.id + '') != -1
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
            axios.post('/dashboard/events',formData).then(res=>{
                console.log(res)
            })
        },
        appendMaterials(formData){
            const materialData = new FormData($('#material-form')[0])
            materialData.getAll('materials[]').forEach(file=>{
                formData.append('materials[]',file)
            })
            return formData;
        }
    },
}

</script>

<style scoped>

</style>
