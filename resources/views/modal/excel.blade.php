<div class="modal" id="excelDataModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="uploadExcelForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="text-danger">All (*) mark fields are required.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group col-md-12">
                                <input type="file" class="dropify" name="excel" id="excel" data-show-errors="true" data-errors-position="outside"
                                data-allowed-file-extensions="xlsx csv">
                            </div>
                            <x-selectbox  labelName="Type" name="type" required="required" col="col-md-12">
                                <option value="1">Single Sheet</option>
                                <option value="2">Multiple Sheet</option>
                            </x-selectbox>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="upload-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>
