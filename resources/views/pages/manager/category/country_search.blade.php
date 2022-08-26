
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nox_category_id">YouTube Channel Rank</label>
            <select name="nox_category_id" id="nox_category_id" class="form-control select2 search_condition">
                @foreach($nox_categories as $key => $value)
                    <option value="{{ $value['id'] }}" {{$key == $index_nox_category_id ?"selected" :""}} >{{$value['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="youtube_category_id">Youtube Category</label>
            {{ Form::select('youtube_category_id', $youtube_categories, null, ['class' => 'form-control select2 search_condition', 'id' => 'youtube_category_id']) }}
        </div>
    </div>
</div>