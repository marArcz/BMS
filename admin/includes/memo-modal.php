<div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Memorandum (Preview)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <!-- <div class="card-header bg-white border-none my-1">
                        
                    </div> -->
                    <div class="text-right">
                        <button class="btn btn-primary" id="print">Print <i class="bx bx-printer"></i></button>
                    </div>
                    <div class="card-body shadow mx-auto" id="memo-form" style="height: 1056px;width:768px">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- purpose modal -->
<div class="modal fade" id="purposeModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Memorandum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="purpose-form">
                    <label for="" class="form-label">Create memorandum for:</label>
                    <input type="text" class="form-control" id="purposeBox">
                    <button class="btn-sm btn btn-default text-primary mt-3" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>