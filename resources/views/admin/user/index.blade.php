@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('title')
    Thêm người dùng
@endsection

@section('breadcrumbs')
  <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
          <div class="row m-0">
              <div class="col-sm-4">
                  <div class="page-header float-left">
                      <div class="page-title">
                          <h1>Dashboard</h1>
                      </div>
                  </div>
              </div>
              <div class="col-sm-8">
                  <div class="page-header float-right">
                      <div class="page-title">
                          <ol class="breadcrumb text-right">
                          <li><a href="">Dashboard</a></li>
                              <li><a href="#">Quản lý người dùng</a></li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('content')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Bảng dữ liệu</strong>
                    <a class="btn btn-primary btn-sm" href="">Thêm</a>

                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Salary</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AAA Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>$320,800</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target="#myModal" data-backdrop="false">Xem</a>
                                    <a class="btn btn-warning btn-sm" href="">Sửa</a>
                                    <a class="btn btn-danger btn-sm" href="#" onclick="funccheck()">Xóa</a>
                                </td>
                                {{-- modal --}}
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                  <div class="modal-dialog">
                                    <div class="modal-content">

                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Thông tin tài khoản</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>

                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-4"><img src="" alt="avatar"></div>
                                        <div class="col-8">
                                          <div>
                                            <strong>Tên đăng nhập :</strong>
                                          </div>
                                          <div>
                                            <strong>Email :</strong>
                                          </div>
                                          <div>
                                            <strong>Họ và tên : Nguyễn Trần Ánh</strong>
                                          </div>
                                          <div>
                                            <strong>Mật khẩu :</strong>
                                          </div>
                                          <div>
                                            <strong>Số điện thoại :</strong>
                                          </div>
                                          <div>
                                            <strong>Địa chỉ :</strong>
                                          </div>
                                          <div>
                                          <a class="btn btn-primary btn-sm" href="">Chỉnh sửa</a>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="user-description">
                                          <h6>Tiểu sử</h6>
                                          <p>bla bla...</p>
                                        </div>
                                      </div>

                                      <!-- Modal footer -->
                                      {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div> --}}

                                    </div>
                                  </div>
                                </div>
                                  {{-- end modal --}}

                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@endsection

@section('script')
  {{-- scrip data table --}}
  <script src="admin_page_asset/js/lib/data-table/datatables.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/dataTables.bootstrap.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/dataTables.buttons.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.bootstrap.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/jszip.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/vfs_fonts.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.html5.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.print.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.colVis.min.js"></script>
  <script src="admin_page_asset/js/init/datatables-init.js"></script>

  <script src="admin_page_asset/js/functionscript.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    });
  </script>
@endsection
