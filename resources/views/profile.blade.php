
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            {!! Form::model(Auth::user(), ['route' => 'user.update', 'method' => 'patch', 'class'=>'container-fluid']) !!}
                <!-- Name Field -->
                <div class="form-group ">
                    {!! Form::label('name', 'name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Description Field -->
                <div class="form-group">
                    {!! Form::label('email', 'email:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Submit Field -->
                <div class="form-group float-right">
                    {!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            {!! Form::model(Auth::user(), ['route' => 'user.update_password', 'method' => 'patch', 'class'=>'container-fluid']) !!}
                <!-- Old Password Field -->
                <div class="form-group ">
                    {!! Form::label('old_password', 'old password:') !!}
                    {!! Form::password('old_password', ['class' => 'form-control']) !!}
                </div>

                <!-- New Password Field -->
                <div class="form-group ">
                    {!! Form::label('new_password', 'new password:') !!}
                    {!! Form::password('new_password', ['class' => 'form-control']) !!}
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group ">
                    {!! Form::label('confirm_password', 'confirm password:') !!}
                    {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group float-right">
                    {!! Form::submit('Update Password', ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
