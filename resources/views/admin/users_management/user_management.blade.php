@extends('admin.layout_admin.admin_masterpage')

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
                          <li><a href="{{route('admin')}}">Dashboard</a></li>
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
                                  <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#myModal" data-backdrop="false">Xem</a>
                                  <a class="btn btn-secondary btn-sm" href="{{route('them-nguoi-dung')}}">Thêm</a>
                                  <a class="btn btn-danger btn-sm" href="#" onclick="funccheck()">Xóa</a>
                                <a class="btn btn-primary btn-sm" href="{{route('chinh-sua-nguoi-dung')}}">Sửa</a></td>
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
                                          <a class="btn btn-primary btn-sm" href="{{route('chinh-sua-nguoi-dung')}}">Chỉnh sửa</a>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="user-description">
                                          <h6>Tiểu sử</h6>
                                          <p>bla bla...</p>
                                        </div>
                                      </div>

                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                  {{-- end modal --}}

                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>$170,750</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                                
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>$86,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>$433,060</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>$162,700</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>$372,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>$137,500</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>$327,900</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>$205,500</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>$103,600</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>$90,560</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>$342,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Charde Marshall</td>
                                <td>Regional Director</td>
                                <td>San Francisco</td>
                                <td>$470,600</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Haley Kennedy</td>
                                <td>Senior Marketing Designer</td>
                                <td>London</td>
                                <td>$313,500</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Tatyana Fitzpatrick</td>
                                <td>Regional Director</td>
                                <td>London</td>
                                <td>$385,750</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Michael Silva</td>
                                <td>Marketing Designer</td>
                                <td>London</td>
                                <td>$198,500</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Paul Byrd</td>
                                <td>Chief Financial Officer (CFO)</td>
                                <td>New York</td>
                                <td>$725,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Gloria Little</td>
                                <td>Systems Administrator</td>
                                <td>New York</td>
                                <td>$237,500</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Bradley Greer</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>$132,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Dai Rios</td>
                                <td>Personnel Lead</td>
                                <td>Edinburgh</td>
                                <td>$217,500</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Jenette Caldwell</td>
                                <td>Development Lead</td>
                                <td>New York</td>
                                <td>$345,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Yuri Berry</td>
                                <td>Chief Marketing Officer (CMO)</td>
                                <td>New York</td>
                                <td>$675,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Caesar Vance</td>
                                <td>Pre-Sales Support</td>
                                <td>New York</td>
                                <td>$106,450</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Doris Wilder</td>
                                <td>Sales Assistant</td>
                                <td>Sidney</td>
                                <td>$85,600</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
                            </tr>
                            <tr>
                                <td>Angelica Ramos</td>
                                <td>Chief Executive Officer (CEO)</td>
                                <td>London</td>
                                <td>$1,200,000</td>
                                <td><a href="#">Thêm</a> <a href="#">Xóa</a><a href="#">Sửa</a></td>
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