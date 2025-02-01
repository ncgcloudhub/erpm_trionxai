@extends('admin.aDashboard')

@section('admins')

<div class="container-full">
    <section class="content">
        <div class="row">

            <!-- Display Existing Categories -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Value</th>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $cat)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                                                    <td>{{ $cat->value }}</td>
                                                    <td>{{ $cat->category_name }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" onclick="editCategory({{ $cat->id }}, '{{ $cat->value }}', '{{ $cat->category_name }}')" class="btn btn-info btn-sm">Edit</a>
                                                        <a href="{{ route('immigration.category.delete', $cat->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- /.box -->
                    </div>
                </div>
            </div>

            <!-- Add/Edit Category Form -->
            <div class="col-5">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="box">
                            <div class="box-header with-border">
                                <h6 class="box-title">Add / Edit Category</h6>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <form method="post" action="{{ route('immigration.category.add') }}" id="categoryForm">
                                        @csrf
                                        <input type="hidden" id="categoryId" name="category_id">

                                        <div class="form-group">
                                            <h6>Value</h6>
                                            <div class="controls">
                                                <input type="text" id="categoryValue" name="value" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6>Category Name</h6>
                                            <div class="controls">
                                                <input type="text" id="categoryName" name="category" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" id="submitButton" class="btn btn-rounded btn-primary mb-5" value="Add Category">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- /.box -->
                    </div>
                </div>
            </div>

        </div> <!-- /.row -->
    </section>
</div>

<script>
function editCategory(id, value, category) {
    document.getElementById('categoryId').value = id;
    document.getElementById('categoryValue').value = value;
    document.getElementById('categoryName').value = category;
    
    // Ensure the correct route is set
    let form = document.getElementById('categoryForm');
    form.action = "/incometax/immigration/category/update/" + id;
    form.method = "POST";  // Keep POST but include _method=PUT

    // Change button text for clarity
    document.getElementById('submitButton').value = "Update Category";

    // Add hidden input for method spoofing
    let methodInput = document.createElement("input");
    methodInput.type = "hidden";
    methodInput.name = "_method";
    methodInput.value = "PUT";
    
    // Remove existing method input if any
    let oldMethodInput = document.querySelector("input[name='_method']");
    if (oldMethodInput) oldMethodInput.remove();

    form.appendChild(methodInput);
}

</script>

@endsection
