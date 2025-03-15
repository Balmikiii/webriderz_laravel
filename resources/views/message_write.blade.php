<form action="{{url('message/write')}}" method="post">
    @csrf
    <input type="text" name="room" value="2" hidden>
    <input type="text" name="sender" value="{{Auth::id()}}" hidden>
    <div class="input-group mb-0">
        <div class="input-group-prepend">
            <label for="files" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></label>
            <input type="file" id="files" name="resource" class="d-none" multiple />
        </div>
        <input type="text" class="form-control" name="content"
            placeholder="Enter text here..." autocomplete="off">
        <div class="input-group-prepend">
            <button class="input-group-text" type="submit"><i class="fa fa-send"></i></button>
        </div>
    </div>
</form>
