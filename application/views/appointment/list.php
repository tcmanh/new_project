<style>
    .content-wrapper>div {
        opacity: 0;
        line-height: 1.3
    }

    .cursor {
        cursor: pointer;
    }
</style>
<div ng-app="appointment_app" ng-controller="add" ng-init="init()">
    <div id="modalArival" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận khách đến</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn muốn xác nhận khách tới?</p>
                    <h5 style="display: flex;justify-content: space-between;">
                        <div class="badge badge-danger cursor">
                            Không
                        </div>
                        <div class="badge badge-success cursor" ng-click="confirm(1)">
                            Đúng
                        </div>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div id="modalComplete" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận hoàn tất</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn muốn xác nhận hoàn tất?</p>
                    <h5 style="display: flex;justify-content: space-between;">
                        <div class="badge badge-danger cursor">
                            Không
                        </div>
                        <div class="badge badge-success cursor" ng-click="confirm(2)">
                            Đúng
                        </div>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-body ">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        Quản lý lịch hẹn
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="search-feild flex">
                    <div class="form-group date_search">
                        <strong>
                            Ngày:
                        </strong>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input style="height: 34px;width: 100%;outline: none; border: 1px solid #e0d5d5;padding: 7px 8px;" ng-model="filter.date_range" class="date " placeholder="Chọn ngày" autocomplete="off" name="date_filter" class="form-control pull-right">
                            <div class="close_field" ng-if="filter.date_range" ng-click="filter.date_range=undefined">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <ul class="nav nav-tabs">
                        <li class="active pc">
                            <a data-toggle="tab" href="#wait" ng-click="getTable(-2)">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                Tất cả
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                STT
                                            </th>
                                            <th class="text-center">
                                                Người mua
                                            </th>
                                            <th class="text-center">
                                                Khách
                                            </th>
                                            <th class="text-center">
                                                Thông tin chung
                                            </th>
                                            <th class="text-center">
                                                Thông tin dịch vụ
                                            </th>

                                            <th class="text-center">
                                                Thao tác
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(index,value) in ajax_data">
                                            <td class="text-center">{{index+1}}</td>
                                            <td><strong>{{value.name}}</strong> <br>
                                                *****{{value.phone.slice(-4)}}
                                            </td>
                                            <td class="text-center">
                                                <h6>
                                                    <div class="badge badge-success" ng-if="value.is_old==0">
                                                        Mới
                                                    </div>
                                                    <div class="badge badge-warning" ng-if="value.is_old==1">
                                                        Cũ
                                                    </div>
                                                </h6>
                                            </td>
                                            <td>
                                                <strong>
                                                    Ngày đặt:
                                                </strong>
                                                {{value.date}} {{value.time}} <br>
                                                <strong>
                                                    Ngày tạo:
                                                </strong>
                                                {{value.created}}
                                                <div ng-if="value.note">
                                                    <strong>
                                                        Ghi chú:
                                                    </strong>
                                                    {{value.note}}
                                                </div>

                                            </td>

                                            <td>
                                                <strong> Loại: </strong>
                                                <span ng-if="value.type==1">
                                                    Lẻ
                                                </span>
                                                <span ng-if="value.type==2">
                                                    Dài ngày
                                                </span><br>
                                                <strong> Tên: </strong>{{value.sevice_name}} <br>
                                                <strong> Giá tiền:</strong> <span style="font-size: 14px">{{value.price|number}}</span> đ
                                            </td>
                                            <td class="text-center">
                                                <div ng-if="value.status==0">
                                                    <button class="btn btn-default cursor" style="width: 180px" ng-click="confirmModal(0,value)">
                                                        Xác nhận khách tới
                                                    </button>
                                                </div>
                                                <div ng-if="value.status==1">
                                                    <button class="btn btn-primary cursor" style="width: 180px" ng-click="confirmModal(1,value)">
                                                        Xác nhận hoàn tất
                                                    </button>
                                                </div>
                                                <h6 ng-if=" value.status==2">
                                                    <div class="badge badge-primary">
                                                        Đã hoàn tất
                                                    </div>
                                                </h6>
                                                <!--  -->
                                                <span class="cursor" style="font-size: 17px;" ng-click="backC(value)" ng-if="value.status>0 && value.status <2">
                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr ng-if="!ajax_data||ajax_data.length==0">
                                            <td colspan="6" class="text-center" style="padding: 20px 0">
                                                <div class="ant-empty-image"><svg width="64" height="41" viewBox="0 0 64 41" xmlns="http://www.w3.org/2000/svg">
                                                        <g transform="translate(0 1)" fill="none" fill-rule="evenodd">
                                                            <ellipse fill="#F5F5F5" cx="32" cy="33" rx="32" ry="7"></ellipse>
                                                            <g fill-rule="nonzero" stroke="#D9D9D9">
                                                                <path d="M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z"></path>
                                                                <path d="M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z" fill="#FAFAFA"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <span>
                                                    Trống
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<style>
    @media only screen and (min-width: 1000px) {
        #update .modal-dialog {
            width: 1000px;
        }
    }

    .confg_form {
        width: 100%;
        display: inline-block;
    }

    .restrict_text {
        display: -webkit-box;
        /* max-height: calc(2 * var(--yt-link-line-height, 1.6rem)); */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        -webkit-line-clamp: 4;
        max-height: 81px;
    }

    #add_member .modal-dialog,
    #member_modal .modal-dialog {
        width: 1000px;
    }

    .form-control {
        border: 1px solid #e0d5d5;
        border-radius: 3px 3px 3px 3px;
        padding: 6px 7px;
    }

    #add_class input::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        font-size: 13px;
        opacity: 1;
        /* Firefox */
    }

    #add_class .result-directive {
        color: #666;
    }

    #add_class input::placeholder {
        /* Internet Explorer 10-11 */
        font-size: 13px;
    }

    #add_class input::placeholder {
        /* Microsoft Edge */
        font-size: 13px;
    }

    .content-header {
        display: none;
    }

    .display {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }

    .select2-container .select2-selection--single {
        height: 34px;
        border-radius: 0;
    }

    .flex {
        display: flex;
        flex-wrap: wrap;
    }

    .check .input-group-addon {
        border: unset;
        background-color: transparent !important;
    }



    section.alert-dismissible {
        display: none;
    }

    [class*="icheck-material"]>input:first-child:checked+label::after,
    [class*="icheck-material"]>input:first-child:checked+input[type="hidden"]+label::after {
        left: -9px;
    }

    [class*="icheck-material"] {
        min-height: 0;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
        padding-left: 0;
    }


    #create_modal .form-group {
        margin-bottom: 5px;
    }

    .content .label-default {
        background: #666 !important;
    }

    #create_modal input,
    #create_modal textarea,
    #create_modal select {
        border-radius: 4px;
    }

    .add-bt {
        position: absolute;
        right: 5px;
        bottom: 5px;
    }

    .add-bt i {
        font-size: 20px;
    }

    .close_field {
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);
        background: white;
        color: red;
        font-size: 16px;
        z-index: 999;
    }

    .table>caption+thead>tr:first-child>td,
    .table>caption+thead>tr:first-child>th,
    .table>colgroup+thead>tr:first-child>td,
    .table>colgroup+thead>tr:first-child>th,
    .table>thead:first-child>tr:first-child>td,
    .table>thead:first-child>tr:first-child>th {
        font-weight: 500;
    }

    .card-container .nav-tabs>li a>i {
        margin-right: 3px;
        position: relative;
        top: -0.5px;
        font-size: 13px;
    }

    .content .input-group .input-group-addon {
        background-color: #e6fefd;
    }

    /* search */
    .search-feild {
        padding: 5px;
        background: rgb(230, 230, 230);
        margin-bottom: 5px;
        border-radius: 3px;
        width: 100%;
        position: relative;
    }

    .search-feild .form-group {
        margin-bottom: 0;
    }

    .form-group {
        width: 250px;
        margin-right: 10px;
    }

    @media screen and (max-width: 767px) {
        .form-group {
            width: 100%;
            margin-right: 0;
        }

        .button_excel {
            height: 28px !important;
        }

        .card-container .pc {
            display: none !important;
        }

        .card-container .mb select {
            display: block !important;
        }

        .card-container .nav-tabs>li {
            width: 100% !important;
            margin-bottom: 5px;
        }

        .pc-pdf {
            display: none !important;
        }

        .mobile-pdf {
            display: inline-block !important;
        }
    }

    /* search */
    @media screen and (min-width: 1200px) {}

    .card-container .tab-content {
        border: unset;
        padding: 0 !important;
    }

    .card-container {
        background: #f5f5f5;
        padding-top: 7px;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 3px;
        padding-bottom: 10px;
    }

    .nav-tabs {
        font-size: 15px;
        font-weight: 700;
    }

    .nav-tabs {
        border-bottom: 1px solid #ddd;
    }

    .nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .content .active {
        position: relative;
        background: rgba(245, 245, 245, 0.48);
    }

    .card-container .nav-tabs>li.active>a,
    .card-container .nav-tabs>li.active>a:focus,
    .card-container .nav-tabs>li.active>a:hover {
        border: unset;
    }

    .card-container .nav-tabs>li.active a {
        color: #ffffff;
        background: #666666;
        box-shadow: 2px 5px 4px 0px #aba1a1;
    }

    .card-container .nav-tabs>li a {
        color: #666;

    }

    .nav-tabs>li>a {
        font-weight: 400;
    }

    .tab-content {
        border: 1px solid #ddd;
        border-top: none;
        padding: 10px;
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        vertical-align: middle;
    }

    .content .select2-container {
        width: 100% !important;
    }

    .nav-tabs>li>a {
        margin-right: 2px;
        line-height: 1.42857143;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0;
    }

    .nav>li>a {
        position: relative;
        display: block;
        padding: 10px 15px;
        text-decoration: none;
    }

    @font-face {
        font-family: tt;
        src: url('assets/images/tt.ttf');
    }

    .table>caption+thead>tr:first-child>td,
    .table>caption+thead>tr:first-child>th,
    .table>colgroup+thead>tr:first-child>td,
    .table>colgroup+thead>tr:first-child>th,
    .table>thead:first-child>tr:first-child>td,
    .table>thead:first-child>tr:first-child>th {
        font-weight: 600;
    }

    .ant-tabs-nav {
        height: 43px;
        line-height: 43px;
        border-bottom: 1px dashed #3c8dbc;
        margin-bottom: 5px;
    }

    .ant-tabs-nav>div .active {
        background: transparent;
    }

    .ant-tabs-tab {
        padding: 0 30px;
        transition: 0.3s all;
        position: relative;
        margin-right: 20px;
        cursor: pointer;
    }

    .ant-tabs-nav>div .active:before {
        position: absolute;
        bottom: 0px;
        width: 100%;
        left: 0px;
        height: 2px;
        content: '';
        background: #2875c7;
    }

    .ant-tabs-nav>div .active span {
        color: #2875c7;
    }

    .ant-tabs-tab i {
        margin-right: 5px;
        font-size: 15.5px;
        position: relative;
        top: 2px;
    }

    .ant-tabs-tab {
        padding: 0 30px;
        transition: 0.3s all;
        position: relative;
        margin-right: 20px;
        cursor: pointer;
    }



    #create_modal .form-group {
        width: 100%;
    }



    /* width */
    #file_content iframe ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    #file_content iframe ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    #file_content iframe ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    #file_content iframe ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    #create_modal .select2-dropdown {
        top: 0 !important;
    }

    .sign_search .select2-container--default .select2-selection--single {
        border-radius: 0;
    }

    .close {
        outline: unset;
    }

    .input-group {
        width: 100%;
    }

    .content .input-group .input-group-addon {
        background-color: #e6fefd;
        width: 42px;
    }

    .check .input-group .input-group-addon {
        width: unset;
    }

    .check {
        width: 100%;
    }

    .tab-content .left {
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
    }

    .tab-content .left>div {
        min-width: 700px;
    }

    .tab-content .left::-webkit-scrollbar {
        width: 1px;
    }

    /* Track */
    .tab-content .left::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    .tab-content .left::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    .tab-content .left::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .disabled {
        pointer-events: none;
        background: #666;
    }

    #ui-datepicker-div {
        z-index: 99999 !important;
    }

    .detail-course {
        background: aliceblue;
        padding: 10px;
    }

    .detail-course strong {
        font-weight: 500;
        color: cornflowerblue;
    }

    table {
        background: white;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
</style>


<script>
    var appointment_app = angular.module('appointment_app', []);
    appointment_app.config(['$locationProvider', function($locationProvider) {
        $locationProvider.html5Mode(true);
    }]);

    appointment_app.controller('add', function($scope, $http, $location) {
        $scope.init = () => {
            $scope.filter = {};
            $scope.filter.date_range = moment().format("DD/MM/YYYY") + " - " + moment().format("DD/MM/YYYY")
            $('.content-wrapper>div').css('opacity', 1);

            $scope.getApp();
            $scope.dateInputInit();
        }

        $scope.confirmModal = (type, value) => {
            $scope.cr_select = value;

            if (type == 0) {
                $('#modalArival').modal('show');
            } else if (type == 1) {
                $('#modalComplete').modal('show');
            }
        }

        $scope.backC = (value) => {
            $scope.cr_select = value;

            if (value.status == 1) {
                $scope.confirm(0, 1);
            }
            if (value.status == 2) {
                $scope.confirm(1, 1);
            }
        }

        $scope.confirm = (type, back = null) => {
            var data = {
                id: $scope.cr_select.id,
                status: type,
                back: back
            }
            $http.post(base_url + 'appointment/ajax_change_status', JSON.stringify(data)).then(r => {
                console.log(r);
                if (r && r.data.status == 1) {

                    CmodalComplete();
                    CmodalArival();
                    $scope.getApp();
                } else toastr["error"]("Đã có lỗi xẩy ra!");
            });
        }

        function CmodalComplete() {
            if ($('#modalComplete').hasClass('show')) {
                $("#modalComplete").modal('hide');

            }
        }

        function CmodalArival() {
            if ($('#modalArival').hasClass('show')) {
                $("#modalArival").modal('hide');
            }
        }

        $scope.getApp = () => {
            $http.get(base_url + 'appointment/ajax_get_all_app?filter=' + JSON.stringify($scope.filter)).then(r => {
                console.log(r);
                if (r && r.data.status == 1) {
                    $scope.ajax_data = r.data.data;

                } else toastr["error"]("Đã có lỗi xẩy ra!");
            });
        }
        $scope.dateInputInit = () => {
            if ($('.date').length) {
                //var start = $scope.start;
                //var end = $scope.end;
                if (typeof start === "undefined") {
                    start = end = moment().format("MM/DD/YYYY");
                }
                setTimeout(() => {
                    $('.date').daterangepicker({
                        opens: 'right',
                        alwaysShowCalendars: true,
                        startDate: moment(),
                        endDate: moment(),
                        ranges: {
                            'Hôm nay': [moment(), moment()],
                            'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1,
                                'days')],
                            '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                            '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                            'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                            'Tháng trước': [moment().subtract(1, 'month').startOf('month'),
                                moment().subtract(1, 'month').endOf('month')
                            ]
                        },
                        locale: {
                            format: 'DD/MM/YYYY'
                        }
                    });
                }, 100);
            }
        }


        $scope.dateInputInit = () => {
            if ($('.date').length) {
                //var start = $scope.start;
                //var end = $scope.end;
                if (typeof start === "undefined") {
                    start = end = moment().format("MM/DD/YYYY");
                }
                setTimeout(() => {
                    $('.date').daterangepicker({
                        opens: 'right',
                        alwaysShowCalendars: true,
                        startDate: moment(),
                        endDate: moment(),
                        ranges: {
                            'Hôm nay': [moment(), moment()],
                            'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1,
                                'days')],
                            '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                            '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                            'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                            'Tháng trước': [moment().subtract(1, 'month').startOf('month'),
                                moment().subtract(1, 'month').endOf('month')
                            ]
                        },
                        locale: {
                            format: 'DD/MM/YYYY'
                        }
                    });
                }, 100);
            }
        }
    });
</script>



<link href="<?= base_url() ?>resources/css/appointment/style_.css" rel="stylesheet">