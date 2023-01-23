@section('heading', 'Detail Driver')

@extends('layouts.app')

@section('content')

<br>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"> 
        Kirim Pesan Email Ke Admin 
      </h3>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-1">

          <form action="{{url('driver')}}/{{$company->id}}/{{('kirim_pesan')}}" method="post" role="form" class="form">
          @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input readonly type="text" name="name" class="form-control" value="{{ $company->owner_name}}" required>
              </div>
              <div class="col-md-6 form-group">
                <input readonly type="email" class="form-control" name="email" value="{{ $company->email}}" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea type="text" class="form-control" name="isi" placeholder="Tulis pesan disini ..." required></textarea>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-success btn-sm">
                Kirim Email 
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->



@endsection

