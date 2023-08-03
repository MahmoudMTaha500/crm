<template>
    <!-- <div> </div> -->
    <div>
       <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                        <label for="" class="control-label mb-1"> Students :</label>
                    <multiselect v-model="student_seleceted" :options="students"  name='student' placeholder="Select student" label="name" track-by="name"> </multiselect>
                    <input type="hidden"  name="student" :value="student_seleceted.id" >

                        </div>
                      </div>
                    </div>
        <section v-for="count in totalCount" :key="count">
           <input type="hidden" name="count[]" :value='count'>
              <university-row-component
:uni_route="uni_route"
:agency_route="agency_route"
:route_get_agency="route_get_agency"
:courses="courses"

></university-row-component>
                <!-- <div class="col-1">
                    <div class="form-group"> -->
                        <button type="button"  @click="duplicateEl();addFind()" class="btn btn-primary" style="margin-top: 30px;
                        position: absolute;left: 93.5%;top: 53%;"><i class="fa fa-plus"></i></button>



                        <button type="button"  @click="removeElement(x)" class="btn btn-primary" style="margin-top: 30px;
                        position: absolute;left: 96.5%;top: 53%;"><i class="fa fa-trash"></i></button>

                    <!-- </div> -->
                    <!-- <div v-else-if="totalCount == 1" class="form-group">
                        <button type="button"  @click="removeElement" class="btn btn-primary" style="margin-top: 30px;"><i class="fa fa-trash"></i></button>
                    </div> -->
                <!-- </div> -->


            <!-- <Contents v-for="count in totalCount" :key="`component-${count}`" /> -->
        </section>
    </div>
</template>
<script>
    import Multiselect from "vue-multiselect";
    import universityRowComponent from "./universityRowComponent.vue";

    export default {
        components: {
            Multiselect,
            universityRowComponent
        },
        props: ["uni_route", "agency_route",'students_route','route_get_agency','courses'],
        data() {
            return {
                universities: {},
                agencies: {},
                students: {},
                selectedUniversity: "",
                selectedAgency: "",
                student_seleceted:'',
                value: {},
                value_agency: "",
                id: "",
                id_agency: "",
                uni_seleceted: "",
                totalCount: 1,
            };
        },
        mounted: function () {
            // this.$nextTick(function(){ $('.my-select-picker-class').selectpicker() });
            // axios.get()
            this.getUni();
            this.getAgency();
            this.getstudents();
        },

        methods: {
            getUni() {
                axios.get(this.uni_route).then((response) => (this.universities = response.data));
            },
            getAgency() {
                axios.get(this.agency_route).then((response) => (this.agencies = response.data));
            },
            getstudents() {
                axios.get(this.students_route).then((response) => (this.students = response.data));
            },
            changeSelect(value, id) {
                this.id = value.id;
                this.uni_seleceted = value.name+this.totalCount;

            },
            changeSelect_agency(value, id) {
                this.id = value.id;
                // alert(this.id)
            },
            duplicateEl() {
                this.totalCount++;
            },
            removeElement() {
             if( this.totalCount == 1){


             }else{
 var proceed = confirm("Are you sure you want to Delete ?");
                if (proceed) {
                    this.totalCount--;

                } else {
                  //don't proceed
                }
             }


            },
            addFind: function () {
      this.value.push({ count: '' });
    }
        },
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
