<div class="mb-3">
    <label>Employee Name</label>
    <input type="text" name="name" placeholder="user name" class="form-control" value="{{ $user->name }}" />
</div>

<div class="mb-3">
    <label>Role</label>
    <select class="form-select" name="role" aria-label="Default select example">
        <option value="1">admin</option>
        <option value="2">employee</option>
      </select>
</div>

<div class="mb-3">
    <label>Status</label>
    <select class="form-select" name="status" aria-label="Default select example">
        <option value="1">active</option>
        <option value="2">inactive</option>
      </select>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" placeholder="example@gmail.com" class="form-control"
        value="{{ $user->email }}" />
</div>

<div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" placeholder="******" class="form-control" value="{{ $user->password }}" />
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control" />
    @if ($user->image)
        <img width="80" src="{{ asset('uploads/users/' . $user->image) }}">
    @endif
</div>

<div class="mb-3">
    <label>Address</label>
    <input type="text" name="address" placeholder="example_gaza" class="form-control" value="{{ $user->address }}" />
</div>

<div class="mb-3">
    <label>phone</label>
    <input type="text" name="phone" placeholder="+972597854778" class="form-control" value="{{ $user->phone }}" />

</div>
