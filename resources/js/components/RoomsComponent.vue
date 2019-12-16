<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<template>
    <div>


        <table class="table table-primary">
            <thead>
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Floor</th>
                <th scope="col">Type</th>
                <th scope="col">View</th>
                <!--            <<th scope="col">Status</th>-->
                <th scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input v-model="roomName" type='text' value="text">

                </td>
                <td><input v-model="floor" type="text" value="text">

                </td>
                <td>

                    <select v-model="roomType" class="form-control form-control-sm" name="room-types">
                        <option v-for="(type, index) in roomTypes" v-bind:value="index">
                            {{ type }}
                        </option>
                    </select>


                </td>
                <td>

                    <select v-model="roomView" class="form-control form-control-sm" name="room-views">
                        <option v-for="(type, index) in roomViews" v-bind:value="index">
                            {{ type }}
                        </option>
                    </select>

                </td>


                <!--            <td>-->
                <!--                <input type='text' value="text">-->
                <!--            </td>-->
                <td>

                    <i v-show="verifiedFields" class="fas fa-plus" v-on:click="insertRoom"></i>


                </td>

            </tr>

            <tr v-for="(room, index) in this.rooms">


                <td>{{room.name}}</td>
                <td>{{room.floor}}</td>
                <td>{{room.type}}</td>
                <td>{{room.view}}</td>
                <td>{{room.status}}</td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        props: ["roomId", "hotelId", "roomTypes", "roomViews"],

        data() {
            return {
                rooms: [],
                canAddRoom: false,
                roomName: "",
                floor: "",
                roomType: "",
                roomView: ""

            }
        },
        computed: {

            verifiedFields: function () {

                return (this.roomName !== "" && this.floor !== "");
            }

        },
        mounted() {
            console.log('Component mounted.')
            const axios = require('axios');
            console.log(this.hotelId);
            let that = this;
            // Make a request for a user with a given ID
            axios.get(route('rooms.show', this.hotelId))
                .then(function (response) {
                    that.rooms = response.data.data;

                    // handle success
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });


        },
        methods: {
            insertRoom: function (event) {
                const formData = new FormData();
                let that = this;
                formData.append('floor', this.floor);
                formData.append('roomName', this.roomName);
                formData.append('roomType', this.roomType);
                formData.append('roomView', this.roomView);
                formData.append('hotelId', this.hotelId);
                formData.append('pathImg', this.pathImg);


                axios.post(
                    route("rooms.store"),
                    formData,
                    {'Content-Type': 'multipart/form-data'},
                )


                    .then(function (response) {
                        that.rooms = response.data.data;
                        console.log(response);
                    })
                    .catch(function (response) {
                        //handle error
                        console.log(response);

                    });

            }

        }
    }


</script>
