<template>
    <!-- <div> </div> -->
    <div style="border: 1px #17a2b8 solid; padding:5px; border-radius:5px">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="typo__label">Select with search</label>
                        <multiselect v-model="englishSchoolSelected"   :value="id" :options="englishSchools"   @select="changeSelect" placeholder="Select English School " label="name" track-by="name"> </multiselect>

                    </div>
                </div>
                    <input type="hidden"  name="englishschool[]" :value="id" >



                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Status :</label>
                        <select  name="status[]" id="" class="form-control" @change="isDisabled"  @input="updateForm('status_',$event.target.value)" v-value="form.status_">
                            <option value="" selected> Chose Status </option>

                            <option value="Applied"> Applied </option>
                            <option value="Offer">  Offer</option>
                            <option value="Visa letter requested">  Visa letter requested </option>
                            <option value="Rejected">  Rejected  </option>
                            <option value="Deferred"> Deferred</option>
                            <option value="Started"> Started</option>
                            <option value="Cancelled"> Cancelled</option>

                        </select>
                    </div>
                </div>
                <div  class="col-4">
                    <div class="form-group">
                        <label class="control-label mb-1" for="">Fees: </label>
                        <input v-value="form.fees" type="text"  :disabled="able_to()" class="form-control"   name="fees[]" placeholder="Type Fees"   @input="updateForm('fees',$event.target.value)" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Course :</label>
                        <select class="form-control" style="border: 1px #888 solid;" name="course[]" id="course_id">
                            <option value="">Please Choose Place</option>
                            <option value="General Or intensive English Courses">General Or intensive English Courses</option>
                            <option value="Cambridge English Exam Courses">Cambridge English Exam Courses</option>
                            <option value="IELTS English Exam Courses">IELTS English Exam Courses</option>
                            <option value="CELTA Introductory Course">CELTA Introductory Course</option>
                            <option value="Foreign Teachers of English (FTE)">Foreign Teachers of English (FTE)</option>
                            <option value="English for Special Purposes">English for Special Purposes</option>
                            <option value="One-to-One course">One-to-One course</option>
                            <option value="Business English Courses">Business English Courses</option>
                            <option value="Occupational English Test (OET)">Occupational English Test (OET)</option>
                            <option value="Conversation Classes">Conversation Classes</option>
                            <option value="Family Vacation courses">Family Vacation courses</option>
                            <option value="Junior English courses">Junior English courses</option>
                            <option value="Academic year courses">Academic year courses</option>
                            <option value="English + Communication Skills">English + Communication Skills</option>
                            <option value="Experiences Club +40">Experiences Club +40</option>
                            <option value="English & Culture +40">English & Culture +40</option>
                        </select>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Note Courses :</label>
                        <textarea class="form-control" name="note_course[]" id="" cols="10" rows="2"> </textarea>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-3">
                <div class="form-group">
                <label for="" class="control-label mb-1"> Start Date :</label>

                <input class="form-control" type="date" name="start_date[]" id=""  placeholder="Type Academic year">
                </div>

                </div>
                <div class="col-3">
                <div class="form-group">
                <label for="" class="control-label mb-1"> End Date :</label>

                <input class="form-control" type="date" name="end_date[]" id=""  placeholder="Type Academic year">
                </div>

                </div>
                <div class="col-2">
                <div class="form-group">
                <label for="" class="control-label mb-1"> Duration :</label>

                <input class="form-control" type="text" name="duration[]" id=""  placeholder="Type the  duration"  @input="updateForm('duration',$event.target.value)" :value="form.duration">
                </div>

                </div>
                    <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Residence :</label>
                        <select class="form-control" style="border: 1px #888 solid;" name="Residence[]" id="Residence_id">
                            <option value="">Please Choose Place</option>
                            <option value="Not Required">Not Required</option>
                            <option value="Host Family">Host Family</option>
                            <option value="Student Resident">Student Resident</option>
                        </select>
                    </div>
                </div>
                  <div class="col-1">
                                <div class="form-group">
                                <label for="" class="control-label mb-1"> To Visa:</label>
                                <input  name="to_visa" type="checkbox"    class="form-control"  value="1" >
                                </div>
                            </div>
            </div>

            <!-- <Contents v-for="count in totalCount" :key="`component-${count}`" /> -->

    </div>
</template>
<script>
    import Multiselect from "vue-multiselect";

    export default {
        components: {
            Multiselect,
        },
        props: ["english_school_route", "agency_route",'route_get_agency'],
        data() {
            return {
                form:{
                status_:"",
                fees:0,
                duration:'',

                },
                englishSchools: {},
                agencies: {},
                selectedUniversity: "",
                selectedAgency: "",
                value: {},
                value_agency: "",
                id: "",
                id_agency: "",
                englishSchoolSelected: "",
                totalCount: 1,
                agencyUni:{},
                isLoading:false,
            };
        },
        mounted: function () {
            // this.$nextTick(function(){ $('.my-select-picker-class').selectpicker() });
            // axios.get()
            this.getenglishschool();
            this.getAgency();
        },

        methods: {
            getenglishschool() {
                axios.get(this.english_school_route).then((response) => (this.englishSchools = response.data));
            },
            getAgency() {
                axios.get(this.agency_route).then((response) => (this.agencies = response.data));
            },
            changeSelect(value, id) {
                this.id = value.id;
                // this.englishSchoolSelected = value.name+this.totalCount;
                // alert(this.id)
                      this.isLoading = true;
                axios.get(this.route_get_agency,{
                    params:{
                  uni_id:this.id
                    },
                }
                ).then((response) => {
                    this.agencyUni=response.data
                            this.isLoading = false
                    });
            },
            changeSelect_agency(value, id) {
                this.id = value.id;
                // alert(this.id)
            },
            duplicateEl() {
                this.totalCount++;
            },
            removeElement() {
                this.totalCount--;
            },
            addFind: function () {
      this.value.push({ count: '' });
    },
    isDisabled(){
 if(this.form.status_=="Started"){
return true;
 }
    },
    able_to(){
       if(this.form.status_=="Started"){
return false;
 } else{
this.fees='';

return true;


 }
    },
    updateForm (input, value) {
        this.form[input] = value;
         let storedForm = this.openStorage() // extract stored form
      if (!storedForm) storedForm = {} // if none exists, default to empty object

      storedForm[input] = value // store new value
      this.saveStorage(storedForm) // save changes into localStorage
      }

        },
         created () {
    	const storedForm = this.openStorage()
    	if (storedForm) {
    		this.form = {
    			...this.form,
    			...storedForm
    		}
    	}
    }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
