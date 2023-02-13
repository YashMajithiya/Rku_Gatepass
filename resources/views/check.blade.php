<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkinout</title>
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
                <label for="userid">Userid</label>
                <input type="number" name="userid" class="form-control" placeholder="userid" required>
              </div>


            <div class="col-lg">
                <label for="out_datetime">Out_datetime</label>
                <input type="datetime-local" name="out_datetime" class="form-control" placeholder="out_datetime" required>
            </div>
          </div>
          <div class="my-2">
            <label for="in_datetime">in_datetime</label>
            <input type="datetime-local" name="in_datetime" class="form-control" placeholder="in_datetime" required>
          </div>
          <div class="my-2">
            <label for="reason">reason</label>
            <input type="text" name="reason" class="form-control" placeholder="reason" required>
          </div>
          <div class="my-2">
            <label for="action_datetime">action_datetime</label>
            <input type="date" name="action_datetime" class="form-control" placeholder="action_datetime" >

          </div>
          <div class="my-2">
            <label for="action_by">action_by</label>
            <input type="number" name="action_by" class="form-control" placeholder="action_by" >
          </div>
          <div class="my-2">
            <label for="actual_out_datetime">actual_out_datetime</label>
            <input type="date" name="actual_out_datetime" class="form-control" placeholder="actual_out_datetime" >

          </div>
          <div class="my-2">
            <label for="actual_out_by">actual_out_by</label>
            <input type="number" name="actual_out_by" class="form-control" placeholder="actual_out_by" >
          </div>
          <div class="my-2">
            <label for="actual_in_datetime">actual_in_datetime</label>
            <input type="date" name="actual_in_datetime" class="form-control" placeholder="actual_in_datetime" >

          </div>
          <div class="my-2">
            <label for="achual_in_by">achual_in_by</label>
            <input type="number" name="achual_in_by" class="form-control" placeholder="achual_in_by" >
          </div>
          <div class="my-2">
                <label for="status">Status</label>
                <select name="status"  class="form-control">
                  <option value="0">0.Rejected</option>
                  <option value="1">1.Pending</option>
                  <option value="2">2.Aprroved</option>
                  <option value="3">3.out</option>
                  <option value="4">4.in</option>
                  <option value="5">5.deleted</option>

                </select>
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
                <label for="userid">Userid</label>
                <input type="number" name="userid" id="userid" class="form-control" placeholder="userid" required>
              </div>
              <div class="col-lg">
                <label for="out_datetime">Out_datetime</label>
                <input type="datetime-local" name="out_datetime" id="out_datetime" class="form-control" placeholder="out_datetime" required>
            </div>
          </div>
          <div class="my-2">
            <label for="in_datetime">in_datetime</label>
            <input type="datetime-local" name="in_datetime" id="in_datetime" class="form-control" placeholder="in_datetime" required>
          </div>
          <div class="my-2">
            <label for="reason">reason</label>
            <input type="text" name="reason" id="reason" class="form-control" placeholder="reason" required>
          </div>
          <div class="my-2">
            <label for="action_datetime">action_datetime</label>
            <input type="date" name="action_datetime" id="action_datetime" class="form-control" placeholder="action_datetime" >

          </div>
          <div class="my-2">
            <label for="action_by">action_by</label>
            <input type="number" name="action_by" id="action_by" class="form-control" placeholder="action_by" >
          </div>
          <div class="my-2">
            <label for="actual_out_datetime">actual_out_datetime</label>
            <input type="date" name="actual_out_datetime" id="actual_out_datetime" class="form-control" placeholder="actual_out_datetime" >

          </div>
          <div class="my-2">
            <label for="actual_out_by">actual_out_by</label>
            <input type="number" name="actual_out_by" id="actual_out_by" class="form-control" placeholder="actual_out_by" >
          </div>
          <div class="my-2">
            <label for="actual_in_datetime">actual_in_datetime</label>
            <input type="date" name="actual_in_datetime" id="actual_in_datetime" class="form-control" placeholder="actual_in_datetime" >

          </div>
          <div class="my-2">
            <label for="achual_in_by">achual_in_by</label>
            <input type="number" name="achual_in_by" id="achual_in_by" class="form-control" placeholder="achual_in_by" >
          </div>
          <div class="my-2">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="0">0.Rejected</option>
                  <option value="1">1.Pending</option>
                  <option value="2">2.Aprroved</option>
                  <option value="3">3.out</option>
                  <option value="4">4.in</option>
                  <option value="5">5.deleted</option>

                </select>
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
            <h2 class="text-light">CheckInOut Students</h2>
            <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                class="bi-plus-circle me-2"></i>New Entry</button>
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
          url: '{{ route('storeinout') }}',
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
          url: '{{ route('editinout') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#userid").val(response.userid);
            $("#out_datetime").val(response.out_datetime);
            $("#in_datetime").val(response.in_datetime);
            $("#reason").val(response.reason);
            $("#action_datetime").val(response.action_datetime);
            $("#action_by").val(response.action_by);
            $("#actual_out_datetime").val(response.actual_out_datetime);
            $("#actual_out_by").val(response.actual_out_by);
            $("#actual_in_datetime").val(response.actual_in_datetime);
            $("#achual_in_by").val(response.achual_in_by);
            $("#status").val(response.status);
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
          url: '{{ route('updateinout') }}',
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
              url: '{{ route('deleteinout') }}',
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
          url: '{{ route('fetchAllinout') }}',
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
