<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $emailMarketing->id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $emailMarketing->title }}</p>
</div>

<!-- Email Content Field -->
<div class="col-sm-12">
    {!! Form::label('email_content', 'Email Content:') !!}
    <p>{{ $emailMarketing->email_content }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $emailMarketing->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $emailMarketing->updated_at }}</p>
</div>

