@extends('layouts.dashboard')
@section('content')
<div class="col-md-12">
    <div class="bgc-white p-20 bd pos-r authentication">
            <div class="approve_section">
                <p class="image_approve"><img class="img_res" src="{{ $user->partner_admin_image }}" alt=""></p>
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td><b>Username: </b></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Email: </b></td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Partner Name: </b></td>
                                <td>{{ $user->partner_name }}</td>
                            </tr>

                            <tr>
                                <td><b>Awards: </b></td>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td><b>Partner Name Address: </b></td>
                                <td>{{ $user->partner_name_address }}</td>
                            </tr>

                            <tr>
                                <td><b>Partner Admin ID: </b></td>
                                <td>{{ $user->partner_admin_ID }}</td>
                            </tr>
                            <tr>
                                <td><b>Partner Admin Name: </b></td>
                                <td>{{ $user->partner_admin_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Partner Admin Address: </b></td>
                                <td>{{ $user->partner_admin_address }}</td>
                            </tr>
                            <tr>
                                <td><b>Partner Admin Gender: </b></td>
                                <td>{{ $user->partner_admin_gender }}</td>
                            </tr>
                            <tr>
                                <td><b>Partner Admin Position: </b></td>
                                <td>{{ $user->partner_admin_position }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@stop
