<template>
    <div>
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
                                <th>Tickets Available</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Auditorium</th>
                                <th>Price</th>
                                <th>Tickets Available</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr v-for="ma in movieAttributes">
                                <td>{{ma.day}}</td>
                                <td>{{ma.time}}</td>
                                <td>{{ma.auditorium}}</td>
                                <td>{{ma.ticket_price}}</td>
                                <td>{{ma.tickets_avail}}</td>
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
                attribute: {},
                attributeSelected: false,
                attributeValues: [],
                value: {},
                valueSelected: false,
                currentAttributeId: '',
                currentValue: '',
                currentTime: '',
                currentPrice: '',
                currentAuditorium: '',
                currentTickets: '',
            }
        },
        created: function() {
            this.loadAttributes();
            this.loadMovieAttributes(this.movieid);
        },
        methods: {
            loadAttributes() {
                let _this = this;
                axios.get('/admin/movies/attributes/load').then (function(response){
                    _this.attributes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            loadMovieAttributes(id) {
                let _this = this;
                axios.post('/admin/movies/attributes', {
                    id: id
                }).then (function(response){
                    _this.movieAttributes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            selectAttribute(attribute) {
                let _this = this;
                this.currentAttributeId = attribute.id;
                axios.post('/admin/movies/attributes/values', {
                    id: attribute.id
                }).then (function(response){
                    _this.attributeValues = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
                this.attributeSelected = true;
            },
            selectValue(value) {
                this.valueSelected = true;
                this.currentValue = value.value;
                this.currentTime = value.time;
                this.currentPrice = value.ticket_price;
                this.currentAuditorium = value.auditorium;
                this.currentTickets = value.tickets_avail;
            },
            addMovieAttribute() {
                if (this.currentTime === null || this.currentPrice === null) {
                    this.$swal("Error, Some values are missing.", {
                        icon: "error",
                    });
                } else {
                    let _this = this;
                    let data = {
                        attribute_id: this.currentAttributeId,
                        day:  this.currentValue,
                        time: this.currentTime,
                        ticket_price: this.currentPrice,
                        auditorium: this.currentAuditorium,
                        tickets_avail: this.currentTickets,
                       movie_id: this.movie_id,
                    };

                    axios.post('/admin/products/attributes/add', {
                        data: data
                    }).then (function(response){
                        _this.$swal("Success! " + response.data.message, {
                            icon: "success",
                        });
                        _this.currentValue = '';
                        _this.currentQty = '';
                        _this.currentPrice = '';
                        _this.valueSelected = false;
                    }).catch(function (error) {
                        console.log(error);
                    });
                    this.loadProductAttributes(this.productid);
                }
            },
            deleteProductAttribute(pa) {
                let _this = this;
                this.$swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        console.log(pa.id);
                        axios.post('/admin/products/attributes/delete', {
                            id: pa.id,
                        }).then (function(response){
                            if (response.data.status === 'success') {
                                _this.$swal("Success! Product attribute has been deleted!", {
                                    icon: "success",
                                });
                                this.loadProductAttributes(this.productid);
                            } else {
                                _this.$swal("Your Product attribute not deleted!");
                            }
                        }).catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal("Action cancelled!");
                    }
                });

            }
        }
    }
</script>
