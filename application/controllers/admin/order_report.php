<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_report extends CI_Controller {

	
	private $_arr;
	
	public function __construct() {
		parent::__construct();
		
		$this->load->helper(array('form'));
		
		$params = array('sadmin_uname', 'sadmin_islogin', 'sadmin_ulvl', 'sadmin_uid');
		$this->sessionbrowser->getInfo($params);
		$this->_arr = $this->sessionbrowser->mData;
		
	}
	
	public function index(){  
		$this->order_report();
	}
	
	public function order_report(){
	
		authUser();
		
		$data['sessVar'] = $this->_arr;
		
		$params['querystring'] = 'SELECT mboos_orders.mboos_order_id, mboos_orders.mboos_order_date, mboos_orders.mboos_order_pick_schedule, mboos_orders.mboos_orders_total_price, mboos_customers.mboos_customer_complete_name
								FROM mboos_orders 
								LEFT JOIN mboos_customers ON mboos_customers.mboos_customer_id = mboos_orders.mboos_customer_id
								WHERE mboos_orders.mboos_order_status="3"'; 
			
		$this->mdldata->reset();
		$this->mdldata->select($params);
		$data['completed'] = $this->mdldata->_mRecords;
		
		$data['main_content'] = 'admin/report_view/order_report_view';
		$this->load->view('includes/template', $data);
	}
}











