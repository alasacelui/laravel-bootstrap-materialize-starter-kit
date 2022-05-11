@extends('layouts.admin.app')

@section('title', 'Admin | Manage Users')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="float-end btn btn-sm btn-info rounded me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_user', '.user_form', ['#m_user_title','Create Account'], ['.btn_add_user','.btn_update_user'], {rname:'admin.user.create', target:['#d_employees','#d_roles'], column:['fullname','name']})">Create
                            Account +</a><br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover user_dt">
                                <caption>List of User's Account <i class="fas fa-users ms-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Department</th>
                                        <th>Is Activated</th>
                                        <th>Registered At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display List of User's Account --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection
