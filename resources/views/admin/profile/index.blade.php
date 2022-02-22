@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="card vh-100">
            <div class="card-body">
                <form action="{{ route('profile.update',auth()->id()) }}" method="POST" class="col-md-4 mx-auto bg-white p-5 rounded" id="profile_form">
                    @csrf @method('PUT')

                     <img src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}" class="img-fluid rounded-circle d-block mx-auto" width='120' alt="avatar.svg">
                     <br>

                     @include('layouts.includes.alert')
         
                     <label class="form-label">Name</label>
                     <div class="input-group input-group-outline mb-3 ">
                        <input type="text" class="form-control" value="{{ auth()->user()->name }}"  readonly>
                    </div>

                     <label class="form-label">Email</label>
                     <div class="input-group input-group-outline mb-3 ">
                        <input type="email" class="form-control" value="{{ auth()->user()->email }}"  readonly>
                    </div>

                     <label class="form-label">Current Password</label>
                     <div class="input-group input-group-outline mb-3 ">
                        <input type="text" class="form-control"" name="old">
                     </div>

                     <label class="form-label">New Password</label>
                     <div class="input-group input-group-outline mb-3 ">
                        <input type="password" class="form-control"" name="password" placeholder="•••••••••" >
                     </div>

                     <label class="form-label">Confirm Password</label>
                     <div class="input-group input-group-outline mb-3 ">
                        <input type="password" class="form-control"" name="password_confirmation" placeholder="•••••••••" >
                     </div>
                  
                     <input type="file" name="avatar" id="user_image">
                     <button type="button" class="btn btn-primary form-control"
                     onclick="event.preventDefault();confirm('Do you want to update?', '', 'update').then(res => res.isConfirmed ? $('#profile_form').submit() : false)"
                     >Submit <i class="fas fa-paper-plane ml-1"></i> </button>
                 </form>
            </div>
        </div>
    </div>
</div>
{{--End CONTAINER--}}
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection