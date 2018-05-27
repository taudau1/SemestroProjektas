@csrf

<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('El. paštas') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Slaptažodis') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Prisiminti mane') }}
            </label>
        </div>
    </div>
</div>