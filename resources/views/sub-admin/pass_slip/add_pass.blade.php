<!-- Add New Pass Slip Modal -->
<div class="modal fade" id="addPassSlipModal" tabindex="-1" aria-labelledby="addPassSlipModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPassSlipModalLabel">Add Pass Slip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPassForm" action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-2 position-relative">
                            <input type="text" class="form-control" id="search_employee"
                                placeholder="Type ID or Name" oninput="searchEmployee()">
                            <div id="employee_results" class="col-md-12 results-container"></div>
                            <!-- This will show suggestions -->
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="p_no" class="form-label">Pass Number:</label>
                            <input type="text" class="form-control" name="p_no" id="p_no"
                                value="{{ 'P-' . now()->format('Ymd') . '-' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="employee_type" class="form-label">Employee Type:</label>
                            <select class="form-select" id="employee_type" name="employee_type" required>
                                <option value="" selected disabled>Select Employee Type</option>
                                <option value="Teaching">Teaching</option>
                                <option value="Non-Teaching">Non-Teaching</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="last_name" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="first_name" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="middle_name" class="form-label">Middle Initial:</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                placeholder="Optional">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="department" class="form-label">Department:</label>
                            <input type="text" class="form-control" id="department" name="department" required>
                        </div>
                        <div class="col-md-6">
                            <label for="designation" class="form-label">Designation:</label>
                            <input class="form-control" id="designation" name="designation" rows="3"
                                required></input>
                        </div>
                        <div class="col-md-6">
                            <label for="destination" class="form-label">Destination:</label>
                            <input class="form-control" id="destination" name="destination" required></input>
                        </div>
                        <div class="">
                            <label for="purpose" class="form-label">Purpose:</label>
                            <textarea class="form-control" id="purpose" name="purpose" rows="1" required></textarea>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="time_out" class="form-label">Time Out</label>
                            <input type="time" class="form-control" id="time_out" name="time_out" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="time_in" class="form-label">Time In</label>
                            <input type="time" class="form-control" id="time_in" name="time_in">
                        </div>
                        <div class="mt-2 d-flew justify-content-end align-items-end text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
