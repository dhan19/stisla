<!-- Payload Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Payload', 'Payload:') !!}
    {!! Form::text('Payload', null, ['class' => 'form-control']) !!}
</div>

<!-- Cargobox Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargobox', 'Cargobox:') !!}
    {!! Form::text('cargobox', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Driver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driver', 'Driver:') !!}
    {!! Form::text('driver', null, ['class' => 'form-control']) !!}
</div>

<!-- Vehicle Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicle_number', 'Vehicle Number:') !!}
    {!! Form::text('vehicle_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Images Field -->
<div class="form-group col-sm-6">
    {!! Form::label('images', 'Images:') !!}
    {!! Form::file('images') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('trucks.index') }}" class="btn btn-light">Cancel</a>
</div>
