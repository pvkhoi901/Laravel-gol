<div class="form-group">
    <label>Image</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="custom-file">
        <label class="custom-file-label" for="custom-file">Choose file</label>
    </div>
    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
</div>
