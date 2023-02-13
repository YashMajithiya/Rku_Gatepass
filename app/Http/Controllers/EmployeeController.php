<?php

namespace App\Http\Controllers;
use App\Models\rkuh_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller {


	// set index page view
	public function index() {
		return view('index');
	}
    
    function dashboard()
    {
        $data= rkuh_user::all();
        return view('dashboard');
    }

	// handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = rkuh_user::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>usertype</th>
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>mobile</th>
                <th>whatsapp</th>
                <th>enrollment</th>
                <th>branch</th>
				<th>p_mobile</th>
				<th>room_no</th>
                <th>operations</th>

              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
				<td>' . $emp->usertype . '</td>
                <td>' . $emp->name . '</td>
                <td>' . $emp->email . '</td>
				<td>' . $emp->password . '</td>
                <td>' . $emp->mobile . '</td>
				<td>' . $emp->whatsapp . '</td>
				<td>' . $emp->enrollment . '</td>
				<td>' . $emp->branch . '</td>
				<td>' . $emp->p_mobile . '</td>
				<td>' . $emp->room_no . '</td>


                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new employee ajax request
	public function store(Request $request) {

		$empData = ['usertype' => $request->usertype, 'name' => $request->name, 'email' => $request->email,'password' => $request->password, 'mobile' => $request->mobile, 'whatsapp' => $request->whatsapp,'enrollment' => $request->enrollment,'branch' => $request->branch,'p_mobile' => $request->p_mobile,'room_no' => $request->room_no,'Status' => $request->status,'comment' => $request->comment];
		rkuh_user::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an employee ajax request
    public function edit(Request $request) {
		$id = $request->id;
		$emp = rkuh_user::find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
		$emp = rkuh_user::find($request->emp_id);


		$empData = ['usertype' => $request->usertype, 'name' => $request->name, 'email' => $request->email,'password' => $request->password, 'mobile' => $request->mobile, 'whatsapp' => $request->whatsapp,'enrollment' => $request->enrollment,'branch' => $request->branch,'p_mobile' => $request->p_mobile,'Room_no' => $request->room_no,'Status' => $request->status,'comment' => $request->comment];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = rkuh_user::find($id);
			rkuh_user::destroy($id);

	}
}
