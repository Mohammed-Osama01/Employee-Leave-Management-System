
<div class="mb-3">
    <label>Leave Type</label>
    <select class="form-select" name="leave_type_id" aria-label="Default select example">
        @foreach ($leaveTypes as $leaveType)
            <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="start_date" class="form-label">Start Date</label>
    <input type="date" class="form-control" id="start_date" name="start_date" required>
</div>

<div class="mb-3">
    <label for="duration_days" class="form-label">Duration (Days)</label>
    <input type="number" class="form-control" id="duration_days" name="duration_days" required>
</div>


