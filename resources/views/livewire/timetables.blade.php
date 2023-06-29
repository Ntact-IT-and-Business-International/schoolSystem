<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- Event modal -->
    <form class="modal modal-top fade" id="fullcalendar-default-view-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add an event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type</label>
                        <select class="custom-select">
                            <option value="" selected>Default</option>
                            <option value="fc-event-success">Success</option>
                            <option value="fc-event-info">Info</option>
                            <option value="fc-event-warning">Warning</option>
                            <option value="fc-event-danger">Danger</option>
                            <option value="fc-event-dark">Dark</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default md-btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary md-btn-flat">Save</button>
                </div>
            </div>
        </div>
    </form>
    <!-- / Event modal -->
        <div class="card mb-4">
            <div class="card-body">
                <div id='fullcalendar-default-view'></div>
                <div class="row align-items-center m-l-0">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6 text-right mt-3">
                    <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-time-table')"><i class="feather icon-plus"></i> Add TimeTable (s)</button>
                </div>
            </div>
        </div>
    </div>
</div>
