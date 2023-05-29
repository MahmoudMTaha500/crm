<template>
    <!-- <div> </div> -->
    <div style="border: 1px #17a2b8 solid; padding:5px; border-radius:5px">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="typo__label">Choose University</label>
                        <multiselect v-model="uni_seleceted"   :value="id" :options="universities"   @select="changeSelect" placeholder="Select University" label="name" track-by="name"> </multiselect>

                    </div>
                </div>
                    <input type="hidden"  name="uni_val[]" :value="id" >

                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Agencies :</label>
                        <!-- <multiselect v-model="value_agency" :options="agencyUni"    @select="changeSelect_agency" :loading="isLoading"  placeholder="Select Agency" label="name" track-by="name"> </multiselect> -->
                        <select name="agency_val[]" id="" class="form-control">
                            <option value="" selected> Chose agency </option>

                          <option v-for="agency in agencyUni" :key="agency.id" :value="agency.id"> {{agency.name}} </option>
                        </select>

                    </div>
                </div>


                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Status :</label>
                        <select v-model="status_" name="status[]" id="" class="form-control" @change="isDisabled" >
                            <option value="" selected> Chose Status </option>
                            <option value="Hold"> Hold </option>
                            <option value="Applied"> Applied </option>
                            <option value="Conditional offer"> Conditional offer</option>
                            <option value="Conditional offer deferred"> Conditional offer deferred </option>
                            <option value="Unconditional offer"> Unconditional offer </option>
                            <option value="Unconditional offer deferred"> Unconditional offer deferred</option>
                            <option value="Unconditional offer deferred"> Unconditional offer deferred</option>
                            <option value="Confirmed / CAS"> Confirmed / CAS</option>
                            <option value="Rejected"> Rejected</option>
                            <option value="Withdrawn"> Withdrawn</option>
                        </select>
                    </div>
                </div>
                <div  class="col-1">
                    <div class="form-group">
                        <label class="control-label mb-1" for="">Fees: </label>
                        <input v-model="fees" type="text"  :disabled="able_to()" class="form-control"   name="fees[]" placeholder="Type Fees" >
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Kind Of Course :</label>
                        <select class="form-control" style="border: 1px #888 solid;" name="kind_of_course[]" id="course_id">
                            <option value="">Please Choose Place</option>
                            <option value="Degree">Degree</option>
                            <option value="Pathway">Pathway</option>
                            <option value="Pre-sessional">Pre-sessional</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                          <div class="form-group">
                        <label for="" class="control-label mb-1"> Start Date :</label>

                        <input class="form-control" type="date" name="start_date[]" id=""  placeholder="Type Academic year">
                    </div>

                 </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Note Courses :</label>
                        <textarea class="form-control" name="note_course[]" id="" cols="10" rows="2"> </textarea>
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
        props: ["uni_route", "agency_route",'route_get_agency'],
        data() {
            return {
                universities: {},
                agencies: {},
                selectedUniversity: "",
                selectedAgency: "",
                value: {},
                value_agency: "",
                id: "",
                id_agency: "",
                uni_seleceted: "",
                totalCount: 1,
                agencyUni:{},
                isLoading:false,
                fees:"",
                status_:"",
            };
        },
        mounted: function () {
            // this.$nextTick(function(){ $('.my-select-picker-class').selectpicker() });
            // axios.get()
            this.getUni();
            this.getAgency();
        },

        methods: {
            getUni() {
                axios.get(this.uni_route).then((response) => (this.universities = response.data));
            },
            getAgency() {
                axios.get(this.agency_route).then((response) => (this.agencies = response.data));
            },
            changeSelect(value, id) {
                // this.id = value.id;
                // this.uni_seleceted = value.name+this.totalCount;
                // alert(this.id)
                      this.isLoading = true;
                axios.get(this.route_get_agency,{
                    params:{
                  uni_id: value.id
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

 if(this.status_=="Confirmed / CAS"){
return true;
 }
    },
    able_to(){
       if(this.status_=="Confirmed / CAS"){
return false;
 } else{
this.fees='';

return true;


 }
    }
        },
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
