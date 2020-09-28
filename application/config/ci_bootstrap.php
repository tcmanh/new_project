<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/
$config['ci_bootstrap'] = array(
	// Site name
	'site_name' => 'Admin Panel',
	// Default page title prefix
	'page_title_prefix' => '',
	// Default page title
	'page_title' => '',
	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js',
			'assets/plugins/daterangepicker/moment.min.js',
			'assets/plugins/daterangepicker/daterangepicker.js',
			'assets/plugins/select2/select2.min.js',

			'assets/plugins/datatables/jquery.dataTables.min.js',
			'assets/plugins/datatables/dataTables.bootstrap.min.js',

			'assets/plugins/datatables/dataTables.buttons.min.js',
			'assets/plugins/datatables/buttons.print.min.js',
			'assets/plugins/datatables/buttons.flash.min.js',
			'assets/plugins/datatables/jszip.min.js',
			'assets/plugins/datatables/buttons.html5.min.js',


			'assets/plugins/toastr-master/build/toastr.min.js',
			'assets/plugins/sweetalert/sweetalert.min.js',
			'assets/plugins/jQueryUI/jquery-ui.min.js',
			'assets/plugins/jQueryUI/jquery.number.js',
			'assets/plugins/timepicker/bootstrap-timepicker.min.js',
			'assets/plugins/iCheck/icheck.min.js',

			'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
			'assets/plugins/socket/dist/socket.io.js',
			'assets/plugins/angularjs/angularjs.min.js',
			'assets/plugins/lodash/lodash.js'
		),
		'foot'	=> array(

			'assets/themes/invoice.js',
			'assets/themes/global.js?version=' . time(),
			'assets/themes/binhduong.js?version=' . time(), // luyen edit
		),
	),
	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css',
			'assets/plugins/daterangepicker/daterangepicker.css',
			'assets/plugins/select2/select2.min.css',
			'assets/plugins/datatables/dataTables.bootstrap.css',
			'assets/plugins/datatables/buttons.dataTables.min.css',
			'assets/plugins/toastr-master/build/toastr.min.css',
			'assets/plugins/jQueryUI/jquery-ui.css',
			'assets/plugins/timepicker/bootstrap-timepicker.min.css',
			'assets/plugins/iCheck/flat/blue.css',
			'assets/plugins/iCheck/flat/green.css',
			'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
			'assets/plugins/sweetalert/sweetalert.css',
			'assets/themes/switch.css',
			'assets/themes/style.css?version=' . time(), // luyen edit load new css
		)
	),
	// Default CSS class for <body> tag
	'body_class' => '',
	// Multilingual settings
	'languages' => array(),
	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		/*
		'panel' => array(
			'name'		=> 'Nhân viên',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Danh sách'			=> 'panel/admin_user',
				'Tạo mới'			=> 'panel/admin_user_create',
				'Nhóm quản trị'		=> 'panel/admin_user_group',
			)
		),
		*/
		/* 'entertain' => array(
			'name'		=> 'Giải trí',
			'url'		=> 'entertain',
			'icon'		=> 'fa fa-bandcamp',
			'children'  => array(
				'Chuyên mục'			    => 'entertain/category',
				'Danh sách truyện'			=> 'entertain/post',
				'Gửi tới workplace'         => 'entertain/toworkplace',
				'Báo cáo gửi truyện'        => 'entertain/story_report',
				'Lịch sử gửi truyện'        => 'entertain/story_history'
			)
		), */

		'staffs' => array(
			'name'		=> 'Cá nhân',
			'url'		=> 'staffs',
			'icon'		=> 'fa fa-user',
			'children'  => array(
				'Kỹ thuật viên'			=> 'staffs/technician',
				//'Test KTV'              => 'staffs/testktv',
				'Soi da'				=> 'staffs/beauty_v2',
				'Doanh số Nhóm'			=> 'staffs/group',
				'Doanh số Đặt lịch'		=> 'staffs/consultant',
				// 'Lịch hẹn'				=> 'staffs/schedules',
				'Biên bản'				=> 'staffs/penance',
				'Chấm công'				=> 'staffs/canhan',
				'Đánh giá'				=> 'staffs/rating',
				'Hộp thư'               => 'staffs/mailbox',
				'Mã OTP'				=> 'staffs/otp_customer',
				'Góp ý ẩn danh'			=> 'staffs/anonymous_suggestions',
				'Quản lý công việc'		=> 'tasks_management/tasks', //'workflow/project',
				'Truyền thông nội bộ'				=> 'staffs/send_mes_wp_groups',

			)
		),

		'admin_users' => array(
			'name'		=> 'Nhân viên',
			'url'		=> 'admin_users',
			'icon'		=> 'fa fa-user',
			'children'  => array(
				'Danh sách'			=> 'admin_users',
				'Nhân sự'		=> 'admin_users/list_users',
				'Tuyển dụng'		=> 'user_interviews/list_interview',
				'Duyệt hồ sơ Website'		=> 'user_interviews/website_interview',
				'Xử lý nghỉ việc'	=> 'admin_users/request_offs',
				'Quyết định'		=> 'admin_users/decisions',
				//'Tạo mới'			=> 'admin_users/add',
				//'Nhóm quản trị'		=> 'admin_users/groups',
				//'Phân quyền'		=> 'admin_users/permissions',
				'Chấm công tháng' => 'admin_users/timekeeping_month_report',
				'Xác nhận chấm công' => 'admin_users/timekeeping_month_report_requests',
				'Biên bản'			=> 'admin_users/penance_lists',
				'Xử lý góp ý ẩn danh'	=> 'admin_users/list_comment_hide'
			)
		),

		/*
		'user' => array(
			'name'		=> 'Cộng tác viên',
			'url'		=> 'user',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'Danh sách'			=> 'user',
				'Tạo mới'		=> 'user/create',
				'Nhóm'	=> 'user/group',
			)
		),
		*/



		'customers' => array(
			'name'		=> 'Khách hàng',
			'url'		=> 'customers',
			'icon'		=> 'fa fa-user-plus',
			'children'  => array(
				'Danh sách'				=> 'customers',
				'Nhóm khách hàng'		=> 'customers/groups',
				'Thay đổi số điện thoại' => 'customers/customer_request_phone',
				'Công nợ'				=> 'customers/debits',
				'Gói dịch vụ'			=> 'customers/add_package',
				'Khách hàng Cũ - mới'	=> 'customers/statistic',
				'Xuất Excel'			=> 'customers/excel',
				'Khiếu nại'			=> 'customers/complain',
				'Báo cáo'               => 'customers/report',
				'BC hàng nợ khách'               => 'statistics/product_debit',
			)
		),
		'share_beauty' => array(
			'name'		=> 'Cộng tác viên',
			'url'		=> 'share_beauty',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'Tổng quan'				=> '		share_beauty/overviews',
				'Duyệt cộng tác viên'				=> 'share_beauty/partner_requests',
				'Cộng tác viên'						=> 'share_beauty/partner_list',
				'Thanh toán'						=> 'share_beauty/expenditure',
				'Chăm sóc khách hàng'				=> 'share_beauty/customers_care',
				// 'Cài đặt khách hàng'				=> 'share_beauty/telesale_assigns',
				'Danh sách khách hàng'				=> 'share_beauty/partners_customers'
			)
		),
		'products' => array(
			'name'		=> 'Sản phẩm',
			'url'		=> 'products',
			'icon'		=> 'fa fa-product-hunt',
			'children'  => array(
				'Danh sách'		=> 'products/index',
				'Danh sách nhóm sản phẩm' => 'product_groups/lists',
				'Tạo mới'		=> 'products/add',
				/* 'Nhập hàng'		=> 'products/import',
				'Xuất hàng'		=> 'products/export',
				'Kho hàng chi nhánh'	=> 'products/depot_store',
				'Cập nhật kho hàng'		=> 'products/update_depot', */
				'Kho Chi Nhánh'			=> 'warehouse/request_transactions',
				'Duyệt yêu cầu'			=> 'warehouse/confirm_transactions',
				'Kho tổng'				=> 'warehouse/warehousing',
				'Chốt tồn kho'			=> 'warehouse/inventory',
				'Báo cáo Kho chi nhánh'	=> 'warehouse/report_warehouse_by_store',
				'Báo cáo Trả hàng'	=> 'products/return_good',

				'Cài đặt'				=> 'warehouse/settings'
			)
		),
		'services' => array(
			'name'		=> 'Dịch vụ',
			'url'		=> 'services',
			'icon'		=> 'fa fa-briefcase',
			'children'  => array(
				// 'Danh sách'		=> 'services',
				'Danh sách'		=> 'services/list_service',
				'Tạo mới'		=> 'services/add',
				'Danh mục'		=> 'services/category',
			)
		),
		'packages' => array(
			'name'		=> 'Gói dịch vụ',
			'url'		=> 'packages',
			'icon'		=> 'fa fa-cubes',
			'children'  => array(
				'Danh sách'		=> 'packages',
				'Tạo mới'		=> 'packages/add',
				'Danh sách yêu cầu'		=> 'packages/confirm',
			)
		),
		'sales' => array(
			'name'		=> 'Chương trình Khuyến mại',
			'url'		=> 'sales',
			'icon'		=> 'fa fa-gift',
			'children'  => array(
				'Danh sách'		=> 'sales',
				'Tạo mới'		=> 'sales/add',
				'Báo cáo'		=> 'sales/report',
			)
		),
		'ads' => array(
			'name'		=> 'Chăm sóc khách hàng', // luyen edit
			'url'		=> 'ads',
			'icon'		=> 'fa fa-file',
			'children'  => array(
				//'Upload data'			=> 'ads/index',
				//'Lịch hủy'	=> 'ads/lists', //luyen edit
				//'Khách hàng cần gọi'	=> 'ads/needcall', //luyen add
				//'Chi tiết khách hàng'   => 'ads/customer_details',
				'Khách hàng hủy hẹn'	=> 'ads/cancle_appoints', //luyen add
				//'Khách tới lịch điều trị'	=> 'ads/to_appoints', //luyen add
				'Hóa đơn trong ngày'	=> 'ads/in_day', //luyen add
				'Khách lâu chưa ghé'	=> 'ads/customer_debit', //luyen add
				//'Khách đặt lịch lại'	=> 'ads/reappoints', //luyen add
				'Thống kê CSKH'	=> 'ads/statistics', //luyen add
				'Cài đặt Tags'			=> 'ads/tag'
			)
		),

		'hotlines' => array(
			'name'		=> 'Tư vấn viên', // luyen edit
			'url'		=> 'hotlines',
			'icon'		=> 'fa fa-phone',
			'children'  => array(
				'Tổng đài'   	=> 'hotlines/telesales',
				'Yêu cầu tư vấn' => 'hotlines/request_counselling',
				'Mã giảm giá'	=> 'hotlines/voucher_details',
				'Khách hàng hủy hẹn'	=> 'ads/cancle_appoints/tvv',
				'Chăm sóc số điện thoại' => 'sale_care',
				'Báo cáo chăm sóc'      => 'sale_care/report',
				'Chi phí Marketing sđt' => 'sale_care/marketing_data',
				'Báo cáo Marketing sđt' => 'sale_care/marketing_data_reports',
				'Báo cáo cuộc gọi'	=> 'hotlines/statistics',
				'Báo cáo lịch đặt TVV'	=> 'hotlines/report_appointment',
				'Hội thoại'    => 'conversation',
				'Doanh số chi nhánh'    => 'statistics/stores',
			)
		),

		'appointments' => array(
			'name'		=> 'Lịch hẹn',
			'url'		=> 'appointments',
			'icon'		=> 'fa fa-calendar',
			'children'  => array(
				'Lịch hẹn trong ngày'	=> 'appointments',
				'Đặt lịch'				=> 'appointments/add',
			)
		),
		'invoices' => array(
			'name'		=> 'Doanh số',
			'url'		=> 'invoices',
			'icon'		=> 'fa fa-money',
			'children'  => array(
				'Doanh số trong ngày'		=> 'invoices/list',
				'Doanh số Excel'			=> 'invoices/excels',
				'Gói dịch vụ'				=> 'invoices/packages',
				'Sản phẩm - Dịch vụ'		=> 'invoices/services',
				'Doanh số nhân viên'		=> 'invoices/staffs',
				'mPos'						=> 'invoices/mpos',
			)
		),

		'cashbooks' => array(
			'name'		=> 'Sổ quỹ',
			'url'		=> 'cashbooks',
			'icon'		=> 'fa fa-money',
			'children'  => array(
				'Sổ quỹ chi nhánh'			=> 'cashbooks/index',
				'Thu'						=> 'cashbooks/receipts_new',
				'Chi'						=> 'cashbooks/expenditures',
				'Duyệt'						=> 'cashbooks/verify',
				'Excel'						=> 'cashbooks/excel'
			)
		),

		'targets' => array(
			'name'		=> 'Cài đặt target',
			'url'		=> 'targets',
			'icon'		=> 'fa fa-home',
			'children'  => array(
				'Danh sách'			=> 'targets',
				'Theo nhóm'			=> 'targets/groups',
				'Theo nhân viên'	=> 'targets/staffs',
				'Theo chi nhánh'	=> 'targets/stores',
				'Xuất excel'		=> 'targets/excels',
				'KH đánh giá'		=> 'targets/rates',
				'KH đánh giá Excel'	=> 'targets/rate_excels'
			)
		),


		'letters' => array(
			'name'		=> 'Hoạt động',
			'url'		=> 'letters',
			'icon'		=> 'fa fa-envelope',
			'children'  => array(
				'Quản lý đơn từ'				=> 'staffs/order_date_off', //'letters/send',
				/* 'Duyệt đơn'				=> 'letters/review', */
				'Yêu cầu tạo gói'		=> 'letters/package',
				'Lịch làm việc'		=> 'admin_users/employees_schedule',
				'Công văn - Văn bản'	=> 'document',
			)
		),

		'notifies' => array(
			'name'		=> 'Thông báo',
			'url'		=> 'notifies',
			'icon'		=> 'fa fa-envelope',
			'children'  => array(
				'Thông báo'				=> 'notifies',
				'Danh mục'				=> 'notifies/category',
			)

		),

		'statistics' => array(
			'name'		=> 'Chi nhánh',
			'url'		=> 'statistics',
			'icon'		=> 'fa fa-area-chart',
			'children'  => array(
				'Chi nhánh'														=> 'statistics/stores',
				'Chi nhánh xem theo ngày'										=> 'statistics/stores_new',
				'Lịch hẹn mới'													=> 'statistics/bookings',
				'Lịch hẹn trong ngày<br><small>(KH đến hôm nay)</small>'		=> 'statistics/appointments',
				'Lịch đặt trong ngày<br><small>(KH đặt hôm nay)</small>'		=> 'statistics/schedules',
				'Giảm giá'														=> 'statistics/saleof',
				'Doanh số Kỹ thuật viên'										=> 'statistics/staffs',
				'Hoa hồng Kỹ thuật viên'										=> 'statistics/kpis',
				'Hoa hồng KTV_Excel'											=> 'statistics/excel_kpis',
				'Doanh số Tư vấn viên'											=> 'statistics/telesales',
				'Khách hàng Cũ / Mới'											=> 'statistics/customers_v1',
				'Khách hàng hủy hẹn'											=> 'statistics/cancel_appoints',
				'Đánh giá'														=> 'statistics/rates',
				'Khách rớt gói'													=> 'statistics/bill_single',
				'Dịch vụ'														=> 'statistics/services',
				'Dịch vụ lẻ'														=> 'statistics/dichvule',
				'Hóa đơn cập nhật nhiều lần' 									=> 'invoice_log/index',
				'Thống kê khách hàng'											=> 'statistics/statistics_customer',
				'Tỉ lệ đặt lịch'												=> 'marketings/ratio_apmt',
				'Dịch vụ khách hàng'											=> 'marketings/images_customers',
				'Thống kê App mobile'											=> 'statistics/report_appmobile',
				'Thống kê mã giảm giá'											=> 'statistics/report_discount_code',
				'Thống kê KTV'                                                  => 'statistics/report_ktv_store',
				'Thống kê Tour KTV' 											=> 'statistics/report_technician_service'
			)
		),

		'marketings' => array(
			'name'		=> 'Marketing',
			'url'		=> 'marketings',
			'icon'		=> 'fa fa-area-chart',
			'children'  => array(
				'Doanh số theo ngày'											=> 'statistics/stores_new',
				'Doanh số Tổng'													=> 'statistics/stores',
				'Doanh số nhóm gói'												=> 'marketings/thongke',
				'Doanh số Tư vấn viên'											=> 'staffs/group', //'statistics/telesales',
				'Lịch hẹn trong ngày<br><small>(KH đến hôm nay)</small>'		=> 'statistics/appointments',
				'Lịch hẹn trong ngày'											=> 'appointments',
				'Lịch hẹn'														=> 'statistics/bookings',
				'Khách hàng Cũ / Mới'											=> 'statistics/customers_v1',
				//'Dịch vụ'														=> 'statistics/services',
				'Thống kê khách hàng'											=> 'statistics/statistics_customer',
				'Tỉ lệ đặt lịch'												=> 'marketings/ratio_apmt',
				'Thống kê mã giảm giá'											=> 'statistics/report_discount_code',
				'Số lượng lịch đặt TVV'                                              => 'marketings/report_booking',
				'Khách lâu chưa ghé'											=> 'ads/customer_lost', //luyen add
				'Thống kê hội thoại TVV'										=> 'conversation',
				'Thống kê PAGE ads'												=> 'conversation/report_by_page',
				'Dịch vụ khách hàng'											=> 'marketings/images_customers',
				'Bình luận website'												=> 'web_comments/',
				'Nhập bình luận web'												=> 'marketings/web_comment_excel_imports',
			)
		),

		'options' => array(
			'name'		=> 'Cài đặt',
			'url'		=> 'options',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Cài đặt chung'		=> 'options/setting',
				'Chi nhánh'			=> 'options/stores',
				'Báo xấu'			=> 'options/setting_complain',
				'Cài đặt thư'       => 'options/setting_mail',
				'Cài đặt Buồng/Giường'       => 'statistics/manage_beds'
				//'Gửi SMS'			=> 'options/sms'
			)
		),
		/* 'document' => array(
			'name'		=> 'Công văn - Văn bản',
			'url'		=> 'document',
			'icon'		=> 'fa fa-cog',
			
		), */
		/* 
		'workflow' => array(
			'name'		=> 'Quản lí công việc',
			'url'		=> 'workflow',
			'icon'		=> 'fa fa-tasks',
			'children'  => array(
				'Dự án'					=> 'workflow/project',
				'Công việc của tôi'		=> 'workflow/myTask'
			)
		), */

		// 'warehouse' => array(
		// 	'name'		=> 'Kho hàng',
		// 	'url'		=> 'warehouse',
		// 	'icon'		=> 'fa fa-database',
		// 	'children'  => array(
		// 		'Kho Chi Nhánh'			=> 'warehouse/request_transactions',
		// 		'Duyệt yêu cầu'			=> 'warehouse/confirm_transactions',
		// 		'Kho tổng'				=> 'warehouse/warehousing',
		// 		'Báo cáo Kho chi nhánh'	=> 'warehouse/report_warehouse_by_store',
		// 		'Cài đặt'				=> 'warehouse/settings'
		// 	)
		// ),

		'assets' => array(
			'name'		=> 'Tài sản',
			'url'		=> 'assets',
			'icon'		=> 'fa fa-suitcase',
			'children'  => array(
				// 'Tài sản chi nhánh'		=> 'assets/request_assets',
				// 'Kho tổng'				=> 'assets/in_out_main_assets',
				// 'Báo cáo tài sản'		=> 'assets/report_assets',

				'Chi nhánh'				=> 'assets/stores',
				'Kho tài sản'			=> 'assets/asset_history',
				'Tra cứu tài sản'		=> 'assets/asset_search',
				'Tài sản'				=> 'assets/ls_assets'
			)
		),

		'appsettings' => array(
			'name'		=> 'Cài đặt App',
			'url'		=> 'appsettings',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Banner'		=> 'appsettings/banner',
				'Bài viết'			=> 'appsettings/post',
				'Push tin khách hàng'			=> 'mobile_settings/manager',

			)
		),
		'dev' => array(
			'name'		=> 'DEV',
			'url'		=> 'dev',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Tính năng'		=> 'dev/feature',
				'Menu'		=> 'dev/menu',
				'Phân quyền'		=> 'dev/rule',
			)
		),
		/*
		'util' => array(
			'name'		=> 'Dữ liệu',
			'url'		=> 'util',
			'icon'		=> 'fa fa-cogs',
			'children'  => array(
				'Chi nhánh'		=> 'util/store',
				'Database'		=> 'util/list_db',
			)
		),
		*/
		'logout' => array(
			'name'		=> 'Đăng xuất',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),
	// Login page
	'login_url' => 'login',
	// Restricted pages
	'page_auth' => array(
		'user/create'				=> array('webmaster'),
		'user/group'				=> array('webmaster'),

		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),

		//'util'						=> array('webmaster'),
		//'util/store'				=> array('webmaster'),
		//'util/list_db'				=> array('webmaster'),
		//'util/backup_db'			=> array('webmaster'),
		//'util/restore_db'			=> array('webmaster'),
		//'util/remove_db'			=> array('webmaster'),

		//'staffs' 					=> array('technician', 'beauty', 'telesale', 'consultant'),
		'staffs/technician'			=> array('technician', 'webmaster', 'admin', 'accountant', 'assistantmanager', 'nurse_out', 'nurse', 'doctor', 'assistantdoctor', 'internal_training'),
		'staffs/beauty'				=> array('beauty', 'webmaster', 'admin', 'accountant', 'assistantmanager'),
		'staffs/group'				=> array('webmaster', 'admin', 'telesale', 'consultant', 'marketing', 'assistantmanager'),
		'staffs/consultant'			=> array('webmaster', 'admin', 'telesale', 'consultant', 'assistantmanager'),

		'staffs/schedules'			=> array('webmaster', 'admin', 'telesale', 'consultant', 'assistantmanager'),

		//'staffs/penance'			=> array('webmaster', 'admin', 'technician', 'beauty', 'assistantmanager'),
		'staffs/otp_customer'		=> array('webmaster', 'admin', 'receptionist', 'assistantmanager', 'manager', 'consultant', 'telesale'),
		'staffs/rating'				=> array('webmaster', 'admin', 'technician', 'manager'),
		'staffs/send_mes_wp_groups'				=> array('webmaster', 'admin', 'assistantmanager', 'hr'),

		//'staffs/update_date_start'		=> array('webmaster','admin', 'manager','hr',),


		'admin_users'					=> array('webmaster', 'admin', 'accountant', 'hr', 'manager', 'assistantmanager', 'manager_tuition'),
		'admin_users/add_user'			=> array('webmaster', 'admin', 'hr'),
		'admin_users/add'				=> array('webmaster', 'admin', 'hr', 'assistantmanager'),
		'admin_users/list_users'                =>  array('webmaster', 'hr'),
		'admin_users/decisions'			=> array('webmaster', 'hr', 'DEV'),
		'admin_users/edit'				=> array('webmaster', 'admin', 'hr', 'assistantmanager'),
		'admin_users/groups'			=> array('webmaster', 'admin', 'assistantmanager'),
		'admin_users/permissions'		=> array('webmaster', 'admin', 'assistantmanager'),
		'admin_users/list_comment_hide'	=>  array('webmaster', 'admin', 'assistantmanager'),
		'admin_users/timekeeping_month_report' => array('webmaster', 'admin', 'hr', 'manager'),
		'admin_users/timekeeping_month_report_requests' => array('webmaster', 'admin', 'DEV', 'hr', 'manager'),
		//'admin_users/employees_schedule'	=>  array('webmaster', 'admin', 'assistantmanager','manager'),
		'admin_users/request_offs'		=> array('webmaster', 'admin', 'hr'),

		'customers' 				=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist', 'assistantmanager', 'telesale', 'doctor', 'assistantdoctor', 'internal_training'),
		'customers/groups' 			=> array('webmaster', 'admin'),
		'customers/debits' 			=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist'),
		'customers/add_package' 	=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist'),
		'customers/statistic' 		=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist', 'assistantmanager'),
		'customers/edit'			=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist', 'assistantmanager'),
		'customers/excel'			=> array('webmaster', 'admin'),
		'customers/report'			=> array('webmaster', 'admin', 'assistantmanager'),
		'customers/customer_request_phone' 	=> array('webmaster', 'admin'),
		//'customers/complain'			=> array('webmaster', 'admin'),
		'share_beauty' 		=> array('webmaster', 'admin', 'DEV', 'consultant', 'marketing'),
		'share_beauty/partner_list'  		=> array('webmaster', 'admin', 'DEV', 'marketing', 'consultant'),
		'share_beauty/partner_requests' 	=> array('webmaster', 'admin', 'DEV', 'marketing', 'consultant'),
		'share_beauty/expenditure' 			=> array('webmaster', 'admin', 'DEV'),
		'share_beauty/customers_care' 		=> array('webmaster', 'admin', 'DEV', 'consultant'),
		'share_beauty/telesale_assigns' 	=> array('webmaster', 'admin', 'DEV', 'consultant'),
		'share_beauty/partners_customers'	=> array('webmaster', 'admin', 'DEV', 'marketing', 'consultant'),

		'products'					=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'leader', 'assistantmanager'),
		'products/index'			=> array('webmaster', 'admin', 'accountant', 'assistantmanager', 'manager', 'receptionist', 'leader'),
		'products/add'				=> array('webmaster',  'accountant', 'admin'),
		'products/edit'				=> array('webmaster', 'admin', 'accountant'),
		'products/import'			=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'leader', 'assistantmanager'),
		'products/export'			=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'leader', 'assistantmanager'),
		'products/depot_store'		=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'leader', 'assistantmanager'),
		'products/update_depot'		=> array('webmaster', 'admin', 'accountant'),
		'products/return_good'	=> array('webmaster', 'admin', 'accountant', 'receptionist', 'leader', 'manager'),


		'product_groups/lists' 		=> array('webmaster', 'admin', 'accountant'),

		'services'					=> array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'services/list_service'		=> array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'services/add'				=> array('webmaster', 'admin'),
		'services/edit'				=> array('webmaster', 'admin'),
		'services/category'			=> array('webmaster', 'admin', 'accountant'),

		'packages'					=> array('webmaster', 'admin', 'assistantmanager', 'marketing'),
		'packages/add'				=> array('webmaster', 'admin'),
		'packages/edit'				=> array('webmaster', 'admin'),
		'packages/confirm'			=> array('beauty', 'receptionist', 'webmaster', 'admin', 'manager', 'assistantmanager'),

		'sales'					=> array('webmaster', 'admin',  'marketing', 'telesale', 'consultant'),
		'sales/add'				=> array('webmaster', 'admin',  'marketing'),
		'sales/report'				=> array('webmaster', 'admin',  'marketing'),

		'ads'						=> array('webmaster', 'admin', 'telesale'),
		'ads/index'					=> array('webmaster', 'admin', 'telesale'),
		'ads/lists'					=> array('webmaster', 'admin', 'telesale'),
		'ads/customer_lost'					=> array('webmaster', 'admin', 'telesale', 'marketing'),
		'ads/customer_debit'					=> array('webmaster', 'admin', 'telesale', 'marketing'),
		'ads/inday'					=> array('webmaster', 'admin', 'telesale'),
		'ads/cancle_appoints'					=> array('webmaster', 'admin', 'telesale', 'consultant'),



		'appointments'				=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist', 'telesale', 'assistantmanager', 'marketing', 'beauty'),
		'appointments/add'			=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist', 'telesale'),
		'appointments/edit'			=> array('webmaster', 'admin', 'accountant', 'manager', 'consultant', 'receptionist', 'telesale'),


		'invoices'					=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'telesale', 'assistantmanager', 'marketing', 'beauty'),
		'invoices/list'					=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'telesale', 'assistantmanager', 'marketing', 'beauty'),
		'invoices/detail'			=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'assistantmanager', 'telesale'),
		'invoices/packages'			=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'telesale', 'assistantmanager'),
		'invoices/services'			=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'assistantmanager'),
		'invoices/paids'			=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist', 'assistantmanager'),
		'invoices/staffs'			=> array('webmaster', 'admin', 'accountant', 'manager', 'assistantmanager', 'beauty'),
		'invoices/mpos'			=> array('webmaster', 'admin', 'accountant', 'manager'),

		'cashbooks'					=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist'),
		'cashbooks/index'			=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist'),
		'cashbooks/receipts'		=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist'),
		'cashbooks/receipts_new'		=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist'),
		'cashbooks/expenditures'	=> array('webmaster', 'admin', 'accountant', 'manager', 'receptionist'),
		'cashbooks/verify'			=> array('webmaster', 'admin', 'accountant'),
		'cashbooks/excel'			=> array('webmaster', 'admin', 'accountant'),

		'targets'					=> array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'targets/index'				=> array('webmaster', 'admin', 'assistantmanager', 'assistantmanager'),
		'targets/groups'			=> array('webmaster', 'admin', 'assistantmanager', 'assistantmanager'),
		'targets/staffs'			=> array('webmaster', 'admin', 'assistantmanager', 'assistantmanager'),
		'targets/stores'			=> array('webmaster', 'admin', 'assistantmanager', 'assistantmanager'),
		'targets/excels'			=> array('webmaster', 'admin', 'accountant'),
		'targets/rates'				=> array('webmaster', 'admin', 'assistantmanager'),
		'targets/rate_excels'		=> array('webmaster', 'admin', 'accountant'),

		'invoices/excels'			=> array('webmaster', 'admin', 'accountant'),

		'statistics' 				=> array('webmaster', 'admin', 'accountant', 'assistantmanager', 'internal_training'),
		'statistics/stores'			=> array('webmaster', 'admin', 'accountant', 'marketing', 'assistantmanager', 'consultant'),
		'statistics/stores_new'			=> array('webmaster', 'admin', 'accountant', 'marketing', 'assistantmanager'),
		'statistics/bookings'		=> array('webmaster', 'admin', 'accountant', 'marketing'),
		'statistics/appointments'	=> array('webmaster', 'admin', 'accountant', 'marketing'),


		'statistics/schedules'		=> array('webmaster', 'admin', 'accountant'),
		'statistics/staffs'			=> array('webmaster', 'admin', 'accountant'),
		'statistics/kpis'			=> array('webmaster', 'admin', 'accountant'),
		'statistics/excel_kpis'		=> array('webmaster', 'admin', 'accountant'),
		'statistics/telesales'		=> array('webmaster', 'admin', 'accountant'),
		'statistics/customers_v1'	=> array('webmaster', 'admin', 'accountant', 'assistantmanager', 'marketing'),
		'statistics/customers_v2'	=> array('webmaster', 'admin', 'accountant'),
		'statistics/rates'			=> array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'statistics/services'		=> array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'statistics/dichvule'		=> array('webmaster', 'admin', 'assistantmanager', 'marketing'),
		'invoice_log/index'			=> array('admin', 'accountant', 'assistantmanager'),
		'statistics/statistics_customer'  => array('webmaster', 'admin', 'accountant', 'marketing', 'assistantmanager'),
		'statistics/report_discount_code'	=> array('webmaster', 'admin', 'marketing'),
		'statistics/manage_beds'	=> array('webmaster', 'admin', 'assistantmanager'),
		'statistics/product_debit'	=> array('webmaster', 'admin', 'assistantmanager', 'dev', 'manager', 'receptionist'),
		'statistics/report_ktv_store' => array('webmaster', 'admin'),
		'statistics/cancel_appoints' => array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'statistics/report_technician_service'	=> array('webmaster', 'admin', 'dev', 'accountant', 'internal_training'),
		'statistics/report_appmobile' => array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'marketings/images_customers'	=> array('webmaster', 'admin', 'accountant', 'assistantmanager', 'marketing', 'dng'),
		'statistics/saleof'				=> array('webmaster', 'admin', 'accountant', 'assistantmanager'),
		'statistics/bill_single'		=>  array('webmaster', 'admin', 'accountant', 'assistantmanager'),

		'letters/review'			=> array('webmaster', 'admin', 'manager', 'accountant'),
		'letters/package'			=> array('beauty', 'receptionist', 'webmaster', 'admin', 'manager', 'accountant'),
		'notifies'					=> array('webmaster', 'admin', 'accountant'),
		'notifies/category'			=> array('webmaster', 'admin', 'accountant'),

		'options'					=> array('webmaster', 'admin', 'accountant'),
		'options/setting'			=> array('webmaster', 'admin'),
		'options/sms'				=> array('webmaster', 'admin'),
		'options/salary_view'		=> array('webmaster', 'admin', 'accountant'),
		'options/stores'			=> array('webmaster'),

		'marketings'					=> array('webmaster', 'marketing', 'admin', 'dev'),
		'marketings/thongke'			=> array('webmaster', 'marketing', 'admin'),
		'marketings/ratio_apmt'			=> array('webmaster', 'marketing', 'admin'),
		'marketings/report_booking'		=> array('webmaster', 'marketing', 'admin'),
		'web_comments'					=> array('webmaster', 'marketing', 'admin', 'dev'),

		'appsettings'					=> array('webmaster', 'admin', 'marketing', 'dev'),
		'appsettings/banner'			=> array('webmaster', 'admin', 'marketing'),
		'appsettings/post'				=> array('webmaster', 'admin', 'marketing'),
		'mobile_settings/push_message'				=> array('webmaster', 'admin', 'marketing'),
		'mobile_settings/manager'				=> array('webmaster', 'admin', 'marketing'),

		'hotlines'						=> array('webmaster', 'admin', 'consultant', 'marketing'),
		'hotlines/request_counselling'  => array('webmaster', 'admin', 'consultant', 'marketing'),
		'hotlines/telesales'			=> array('webmaster', 'admin', 'consultant'),
		'hotlines/voucher_details'		=> array('webmaster', 'admin', 'consultant'),
		'hotlines/statistics'			=> array('webmaster', 'admin', 'consultant'),
		'hotlines/report_appointment'			=> array('webmaster', 'admin'),

		'conversation'					=> array('webmaster', 'admin', 'consultant', 'marketing'),
		'conversation/user'					=> array('webmaster', 'admin', 'consultant', 'marketing'),
		'conversation/report_by_page'					=> array('webmaster', 'admin', 'marketing'),

		'warehouse'	=> array('webmaster', 'admin', 'accountant', 'receptionist', 'leader', 'manager'),
		'warehouse/request_transactions'	=> array('webmaster', 'admin', 'receptionist', 'leader', 'manager', 'assistantmanager'),
		'warehouse/confirm_transactions'	=> array('webmaster', 'admin', 'accountant'),
		'warehouse/warehousing'				=> array('webmaster', 'admin', 'accountant'),
		//'assets/ls_assets',
		'warehouse/report_warehouse_by_store'	=> array('webmaster', 'admin', 'accountant', 'receptionist', 'leader', 'manager', 'assistantmanager'),
		'warehouse/settings'				=> array('webmaster', 'admin', 'accountant'),
		'warehouse/balance_warehouse'		=> array('webmaster', 'admin'),
		'warehouse/inventory'				=> array('webmaster', 'admin', 'receptionist', 'leader', 'manager'),
		'dev'								=> array('webmaster'),

		'assets'							=> array('webmaster', 'admin', 'manager', 'kythuat'),
		// 'assets/request_assets'				=> array('webmaster', 'admin', 'receptionist', 'leader', 'manager'),
		// 'assets/in_out_main_assets'			=> array('webmaster', 'admin', 'kythuat'),
		// 'assets/report_assets'				=> array('webmaster', 'admin', 'kythuat', 'manager'),
		// 'assets/asset_repairs'				=> array('webmaster', 'admin', 'kythuat', 'manager'),
		'assets/ls_assets'					=> array('webmaster', 'admin', 'kythuat'),
		'assets/stores'						=> array('webmaster', 'admin', 'kythuat', 'manager'),
		'assets/asset_history'				=> array('webmaster', 'admin', 'kythuat'),
		'assets/asset_search'				=> array('webmaster', 'admin', 'kythuat')
	),
	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'			=> 'skin-red',
			'admin'				=> 'skin-green',

			'accountant'		=> 'skin-purple',
			'hr'				=> 'skin-purple',

			'manager_tuition'	=> 'skin-blue',
			'consultant'		=> 'skin-blue',
			'telesale'			=> 'skin-blue',
			'manager'			=> 'skin-blue',

			'receptionist'		=> 'skin-black',
			'technician'		=> 'skin-black',
			'beauty'			=> 'skin-black',
			'dng'				=> 'skin-black',
			'security'			=> 'skin-black',
			'unknown'			=> 'skin-black',
			'assistantmanager'	=> 'skin-green',
			'marketing'			=> 'skin-green',
			'kythuat'			=> 'skin-green',
			'doctor'			=> 'skin-green',
			'nurse'			=> 'skin-green',
			'nurse_out'			=> 'skin-green',
			'assistantdoctor'	=> 'skin-green',
			'dev'				=> 'skin-red',
			'teacher'           => 'skin-black',
			'internal_training' => 'skin-red'
		)
	),
	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

$config['ci_bootstrap_ketoan'] = array(
	// Site name
	'site_name' => 'Phần mềm Kế toán',
	// Default page title prefix
	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		'cashbooks' =>  array(
			'name'		=> 'Sổ quỹ',
			'url'		=> 'cashbooks',
			'icon'		=> 'fa fa-money',
			'children'  => array(
				'Thu'					=> 'cashbooks/receipts',
				'Chi'					=> 'cashbooks/expenditures',
				'Thống kê chi nhánh'	=> 'cashbooks/stores',
				'Thống kê phần chi'		=> 'cashbooks/paids',
				'Sổ quỹ'				=> 'cashbooks/index',
				'Excel'					=> 'cashbooks/excel',
				'Thùng rác'				=> 'cashbooks/trashs',
				'Cập nhật'				=> 'cashbooks/update',
				'Thống kê chuyển khoản'	=> 'cashbooks/statictics_tranfer',
				'Cài đặt thu chi'		=> 'cashbooks/setting_cashbook',
			)
		),
		'depots' =>  array(
			'name'		=> 'Kho hàng',
			'url'		=> 'depots',
			'icon'		=> 'fa fa-money',
			'children'  => array(
				'Nhập'					=> 'depots/import',
				'Xuất'					=> 'depots/export',
				'Kho hàng Tổng'			=> 'depots',
				'TK nhập hàng CN'		=> 'depots/import_store',
				'TK xuất hàng CN'		=> 'depots/export_store',
			)
		),
		'salaries' =>  array(
			'name'		=> 'Bảng lương',
			'url'		=> 'salaries',
			'icon'		=> 'fa fa-money',
			'children'  => array(
				'Cài đặt'				=> 'salaries',
				'Gửi bảng lương'		=> 'salaries/uploads',
			)
		),
		'mpos' =>  array(
			'name'		=> 'Máy mPos',
			'url'		=> 'mpos',
			'icon'		=> 'fa fa-money',
			'children'  => array(
				'Tải lên'				=> 'mpos',
				'Danh sách'				=> 'mpos/lists',
				'Chuyển khoản'			=> 'mpos/transfer'
			)
		),
		'vnpays' =>  array(
			'name'		=> 'VNPAY',
			'url'		=> 'vnpays',
			'icon'		=> 'fa fa-qrcode',
			'children'  => array(
				'Tải lên'				=> 'vnpays',
				'Danh sách'				=> 'vnpays/list',
			)
		)
		/*
		'logout' => array(
			'name'		=> 'Đăng xuất',
			'url'		=> '../panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
		*/
	),
);

$config['ci_bootstrap_nhansu'] = array(
	// Site name
	'site_name' => 'Phần mềm Nhân sự',
	// Default page title prefix
	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		'admin_users' => array(
			'name'		=> 'Nhân viên',
			'url'		=> 'admin_users',
			'icon'		=> 'fa fa-user',
			'children'  => array(
				// 'Danh sách'			=> 'admin_users',
				//'Cập nhật'			=> 'admin_users/update',
				// 'Tạo mới'			=> 'admin_users/add',
				//'Tạo nhanh'			=> 'admin_users/add/basic',
				'Nhóm quản trị'		=> 'admin_users/groups',
				'Phân quyền'		=> 'admin_users/permissions',
				'Xuất nhân viên'		=> 'admin_users/export',

			)
		),

		'chamcong' => array(
			'name'		=> 'Chấm công',
			'url'		=> 'options',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Báo cáo chi nhánh'		=> 'chamcong/store_report',
				'Cài đặt chi nhánh'			=> 'options/setting_store',
				// 'Chấm công tháng'			=> 'chamcong/month_report',
				'Quản lý ca'			=> 'options/shift_manager',
				'Cài đặt sớm/trễ'	=> 'admin_users/time',
			)
		),

		'reports' => array(
			'name'		=> 'Báo cáo',
			'url'		=> 'reports',
			'icon'		=> 'fa fa-area-chart',
			'children'  => array(
				'Tổng nhân sự'				=> 'reports/',
				'Thâm niên'					=> 'reports/older',
				'Thời gian làm việc'		=> 'reports/time',
				'Sinh nhật'					=> 'reports/birthday',
				'Quỹ lương'					=> 'reports/salari',
			)
		),

		'options/sms' => array(
			'name'		=> 'Gửi sms',
			'url'		=> 'options/sms',
			'icon'		=> 'fa fa-comment',
		),
		/*
		'logout' => array(
			'name'		=> 'Đăng xuất',
			'url'		=> '../panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
		*/
	),
);

$config['ci_bootstrap_hoc_vien'] = array(
	// Site name
	'site_name' => 'Học viện',
	// Default page title prefix
	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		'course' => array(
			'name'		=> 'Khóa học',
			'url'		=> 'member',
			'icon'		=> 'fa fa-building',
			'children'  => array(
				'Quản lý khóa học-khu vực'				=> 'course',
				'Quản lý khóa học'				=> 'course/lists'
			)
		),
		'classes' => array(
			'name'		=> 'Lớp học',
			'url'		=> 'classes',
			'icon'		=> 'fa fa-address-card',
			'children'  => array(
				'Quản lý lớp học'				=> 'classes',
			)
		),
		'member' => array(
			'name'		=> 'Học viên',
			'url'		=> 'member',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'Quản lý học viên'				=> 'member/lists',
				'Chăm sóc học viên'				=> 'member/academy_student_care',

			)
		),
		'invoice' => array(
			'name'		=> 'Hóa đơn',
			'url'		=> 'invoice',
			'icon'		=> 'fa fa-address-card',
			'children'  => array(
				'Quản lý học phí'				=> 'invoice'
			)
		),
		'report' => array(
			'name'		=> 'Báo cáo',
			'url'		=> 'report',
			'icon'		=> 'fa fa-address-card',
			'children'  => array(
				'Báo cáo học viên'				=> 'report/report_scores',
				'Báo cáo doanh thu'             => 'invoice/invoice_report',
				'Báo cáo hoa hồng TVV'          => 'report/report_commission',
				'Báo cáo chăm sóc'             	=> 'report/report_kpi'

			)
		)
		/*
		'logout' => array(
			'name'		=> 'Đăng xuất',
			'url'		=> '../panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
		*/
	),
);
/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';
