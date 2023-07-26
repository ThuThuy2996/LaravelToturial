@extends('admin.main')

@section('header')

<script src="/ckeditor/ckeditor.js"></script>


@endsection

@section('content')
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">

      <div class="form-group">
        <label for="name">Tên Danh Mục</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
      </div>

      <div class="form-group">
        <label for="parent_id">Danh Mục</label>
        <select class="custom-select form-control-border" id="parent_id" name="parent_id">
            <option>Danh Mục 1</option>
            <option>Danh Mục 2</option>
            <option>Danh Mục 3</option>
        </select>
      </div>

      <div class="form-group">
        <label for="content">Nội Dung Chi Tiết</label>
        <textarea name="content" class="form-control" id="content"></textarea>
      </div>

      <div class="form-group">
        <label for="description">Ghi chú</label>
        <textarea name="description" class="form-control" id="description"></textarea>
      </div>

      <div class="form-check">
        <input type="checkbox" class="form-check-input" name="active" id="active">
        <label class="form-check-label" for="active">Active</label>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
  </form>
@endsection

@section('footer')
<script>
    ClassicEditor
    .create( document.querySelector( '#content' ) )
    .catch( error => {
        console.error( error );
    } );
</script>

@endsection
