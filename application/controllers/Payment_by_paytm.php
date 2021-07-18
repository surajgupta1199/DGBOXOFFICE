<?php

require_once(APPPATH."libraries/paytm/lib/config_paytm.php");
require_once(APPPATH."libraries/paytm/lib/encdec_paytm.php");

class Payment_by_paytm extends CI_Controller {
     public function __construct() {
       parent::__construct();
       
     }

    public function PaytmGateway()
    {
        $common_id=$this->input->post('common_id');
        $type=$this->input->post('type');
        $orderId = rand(1000000, 9999999); /// must be unique

          $result = $this->StartPayment($orderId,$common_id,$type);
          echo $this->load->view('payment_gateway',$result,true);
    }


    public function StartPayment($orderId,$common_id,$type)
    {
        $customer_id=$this->session->userdata('customer_id');
        $where=array('customer_id'  => $customer_id);
        $customer_data=$this->basic->get_single_data($where,'customer_master');
        $where=array('common_id'    =>  $common_id);
        $product_data=(array)$this->basic->get_single_data($where,'common_master');


        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $orderId."_".$common_id."_".$type."";     
        $paramList["CUST_ID"] = $customer_id;   /// according to your logic
        $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $product_data['price'];
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
   
        $paramList["CALLBACK_URL"] = base_url('Payment_by_paytm/PaytmResponse');
        $paramList["MSISDN"] = $customer_data['customer_mobile_no']; //Mobile number of customer
        $paramList["EMAIL"] ='foo@gmail.com';
        $paramList["VERIFIED_BY"] = "Mobile Number"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
        $result['checkSum'] = $checkSum;
        $result['paramList'] = $paramList;
        return $result;
    }

    /////////// response from paytm gateway////////////
    public function PaytmResponse()
    {
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $paramList = $_POST;
       

        // echo $_POST['STATUS'];
        // echo "<pre>";


       // print_r($paramList);
   
       $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

       $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
       if($isValidChecksum == "TRUE")
       {
            $product_data_result=explode("_", $paramList['ORDERID']);
            $type_content = $product_data_result[2] == 1 || $product_data_result[2] == 5?"movie":"series";
           if ($_POST["STATUS"] == "TXN_SUCCESS")
           { /// put your to save into the database // tansaction successfull
                 $customer_id=$this->session->userdata('customer_id');
                 $data=array(
                        'transaction_id'=>  $paramList['ORDERID'],
                        'customer_id'   =>  $customer_id,
                        'common_id'     =>  $product_data_result[1],
                        'type'          =>  $product_data_result[2],
                        'price'         =>  $paramList['TXNAMOUNT'],
                        'ordered_on'    =>  date("Y-m-d") 
                        );
                 
                        $order_details=$this->basic->insert($data,'order_master');
                        $msgdata['msg']='error';
                        if($order_details)
                        {
                            $msgdata['msg']='success';
                        }

                        echo json_encode($msgdata);

                        $success['success'] = "success"; 
                        redirect(base_url('home/order_summary/successfully/'.$type_content.'/'.$product_data_result[1]));
                        // redirect(base_url('home/show_detail/'.$type_content.'/'.$product_data_result[1]));
               

               //var_dump($paramList);
           }
           else {/// failed

                $success['success'] = "error"; 
                redirect(base_url('home/order_summary/error/'.$type_content.'/'.$product_data_result[1]));
                // redirect(base_url('home/show_detail/'.$type_content.'/'.$product_data_result[1]));
           }
       }else
       {//////////////suspicious
          // put your code here
            echo $isValidChecksum;
       }
    }


    public function get_trasaction_status()
    {
        $paytmParams = array();

        $paytmParams["MID"]     = PAYTM_MERCHANT_MID;
        $paytmParams["ORDERID"] = "16114989654649";

        /*
        * Generate checksum by parameters we have
        * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
        */
        // $checksum = PaytmChecksum::generateSignature($paytmParams, "YOUR_MERCHANT_KEY");

        // $paytmParams["CHECKSUMHASH"] = $checksum;

        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        /* for Staging */
        $url = "https://securegw-stage.paytm.in/order/status";

        /* for Production */
        // $url = "https://securegw.paytm.in/order/status";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
        $response = curl_exec($ch);

        echo $response;
    }
}
?>