<select class="form-control select2 " id="note_type_id">
    <option value="">Select Note Type</option>
    @foreach ( $notes as $note)
        <option value="{{$note->id}}">{{$note->name}}</option>
    @endforeach
</select>