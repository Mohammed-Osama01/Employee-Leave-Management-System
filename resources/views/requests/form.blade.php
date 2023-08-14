<div class="mb-3">
    <label>Update Status</label>
    <select class="form-select" name="status" aria-label="Default select example">
        <option value="pending">pending</option>
        <option value="approved">approved</option>
        <option value="denied">denied</option>
    </select>
</div>

<div class="mb-3">
    <label for="start_date" class="form-label">Reason</label>
    <input type="text" class="form-control" id="start_date" name="reason" value="{{ $leave_request->reason }}">
</div>
