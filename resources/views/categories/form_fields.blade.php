<div class="mb">
    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
</div>
<div class="mb mb-3 mt-3">
    {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>