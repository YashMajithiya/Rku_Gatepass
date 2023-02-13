<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD App Laravel 8 & Ajax</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
  <link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

</head>
{{-- add new employee modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_employee_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
           <div class="row">
            <div class="col-lg">
                <label for="usertype">Usertype</label>
                <select name="usertype"  class="form-control"required>>
                  <option value="0">0.Admin</option>
                  <option value="1">1.Student</option>
                  <option value="2">2.Security</option>
                </select>
              </div>


            <div class="col-lg">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="E-mail">
          </div>
          <div class="my-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="my-2">
            <label for="mobile">Mobile</label>
            <input type="number" name="mobile" class="form-control" placeholder="mobile number" >
          </div>
          <div class="my-2">
            <label for="whatsapp">Whatsapp number</label>
            <input type="number" name="whatsapp" class="form-control" placeholder="Whatsapp number" >
          </div>
          <div class="my-2">
            <label for="enrollment">Enrollment</label>
            <input type="text" name="enrollment" class="form-control" placeholder="Enrollment Number" >
          </div>
          <div class="my-2">
            <label for="branch">Branch</label>
            <input type="text" name="branch"  class="form-control" placeholder="branch" >
          </div>
          <div class="my-2">
            <label for="p_mobile">Pmobile</label>
            <input type="number" name="p_mobile" class="form-control" placeholder="Parents mobile number" >
          </div>
          <div class="my-2">
            <label for="room_no">room number</label>
            <input type="text" name="room_no" class="form-control" placeholder="Room number" >
          </div>
          <div class="my-2">
                <label for="status">Status</label>
                <select name="status"  class="form-control">
                  <option value="0">0.Inactive</option>
                  <option value="1">1.Active</option>
                  <option value="2">2.Special</option>
                </select>
              </div>
          <div class="my-2">
            <label for="comment">Comment</label>
            <input type="text" name="comment" class="form-control" placeholder="comment" >
          </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="add_employee_btn" class="btn btn-outline-primary">Add Employee</button>
          </div>
        </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_employee_form" >
        @csrf
        <input type="hidden" name="emp_id" id="emp_id">
        <input type="hidden" name="emp_avatar" id="emp_avatar">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
                <label for="usertype">Usertype</label>
                <select name="usertype" id="usertype"  class="form-control" required>>
                  <option value="0">0.Admin</option>
                  <option value="1">1.Student</option>
                  <option value="2">2.Security</option>
                </select>
              </div>
            <div class="col-lg">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="my-2">
            <label for="mobile">Mobile</label>
            <input type="number" name="mobile" id="mobile" class="form-control" placeholder="mobile number" >
          </div>
          <div class="my-2">
            <label for="whatsapp">Whatsapp number</label>
            <input type="number" name="whatsapp" id="whatsapp" class="form-control" placeholder="Whatsapp number" >
          </div>
          <div class="my-2">
            <label for="enrollment">Enrollment</label>
            <input type="text" name="enrollment" id="enrollment" class="form-control" placeholder="Enrollment Number" >
          </div>
          <div class="my-2">
            <label for="branch">Branch</label>
            <input type="text" name="branch" id="branch" class="form-control" placeholder="branch" >
          </div>
          <div class="my-2">
            <label for="p_mobile">Pmobile</label>
            <input type="number" name="p_mobile" id="p_mobile" class="form-control" placeholder="Parents mobile number" >
          </div>
          <div class="my-2">
            <label for="room_no">Room number</label>
            <input type="text" name="room_no" id="room_no" class="form-control" placeholder="Room number" >
          </div>
          <div class="my-2">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="0">0.Inactive</option>
                  <option value="1">1.Active</option>
                  <option value="2">2.Special</option>
                </select>
              </div>
          <div class="my-2">
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment" class="form-control" placeholder="comment" >
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_employee_btn" class="btn btn-outline-success">Update Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}

<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Manage Users</h3>
            <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                class="bi-plus-circle me-2"></i>Add New User</button>
                <a href ="/dashboard" ><button class="btn btn-outline-warning">Exit</button></a>
          </div>
          <div class="card-body" id="show_all_employees">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $(function() {

      // add new employee ajax request
      $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_employee_btn").text('Adding...');
        $.ajax({
          url: '{{ route('store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Employee Added Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#add_employee_btn").text('Add Employee');
            $("#add_employee_form")[0].reset();
            $("#addEmployeeModal").modal('hide');
          }
        });
      });

      // edit employee ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#usertype").val(response.usertype);
            $("#name").val(response.name);
            $("#email").val(response.email);
            $("#password").val(response.password);
            $("#mobile").val(response.mobile);
            $("#whatsapp").val(response.whatsapp);
            $("#enrollment").val(response.enrollment);
            $("#branch").val(response.branch);
            $("#p_mobile").val(response.p_mobile);
            $("#room_no").val(response.room_no);
            $("#status").val(response.status);
            $("#comment").val(response.comment);
            $("#emp_id").val(response.id);

          }
        });
      });

      // update employee ajax request
      $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_employee_btn").text('Updating...');
        $.ajax({
          url: '{{ route('update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Employee Updated Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#edit_employee_btn").text('Update Employee');
            $("#edit_employee_form")[0].reset();
            $("#editEmployeeModal").modal('hide');
          }
        });
      });

      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllEmployees();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchAllEmployees();

      function fetchAllEmployees() {
        $.ajax({
          url: '{{ route('fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_employees").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>
</body>

</html>
