<!-- Bootstrap Modal -->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="formClient" enctype="multipart/form-data">
            @csrf @method('post')
                <div class="modal-header">
                    <h5 class="modalClient-title" id="clientModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="client name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control"  id="address" rows="5" placeholder="client address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="client email">
                    </div>
                    <div class="form-group">
                        <label for="photo-client">Photo (jpg/jpeg/png)</label>
                        <input id="photo-client" name="photo-client" type="file" class="form-control" accept="image/jpg,image/jpeg,image/png">
                    </div>
                    <div class="form-group">
                        <img name="client-view" class="img-fluid" src="" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modalClient-save"></button>
                </div>
            </form>  
        </div>
    </div>
</div>