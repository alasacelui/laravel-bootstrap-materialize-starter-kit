@if(url()->current() === route('employee.leave.index'))
    {{--Applying Leave--}}
    <div class="modal fade" id="m_leave" tabindex="-1" role="dialog" aria-labelledby="m_leave_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="m_leave_header">
            <h6 class="modal-title text-white" id="m_leave_title">{{--Modal Title--}}</h6>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>
            <div class="modal-body py-5">
                <form class="leave_form" autocomplete="off">
                    <label>Select Leave Type *</label>
                    <div class="input-group input-group-outline mb-3 ">
                        <select class="form-control" name="leave_type_id" id="d_leave_types"> 
                            {{--Display Leave Types--}}
                        </select>
                    </div>

                    <label>Start Date *</label>
                    <div class="input-group input-group-outline mb-3 ">
                        <input type="datetime-local" class="form-control" name="date_time_start" id="start_date">
                    </div>

                    <label>End Date *</label>
                    <div class="input-group input-group-outline mb-3 ">
                        <input type="datetime-local" class="form-control" name="date_time_end" id="end_date">
                    </div>
                    
                    <label>Add Reason *</label>
                    <div class="input-group input-group-outline mb-3 ">
                        <input type="text" class="form-control" name="reason">
                    </div>
                    <input type="file" name="documents[]" class="documents" multiple data-max-file-size="3MB" data-max-files="3">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn float-end btn_add_leave btn-info"  onclick="c_store('.leave_form','.leave_dt', 'employee.leave.store')">Submit</button>
                <button leave="button" class="btn float-end btn_update_leave btn-success"  onclick="c_update('.leave_form','.leave_dt', 'employee.leave.update', event)">Update</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    {{--End Applying Leave --}}
@endif