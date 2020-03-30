<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="genres">Attributes</label>
                <select class="form-control"
                        id="genres" v-model="attribute" @change="selectAttribute(attribute)">
                    <option :value="attribute" v-for="attribute in attributes"> {{ attribute.name }} </option>
                </select>
            </div>
        </div>
    </div>

    <div class="row" v-if="attributeSelected">
        <h3>Add Attributes to movie</h3>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="values">Select a Value</label>
                <select class="form-control"
                        id="values" v-model="value" @change="selectValue(value)">
                    <option :value="value" v-for="value in attributeValues"> {{ value.value }} </option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">All Attribute values</h3>
                    <p class="text-sm mb-0">
                        This table shows all attribute values for selected attribute available in our DB
                    </p>
                    @include('backend.partials.flash')
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-dark table-flush" id="datatable-buttons">
                        <thead class="thead-dark">
                        <tr>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Auditorium</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Auditorium</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr v-for="ma in movieAttributes">
                            <td>{{ma.day}}</td>
                            <td>{{ma.time}}</td>
                            <td>{{ma.auditorium}}</td>
                            <td>{{ma.ticket_price}}</td>
                            <td>
<!--
                                <a href="{{route('admin.attributes.value.edit', $attribute->id)}}" class="btn btn-sm btn-neutral"><i class="fa fa-edit"></i></a>
-->
                                <button class="btn btn-sm btn-neutral" @click="deleteMovieAttribute(ma)">
                                    <i class="ni ni-fat-remove"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "movie-attributes",
        props: ['movieid'],
        data() {
            return {
                movieAttributes: [],
                attributes: [],
                attribute: {}
            }
        },
        created: function() {
            this.loadMovieAttributes(this.movieid);
        },
        methods:{
            loadMovieAttributes(id) {
                let _this = this;
                axios.post('/admin/movies/attributes',{
                    id: id
                }).then(function (response) {
                    _this.movieAttributes = response.data;
                }).catch(function (error) {
                    console.log(error)
                })
            },
            loadAttributes() {
                let _this = this;
                axios.get('/admin/movies/attributes/load').then (function(response){
                    _this.attributes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
