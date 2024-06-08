@extends('layouts.app_sneat')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">{{ $title }}</div>

            <div class="card-body">

                {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]) !!}


                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="wali_id" class="mb-1">Nama Wali <span
                                class="text-danger">(optional)</span></label>
                                {!! Form::select('wali_id', $wali, null, [
                                'class' => 'form-control select2',
                                'placeholder' => '--Pilih--',
                                ]) !!}
                                <span class="text-danger">{{ $errors->first('wali_id') }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
    <div class="form-group">
        {!! Form::label('biaya_id', 'Pilih Pembayaran', ['class' => 'mb-1']) !!}
        {!! Form::select('biaya_id', $listBiaya, null, ['class' => 'form-control select2', 'placeholder' => '-- Pilih --']) !!}
        <span class="text-danger">{{ $errors->first('biaya_id') }}</span>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        {!! Form::label('jurusan', 'Jurusan', ['class' => 'mb-1']) !!}
        {!! Form::select(
            'jurusan',
            [
                '' => '--Pilih--',
                'Teknik Informatika' => 'Teknik Informatika',
                'Teknik Sipil' => 'Teknik Sipil',
                'Teknik Mesin' => 'Teknik Mesin',
                'Transportasi' => 'Transportasi',
                'Tata Busana' => 'Tata Busana',
                'Teknik Listrik' => 'Teknik Listrik',
                'Manajemen Informatika' => 'Manajemen Informatika',
            ],
            null,
            ['class' => 'form-control select2']
        ) !!}
        <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                            </div>


                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group ">
                                {!! Form::label('nim', 'nim', ['class' => 'mb-1']) !!}
                                {!! Form::text('nim', null, ['class' => 'form-control', 'id' => 'nim']) !!}
                                <span class="text-danger">{{ $errors->first('nim') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('nama', 'Nama', ['class' => 'mb-1']) !!}
                                {!! Form::text('nama', null, ['class' => 'form-control', 'autofocus', 'id' => 'nama'])
                                !!}
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('kelas', 'Kelas', ['class' => 'mb-1']) !!}

            {!! Form::select('kelas', [
                'S1 Pendidikan Teknik Elektro' => 'S1 Pendidikan Teknik Elektro',
                'S1 Pendidikan Teknik Mesin' => 'S1 Pendidikan Teknik Mesin',
                'S1 Pendidikan Teknik Bangunan' => 'S1 Pendidikan Teknik Bangunan',
                'S1 Pendidikan Tata Rias' => 'S1 Pendidikan Tata Rias',
                'S1 Teknik Sipil' => 'S1 Teknik Sipil',
                'S1 Pendidikan Tata Boga' => 'S1 Pendidikan Tata Boga',
                'S1 Pendidikan Tata Busana' => 'S1 Pendidikan Tata Busana',
                'S1 Teknik Elektro' => 'S1 Teknik Elektro',
                'S1 Teknik Mesin' => 'S1 Teknik Mesin',
                'S1 Pendidikan Teknologi lnformasi' => 'S1 Pendidikan Teknologi lnformasi',
                'S1 Teknik lnformatika' => 'S1 Teknik lnformatika',
                'S1 Sistem Informasi' => 'S1 Sistem Informasi',
                'S1 Pembangunan Wilayah dan Kota' => 'S1 Pembangunan Wilayah dan Kota'
            ], null, ['class' => 'form-control', 'placeholder' => '-- Pilih --']) !!}
            
            <span class="text-danger">{{ $errors->first('kelas') }}</span>
        </div>
    </div>
</div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                {!! Form::label('angkatan', 'Angkatan', ['class' => 'mb-1']) !!}

                                {!! Form::selectRange('angkatan', 2015, date('Y') + 1, null, ['class' => 'form-control',
                                'placeholder' => '-- Pilih --'])
                                !!}
                                <span class="text-danger">{{ $errors->first('angkatan') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('foto', 'Foto (Format: jpeg, jpg, png, Ukuran max: 5MB)', ['class' => 'mb-1']) !!}

                        {!! Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                        <span class="text-danger">{{ $errors->first('foto') }}</span>
                    </div>

                    @if ($model->foto != null)
                    <div class="m-3">
                        <img src="{{ \Storage::url($model->foto) }}" class="img-thumbnail" alt="" width="200">
                    </div>
                    @endif

                    {!! Form::submit($button, ['class' => 'btn btn-primary btn-sm mt-3']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
    @endsection