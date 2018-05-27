@guest
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Prisijungimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                <div class="modal-body">
                    {!! view('auth.login') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti</button>
                    <button type="submit" class="btn btn-success">Prisijungti</button>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="modal fade" id="newOfficeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sukurti naują įrašą</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="newOfficeForm" method="POST" action="{{ route('office/create') }}">
                {!! Form::model($office, ['route' => 'home']) !!}

                <div class="modal-body">

                    <div class='form-group'>
                        {!! Form::label('name', 'Pavadinimas') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>

                    <div class='form-group'>
                        {!! Form::label('district', 'Rajonas') !!}
                        {!! Form::select('district', $mappedDistricts, null, ['class' => 'form-control']) !!}
                        
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>

                    <div class='form-group'>
                        {!! Form::label('price', 'Kaina €') !!}
                        {!! Form::text('price', null, ['class' => 'form-control']) !!}
                        
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>

                    <div class='form-group'>
                        {!! Form::rawLabel('area', 'Plotas m<sup>2</sup>') !!}
                        {!! Form::text('area', null, ['class' => 'form-control']) !!}
                        
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>

                    <div class='form-group'>
                        {!! Form::label('workers', 'Darbuotojų skaičius') !!}
                        {!! Form::text('workers', null, ['class' => 'form-control']) !!}
                        
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>

                    <div class='form-group'>
                        {!! Form::label('heating', 'Vidutinė šildymo kaina mėnesiui €') !!}
                        {!! Form::text('heating', null, ['class' => 'form-control']) !!}
                        
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    
                    <div class='form-row'>
                        <div class='form-group col-2 align-middle'>
                            <button id="pointCoordinatesBtn" class="btn btn-primary" type="button">
                                <i class="fas fa-map-pin"></i>
                            </button>
                        </div>

                        <div class='form-group col-5'>
                            {!! Form::label('lng', 'Ilguma') !!}
                            {!! Form::text('lng', null, ['class' => 'form-control', 'disabled' => true]) !!}
                            
                            <span class="invalid-feedback">
                                <strong></strong>
                            </span>
                        </div>

                        <div class='form-group col-5'>
                            {!! Form::label('lat', 'Platuma') !!}
                            {!! Form::text('lat', null, ['class' => 'form-control', 'disabled' => true]) !!}
                            
                            <span class="invalid-feedback">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>
                    <button type="submit" class="btn btn-success">Sukurti</button>
                </div>

                {!! Form::close() !!}
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="teamModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Komanda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4></h4>
                <ul>
                </ul>
            </div>
        </div>
    </div>
</div>
@endguest