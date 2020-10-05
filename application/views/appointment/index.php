<style>
    .content-wrapper {
        opacity: 0;
        transition: 0.5s all;
    }
    .cursor{
        cursor: pointer;
    }
</style>
<div class="big-wrap" id="big-wrap">
    <div id="appointment_app" ng-app="appointment_app" ng-controller="add" ng-init="init()">
        <button ng-click="addMoreobject(value)" id="btn-moreAttr" style="opacity: 0;display: none">
        </button>
        <div id="detailHour" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Chi tiết lịch đặt khung giờ {{time_current}}</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        Mã lịch hẹn
                                    </th>
                                    <th class="text-center">
                                        Tên khách hàng
                                    </th>
                                    <th class="text-center">
                                        Ngày tạo
                                    </th>
                                    <th class="text-center">
                                        Người đặt
                                    </th>
                                    <th class="text-center">
                                        Giờ hẹn
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="(index,value) in detailHour">
                                    <td class="text-center">
                                        <span class="label label-default">
                                            {{value.id}}
                                        </span>
                                    </td>
                                    <td>
                                        {{value.cus_name}}
                                    </td>
                                    <td class="text-center">
                                        {{value.created}}
                                    </td>
                                    <td>
                                        {{value.user}}
                                    </td>
                                    <td class="text-center">
                                        {{value.time}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div id="history" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lịch sử khách hàng</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            Ngày
                                        </th>
                                        <th class="text-center">
                                            Kỹ thuật viên
                                        </th>
                                        <th class="text-center">
                                            Chi nhánh
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(index,value) in customer_history">
                                        <td class="text-center">
                                            {{value.date}}
                                        </td>
                                        <td>
                                            {{value.user_name}}
                                        </td>
                                        <td class="text-center">
                                            {{value.description}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="box-body">
            <div class="flex" style="justify-content: center">
                <form role="form" id="form_app">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" control-label ">
                                    Khách hàng<span class="required">*</span>:
                                </label>
                                <div class="">
                                    <input type="text" class="form-control" name="name" value="" placeholder="Họ tên" required="required" ng-model="ob.name" id="nameForm">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" control-label ">
                                    Điện thoại<span class="required">*</span>:
                                </label>
                                <div class="" style="position: relative">
                                    <input type="text" id="phoneForm" value="" onkeyup="this.value=this.value.replace(/[^\d]{12,}/,'').replace(/\D/g,'')" ng-model-options="{debounce:350}" class="form-control phone" ng-model="ob.phone" ng-change="changePhone()" name="phone" placeholder="Điện thoại" required="required" autocomplete="off">
                                    <div class="dropdown-menu resust-search table-responsive" style="width: 100%;"></div>
                                    <span class="cursor" data-toggle="modal" data-target="#history" data-toggle="tooltip" title="Lịch sử khách hàng">
                                        <img ng-if="!load_history && customer_history && customer_history.length>0" style="width: 22px;position: absolute;top: 50%;right: 7px;transform: translateY(-50%);" src="resources/images/school-material.svg" alt="">
                                        <img ng-if="load_history==true" style="width: 22px;position: absolute;top: 50%;right: 7px;transform: translateY(-50%);" src="resources/images/loadhv.svg" alt="">
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group storeForm">
                                <label for="" class=" control-label ">
                                    Loại dịch vụ:
                                </label>
                                <div class="">
                                    <select name="" id="" class="form-control cus-select" ng-model="type">
                                        <option value="1">
                                            Dịch vụ lẻ
                                        </option>
                                        <option value="2">
                                            Dịch vụ lâu ngày
                                        </option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 ">
                            <div class="form-group" ng-class="{'hide':type==2}">
                                <label class=" control-label ">
                                    Ngày :
                                    <span class="df-date" ng-click="selectDate(date)" id="cr_date_show" ng-class="{'active_date':date==cr_date}">
                                        Hôm nay
                                    </span>
                                    <span class="df-date" ng-click="selectDate(date1)" ng-class="{'active_date':date1==cr_date}">
                                        Ngày mai
                                    </span>
                                    <span class="df-date" ng-click="selectDate(date2)" ng-class="{'active_date':date2==cr_date}">
                                        Ngày mốt
                                    </span>
                                </label>
                                <div class="">
                                    <input type="text" class="form-control datepicker" ng-model="ob.date" ng-change="changeSearch()" name="date" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group" ng-class="{'hide':type==1}">
                                <label class=" control-label ">
                                    Ngày :
                                </label>
                                <input type="search" autocomplete="off" class="date form-control ng-pristine ng-valid ng-not-empty ng-touched" ng-model="ob.date_range" name="date_filter" ng-model="filter.date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group hidden" style="width: 100%;position: relative;height: 70px;" ng-class="{dpnone:type==1}">
                        <label for="" class=" control-label ">
                            Chọn dịch vụ:
                        </label>
                        <div class="">
                            <select class="form-control select2" name="service_detail" id="service_detail" ng-model="ob.service_id" require>
                                <option ng-repeat="value in service_t_1 track by $index" value="{{value.id}}">
                                    {{value.name}}
                                </option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group hidden" style="width: 100%;position: relative;height: 70px;" ng-class="{dpnone:type==2}">
                        <label for="" class=" control-label ">
                            Chọn dịch vụ:
                        </label>
                        <div class="">
                            <select class="form-control select2" name="service_detail" id="service_detail" ng-model="ob.service_id" require>
                                <option ng-repeat="value in service_t_2 track by $index" value="{{value.id}}">
                                    {{value.name}}
                                </option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="" ng-class="{'hide-bg':type==2}" style="position: relative">

                            <div class="bootstrap-timepicker hide" ng-click="dropdown()">
                                <input type="text" class="form-control " ng-model="ob.time" name="time" value="" style="pointer-events: none">
                            </div>
                            <div class="box-time">
                                <span ng-repeat="(index,value) in ob_time" ng-click="changeTime(value)" ng-class="{'active_time':value.active==1,'right_shift':value.bettwen==true || !load_list_tvv,'danger_time':value.percent>0.7}" class="label label-default cursor">
                                    <div style="    font-size: 15px;">
                                        {{value.time}}
                                    </div>
                                    <br>
                                    <div class="text-danger total_app" ng-if="value.total" style="position: relative;
    																						top: -25px;">
                                        {{value.total}} lịch
                                    </div>
                                </span>
                                <img ng-if="load_tvv" src="resources/images/loadhv.svg" alt="" style="height: 70px;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%)">

                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>




                    <div class="form-group">
                        <div class="">
                            <textarea class="form-control" name="note" placeholder="Ghi chú" ng-model="ob.note" rows="3">

                            </textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>





                    <div class="form-group">
                        <button class="hide" ng-click="reFreshForm()" id="reFresh">
                            Làm mới
                        </button>
                        <div class="col-sm-12 text-center">
                            <div ng-if="ob.id&&ob.is_over!=0">
                                Không thể cập nhật
                            </div>
                            <input ng-if="ob.id&&ob.is_over==0" class="btn btn-success save" type="submit" name="save" value="Cập nhật" ng-click="add_appoiments($event)">
                            <input ng-if="!ob.id && app_id==0" class="btn btn-success save" type="submit" name="save" value="Thêm mới" ng-click="add_appoiments($event)">
                            <div ng-if="!ob.id&&app_id>0">
                                Đã đặt lịch! <a href="appointments/add/{{app_id}}" target="blank_" class="lb-ct text-danger">Click vào đây để xem chi tiết</a>
                            </div>
                            <div ng-if="!ob.id&&app_id<0" class="text-danger">
                                Lỗi hệ thống vui lòng F5 lại!
                            </div>
                        </div>
                        <div id="note_error" class="text-center">

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view('appointment/schedule_app'); ?>

    <div id="history_" ng-app="history_" ng-controller="history_" ng-init="init()" style="width: 100%;">
        <div class="col-md-12">
            <button ng-click="openHistory()">
                Hiển thị lịch sử đặt lịch
            </button>
            <p></p>
        </div>

        <div class="col-md-12">
            <div class="other-box box-primary" style="background: white" ng-if="lists && lists.length>0">
                <div class="box-header">
                    <strong class="box-title">Đã đặt trong ngày <small>(Lịch hẹn được tạo hôm nay)</small></strong>
                    <p></p>
                </div>
                <div class="box-body table-responsive ">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Họ tên</th>
                                <th>Điện thoại</th>
                                <th>Lịch hẹn</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th class="text-center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="(index,value) in lists">
                                <td class="text-center">{{index+1}}</td>
                                <td>{{value.name}}</td>
                                <td>*****{{value.phone.slice(-4)}}</td>
                                <td> {{value.date}} {{value.time}}</td>
                                <td> {{value.note}}</td>
                                <td> {{value.created}}</td>
                                <td class="text-center">
                                    <a ng-if="value.status!=1" href="appointment?id={{value.id}}" target="_blank">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p></p>
            </div>
            <div class="other-box box-primary" style="background: white" ng-if="list_customers && list_customers.length>0">
                <div class="box-header">
                    <strong class="box-title">Khách hẹn trong ngày <small>(Khách hẹn hôm nay chưa đến)</small></strong>
                    <p></p>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Họ tên</th>
                                <th>Điện thoại</th>
                                <th>Lịch hẹn</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th class="text-center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="(index,value) in list_customers">
                                <td class="text-center">{{index+1}}</td>
                                <td>{{value.name}}</td>
                                <td>*****{{value.phone.slice(-4)}}</td>
                                <td> {{value.date}} {{value.time}}</td>
                                <td> {{value.note}}</td>
                                <td> {{value.created}}</td>
                                <td class="text-center">
                                    <a href="appointment?id={{value.id}}" target="_blank">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p></p>
            </div>
            <div class="other-box box-primary" style="background: white" ng-if="list_tomorow_customers && list_tomorow_customers.length>0">
                <div class="box-header">
                    <strong class="box-title">Khách hẹn ngày mai</strong>
                    <p></p>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Họ tên</th>
                                <th>Điện thoại</th>
                                <th>Lịch hẹn</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th class="text-center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="(index,value) in list_tomorow_customers">
                                <td class="text-center">{{index+1}}</td>
                                <td>{{value.name}}</td>
                                <td>*****{{value.phone.slice(-4)}}</td>
                                <td> {{value.date}} {{value.time}}</td>
                                <td> {{value.note}}</td>
                                <td> {{value.created}}</td>
                                <td class="text-center">
                                    <a href="appointment?id={{value.id}}" target="_blank">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

</div>
<script>
    var app3 = angular.module('history_', []);
    app3.controller('history_', function($scope, $http) {
        $scope.init = () => {}


        $scope.openHistory = () => {
            $scope.load_his_user = true;
            $http.get(base_url + '/appointment/ajax_open_history').then(r => {
                if (r && r.data.status == 1) {
                    $scope.load_his_user = false;

                    $scope.list_customers = r.data.list_customers;
                    $scope.lists = r.data.lists;
                    $scope.list_tomorow_customers = r.data.list_tomorow_customers;

                } else toastr["error"]("Đã có lỗi xẩy ra!");

            });
        }
    });

    angular.bootstrap(document.getElementById("history_"), ['history_']);
</script>


<script>
    var appointment_app = angular.module('appointment_app', []);
    appointment_app.config(['$locationProvider', function($locationProvider) {
        $locationProvider.html5Mode(true);
    }]);

    appointment_app.controller('add', function($scope, $http, $location) {
        $scope.init = () => {
            $('.content-wrapper').css('opacity', 1);
            $scope.load_tvv = false;
            $scope.load_list_tvv = false;
            $scope.busy_check = false;
            $scope.filter = {};
            $scope.date = moment().format('DD-MM-YYYY');
            $scope.date1 = moment().add(1, 'days').format('DD-MM-YYYY');
            $scope.date2 = moment().add(2, 'days').format('DD-MM-YYYY');
            $scope.is_cskh = 0;
            $scope.ob = {}
            $scope.ob.date = moment().format('YYYY-MM-DD');
            $scope.data_tvv = [];
            $scope.type = "1";
            $scope.setTime();
            $scope.pass = true;

            $scope.getService();

            $('.select2').select2();

            if ($location.search().id && $location.search().id > 0) {
                $scope.getApp($location.search().id);
            } else {
                $scope.selectUser({
                    id: 0
                });
            }
            $scope.dateInputInit();

            if ($('.datepicker').length) {
                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd"
                });
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

        $scope.getApp = (id) => {
            var data = {
                id: id
            }
            $http.get(base_url + '/appointment/ajax_get_app?filter=' + JSON.stringify(data)).then(r => {
                $scope.load_history = false;
                if (r && r.data.status == 1) {
                    var temp = r.data.data;
                    $scope.ob.name = temp.name;
                    $scope.ob.phone = temp.phone;

                    $scope.ob.date = temp.date;
                    $scope.ob.time = temp.time;

                    $scope.type = temp.type;
                    $scope.ob.service_id = temp.service_id;

                    $scope.ob.note = temp.note;
                    $scope.ob.id = temp.id;
                    $scope.ob.is_over = temp.is_over;
                    $scope.select2();

                } else toastr["error"]("Đã có lỗi xẩy ra!");
            });

        }
        $scope.changePhone = () => {
            if (!$scope.ob.phone || $scope.ob.phone && $scope.ob.phone.length < 9) {
                return false;
            } else if ($scope.ob.phone && $scope.ob.phone.length > 11) {
                $scope.ob.phone = $scope.cr_phone;
            }
            $scope.load_history = true;

            var data = {
                phone: $scope.ob.phone,
                id: $scope.ob.id,
                date: $scope.ob.date
            }

            $('input[name=save]').css('pointer-events', 'none');
            $http.get(base_url + '/appointment/ajax_customer_history?filter=' + JSON.stringify(data)).then(r => {

                $scope.load_history = false;
                if (r && r.data.status == 1) {
                    $scope.customer_history = r.data.data;
                    $scope.app_id = r.data.app;
                } else toastr["error"]("Đã có lỗi xẩy ra!");
                $('input[name=save]').css('pointer-events', 'initial');
            });
            $scope.cr_phone = angular.copy($scope.ob.phone);
        }


        $scope.$watch('type', function(newValue, oldValue) {
            if (newValue == oldValue) {
                return false;
            }
            delete $scope.ob.service_id;
            $scope.select2();
        }, true);

        $scope.select2 = () => {
            setTimeout(() => {
                $('.select2').select2();
                $scope.$apply();
            }, 0);
        }
        $scope.getService = () => {
            $http.get(base_url + 'appointment/ajax_get_service').then(r => {
                if (r && r.data.status == 1) {
                    r.data.data.forEach(element => {
                        if (element.type == 1) {
                            $scope.service_t_1 = element.obs;
                        } else {
                            $scope.service_t_2 = element.obs;
                        }
                    });

                } else toastr["error"]("Đã có lỗi xẩy ra!");
            });
        }

        $scope.add_appoiments = (event) => {

            if (!$scope.ob.name || $scope.ob.name == "") {
                toastr["error"]("Nhập tên khách hàng");
                return false
            }
            if (!$scope.ob.phone || $scope.ob.phone == "") {
                toastr["error"]("Nhập số điện thoại khách hàng");
                return false

            } else {
                if ($scope.ob.phone.length < 9 && $scope.filter.store_id != 32) {
                    toastr["error"]("Sai số điện thoại");
                    return false
                }
            }

            if (!$scope.ob.service_id) {
                toastr["error"]("Chọn dịch vụ");
                return false
            }


            if ($scope.type == "1" && !$scope.ob.time) {
                toastr["error"]("Chọn giờ đến");
                return false
            }

            if ($scope.type == 1) {
                delete $scope.ob.date_range;
            } else {
                delete $scope.ob.date;
            }

            $(event.target).css('pointer-events', 'none');
            $http.post(base_url + '/appointment/ajax_save', JSON.stringify($scope.ob)).then(r => {
                $(event.target).css('pointer-events', 'auto');
                if (r && r.data.status == 1) {
                    $scope.reFreshForm();
                    toastr["success"]("Đặt lịch thành công");
                } else if (r && r.data.status == 0) {
                    toastr["error"](r.data.message);

                } else {
                    toastr["error"]("Đã có lỗi xẩy ra!");
                }
            })
        }
        $('.dropdown-menu.resust-search').on('mousedown', 'table tbody tr:not(.par-info)', function(e) {
            let p = $(this).attr('data-phone').trim(),
                n = $(this).attr('data-name');

            $scope.$apply(function() {
                $scope.ob.name = n;
                $scope.ob.phone = p;
                $scope.changePhone();
            });

        });

        $scope.reFreshForm = () => {
            $scope.ob = {};
            if ($scope.type == 1) {
                $scope.ob.date = moment().format("YYYY-MM-DD");
                $('#loadChard').trigger('click');
                $scope.selectUser({
                    id: 0
                });
            }
            $scope.resetTime();
            $scope.select2();
        }

        $scope.selectDate = (date) => {
            if (!date) {
                $scope.ob.date = moment().format('YYYY-MM-DD');
            } else {
                $scope.ob.date = moment(date, 'DD-MM-YYYY').format('YYYY-MM-DD');
            }
            $scope.changePhone();
        }

        $scope.changeTime = (item) => {
            $scope.ob.time = item.time;
            $scope.ob_time.map(function(x) {
                x.active = 0;
                return x
            });
            item.active = 1;
        }

        $scope.setTime = () => {

            $scope.arr_time = $scope.someFunction();
            $scope.ob_time = [];
            $scope.arr_time.forEach((element, index) => {
                var temp = {
                    time: element,
                    active: 0
                }
                $scope.ob_time.push(temp);
            });
        }

        $scope.resetTime = (time = null) => {
            $scope.ob_time.forEach(x => {
                x.active = 0;
                if (time) {
                    if (moment(x.time, 'HH:ss').format('HH:ss') == moment(time, 'HH:ss').format('HH:ss')) {
                        x.active = 1;
                    }
                }
            });
        }

        $scope.$watch('ob.date', function(newValue, oldValue) {
            var date = moment($scope.ob.date);
            $scope.cr_date = moment(date, 'YYYY-MM-DD').format('DD-MM-YYYY');

            if (newValue == oldValue) {
                return false;
            }

            if (date.isValid()) {
                //	$scope.getAppChart();
                $scope.selectUser({
                    id: 0
                });

                angular.element('#trigger_chart').scope().getAppChart($scope.ob.date);
            } else {
                toastr["error"]("Nhập sai ngày");

            }

        }, true);

        $scope.selectUser = (item) => {


            $scope.resetTime();
            $scope.cr_user = item;
            $scope.filter.technician_id = item.id;
            $scope.filter.date = $scope.ob.date;
            $scope.ob.technician_id = item.id;
            $scope.data_tvv.map(function(x) {
                x.active = 0;
                return x
            });
            item.active = 1;
            if ($scope.filter.technician_id > 0) {
                return false;
            }
            $scope.load_tvv = true;


            $http.get(base_url + 'appointment/ajax_get_tvv_ap?filter=' + JSON.stringify($scope.filter)).then(r => {
                $scope.load_tvv = false;
                $('.title-ktv').css('display', 'block');

                if (r && r.data.status == 1) {
                    $scope.total_in = r.data.total_in;
                    $scope.ob_time.map(function(x, index) {
                        x.total = undefined;
                        x.bettwen = false;
                        if (item.shift_id && item.shift_id != 0) {
                            var time = moment(x.time + ':00', 'HH:mm:ss'),
                                beforeTime = moment(item.begin, 'HH:mm:ss'),
                                afterTime = moment(item.end, 'HH:mm:ss');

                            if (time.isBetween(beforeTime, afterTime, null, '[]')) {

                                x.bettwen = true;

                            }
                        }
                        if (item.id == 0) {
                            x.bettwen = true;
                        }
                        //set tay
                        if (index == 24 && item.shift_id != -1 && item.shift_id != 0) {
                            x.bettwen = true;
                        }
                        x.percent = 0;
                        r.data.data.map(function(y) {
                            if (moment(x.time, 'HH:mm').format('HH:mm') == moment(y.hour, 'HH:mm').format('HH:mm')) {

                                x.total = y.total;

                                if (r.data.total_ktv) {
                                    x.percent = y.total / r.data.total_ktv;
                                }

                            }
                        });

                        x.active = 0;

                        if ($scope.ob.time) {
                            var time = $scope.ob.time;
                            if (moment(x.time, 'HH:ss').format('HH:ss') == moment(time, 'HH:ss').format('HH:ss')) {
                                x.active = 1;
                            }
                        }
                        return x
                    });
                    $scope.pass = true;
                } else toastr["error"]("Đã có lỗi xẩy ra!");
            })
        }


        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        $scope.someFunction = () => {
            let items = [];
            new Array(24).fill().forEach((acc, index) => {
                if (index > 7 && index < 21) {
                    if (index > 8) {
                        items.push(moment({
                            hour: index
                        }).format('HH:mm'));
                    }

                    if (index != 20) {
                        items.push(moment({
                            hour: index,
                            minute: 30
                        }).format('HH:mm'));
                    }
                }
            })
            return items;
        }


    });
    appointment_app.filter('custom', function() {
        return function(input, search) {
            function ToSlug(title) {
                if (title == '') return '';
                //Đổi chữ hoa thành chữ thường
                slug = title.toLowerCase();

                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*||∣|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                //slug = slug.replace(/ /gi, " - ");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                return slug
            }

            if (!input) return input;
            if (!search) return input;
            //var expected = ('' + search).toLowerCase();
            var expected = ToSlug(search);
            var result = {};
            angular.forEach(input, function(value, key) {
                //	var actual = ('' + value.user_name).toLowerCase();
                var actual = ToSlug(value.user_name);
                if (actual.indexOf(expected) !== -1) {
                    result[key] = value;
                }
            });
            return result;
        }
    });
    $(".add_modal").on("hidden.bs.modal", function() {
        $('#note_error').empty();
        angular.element(document.getElementById('reFresh')).scope().reFreshForm();
        $('#history').modal('hide');
    });
    // begin search phone	
    var timer;
    $('input[name=phone]').on('input', function() {

        if (location.pathname.split('/').pop() == 'cancle_appoints' || location.pathname.split('/').pop() == 'in_day' || location.pathname.split('/').pop() == 'sale_care') {
            return false;
        }

        let self = $(this),
            v = self.val();
        self.parent().removeClass('open')
        if (v.length > 3) {
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout(() => {
                searchPhone(v);
            }, 350);
        }
    });

    function viewRs(html) {
        $('.dropdown-menu.resust-search').html(`<table class="table table-bordered tablelte-full table-hover" style="width:100%">
															<tbody>
																	<tr class="info par-info">
																		<th>Khách hàng</th>
																		<th>SĐT</th>
																		<th>Ngày tạo</th>
																	</tr>
																	${html}
															</tbody>
													</table>`);
    }

    function searchPhone(v) {
        $.ajax({
            type: "get",
            url: base_url + 'appointment/getListCustomerByPhone',
            data: {
                phone: v
            },
            beforeSend: function() {
                $('.dropdown-menu.resust-search table').addClass('load');
                !$('input[name=phone]').parent().hasClass('loading2') && $('input[name=phone]').parent().addClass('loading2');
            },
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    let data = response.data,
                        tbody = '';

                    if (data && data.length > 0) {
                        $.each(data, function(index, element) {
                            tbody += `<tr ${element.app_now=="YES" ? 'class="info"' : ''} data-name="${element.name}" data-phone="${element.phone}">
											<td><div title="${element.name}">${element.app_now=="YES" ? '<i class="fa fa-calendar" style="color: #00a65a;"></i>' : ''} ${element.name}</div></td>
											<td>${element.phone}</td>
											<td>${element.created}</td>
										</tr>`;
                        });
                        viewRs(tbody);
                        setTimeout(() => {
                            !$('input[name=phone]').parent().hasClass('open') && $('input[name=phone]').parent().addClass('open');
                        }, 100)
                    }
                }
            },
            complete() {
                setTimeout(() => {
                    $('.dropdown-menu.resust-search').parent().removeClass('loading2');
                }, 100);
            },
            error() {
                toastr.error('Có lỗi xảy ra!')
            }
        });
    }

    $(document).on('mouseup', function(e) {
        var container = $(".dropdown-menu .resust-search");
        // Nếu click bên ngoài đối tượng container thì ẩn nó đi
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('input[name=phone]').parent().removeClass('open');
        }
    })
</script>



<link href="<?= base_url() ?>resources/css/appointment/style_.css" rel="stylesheet">