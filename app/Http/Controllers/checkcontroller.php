<?php

namespace App\Http\Controllers;
use App\Models\rkuh_checkinout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class checkcontroller extends Controller
{

	// set index page view
	public function checkinout() {
		return view('check');
	}

	// handle fetch all eamployees ajax request
	public function fetchAllinout() {
		$emps = rkuh_checkinout::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usertype</th>
                <th>out_datetime</th>
                <th>in_datetime</th>
                <th>reason</th>
                <th>action_datetime</th>
                <th>action_by</th>
                <th>actual_out_datetime</th>
                <th>actual_out_by</th>
				<th>actual_in_datetime</th>
				<th>achual_in_by</th>
                <th>Operations</th>

              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
				<td>' . $emp->userid . '</td>
                <td>' . $emp->out_datetime . '</td>
                <td>' . $emp->in_datetime . '</td>
				<td>' . $emp->reason . '</td>
                <td>' . $emp->action_datetime . '</td>
				<td>' . $emp->action_by . '</td>
				<td>' . $emp->actual_out_datetime . '</td>
				<td>' . $emp->actual_out_by . '</td>
				<td>' . $emp->actual_in_datetime . '</td>
				<td>' . $emp->achual_in_by . '</td>


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
	public function storeinout(Request $request) {

        $empData = ['userid' => $request->userid, 'out_datetime' => $request->out_datetime, 'in_datetime' => $request->in_datetime,'reason' => $request->reason, 'action_datetime' => $request->action_datetime, 'action_by' => $request->action_by,'actual_out_datetime' => $request->actual_out_datetime,'actual_out_by' => $request->actual_out_by,'actual_in_datetime' => $request->actual_in_datetime,'achual_in_by' => $request->achual_in_by,'status' => $request->status,];
		rkuh_checkinout::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an employee ajax request
    public function editinout(Request $request) {
		$id = $request->id;
		$emp = rkuh_checkinout::find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function updateinout(Request $request) {
		$emp = rkuh_checkinout::find($request->emp_id);


        $empData = ['userid' => $request->userid, 'out_datetime' => $request->out_datetime, 'in_datetime' => $request->in_datetime,'reason' => $request->reason, 'action_datetime' => $request->action_datetime, 'action_by' => $request->action_by,'actual_out_datetime' => $request->actual_out_datetime,'actual_out_by' => $request->actual_out_by,'actual_in_datetime' => $request->actual_in_datetime,'achual_in_by' => $request->achual_in_by,'status' => $request->status,];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an employee ajax request
	public function deleteinout(Request $request) {
		$id = $request->id;
		$emp = rkuh_checkinout::find($id);
			rkuh_checkinout::destroy($id);

	}
}


