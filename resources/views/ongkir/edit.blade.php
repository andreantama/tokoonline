@extends('layouts.master')

@section('top')
@endsection

@section('content')
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>

            <div class="box-header with-border">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Success! &nbsp;
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('ongkir.update', ['id' => $ongkir->id_ongkir])  }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_ongkir" value="{{ $ongkir->id_ongkir }}">
                <div class="box-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $ongkir->name }}" autofocus required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ $ongkir->price }}" autofocus required>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
@endsection


@section('top')
  
@endsection