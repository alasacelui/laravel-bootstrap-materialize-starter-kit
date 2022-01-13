@if(url()->current() === route('admin.category.index'))
    {{--Creating category--}}
    <div class="modal fade" id="m_category" tabindex="-1" role="dialog" aria-labelledby="m_category_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="m_category_header">
            <h6 class="modal-title text-white" id="m_category_title">{{--Modal Title--}}</h6>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>
            <div class="modal-body py-5">
                <form class="category_form" autocomplete="off">
                    <label>Enter Category *</label>
                    <div class="input-group input-group-outline mb-3 ">
                        <input type="text" class="form-control" name="name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn float-end btn_add_category btn-dark"  onclick="c_store('.category_form','.category_dt', 'admin.category.store')">Submit</button>
                <button type="button" class="btn float-end btn_update_category btn-primary"  onclick="c_update('.category_form','.category_dt', 'admin.category.update', event)">Update</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    {{--End Creating category--}}
@endif