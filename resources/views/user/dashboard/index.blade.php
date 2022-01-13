@extends('layouts.user.userdashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
<div class="container-fluid">
    <br><br>
    <div class="row justify-content-center align-items-center">
        <div class="card vh-100">
            <div class="card-body">
                <form action="{{ route('profile.update',auth()->id()) }}" method="POST" class="col-md-4 mx-auto bg-white p-5 rounded" id="profile_form">
                    @csrf @method('PUT')

                     <img src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}" class="img-fluid rounded-circle d-block mx-auto" width='120' alt="avatar.svg">
                     <br>
         
                     @if (session('message'))
                         <div class="alert alert-info alert-dismissible fade show p-4" role="alert">
                            <span class="text-white"> {{session('message')}}</span>
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     @endif
         
                     @if (session('error'))
                         <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                             {{session('error')}}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     @endif
         
                     @if ($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
         
                     <label class="form-label">Name</label>
                     <div class="input-group input-group-outline mb-3 ">
                        <input type="text" class="form-control" value="{{ auth()->user()->full_name }}"  readonly>
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