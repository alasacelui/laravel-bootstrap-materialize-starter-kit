@extends('layouts.admin.app')

@section('title', 'Admin | Manage Item Category')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="row justify-content-center py-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            List of Item Category
                            <a class=" float-end btn btn-sm btn-dark rounded me-3" href="javascript:void(0)"
                                onclick="toggle_modal('#m_category', '.category_form', ['#m_category_title','Add Category'], ['.btn_add_category','.btn_update_category'])">Create
                                Category +</a><br>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover category_dt">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Categories --}}
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
