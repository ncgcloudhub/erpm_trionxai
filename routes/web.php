<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\categoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PayrollController;
use App\Http\Controllers\Backend\productController;
use App\Http\Controllers\Backend\ShipExpenseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\IncomeTaxController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\ConveyanceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Backend\subCategoryController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\homePageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ChalanController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\WishlistController;
use App\Models\Brand;
use App\Models\Schedule;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Notice;
use App\Models\Product;
use App\Models\slider;
use App\Models\Bank;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\ServiceInvoice;
use App\Models\TodaysProduction;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\AcidProduct;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/write', function () {
    $title = '';
    $content = '';
    return view('admin.Backend.Site.writer', compact('title', 'content'));
})->name('openai.view');


Route::post('/write/generate', [SiteSettingController::class, 'openaigenerate']);



Route::get('/a', function () {
    $products = Product::where('status',1)->inRandomOrder()->get();
    $sliders = Slider::where('status',1)->limit(4)->inRandomOrder()->get();
    $categories = Category::orderBy('category_name','ASC')->get();
    $categories_feature = Category::where('feature',1)->orderBy('category_name','ASC')->get();
    $brands = Brand::orderBy('brand_name','ASC')->get();

    $best_seller = Product::where('status',1)->where('best_seller',1)->inRandomOrder()->get();
    $sale = Product::where('status',1)->where('sale',1)->inRandomOrder()->get();

    $new = Product::where('status',1)->where('new',1)->inRandomOrder()->get();
    $combo = Product::where('status',1)->where('combo',1)->inRandomOrder()->limit(6)->get();

    $justforyou = Product::where('status',1)->inRandomOrder()->get();

    return view('frontend.index', compact('categories', 'sliders', 'products','best_seller','sale','new','combo','justforyou','brands','categories_feature'));
    })->name('homepagee');



Route::middleware('admin:admin')->group(function (){
    Route::get('/', [Admincontroller::class, 'loginForm'])->name('/');
    Route::post('admin/login', [Admincontroller::class, 'store'])->name('admin.login');
});

// Admin All Routes
    Route::get('admin/logout', [Admincontroller::class, 'destroy'])->name('admin.logout');

    Route::get('admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

    Route::get('/delete/{id}', [AdminProfileController::class, 'DeleteAllUsers'])->name('delete.alluser');
 

// FOR ADMIN
Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'

])->group(function () {
    Route::get('/admin/dashboard', function () {

        // $dues = Customer::where('balance','>', 1)->get();
        // $customers = Customer::orderBy('customer_name','ASC')->get();
        $customerssum = Category::count();
        // $products = Product::orderBy('product_name','ASC')->get();
        $productssum = Product::count();
        $tcustomer = Customer::count();
        $banks = Bank::where('balance','>', 1)->get();
        // $stock = Product::sum('qty');
        $tsale = Sales::count();
        $totalsale = Sales::sum('grand_total');
        $notices = Notice::where('status','=', 1)->orderBy('id','DESC')->get();
        // $totalpurchase = Purchase::sum('grand_total');
        $servicetotal = ServiceInvoice::sum('grand_total');
        $inventory = AcidProduct::find(1);
        $capital_due = Bank::find(5);
        $total_balance = Bank::sum('balance');
        // $customer_due = Customer::sum('cusDue');
        $todays_production = TodaysProduction::orderBy('id','DESC')->first();
        $lastSale = Sales::orderBy('id','DESC')->first();
        $today = Carbon::today();
        $last5Sales = Sales::orderBy('id','DESC')->limit(10)->get();
        $schedules = Schedule::whereDate('schedule_date', $today)->orderBy('time', 'ASC')->get();
        $topUsers = DB::table('sales')
            ->select('user_id', DB::raw('SUM(grand_total) as total_sales'), DB::raw('COUNT(*) as sale_count'))
            ->whereYear('created_at', '=', now()->year)
            ->whereMonth('created_at', '=', now()->month)
            ->groupBy('user_id')
            ->orderBy('total_sales', 'desc')
            ->take(4)
            ->get();

            $userIdArray = $topUsers->pluck('user_id')->toArray();
            $users = DB::table('admins')->whereIn('id', $userIdArray)->select('id', 'name')->get();

            $topProducts = Category::orderBy('id','DESC')->where('assign_to',Auth::guard('admin')->user()->id)->get();
            $projecttasks = Product::orderBy('id','DESC')->where('assign_to',Auth::guard('admin')->user()->id)->get();
           

    //         $topProductsByCategory = DB::table('products')
    // ->select('categories.category_name', 'products.product_name', DB::raw('SUM(sales_items.qty) as sale_count'))
    // ->join('categories', 'products.category_id', '=', 'categories.id')
    // ->join('sales_items', 'products.id', '=', 'sales_items.product_id')
    // ->join('sales', 'sales_items.sales_id', '=', 'sales.id')
    // ->whereYear('sales.created_at', '=', now()->year)
    // ->whereMonth('sales.created_at', '=', now()->month)
    // ->groupBy('categories.category_name', 'products.product_name')
    // ->orderBy('categories.category_name')
    // ->orderBy('sale_count', 'desc')
    // ->get();

    // $topProductsByCategoryGrouped  = $topProductsByCategory->groupBy('category_name');


        return view('admin.adminindex', compact('tsale','todays_production','tcustomer','inventory','schedules','notices','banks','customerssum','productssum','totalsale','lastSale','last5Sales','capital_due','total_balance','projecttasks','topProducts','topUsers','users', 'servicetotal'));
    })->name('admin.dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/user/logout', [homePageController::class, 'UserLogout'])->name('user.logout');

// Route::get('/admin/dashboard', function () {
//     return view('admin.adminIndex')->name('brand');
// });

Route::prefix('brand')->group(function(){

    Route::get('/view', [Admincontroller::class, 'BrandView'])->name('all.brand');
    Route::get('/alls/view', [BrandController::class, 'BrandsView'])->name('brand.view');
    
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    
    });

   


    // Admin Category all Routes  
Route::prefix('category')->group(function(){

    Route::get('/', [categoryController::class, 'CategoryView'])->name('category.view');
    
    Route::post('/store', [categoryController::class, 'CategoryStore'])->name('category.store');
   
    Route::get('/view/raw', [categoryController::class, 'RawCategoryView'])->name('raw.category.view');
    
    Route::post('/store/raw', [categoryController::class, 'RawCategoryStore'])->name('raw.category.store');
    
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    Route::get('/edit/raw/{id}', [CategoryController::class, 'RawCategoryEdit'])->name('raw.category.edit');
    
    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    
    // Admin Sub Category All Routes
    
    Route::get('/sub/view', [subCategoryController::class, 'SubCategoryView'])->name('subCategory.view');
    
    Route::post('/sub/store', [subCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    
    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    
    
    });

    // REPORTS
    Route::prefix('reports')->group(function(){

        Route::get('/form', [ReportController::class, 'ReportsForm'])->name('reports.form');

        Route::post('/filter', [ReportController::class, 'ReportFilter'])->name('report.filter');

        Route::post('department/filter', [ReportController::class, 'ReportDepartmentFilter'])->name('report.department.filter');

        Route::post('employee/expense/filter', [ReportController::class, 'ReportEmployeeExpenseFilter'])->name('report.expenseType.filter');

        Route::post('/employee/sale/filter', [ReportController::class, 'ReportEmployeeSaleFilter'])->name('report.employee.filter.sale');

        Route::post('/download', [ReportController::class, 'DownloadPDF'])->name('download.pdf.filter');


        // Route::post('/store', [SalesController::class, 'SalesStore'])->name('sales.store');

        Route::get('/details/{id}', [PurchaseController::class, 'PurchaseDetails'])->name('purchase.details');
    
        Route::get('/download/{id}', [SalesController::class, 'DownloadSale'])->name('sale.download');
        
        Route::get('/filter', [SalesController::class, 'SaleFilterView'])->name('sale.filter.view');

      
        });

    // RETURN
    Route::prefix('return')->group(function(){

        Route::get('/manage/chalan', [ReturnController::class, 'ReturnManage'])->name('return.manage');

        Route::get('/detailss/{id}', [ReturnController::class, 'MakeReturn'])->name('return.details.view');

        Route::post('/store', [ReturnController::class, 'ReturnStore'])->name('return.store');

        Route::get('/manage/returned-products', [ReturnController::class, 'ReturnedManage'])->name('returned.manage');

        Route::get('/details/{id}', [ReturnController::class, 'ReturnedDetails'])->name('returned.details.view');
      
        });


// Customer 

    
// Route::prefix('customer')->group(function(){
    
//     Route::get('/add', [CustomerController::class, 'CustomerAdd'])->name('customer.add');

//     Route::get('/manage', [CustomerController::class, 'CustomerManage'])->name('customer.manage');

//     Route::get('/view/{id}', [CustomerController::class, 'CustomerView'])->name('customer.view');
    
//     Route::post('/store', [CustomerController::class, 'CustomerStore'])->name('customer.store');
    
//     Route::get('/edit/{id}', [CustomerController::class, 'CustomerEdit'])->name('customer.edit');
    
//     Route::post('/update', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
    
//     Route::get('/delete/{id}', [CustomerController::class, 'CustomerDelete'])->name('customer.delete');
    
    
//     });

// Student
    Route::prefix('student')->group(function(){

        Route::get('/add', [StudentController::class, 'StudentAdd'])->name('student.add');

        Route::get('/manage', [StudentController::class, 'StudentManage'])->name('student.manage');
    
        Route::get('/view/{id}', [StudentController::class, 'StudentView'])->name('student.view');
        
        Route::post('/store', [StudentController::class, 'StudentStore'])->name('student.store');
        
        Route::get('/edit/{id}', [StudentController::class, 'StudentEdit'])->name('student.edit');
    
        Route::post('/update', [StudentController::class, 'StudentUpdate'])->name('student.update');

        Route::get('/delete/{id}', [StudentController::class, 'StudentDelete'])->name('student.delete');
        
        });


        // Course
    Route::prefix('course')->group(function(){

        Route::get('/add', [CourseController::class, 'CourseAdd'])->name('course.add');

        Route::get('/manage', [CourseController::class, 'CourseManage'])->name('course.manage');
    
        Route::get('/view/{id}', [CourseController::class, 'CourseView'])->name('course.view');
        
        Route::post('/store', [CourseController::class, 'CourseStore'])->name('course.store');
        
        Route::get('/edit/{id}', [CourseController::class, 'CourseEdit'])->name('course.edit');
    
        Route::post('/update', [CourseController::class, 'CourseUpdate'])->name('course.update');

        Route::get('/delete/{id}', [CourseController::class, 'CourseDelete'])->name('course.delete');
        
        });


          //Notice
    Route::get('/notice', [NoticeController::class, 'NoticeView'])->name('notice.view');
    //Notice Add
    Route::post('/notice/add', [NoticeController::class, 'NoticeAdd'])->name('notice.add');

    Route::get('/site/settings', [NoticeController::class, 'SiteView'])->name('site.view');
    
    //Site Settting
    Route::post('/site/add', [NoticeController::class, 'SiteAdd'])->name('site.add');

    Route::post('/site/store', [NoticeController::class, 'SiteStore'])->name('site.store');


    Route::prefix('schedule')->group(function(){
    
        Route::get('/view', [ScheduleController::class, 'ScheduleView'])->name('schedule.view');
        
        Route::post('/store', [ScheduleController::class, 'ScheduleStore'])->name('schedule.store');

        Route::get('/manage', [ScheduleController::class, 'ManageSchedule'])->name('manage-schedule');
        
        Route::post('/filter', [ScheduleController::class, 'ScheduleFilter'])->name('schedule.filter');

        // Route::get('/edit/{id}', [CustomerController::class, 'CustomerEdit'])->name('customer.edit');
        
        // Route::post('/update', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
        
        // Route::get('/delete/{id}', [CustomerController::class, 'CustomerDelete'])->name('customer.delete');
        
        });

        Route::get('/download', [ScheduleController::class, 'download'])->name('download');
        
    // Admin Location/Store All Routes 

    Route::prefix('location')->group(function(){

        Route::get('/view', [LocationController::class, 'LocationView'])->name('all.location');
        // Route::get('/alls/view', [Admincontroller::class, 'BrandsView'])->name('brand.view');
        
        Route::post('/store', [LocationController::class, 'LocationStore'])->name('store.location.store');
        
        Route::get('store/edit/{id}', [LocationController::class, 'LocationEdit'])->name('store.location.edit');
        
        Route::post('store/update', [LocationController::class, 'LocationUpdate'])->name('store.location.update');

        Route::get('store/delete/{id}', [LocationController::class, 'LocationDelete'])->name('store.location.delete');
        
        });

    // Admin Products All Routes 

    

Route::prefix('project')->group(function(){

    Route::get('/add', [ProjectController::class, 'AddProject'])->name('project.view');

    Route::get('/manage', [ProjectController::class, 'ManageProject'])->name('project.manage');

    Route::post('/store', [ProjectController::class, 'StoreProject'])->name('project.store');

    Route::post('/update/comment', [ProjectController::class, 'UpdateComment'])->name('update.comment');

    Route::get('/task/add', [ProjectController::class, 'AddTask'])->name('project.add.task');

    Route::get('/view/details/{id}', [ProjectController::class, 'ProjectDetails'])->name('project.view.details');

    Route::get('/task/manage', [ProjectController::class, 'ManageTask'])->name('project.manage.task');
   
    Route::post('/task/store', [ProjectController::class, 'StoreProjectTask'])->name('project.store.tasks');

    Route::get('/edit/{id}', [ProjectController::class, 'EditProject'])->name('project.edit');    

    Route::get('/task/edit/{id}', [ProjectController::class, 'EditProjectTask'])->name('project.task.edit');

    Route::get('/task/view/{id}', [ProjectController::class, 'ViewProjectTask'])->name('project.task.view');

    Route::post('/update', [ProjectController::class, 'ProjectUpdate'])->name('project.update');

    Route::post('/task/update', [ProjectController::class, 'ProjectUpdateTask'])->name('project.update.task');

    // Route::get('/delete/{id}', [ProjectController::class, 'ProjectDelete'])->name('project.delete');

    Route::get('/deletes/{id}', [ProjectController::class, 'ProjectsDelete'])->name('projects.delete');

    Route::get('/task/delete/{id}', [ProjectController::class, 'ProjectTaskDelete'])->name('projects.tasks.deletes');


    // Route::get('/add/raw/materials', [productController::class, 'AddRawProduct'])->name('raw.product.add');
    
    // Route::post('/store/raw/materials', [productController::class, 'StoreRawProduct'])->name('raw.product-store');

    // Route::get('/manage/raw/materials', [ProductController::class, 'ManageRawProduct'])->name('raw.manage-product');

    // Route::get('/raw/edit/{id}', [ProductController::class, 'EditRawProduct'])->name('raw.product.edit');
    
    
    
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
     
    });


    Route::prefix('incometax')->group(function(){

        Route::get('/project/add', [IncomeTaxController::class, 'AddProject'])->name('taxproject.view');
    
        Route::get('/project/manage', [IncomeTaxController::class, 'ManageProject'])->name('taxproject.manage');
    
        Route::post('/project/store', [IncomeTaxController::class, 'StoreProject'])->name('taxproject.store');
    
        Route::get('/task/add', [IncomeTaxController::class, 'AddTask'])->name('taxproject.add.task');
    
        Route::get('/project/view/details/{id}', [IncomeTaxController::class, 'ProjectDetails'])->name('taxproject.view.details');
    
        Route::get('/task/manage', [IncomeTaxController::class, 'ManageTask'])->name('taxproject.manage.task');
       
        Route::post('/task/store', [IncomeTaxController::class, 'StoreProjectTask'])->name('taxproject.store.tasks');
    
        Route::get('/project/edit/{id}', [IncomeTaxController::class, 'EditProject'])->name('taxproject.edit');    
    
        Route::get('/task/edit/{id}', [IncomeTaxController::class, 'EditProjectTask'])->name('taxproject.task.edit');
    
        Route::get('/task/view/{id}', [IncomeTaxController::class, 'ViewProjectTask'])->name('taxproject.task.view');
    
        Route::post('/project/update', [IncomeTaxController::class, 'ProjectUpdate'])->name('taxproject.update');
    
        Route::post('/task/update', [IncomeTaxController::class, 'ProjectUpdateTask'])->name('taxproject.update.task');
    
        Route::get('/project/deletes/{id}', [IncomeTaxController::class, 'ProjectsDelete'])->name('taxprojects.delete');
    
        Route::get('/task/delete/{id}', [IncomeTaxController::class, 'ProjectTaskDelete'])->name('taxprojects.tasks.deletes');

         
    Route::get('/customer/add', [CustomerController::class, 'CustomerAdd'])->name('customer.add');

    Route::get('/customer/manage', [CustomerController::class, 'CustomerManage'])->name('customer.manage');

    Route::get('/customer/view/{id}', [CustomerController::class, 'CustomerView'])->name('customer.view');
    
    Route::post('/customer/store', [CustomerController::class, 'CustomerStore'])->name('customer.store');
    
    Route::get('/customer/edit/{id}', [CustomerController::class, 'CustomerEdit'])->name('customer.edit');
    
    Route::post('/customer/update', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
    
    Route::get('/customer/delete/{id}', [CustomerController::class, 'CustomerDelete'])->name('customer.delete');

    Route::get('/export', [IncomeTaxController::class, 'ExportCustomers'])->name('export.tax.customers');

    Route::get('/export/task', [IncomeTaxController::class, 'ExportTaskCustomers'])->name('export.tasks.customers');

    Route::get('/import/customers', [IncomeTaxController::class, 'ImportCustomers'])->name('import.tax.customers');
   
    Route::get('/import/tasks/customers', [IncomeTaxController::class, 'ImportTaskCustomers'])->name('import.tasks.customers');

    Route::post('/import', [IncomeTaxController::class, 'ImportTaxCustomers'])->name('import.customers');
         
    });


    Route::get('/api/products/{categoryId}', [ProductionController::class, 'getProducts']);

    Route::get('/raw/get-data-product', [ProductionController::class, 'getRawDataProduct']);

    Route::prefix('production')->group(function(){

        Route::get('/add/plastic', [ProductionController::class, 'AddPlasticProduction'])->name('plastic.production.add');
        
        Route::post('/store', [ProductionController::class, 'StoreProduction'])->name('production-store');

       

        // Route::get('/todays', [ProductionController::class, 'AddTodaysProduction'])->name('todays-production');
        
        // Route::post('todays/store', [ProductionController::class, 'StoreTodaysProduction'])->name('todays-production-store');


        // Route::get('/manage', [ProductionController::class, 'ManageProduct'])->name('production-product');
        
        // Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
        
        // Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
        
        // Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
        
        // Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
        
        // Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
        
        // Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
        
        // Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
        
        // Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
         
        });



    // Admin Order All Routes 

    Route::prefix('orders')->group(function(){

    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');

    Route::get('/pending/orders/delete/{order_id}', [OrderController::class, 'PendingOrdersDelete'])->name('pending.order.delete');

    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');

    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

    // Update Status 
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');

    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');

    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');


    
    
    });


        //// Frontend All Routes /////

    // Frontend Product Details Page url 
    Route::get('/product/details/{id}', [homePageController::class, 'ProductDetails']);

    // Frontend Product Tags Page 
    Route::get('/product/tag/{tag}', [homePageController::class, 'TagWiseProduct']); 

    // Frontend Category wise Data
    Route::get('/category/product/{cat_id}', [homePageController::class, 'CategoryWiseProduct']);

    // Frontend SubCategory wise Data
    Route::get('/subcategory/product/{subcat_id}/{slug}', [homePageController::class, 'SubCatWiseProduct']);
    
    Route::get('/subcategory/product/{subcat_id}', [homePageController::class, 'SubCatWiseeProduct']);

    Route::get('/todays/offer', [homePageController::class, 'TodaysOffer'])->name('todays.offer');

    Route::get('/location/store', [homePageController::class, 'LocationStore'])->name('frontend.location');

    // Product View Modal with Ajax
    Route::get('/product/view/modal/{id}', [homePageController::class, 'ProductViewAjax']); 

    /// Product Search Route 
    Route::post('/search', [homePageController::class, 'ProductSearch'])->name('product.search');

    // Advance Search Routes 
    Route::post('search-product', [homePageController::class, 'SearchProduct']);


    // Add to Cart Store Data
    Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']); 

    // Get Data from mini cart
    Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

    // Remove mini cart
    Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']); 

    // Add to Wishlist
    Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']); 


    
    Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){

    // Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']); 

    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');

    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

    Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');

    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');

    Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');

    /// Order Traking Route 
    Route::get('/order/track', [AllUserController::class, 'TrackOrder'])->name('track.orders');
    
    Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking'); 

    }); 

    // Confirmed Order User
    Route::get('/confirmed/order/{order_id}', [CashController::class, 'ConfirmedOrders'])->name('confirmed.order');

    // Add to cart | USER
    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

    Route::get('user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

    Route::get('user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

    
    // Admin Coupons All Routes 
    Route::prefix('coupons')->group(function(){

    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');

    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');

    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');

    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
    
    
    });

    // Admin Shipping All Routes 
    Route::prefix('shipping')->group(function(){

    // SHIPPING DIVISIONS
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
        
    // Ship District 
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    // Ship State 
    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');

    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');

    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');

    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');

    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
                
    }); 


    // Admin Reports Routes 
    Route::prefix('reports')->group(function(){

    Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');

    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');

    
    
    });



    // Admin Get All User Routes 
    Route::prefix('alluser')->group(function(){

    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
    
    
    });


    // Admin Site Setting Routes 
    Route::prefix('setting')->group(function(){

    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');

    Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
    
    Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting'); 

    Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
    
    });


    // Admin Return Order Routes 
    Route::prefix('return')->group(function(){

    Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');

    Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');
    
    });

    // Admin Manage Review Routes 
    Route::prefix('review')->group(function(){

    Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');
    
    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');
    
    Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');

    Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
    
    });

    // Admin Manage Stock Routes 
    Route::prefix('stock')->group(function(){

    Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
    
    
    });


    // Admin User Role Routes 
    Route::prefix('adminuserrole')->group(function(){

    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');

    Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');

    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');

    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');

    Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
    
    Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');
    
    });




    /// Frontend Product Review Routes

    Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');







    // Frontend Coupon Option
    Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

    Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

    Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
   

    // Checkout Routes 
    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

    Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

    Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);

    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


    // 


    // Frontend User Profile
    Route::get('/user/logout', [homePageController::class, 'UserLogout'])->name('user.logout');

    Route::get('/user/profile', [homePageController::class, 'UserProfile'])->name('user.profile');

    Route::post('/user/profile/store', [homePageController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/change/password', [homePageController::class, 'UserChangePassword'])->name('change.password');
    
    Route::post('/user/password/update', [homePageController::class, 'UserPasswordUpdate'])->name('user.password.update');


    // QUOTATION
    // Route::prefix('quotation')->group(function(){
    // Route::get('/add', [QuotationController::class, 'index'])->name('admin.quotation');
    // Route::get('/manage', [QuotationController::class, 'ManageQuotation'])->name('all.quotation');
    
    // Route::post('/store-input-fields', [QuotationController::class, 'saveUser'])->name('repeater');
    
    // Route::get('/view/{quotation_id}', [QuotationController::class, 'viewQuotation'])->name('view.quotation');
    
    // Route::get('/invoice_download/{quotation_id}', [QuotationController::class, 'AdminInvoiceDownload'])->name('invoice.download');
    // });
    Route::get('/get-balance', [BankController::class, 'getBalance']);

    Route::get('/get-data', [QuotationController::class, 'getData']);
    Route::get('/get-customer', [QuotationController::class, 'getCustomer']);
    Route::get('/get-vendor', [QuotationController::class, 'getVendor']);
    Route::get('/get-employee-data', [ConveyanceController::class, 'getData']);
    Route::get('/geta-data-product', [QuotationController::class, 'getDatasProduct']);
    
    Route::get('/get-price', [QuotationController::class, 'getProductPrice']);

    Route::get('/get-unit-price', function(Request $request) {
        // get the product ID from the query string
        $productId = $request->query('productId');
      
        // $unitPrice = Product::where('id',$productId)->value('unit_price')->get();
        // query the database for the unit price of the product
        $unitPrice = DB::table('products')->where('id', $productId)->value('selling_price');
      
        // return the unit price as a JSON response
        return response()->json(['unitPrice' => $unitPrice]);
      });


    //   ERPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP

    Route::prefix('bank')->group(function(){
    
        Route::get('/view', [BankController::class, 'BankView'])->name('bank.view');
        
        Route::post('/store', [BankController::class, 'BankStore'])->name('bank.store');
        
        Route::get('/edit/{id}', [BankController::class, 'BankEdit'])->name('bank.edit');

        Route::get('deposit/view', [BankController::class, 'DepositView'])->name('deposit.view');

        Route::get('deposit/all', [BankController::class, 'DepositAll'])->name('deposit.all');

        Route::post('deposit/store', [BankController::class, 'DepositStore'])->name('deposit.store');

        Route::get('/delete/{id}', [BankController::class, 'BankDelete'])->name('bank.delete');
        
        Route::post('/update', [BankController::class, 'BankUpdate'])->name('bank.update');
        
        // Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
        
        // Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
        
        });


    Route::prefix('supplier')->group(function(){

        Route::get('/add', [SupplierController::class, 'SupplierAdd'])->name('supplier.add');

        Route::get('/view/{id}', [SupplierController::class, 'SupplierView'])->name('supplier.view');
        
        Route::post('/store', [SupplierController::class, 'SupplierStore'])->name('supplier.store');

        Route::get('/manage', [SupplierController::class, 'SupplierManage'])->name('supplier.manage');
        
        Route::get('/edit/{id}', [SupplierController::class, 'SupplierEdit'])->name('supplier.edit');
        
        Route::post('/update', [SupplierController::class, 'SupplierUpdate'])->name('supplier.update');
        
        Route::get('/delete/{id}', [SupplierController::class, 'SupplierDelete'])->name('supplier.delete');
        
        // Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
        
        // Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
        
        });


        Route::prefix('purchase')->group(function(){

            Route::get('/add', [PurchaseController::class, 'PurchaseAdd'])->name('purchase.add');

            Route::get('/view/{id}', [PurchaseController::class, 'PurchaseView'])->name('purchase.view');
            
            Route::post('/store', [PurchaseController::class, 'PurchaseStore'])->name('purchase.store');
    
            Route::get('/manage', [PurchaseController::class, 'PurchaseManage'])->name('purchase.manage');

            Route::get('/edit/{id}', [PurchaseController::class, 'PurchaseEdit'])->name('purchase.edit');

            Route::post('/update', [PurchaseController::class, 'PurchaseUpdate'])->name('purchase.update');

            Route::get('/delete/{id}', [PurchaseController::class, 'PurchaseDelete'])->name('purchase.delete');

            Route::get('/port', [PurchaseController::class, 'PurchaseReachedPort'])->name('purchase.port');

            Route::get('/factory', [PurchaseController::class, 'PurchaseReachedFactory'])->name('purchase.factory');
            // Route::get('/get-stock', [PurchaseController::class, 'getProductStock']);

            Route::get('/get-unit-price', function(Request $request) {
                // get the product ID from the query string
                $productId = $request->query('productId');
              
                // $unitPrice = Product::where('id',$productId)->value('unit_price')->get();
                // query the database for the unit price of the product
                $unitPrice = DB::table('products')->where('id', $productId)->value('selling_price');
              
                // return the unit price as a JSON response
                return response()->json(['unitPrice' => $unitPrice]);
              });
        
            
            // Route::get('/details/{id}', [PurchaseController::class, 'PurchaseDetails'])->name('purchase.details');
            
            // Route::post('/update', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
            
            // Route::get('/delete/{id}', [CustomerController::class, 'CustomerDelete'])->name('customer.delete');
            
            // Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
            
            Route::get('/status/port/{id}', [PurchaseController::class, 'StatusChangePort'])->name('purchase.status.port');
            Route::get('/status/factory/{id}/{inventory}', [PurchaseController::class, 'StatusChangeFactory'])->name('purchase.status.factory');

            // Inventoty/Telephone
            // Route::post('/update-inventory/{id}', [PurchaseController::class, 'updateInventory']);


            });

            
            Route::prefix('sales')->group(function(){

                Route::get('/view', [SalesController::class, 'SalesForm'])->name('sales.view');
                
                Route::post('/store', [SalesController::class, 'SalesStore'])->name('sales.store');

                Route::post('/chalan/store', [SalesController::class, 'SalesChalanStore'])->name('sales.chalan.store');
        
                Route::get('/manage', [SalesController::class, 'ManageSales'])->name('sales.manage');

                Route::get('/download/{id}', [SalesController::class, 'DownloadSale'])->name('sale.download.view');

                Route::get('/details/{id}', [SalesController::class, 'DetailSale'])->name('sales.details.view');

                Route::get('/edit/{id}', [SalesController::class, 'EditSale'])->name('sales.edit.view');

                Route::post('/update/store', [SalesController::class, 'SalesUpdate'])->name('sales.update.store');

                Route::post('/full/paid/{id}', [SalesController::class, 'SalesFullPaid'])->name('sale.full.paid');

                Route::get('/make/chalan/{id}', [SalesController::class, 'MaleSaleChalan'])->name('sales.chalan.make');

                Route::get('/get-stock', [SalesController::class, 'getStock'])->name('get-stock');

                Route::get('/delete/{id}', [SalesController::class, 'SaleDelete'])->name('sale.delete');
                
                Route::get('/inactive/{id}', [SalesController::class, 'SaleInactive'])->name('sale.inactive');
    
                Route::get('/active/{id}', [SalesController::class, 'SaleActive'])->name('sale.active');

                // Route::get('/details/{id}', [PurchaseController::class, 'PurchaseDetails'])->name('purchase.details');
                
                // Route::post('/update', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
                
                // Route::get('/delete/{id}', [CustomerController::class, 'CustomerDelete'])->name('customer.delete');
                
                // Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
                
                // Route::get('/status/port/{id}', [PurchaseController::class, 'StatusChangePort'])->name('purchase.status.port');
                // Route::get('/status/factory/{id}', [PurchaseController::class, 'StatusChangeFactory'])->name('purchase.status.factory');
                
                });

// SERVICE ROUTE
            Route::prefix('sales')->group(function(){

                Route::get('/service/view', [ServiceController::class, 'ServiceForm'])->name('service.view');
                
                Route::post('service/store', [ServiceController::class, 'ServiceStore'])->name('service.store');

                Route::get('service/manage', [ServiceController::class, 'ManageService'])->name('service.manage');

                Route::get('service/download/{id}', [ServiceController::class, 'DownloadService'])->name('service.download.view');

                Route::get('service/details/{id}', [ServiceController::class, 'DetailService'])->name('service.details.view');

                // Route::get('/edit/{id}', [SalesController::class, 'EditSale'])->name('sales.edit.view');

                // Route::post('/update/store', [SalesController::class, 'SalesUpdate'])->name('sales.update.store');

                // Route::get('/make/chalan/{id}', [SalesController::class, 'MaleSaleChalan'])->name('sales.chalan.make');

                Route::get('service/delete/{id}', [ServiceController::class, 'ServiceDelete'])->name('service.delete');
                
                // Route::get('/inactive/{id}', [SalesController::class, 'SaleInactive'])->name('sale.inactive');
    
                // Route::get('/active/{id}', [SalesController::class, 'SaleActive'])->name('sale.active');






                // Route::get('/details/{id}', [PurchaseController::class, 'PurchaseDetails'])->name('purchase.details');
                
                // Route::post('/update', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
                
                // Route::get('/delete/{id}', [CustomerController::class, 'CustomerDelete'])->name('customer.delete');
                
                // Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
                



                // Route::get('/status/port/{id}', [PurchaseController::class, 'StatusChangePort'])->name('purchase.status.port');
                // Route::get('/status/factory/{id}', [PurchaseController::class, 'StatusChangeFactory'])->name('purchase.status.factory');
                
                });

    // Quotation UPDATED
    Route::prefix('quotation')->group(function(){

        Route::get('/view', [QuotationController::class, 'QuotationForm'])->name('quotation.view');
        
        Route::post('/store', [QuotationController::class, 'QuotationStore'])->name('quotation.store');

        Route::get('/manage', [QuotationController::class, 'ManageQuotation'])->name('quotation.manage');

        Route::get('/edit/{id}', [QuotationController::class, 'EditQuotation'])->name('quotation.edit.view');

        Route::post('/update', [QuotationController::class, 'QuotationUpdate'])->name('quotation.update');
        
        Route::get('/download/{id}', [QuotationController::class, 'DownloadQuotation'])->name('quotation.download.view');

        Route::get('/details/{id}', [QuotationController::class, 'DetailQuotation'])->name('quotation.details.view');

        Route::get('/delete/{id}', [QuotationController::class, 'QuotationDelete'])->name('quotation.delete');
        
        });
    // END Quotation


        // Coneveyance
        Route::prefix('coneveyance')->group(function(){

            Route::get('/view', [ConveyanceController::class, 'ConveyanceView'])->name('conveyance.view');
            
            Route::post('/store', [ConveyanceController::class, 'ConveyanceStore'])->name('conveyance.store');
    
            Route::get('/manage', [ConveyanceController::class, 'ManageConveyance'])->name('conveyance.manage');

            Route::get('/approve/{id}', [ConveyanceController::class, 'ConveyanceApprove'])->name('conveyance.approve');
            
            // Route::get('/download/{id}', [QuotationController::class, 'DownloadQuotation'])->name('quotation.download.view');
    
            Route::get('/details/{id}', [ConveyanceController::class, 'DetailConveyance'])->name('conveyance.details.view');

            Route::get('/edit/{id}', [ConveyanceController::class, 'ConveyanceEdit'])->name('conveyance.edit');

            Route::post('/update', [ConveyanceController::class, 'ConveyanceUpdate'])->name('conveyance.update');
    
            Route::get('/delete/{id}', [ConveyanceController::class, 'ConveyanceDelete'])->name('conveyance.delete');
            
            });
        // END Coneveyance



        Route::prefix('chalan')->group(function(){

            Route::get('/view', [ChalanController::class, 'ChalanForm'])->name('chalan.view');
            
            Route::post('/store', [ChalanController::class, 'ChalanStore'])->name('chalan.store');

            Route::get('/details/{id}', [ChalanController::class, 'DetailChalan'])->name('chalan.details.view');
    
            Route::get('/manage', [ChalanController::class, 'ManageChalan'])->name('chalan.manage');

            Route::get('sample/manage', [ChalanController::class, 'ManageSampleChalan'])->name('sample.chalan.manage');

            Route::get('/download/{id}', [ChalanController::class, 'DownloadChalan'])->name('chalan.download.view');

            Route::get('/delete/{id}', [ChalanController::class, 'ChalanDelete'])->name('chalan.delete');

            // Route::get('/port', [PurchaseController::class, 'PurchaseReachedPort'])->name('purchase.port');

            // Route::get('/factory', [PurchaseController::class, 'PurchaseReachedFactory'])->name('purchase.factory');
            // Route::get('/get-stock', [PurchaseController::class, 'getProductStock']);

            // Route::get('/get-unit-price', function(Request $request) {
            //     // get the product ID from the query string
            //     $productId = $request->query('productId');
                
            //     // $unitPrice = Product::where('id',$productId)->value('unit_price')->get();
            //     // query the database for the unit price of the product
            //     $unitPrice = DB::table('products')->where('id', $productId)->value('selling_price');
                
            //     // return the unit price as a JSON response
            //     return response()->json(['unitPrice' => $unitPrice]);
            //   });
        
            
            // Route::get('/details/{id}', [PurchaseController::class, 'PurchaseDetails'])->name('purchase.details');
            
            // Route::post('/update', [CustomerController::class, 'CustomerUpdate'])->name('customer.update');
            
         
            
            // Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
            
            // Route::get('/status/port/{id}', [PurchaseController::class, 'StatusChangePort'])->name('purchase.status.port');
            // Route::get('/status/factory/{id}/{inventory}', [PurchaseController::class, 'StatusChangeFactory'])->name('purchase.status.factory');
            
            });
    


    Route::prefix('expense')->group(function(){

        Route::get('/expense-type', [ExpenseController::class, 'EnpenseTypeView'])->name('expenseType.view');
        Route::post('/expense-type/store', [ExpenseController::class, 'EnpenseTypeStore'])->name('enpenseType.store');
        Route::get('/expense', [ExpenseController::class, 'ExpenseView'])->name('expense.view');
        Route::post('/expense/store', [ExpenseController::class, 'ExpenseStore'])->name('expense.store');
        Route::post('/expense/update', [ExpenseController::class, 'ExpenseUpdate'])->name('expense.update');
        Route::get('/expense/manage', [ExpenseController::class, 'ExpenseManage'])->name('expense.manage');

        Route::get('/approve/{id}', [ExpenseController::class, 'ExpenseApprove'])->name('expense.approve');
        Route::get('/e-edit/{id}', [ExpenseController::class, 'ExpenseEdit'])->name('expense.edit');

        // Route::get('/manage', [PurchaseController::class, 'PurchaseManage'])->name('purchase.manage');

        Route::get('/requisition-type', [RequisitionController::class, 'RequisitionTypeView'])->name('requisitionType.view');
        Route::post('/requisition-type/store', [RequisitionController::class, 'RequisitionTypeStore'])->name('requisitionType.store');
        // Route::get('/requisition/manage', [PurchaseController::class, 'PurchaseManage'])->name('purchase.manage');


        Route::get('/requisition', [RequisitionController::class, 'RequisitionView'])->name('requisition.view');
        Route::post('/requisition/store', [RequisitionController::class, 'RequisitionStore'])->name('requisition.store');
        Route::get('/requisition/manage', [RequisitionController::class, 'RequisitionManage'])->name('requisition.manage');


        Route::get('/get-unit-price', function(Request $request) {
            // get the product ID from the query string
            $productId = $request->query('productId');
            
            // $unitPrice = Product::where('id',$productId)->value('unit_price')->get();
            // query the database for the unit price of the product
            $unitPrice = DB::table('products')->where('id', $productId)->value('selling_price');
            
            // return the unit price as a JSON response
            return response()->json(['unitPrice' => $unitPrice]);
            });
    
        
        // Route::get('/details/{id}', [PurchaseController::class, 'PurchaseDetails'])->name('purchase.details');
        
       
        
        });


        // SHIPPING EXPENSE 
        Route::prefix('ship_expense')->group(function(){

            Route::get('/expense-type', [ShipExpenseController::class, 'EnpenseTypeView'])->name('ship.expenseType.view');
            Route::post('/expense-type/store', [ShipExpenseController::class, 'EnpenseTypeStore'])->name('ship.enpenseType.store');
            Route::get('/expense', [ShipExpenseController::class, 'ExpenseView'])->name('ship.expense.view');
            Route::post('/expense/store', [ShipExpenseController::class, 'ExpenseStore'])->name('ship.expense.store');
            Route::post('/expense/update', [ShipExpenseController::class, 'ExpenseUpdate'])->name('ship.expense.update');
            Route::get('/expense/manage', [ShipExpenseController::class, 'ExpenseManage'])->name('ship.expense.manage');
    
            Route::get('/approve/{id}', [ShipExpenseController::class, 'ExpenseApprove'])->name('ship.expense.approve');
            Route::get('/e-edit/{id}', [ShipExpenseController::class, 'ExpenseEdit'])->name('ship.expense.edit');
             
            });
    



        Route::prefix('hr')->group(function(){

            // EMPLOYEE
            Route::get('/employee-add', [EmployeeController::class, 'AddEmployee'])->name('employee.add');
            
            Route::post('/employee-store', [EmployeeController::class, 'StoreEmployee'])->name('employee.store');

            Route::get('/employee-manage', [EmployeeController::class, 'ManageEmployee'])->name('employee.manage');

            Route::get('/employee-view/{id}', [EmployeeController::class, 'ViewEmployee'])->name('employee.view');

            Route::get('/employee-edit/{id}', [EmployeeController::class, 'EditEmployee'])->name('employee.edit');

            Route::post('/employee/update', [EmployeeController::class, 'EmployeeUpdate'])->name('employee.update');

            Route::get('/delete/{id}', [EmployeeController::class, 'EmployeeDelete'])->name('employees.deletes');

            // DESIGNATION
            Route::get('/designation-add', [DesignationController::class, 'AddDesignation'])->name('designation.add');
            
            Route::post('/designation-store', [DesignationController::class, 'DesignationStore'])->name('designation.store');

            // DEPARTMENT
            Route::get('/department-add', [DesignationController::class, 'AddDepartment'])->name('department.add');
            
            Route::post('/department-store', [DesignationController::class, 'DepartmentStore'])->name('department.store');

            // PAYROLL
            Route::get('/payroll', [PayrollController::class, 'GenerateForm'])->name('generate.salary');

            Route::get('/manage/payroll', [PayrollController::class, 'ManageSalary'])->name('manage.salary');
            
            Route::get('salary/edit/{id}', [PayrollController::class, 'SalaryEdit'])->name('salary.edit');

            Route::post('/store-salary', [PayrollController::class, 'SalaryStore'])->name('store.salary');


            // Route::get('/get-stock', [PurchaseController::class, 'getProductStock']);
    

        Route::get('/get-unit-price', function(Request $request) {
            // get the product ID from the query string
            $productId = $request->query('productId');
            
            // $unitPrice = Product::where('id',$productId)->value('unit_price')->get();
            // query the database for the unit price of the product
            $unitPrice = DB::table('products')->where('id', $productId)->value('selling_price');
            
            // return the unit price as a JSON response
            return response()->json(['unitPrice' => $unitPrice]);
            });
       
        
        });



        