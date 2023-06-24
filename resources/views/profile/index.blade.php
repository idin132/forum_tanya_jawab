@extends('layouts.app')
@section('content')
<style>
    * {
        margin: 0;
        padding: 0
    }

    body {
        background-color: gainsboro
    }

    .card {
        width: 350px;
        background-color: #efefef;
        border: none;
        cursor: pointer;
        transition: all 0.5s;
    }

    .image img {
        transition: all 0.5s
    }

    .card:hover .image img {
        transform: scale(1.5)
    }

    .btn-profile {
        height: 140px;
        width: 140px;
        border-radius: 50%
    }

    .name {
        font-size: 22px;
        font-weight: bold
    }

    .idd {
        font-size: 14px;
        font-weight: 600
    }

    .idd1 {
        font-size: 12px
    }

    .number {
        font-size: 22px;
        font-weight: bold
    }

    .follow {
        font-size: 12px;
        font-weight: 500;
        color: #444444
    }

    .btn1 {
        height: 30px;
        width: 150px;
        border: none;
        background-color: #000;
        color: #aeaeae;
        font-size: 15px
    }

    .text span {
        font-size: 13px;
        color: #545454;
        font-weight: 500
    }

    .icons i {
        font-size: 19px
    }

    hr .new1 {
        border: 1px solid
    }

    .join {
        font-size: 14px;
        color: #a0a0a0;
        font-weight: bold
    }

    .date {
        background-color: #ccc
    }
</style>
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn-profile btn-secondary"> <img src="{{asset('images/user.png')}}" height="100" width="100" /></button> <span class="name mt-3">{{ Auth::user()->name }}</span>
                <span class="idd">
                    <table class="table">
                        <td>
                            <tr style="font-size: 12px">
                                <td>Username</td>
                                <td>:</td>
                                <td>{{ Auth::user()->username }}</td>
                            </tr>
                            <tr style="font-size: 12px">
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr style="font-size: 12px">
                                <td>Umur</td>
                                <td>:</td>
                                <td>{{ Auth::user()->age }}</td>
                            </tr>
                            <tr style="font-size: 12px">
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ Auth::user()->address }}</td>
                            </tr>
                        </td>
                    </table>
                    <div class=" d-flex mt-2" style="justify-content:center ; text-align:center"> <a href="edit" class="btn1 btn-dark">
                        <p style="margin-top: 2px;">Edit Profile</p>
                    </a> </div>

                    <div class=" d-flex mt-2" style="justify-content:center ; text-align:center"> <a href="home" class="btn1 btn-dark">
                            <p style="margin-top: 2px;">Kembali</p>
                        </a> </div>
        </div>
    </div>
</div>
@endsection