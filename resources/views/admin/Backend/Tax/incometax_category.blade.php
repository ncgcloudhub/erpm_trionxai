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
                                                <th>Value</th>
                                                <th>Category Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $cat)
                                                <tr>
                                                    <td>{{ $cat->value }}</td>
                                                    <td>{{ $cat->category_name }}</td>
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

            <!-- Add New Category Form -->
            <div class="col-5">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="box">
                            <div class="box-header with-border">
                                <h6 class="box-title">Add New Category</h6>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <form method="post" action="{{ route('incometax.category.add') }}">
                                        @csrf
                                        <div class="form-group">
                                            <h6>Value</h6>
                                            <div class="controls">
                                                <input type="text" name="value" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6>Category Name</h6>
                                            <div class="controls">
                                                <input type="text" name="category" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Category">
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

@endsection
