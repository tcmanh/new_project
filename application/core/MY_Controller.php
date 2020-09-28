<?php
class Auth_Controller extends CI_Controller
{

    // Values to be obtained automatically from router
    protected $mModule = '';            // module name (empty = Frontend Website)
    protected $mCtrler = 'home';        // current controller
    protected $mAction = 'index';        // controller function being called
    protected $mMethod = 'GET';            // HTTP request method

    // Config values from config/ci_bootstrap.php
    protected $mConfig = array();
    protected $mBaseUrl = array();
    protected $mSiteName = '';
    protected $mMetaData = array();
    protected $mScripts = array();
    protected $mStylesheets = array();

    // Values and objects to be overrided or accessible from child controllers
    protected $mPageTitlePrefix = '';
    protected $mPageTitle = '';
    protected $mBodyClass = '';
    protected $mMenu = array();
    protected $mBreadcrumb = array();

    // Multilingual
    protected $mMultilingual = FALSE;
    // protected $mLanguage = 'en';
    protected $mLanguage = 'VN';
    protected $mAvailableLanguages = array();

    // Data to pass into views
    protected $mViewData = array();

    // Login user
    protected $mPageAuth = array();
    protected $mUser = NULL;
    protected $mUserGroups = array();
    protected $mUserMainGroup;

    var $can_access_m;


    function __construct()
    {
        parent::__construct();
        $this->Admin_model->verifyUser();


        $this->mCtrler = $this->router->fetch_class();
        $this->mMethod = $this->input->server('REQUEST_METHOD');


        // initial setup
        $this->_setup();
        $this->load->library('session');
    }
    // Setup values from file: config/ci_bootstrap.php
    private function _setup()
    {
        $config['ci_bootstrap'] = array(
            // Site name
            'site_name' => 'Admin Panel',
            // Default page title prefix
            'page_title_prefix' => '',
            // Default page title
            'page_title' => '',
            // Default meta data
            'meta_data'    => array(
                'author'        => '',
                'description'    => '',
                'keywords'        => ''
            ),
            // Default scripts to embed at page head or end
            'scripts' => array(
                'head'    => array(
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
                'foot'    => array(

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
                    'name'        => 'Home',
                    'url'        => '',
                    'icon'        => 'fa fa-home',
                ),
                'appointment' => array(
                    'name'        => 'Lịch hẹn',
                    'url'         => 'appointment',
                    'icon'        => 'fa fa-calendar',
                    'children'  => array(
                        'Đặt lịch'            => 'appointment',
                        'Quản lý lịch đặt'    => 'appointment/list' 
                    )
                ),
                'customer' => array(
                    'name'        => 'Khác hàng',
                    'url'         => 'customer',
                    'icon'        => 'fa fa-calendar',
                    'children'  => array(
                        'Danh sách'            => 'customer'
                    )
                )
            ),

            // Login page
            'login_url' => 'login',
            // Restricted pages
            'page_auth' => array(),
            // AdminLTE settings
            'adminlte' => array(
                'body_class' => array()
            ),
            // Debug tools
            'debug' => array(
                'view_data'    => FALSE,
                'profiler'    => FALSE
            ),
        );

        $config = $config['ci_bootstrap'];

        // load default values
        $this->mScripts = empty($config['scripts']) ? array() : $config['scripts'];



        $this->mBaseUrl = empty($this->mModule) ? base_url() : base_url($this->mModule) . '/';
        $this->mSiteName = empty($config['site_name']) ? '' : $config['site_name'];
        $this->mPageTitlePrefix = empty($config['page_title_prefix']) ? '' : $config['page_title_prefix'];
        $this->mPageTitle = empty($config['page_title']) ? '' : $config['page_title'];
        $this->mBodyClass = empty($config['body_class']) ? '' : $config['body_class'];
        $this->mMenu = empty($config['menu']) ? array() : $config['menu'];
        $this->mMetaData = empty($config['meta_data']) ? array() : $config['meta_data'];
        $this->mStylesheets = empty($config['stylesheets']) ? array() : $config['stylesheets'];
        $this->mPageAuth = empty($config['page_auth']) ? array() : $config['page_auth'];
        $this->mLang = 'VN';



        // restrict pages
        $uri = ($this->mAction == 'index') ? $this->mCtrler : $this->mCtrler . '/' . $this->mAction;
        if (!empty($this->mPageAuth[$uri]) && !$this->ion_auth->in_group($this->mPageAuth[$uri])) {
            $page_404 = $this->router->routes['404_override'];
            $redirect_url = empty($this->mModule) ? $page_404 : $this->mModule . '/' . $page_404;
            redirect($redirect_url);
        }

        // push first entry to breadcrumb
        if ($this->mCtrler != 'home') {
            $page = $this->mMultilingual ? lang('home') : 'Home';
            $this->push_breadcrumb($page, '');
        }

        // get user data if logged in

        $this->mConfig = $config;
    }


    // Add script files, either append or prepend to $this->mScripts array
    // ($files can be string or string array)
    protected function add_script($files, $append = TRUE, $position = 'foot')
    {
        $files = is_string($files) ? array($files) : $files;
        $position = ($position === 'head' || $position === 'foot') ? $position : 'foot';

        if ($append)
            $this->mScripts[$position] = array_merge($this->mScripts[$position], $files);
        else
            $this->mScripts[$position] = array_merge($files, $this->mScripts[$position]);
    }

    // Add stylesheet files, either append or prepend to $this->mStylesheets array
    // ($files can be string or string array)
    protected function add_stylesheet($files, $append = TRUE, $media = 'screen')
    {
        $files = is_string($files) ? array($files) : $files;

        if ($append)
            $this->mStylesheets[$media] = array_merge($this->mStylesheets[$media], $files);
        else
            $this->mStylesheets[$media] = array_merge($files, $this->mStylesheets[$media]);
    }

    // Render template
    protected function render($view_file, $layout = 'default')
    {
        // automatically generate page title
        if (empty($this->mPageTitle)) {
            if ($this->mAction == 'index')
                $this->mPageTitle = ($this->mCtrler);
            else
                $this->mPageTitle = ($this->mAction);
        }

        $this->mViewData['module'] = $this->mModule;
        $this->mViewData['ctrler'] = $this->mCtrler;
        $this->mViewData['action'] = $this->mAction;

        $this->mViewData['site_name'] = $this->mSiteName;
        $this->mViewData['page_title'] = $this->mPageTitlePrefix . $this->mPageTitle;
        $this->mViewData['current_uri'] = empty($this->mModule) ? uri_string() : str_replace($this->mModule . '/', '', uri_string());

        $this->mViewData['meta_data'] = $this->mMetaData;
        $this->mViewData['scripts'] = $this->mScripts;
        $this->mViewData['stylesheets'] = $this->mStylesheets;
        $this->mViewData['page_auth'] = $this->mPageAuth;

        $this->mViewData['base_url'] = $this->mBaseUrl;
        $this->mViewData['menu'] = $this->mMenu;
        $this->mViewData['user'] = $this->mUser;
        $this->mViewData['ga_id'] = empty($this->mConfig['ga_id']) ? '' : $this->mConfig['ga_id'];
        $this->mViewData['body_class'] = $this->mBodyClass;



        // $this->db->select('COUNT(id) as total')->from('notifications');
        // $this->db->where('receiver_id', get_current_user_id());
        // $this->db->where('status', 0);
        // $rs = $this->db->get()->row();

        // $this->mViewData['countmail'] = $rs->total;

        // automatically push current page to last record of breadcrumb
        $this->push_breadcrumb($this->mPageTitle);
        $this->mViewData['breadcrumb'] = $this->mBreadcrumb;

        // multilingual
        $this->mViewData['multilingual'] = $this->mMultilingual;
        if ($this->mMultilingual) {
            $this->mViewData['available_languages'] = $this->mAvailableLanguages;
            $this->mViewData['language'] = $this->mLanguage;
        }
        //auto set lang
        //add SESSION Language
        if (session_id() === '')
            session_start();
        $lang = $_GET['lang'] ?? '';
        if ($lang && $lang != '') {
            $_SESSION['lang'] = $lang;
        }
        // end add SESSION Language
        if (isset($_SESSION['lang'])) {
            $lang = $_SESSION['lang'];
        }
        $this->mViewData['language'] = $lang;


        // debug tools - CodeIgniter profiler
        $debug_config = $this->mConfig['debug'];
        if (ENVIRONMENT === 'development' && !empty($debug_config)) {
            $this->output->enable_profiler($debug_config['profiler']);
        }

        $this->mViewData['inner_view'] = $view_file;
        $this->load->view('header', $this->mViewData);
        //  $this->load->view('_layouts/' . $layout, $this->mViewData);
        $this->load->view($view_file, $this->mViewData);
        // debug tools - display view data
        if (ENVIRONMENT === 'development' && !empty($debug_config) && !empty($debug_config['view_data'])) {
            $this->output->append_output('<hr/>' . print_r($this->mViewData, TRUE));
        }

        $this->load->view('footer', $this->mViewData);
    }

    // Output JSON string
    protected function render_json($data, $code = 200)
    {
        $this->output
            ->set_status_header($code)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));

        // force output immediately and interrupt other scripts
        global $OUT;
        $OUT->_display();
        exit;
    }
    // Add breadcrumb entry
    // (Link will be disabled when it is the last entry, or URL set as '#')
    protected function push_breadcrumb($name, $url = '#', $append = TRUE)
    {
        $entry = array('name' => $name, 'url' => $url);
        //print_r($this->input->is_ajax_request());
        // $redirect_link = array("ajax_redirect_link" => TRUE);
        // header('Content-Type: application/x-json; charset=utf-8');
        // echo (json_encode($redirect_link));
        if ($append)
            $this->mBreadcrumb[] = $entry;
        else
            array_unshift($this->mBreadcrumb, $entry);
    }
}
