@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" method="post" action="{{ route('production-store') }}">
			@csrf
			<div class="row">

			<div class="input-field">
				<table class="table table-bordered" id="table_field">
					  <tr>
						<th>Category</th>
						<th>Product Information</th>
						<th>Stock/Metric Ton</th> 
						<th>Quantity/Metric Ton</th>
						<th>Action</th>
					</tr>
					<tr>
						
						  <td>
							<select id="category" name="category[]" class="form-control category" required="" >
								<option value="" selected="" disabled="">Select Category</option>
								@foreach($categories as $category)
									 <option value="{{ $category->id }}">{{ $category->category_name }}</option>	
								@endforeach
							</select>

						</td>
						<td>
							<select id="item" name="item[]" class="form-control item" required="" >
								<option value="" selected="" disabled="">Select Product</option>
								{{-- @foreach($products as $product)
									 <option value="{{ $product->id }}">{{ $product->product_name }} ({{$product->product_code}})</option>	
								@endforeach --}}
							</select>

						</td>
						  <td><input class="form-control stock" type="text" id="stock" name="stock[]" required="" readonly></td>
						
						  <td><input class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td>
						  <td>
							<a name="add" id="add" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a>
						</td>
					</tr>
				</table>
				
					{{-- <a type="submit" name="save" id="save" class="btn bg-gradient-dark mb-0">&nbsp;&nbsp;Save Production</a> --}}
					<input class="btn bg-gradient-primary mb-0" type="submit" name="save" id="save" value="
					Save Production">
				
			</div>
	  </form>
	</div>
</div>
</div>
</div>

</div>

@include('admin.body.footer')

{{-- TRIAL END --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script>
	// Add a search field to the dropdown
	$("#mySearch").on("keyup", function() {
	  var value = $(this).val().toLowerCase();
	  $("#mySelect option").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  });
	});
  </script>
  
  <script>


$(document).ready(function(){
    var html = '<tr><td><select class="form-control category" required=""><option value="" selected="" disabled="">Select Category</option>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->category_name }}</option>@endforeach</select></td><td><select class="form-control item" required=""><option value="" selected="" disabled="">Select Product</option>@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->product_name }} ({{$product->product_code}})</option>@endforeach</select></td><td><input class="form-control stock" type="text" name="stock[]" required="" readonly></td><td><input class="form-control qnty" type="number" name="qnty[]" required=""></td><td><a name="remove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';

    // Add new row
    $("#add").click(function(){
        $("#table_field").append(html);
    });

    // Remove row
    $("#table_field").on('click', 'a[name="remove"]', function () {
        $(this).closest('tr').remove();
        totalPrice();
        duePrice();
    });

    // Update product options when category changes
    $("#table_field").on('change', '.category', function () {
        var categoryId = $(this).val();
        var itemDropdown = $(this).closest('tr').find('.item');

        // Make an AJAX request to fetch products based on the selected category
        fetch('/api/products/' + categoryId)
            .then(response => response.json())
            .then(data => {
                // Update the product options in the current row
                itemDropdown.empty().append('<option value="" selected="" disabled="">Select Product</option>');

                data.forEach(product => {
                    itemDropdown.append('<option value="' + product.id + '">' + product.product_name + ' (' + product.product_code + ')</option>');
                });
            })
            .catch(error => {
                console.error('Error fetching products:', error);
            });
    });

	  // Trigger change event on the category dropdown in the first row to load initial products
	  $("#table_field").find('tr:first .category').change();
});

// $("#item").change(function() {
//       // get the selected option value
//       var selectedOption = $(this).val();
// 		// console.log('hello');
//       // make an AJAX request to the server
//       $.get('/raw/get-data-product', { option: selectedOption }, function(data) {
//         // update the field with the response data
//         $("#stock").val(data.qty);
//       });
//     });

	$("#table_field").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var stock = $(this).closest("tr").find(".stock");
		console.log("Product ID: " + product_id);
		$.get('/raw/get-data-product', { option: product_id }, function(data) {
        // update the field with the response data
		console.log("AJAX response:", data);
		// if(data.qty == null){
		// 	stock.val(0);
		// }else{
		// 	stock.val(data.qty);
		// }
		$("#stock").val(data.qty);
			
      });
		// price.val(product_id);
               
    });



	// $(document).ready(function(){
	// 	var html='<tr><td><select id="category" name="category[]" class="form-control" required=""><option value="" selected="" disabled="">Select Product</option>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->category_name }}</option>@endforeach</select><td><select id="item" name="item[]" class="form-control" required="" ><option value="" selected="" disabled="">Select Product</option>@foreach($products as $product) <option value="{{ $product->id }}">{{ $product->product_name }} ({{$product->product_code}})</option>	@endforeach</select></td><td><input class="form-control stock" type="text" id="stock" name="stock[]" required="" readonly></td><td><input class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td><td><a name="remove" id="remove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';
	
	// 	// var x =1;
	//   $("#add").click(function(){
	// 	$("#table_field").append(html);
	//   });
	//   $("#table_field").on('click', '#remove', function () {
    // $(this).closest('tr').remove();
	// totalPrice();
	// duePrice();
	// });


	// $("#item").change(function() {
    //   // get the selected option value
    //   var selectedOption = $(this).val();
	// 	// console.log('hello');
    //   // make an AJAX request to the server
    //   $.get('/get-data-product', { option: selectedOption }, function(data) {
    //     // update the field with the response data
    //     $("#stock").val(data.qty);
    //   });
    // });

	// $("#table_field tbody").on("change", "select[name='item[]']", function () {
	// 	var product_id = $(this).val();
	// 	var stock = $(this).closest("tr").find(".stock");
	// 	$.get('/get-data-product', { option: product_id }, function(data) {
    //     // update the field with the response data
	// 	if(data.qty == null){
	// 		stock.val(0);
	// 	}else{
	// 		stock.val(data.qty);
	// 	}
			
    //   });
	// 	// price.val(product_id);
               
    // });

	// });
</script>


{{-- <script>
    function updateProducts() {
        // Get the selected category value
        var categoryId = document.getElementById("category").value;

        // Make an AJAX request to fetch products based on the selected category
        // Replace the URL with the actual endpoint to fetch products
        // You may need to adjust this based on your backend API structure
        fetch('/api/products/' + categoryId)
            .then(response => response.json())
            .then(data => {
                // Update the product options in the second dropdown
                var productSelect = document.getElementById("item");
                productSelect.innerHTML = '<option value="" selected="" disabled="">Select Product</option>';

                data.forEach(product => {
                    var option = document.createElement("option");
                    option.value = product.id;
                    option.text = product.product_name + ' (' + product.product_code + ')';
                    productSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching products:', error);
            });
    }
</script> --}}

@endsection