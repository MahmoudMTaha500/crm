<template>
    <!-- <div> </div> -->
    <div>
        <section v-for="count in totalCount" :key="count">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="typo__label">Select with search</label>
                        <multiselect v-model="uni_seleceted" :options="universities" @select="changeSelect" placeholder="Select University" label="name" track-by="name"> </multiselect>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Agencies :</label>
                        <multiselect v-model="value_agency.count" :options="agencies" @select="changeSelect_agency" :multiple="true" placeholder="Select Agency" label="name" track-by="name"> </multiselect>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Status :</label>
                        <select name="status" id="" class="form-control">
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
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Course :</label>
                        <select class="form-control" style="border: 1px #888 solid;" name="course" id="course_id">
                            <option value="">Please Choose Place</option>
                            <option value="Degree">Degree</option>
                            <option value="Pathway">Pathway</option>
                            <option value="Pre-sessional">Pre-sessional</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Note Courses :</label>
                        <textarea class="form-control" name="note_course" id="" cols="10" rows="2"> </textarea>
                    </div>
                </div>
                <div class="col-1">
                    <div v-if="totalCount == 1" class="form-group">
                        <button type="button"  @click="duplicateEl();addFind()" class="btn btn-primary" style="margin-top: 30px;"><i class="fa fa-plus"></i></button>
                    </div>
                    <div v-else-if="totalCount > 1" class="form-group">
                        <button type="button"  @click="removeElement" class="btn btn-primary" style="margin-top: 30px;"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>

            <!-- <Contents v-for="count in totalCount" :key="`component-${count}`" /> -->
        </section>
    </div>
</template>
<script>
    import Multiselect from "vue-multiselect";

    export default {
        components: {
            Multiselect,
        },
        props: ["uni_route", "agency_route"],
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
                this.totalCount--;
            },
            addFind: function () {
      this.value.push({ count: '' });
    }
        },
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
