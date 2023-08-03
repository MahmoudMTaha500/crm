<template>
<div>
    <div class="form-group">
        <label for="" class="control-label mb-1"> Students :</label>
        <multiselect v-model="student_seleceted" :options="students"   placeholder="Select student" label="name" track-by="name"> </multiselect>
        <input type="hidden"  name="student" :value="student_seleceted.id" >


    </div>
</div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    components: {
        Multiselect,
    },
    props: ["students_route"],
    data() {
        return{
              students:{},
            student_seleceted:''
             }
    },
    mounted: function () {
        this.getStudents();
    },
    methods:{
        getStudents() {
            axios.get(this.students_route).then((response) => (this.students = response.data));
        },
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

