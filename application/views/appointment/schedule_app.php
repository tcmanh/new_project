<div class="schedule" id="schedule" ng-app="schedule" ng-controller="schedule" ng-init="init()">
 <button ng-click="getAppChart(date)" class="hide" id="trigger_chart"> </button>
    <div class="table-responsive">
        <table id="tbl" class="table table-bordered" style="margin-bottom: 0">
            <thead style="background: rgb(245, 229, 209)">
                <tr>
                    <th class="text-center">Khung giờ</th>
                    <th class="text-center">Lịch còn lại</th>
                    <th class="text-center">Đang điều trị</th>
                    <th class="text-center">
                        Đang chờ
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(index,value) in data" ng-class="{'green':value.total/total_all<0.15||value.total==0,'yellow':value.total/total_all<0.3&&value.total/total_all>=0.15,'red':value.total/total_all>=0.3}">
                    <td class="flex" style="justify-content: space-between">
                        <span>
                            {{value.hour}}
                        </span>
                        <span class="detail_hour cursor" ng-if="value.total" ng-click="openDetailHour(value.obs,value.hour)">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </td>
                    <td>
                        <div class="flex " style="justify-content: center">
                            <div class="text-center">
                                {{value.total}}

                            </div>
                            <!-- <div>
												{{(value.total/total_all)*100|number:0}} %
											</div> -->
                        </div>

                    </td>
                    <td>
                        <div class="flex " style="justify-content: center">
                            <div class="text-center">
                                {{value.success_show}}

                            </div>
                            <!-- <div>
												{{(value.success_show/total_su)*100 ||0 |number:0}} %
											</div> -->
                        </div>
                    </td>
                    <td>
                        <div class="flex " style="justify-content: center">
                            <div class="text-center">
                                {{value.finish}}
                            </div>
                            <!-- <div>
												{{(value.finish/total_fi)*100 ||0|number:0}} %
											</div> -->
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot style="background: rgb(245, 229, 209)">
                <td class="text-center">
                    <strong>
                        Tổng:
                    </strong>
                </td>
                <td class="text-center">
                    {{total_all}}
                </td>
                <td class="text-center">
                    {{total_su}}
                </td>
                <td class="text-center">
                    {{total_fi}}
                </td>
            </tfoot>
        </table>
    </div>
</div>

<script>
    var app2 = angular.module('schedule', []);
    app2.controller('schedule', function($scope, $http) {
        $scope.init = () => {
            $scope.getAppChart($('input[name=date]').val());
        }

        $scope.getAppChart = (date = null) => {
            $scope.data = [];
            var data = {
                date: date
            }
            $http.get(base_url + '/appointment/ajax_get_data_appoinment_by_time_res?filter=' + JSON.stringify(data)).then(r => {
                var rs = [];

                if (r && r.data.status == 1) {
                    $scope.appointments = r.data.data;
                    $scope.total_all = r.data.total_all;
                    $scope.total_fi = r.data.total_fi;
                    $scope.total_su = r.data.total_su;
                    r.data.data.forEach(element => {
                        element.total = parseInt(element.total);
                        element.success_show = parseInt(element.success);
                        element.success = parseInt(element.success);
                        element.unsuccess = element.total - element.success;
                        element.finish = parseInt(element.finish);
                        if (element.finish > 0) {
                            element.success = element.success - element.finish;
                        }

                    });
                    $scope.dataApmt = r.data.data;
                    var time = $scope.someFunction();

                    time.forEach((element, k) => {
                        let defaut_time = {
                            hour: element,
                            total: 0,
                            success: 0,
                            success_show: 0,
                            unsuccess: 0,
                            finish: 0,
                            obs: []
                        }
                        r.data.data.forEach((e, key) => {
                            var time = e.hour

                            if (moment(element, 'H:mm').unix() == moment(time, 'H:mm').unix()) {
                                defaut_time.hour = element;
                                defaut_time.total = e.total;
                                defaut_time.success = e.success || 0;
                                defaut_time.success_show = e.success_show || 0;
                                defaut_time.unsuccess = e.unsuccess || 0;
                                defaut_time.finish = e.finish || 0;
                                defaut_time.obs = e.obs;
                            } else {
                                defaut_time.hour = element;
                            }
                        });
                        $scope.data.push(defaut_time);
                    });



                } else toastr["error"]("Đã có lỗi xẩy ra!");
            })
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

    angular.bootstrap(document.getElementById("schedule"), ['schedule']);
</script>