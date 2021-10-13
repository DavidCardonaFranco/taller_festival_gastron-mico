<div class="mb">
    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
</div>
<div class="mb">
    {{ Form::label('email', 'Correo Electronico', ['class' => 'form-label']) }}
    {{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => 256]) }}
</div>
<div class="mb">
    {{ Form::label('password', 'Contraseña', ['class' => 'form-label']) }}
    {{ Form::text('password', null, ['class' => 'form-control','maxlength'=>20]) }}
</div>
<div class="mb mb-3 mt-3">
    {{ Form::label('type', 'Tipo', ['class' => 'form-label']) }}
    {{ Form::select('type', ['Select' => ['admin', 'owner', 'user']], 'user', ['class' => 'form-control']) }}
</div>
