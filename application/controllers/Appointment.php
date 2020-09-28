<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends Auth_Controller
{

	public function index()
	{
		$this->render('appointment/index');
	}

	public function ajax_get_tvv_ap()
	{
		$filter = (object) json_decode($this->input->get('filter'));

		// $total = $this->db->select('sum(if(b.id is not null,0,1)) total')->from('admin_users a')
		// 	->join('(SELECT a.id,a.user_id FROM admin_user_off a JOIN admin_user_off_detail b ON a.id=b.id_off
		// WHERE (a.type=1) and a.status=1 and a.store_id= ' . $filter->store_id . ' and (b.date<="' .  $filter->single_date . '" and b.date_end>="' .  $filter->single_date . '")
		// GROUP BY a.user_id) b', 'a.id=b.user_id', 'left')
		// 	->where('(a.main_group_id=11 or a.main_group_id=16)')
		// 	->where('a.active', 1)
		// 	->where('a.main_store_id', $filter->store_id)->get()->row();


		$single_date = isset($filter->single_date) ? 'and ap.date="' . $filter->single_date . '"' : '';
		$tech_id = isset($filter->technician_id) && $filter->technician_id != 0 ? 'and ap.technician_id ="' . $filter->technician_id . '"' : '';
		if (isset($filter->technician_id)) {
			$rs = $this->db->query("select
		 IF(MINUTE(ap.time) <=15
			,concat(hour(ap.time),':00'),IF(MINUTE(ap.time)<45
							  ,concat(HOUR(ap.time),':30'),concat(hour(ap.time)+1,':00' )
							 )
		   ) as hour
		   ,count(*) as  total
		
		 from appointments ap 
		 where  1 $single_date   $tech_id
		 group by hour")->result();

			if ($filter->technician_id != 0) {
				$invoice = $this->db->select('count(*) as total')->from('invoices')->where('technician_id', $filter->technician_id)->get()->row();
			}
		}
		echo json_encode(array('status' => 1, 'data' => isset($rs) ? $rs : array()));
	}
	public function ajax_get_service()
	{
		$rs =	$this->db->select("
		GROUP_CONCAT(
			if(a.id is not null,
			JSON_OBJECT(
				'id',a.id,
				'name',a.name
			)
			,'')
		) AS obs,
		a.type
		")->from('services a')
			->group_by('a.type')
			->get()->result();

		foreach ($rs as $key => $value) {
			$value->obs = json_decode('[' . $value->obs . ']');
		}

		echo json_encode(array('status' => 1, 'data' => isset($rs) ? $rs : array()));
	}

	public function renderSql($usrData, $table_name, $condition)
	{
		$count = 0;
		$fields = '';
		$title  = '';
		$where  = '';
		$count_ = 0;

		foreach ($usrData as $col => $val) {

			if ($count++ != 0) {
				$fields .= ', ';
				$title   .= ', ';
			}
			$val =  $this->db->escape($val);


			$fields .= "$val AS `$col`";
			$title .= "`$col`";
		}
		foreach ($condition as $key => $value) {
			if ($count_++ != 0) {
				$where   .= ' and ';
			}
			$value =  $this->db->escape($value);
			$where .= "`" . $key . "`=" . $value . "";
		}

		$query = "INSERT INTO `" . $table_name . "` (" . $title . ")
		SELECT * FROM (SELECT " . $fields . ") AS tmp
		WHERE NOT EXISTS (
			SELECT id FROM `" . $table_name . "` WHERE " . $where . "
		) LIMIT 1";
		return $query;
	}

	public function ajax_customer_history()
	{
		$filter = (object) json_decode($this->input->get('filter'));
		$phone = preg_replace('/\s+/', '', $filter->phone);

		$rs = $this->db->select()->from('appointments a')->join('customers b', 'a.customer_id=b.id')->where('b.phone', $phone)->order_by('a.date', 'desc')
			->limit('10')
			->get()->result();

		$id = -1;
		if (strlen($phone) > 8) {
			$this->db->select()->from('appointments a')->join('customers b', 'a.customer_id=b.id')->where('b.phone', $phone);

			if (isset($filter->id)) {
				$this->db->where('a.id !=', $filter->id);
			}
			if (isset($filter->date)) {
				$this->db->where('a.date', $filter->date);
			}
			$app = $this->db->get()->row();
			$id = $app ? $app->id : -1;
		} else {
			$id = 0;
		}
		echo json_encode(array('status' => 1, 'data' => $rs, 'app' => $app ? $id : -1));
	}



	public function getListCustomerByPhone()
	{
		$phone = $this->input->get('phone');

		if (!$phone) {
			die(json_encode(['status' => 0, 'message' => 'empty', 'data' => []]));
		}

		$data =	$this->db->select('b.name, b.phone, DATE_FORMAT(a.created, "%d-%m-%Y") created, 
		IF( a.id > 0, "YES", "NO" ) app_now')
			->from('customers b')->join('appointments a', 'b.id=a.customer_id and a.date = CURRENT_DATE()', 'left')->where('b.phone like "%' . $phone . '%"')
			->limit(10)->get()->result();
		die(json_encode(['status' => 1, 'message' => 'success', 'data' => isset($data) ? $data : []]));
	}
	public function ajax_save()
	{
		$_insert_data = (object) json_decode(file_get_contents('php://input'), true);



		$cr_date = date('Y-m-d H:i:s');
		$_insert_data->phone = preg_replace('/\s+/', '', $_insert_data->phone);

		$check = $this->db->select('count(id) total, id')->from('customers')->where('phone', $_insert_data->phone)->get()->row();

		if ($check && $check->total == 0) {
			$customer = array(
				'name' => $_insert_data->name,
				'phone' => $_insert_data->phone,
				'created' => $cr_date
			);
			$this->db->insert('customers', $customer);
			$cus_id = $this->db->insert_id();
		} else if ($check && $check->total > 0) {
			$cus_id = $check->id;
		} else {
			echo json_encode(array('status' => 0, 'message' => "Lỗi hệ thống"));
			die;
		}



		$data = array(
			'customer_id' => $cus_id,
			'date'        => $_insert_data->date,
			'time'        => $_insert_data->time,
			'service_id'  => $_insert_data->service_id,

		);
		if (isset($_insert_data->note)) {
			$data['note'] = $_insert_data->note;
		}

		if (empty($_insert_data->id)) {

			$data['created'] = $cr_date;
			$rs = $this->db->insert('appointments', $data);
		}


		echo json_encode(array('status' => 1, 'data' => $rs));
	}

	public function ajax_get_data_appoinment_by_time_res()
	{
		$filter = (object) json_decode($this->input->get('filter'));
		$single_date = isset($filter->date) ? 'and ap.date="' . $filter->date . '"' : '';
		$rs = $this->db->query("select
		 IF(MINUTE(ap.time) <=15
			,concat(hour(ap.time),':00'),IF(MINUTE(ap.time)<45
							  ,concat(HOUR(ap.time),':30'),concat(hour(ap.time)+1,':00' )
							 )
		   ) as hour
		   ,sum(case when ap.status != 2  then 1 ELSE 0 end) total
		   ,sum(case when ap.status =1 then 1 ELSE 0 end) success 
			,sum(case when ap.status =2   then 1 ELSE 0 end) finish
			,GROUP_CONCAT(
				JSON_OBJECT(
					'id',
					ap.id,
					'cus_name',
					cus.name,
					'created',
					DATE_FORMAT(ap.created,'%d-%m-%Y %H:%i'),
					'time',
					ap.time
				)
			) AS obs
		
		 from appointments ap join customers cus ON ap.customer_id=cus.id
		 where  1 $single_date
		 group by hour")->result();

		$total_all = 0;
		$total_fi = 0;
		$total_su = 0;
		foreach ($rs as $key => $value) {
			$total_all = $total_all + $value->total;
			$total_fi = $total_fi + $value->finish;
			$total_su = $total_su + $value->success;

			$value->obs = json_decode('[' . $value->obs . ']');
		}


		echo json_encode(array('status' => 1, 'data' => $rs, 'total_all' => $total_all, 'total_fi' => $total_fi, 'total_su' => $total_su, 'qr' => $this->db->last_query()));
	}

	public function ajax_get_app()
	{
		$filter = (object) json_decode($this->input->get('filter'));
		$rs = $this->db->select('a.note,a.id,a.service_id,c.type,a.date,DATE_FORMAT(a.time,"%H:%i") time,b.name,b.phone')->from('appointments a')->join('customers b', 'a.customer_id=b.id')->join('services c', 'a.service_id=c.id')->where('a.id',	$filter->id)
			->get()->row();
		echo json_encode(array('status' => 1, 'data' => $rs));
	}
}
