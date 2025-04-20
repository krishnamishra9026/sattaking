<div class="filter">
    <div class="card">
        <div class="card-body">
            <form>
            <div class="row">
                <div class="col-sm-3 mb-4">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" value="{{ request()->get('date') }}" class="form-control" id="postedon">
                </div>
                <div class="col-sm-3 mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ request()->get('name') }}" class="form-control" id="name">
                </div>
                <div class="col-sm-3 mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" value="{{ request()->get('email') }}" class="form-control" id="email">
                </div>
                <div class="col-sm-3 mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" name="phone" value="{{ request()->get('phone') }}" class="form-control" id="phone">
                </div>
                <div class="col-sm-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="">Please select</option>
                        <option value="Active" @if(request()->get('status') == "Active") selected @endif >Active</option>
                        <option value="Inactive" @if(request()->get('status') == "Inactive") selected @endif >Inactive</option>
                    </select>
                </div>
                <div class="col-sm-3 mt-9">
                    <a href="{{ route('admin.seeker.index') }}" class="btn btn-success min-w-100px fw-bold">Reset</a>
                    <button type="submit" class="btn btn-primary min-w-100px fw-bold">Filter</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
