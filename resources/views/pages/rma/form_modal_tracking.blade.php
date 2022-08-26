<form id="form_add_item" action="{{ route('RMA.add_tracking_number_label', with(['id_label' => $id])) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="rma_id" value="{{$rma}}">
    @for($i = 1; $i <= $number_labels; $i++)
        <div class="form-group">
            <label for="tracking_number">Tracking Number {{$i}}</label>
            <input type="text" id="tracking_number_{{$i}}"  name="tracking_number_{{$i}}" value="{{ $labelTrackingNumber["tracking_number_$i"] ?? null }}" class="form-control">
            <div class="help-block"></div>
        </div>
    @endfor
{{--    <input style="margin-top: 5px" type="file" id="file_tracking" name="file_tracking[]" accept="application/pdf, image/*" multiple />--}}
{{--    @if(!empty($labelFile))--}}
{{--        @foreach($labelFile as $file)--}}
{{--            <?php--}}
{{--            $array_file = explode('.', $file);--}}
{{--            ?>--}}
{{--            <input type="hidden" name="file_tracking[]" value="{{ $file }}">--}}
{{--            @if(end($array_file) == "pdf")--}}
{{--                <div id="preview_image" class="img_holder">--}}
{{--                    <img src="{!! asset('images/default_file_image.png') !!}">--}}
{{--                </div>--}}
{{--                <a target="_blank" href="{{ url('/data/file/'. $file) }}">{{ $file }}</a>--}}
{{--            @else--}}
{{--                <div id="preview_image" class="img_holder">--}}
{{--                    <img src="{{ url('/data/file/'. $file) }}">--}}
{{--                </div>--}}
{{--                <a target="_blank" href="{{ url('/data/file/'. $file) }}">{{ $file }}</a>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    @endif--}}
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-primary" id="create_label_submit">SUBMIT</button>
    </div>
</form>
