<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\HoppaModel;
use App\Http\Resources\HoppaResource;
use Illuminate\Http\JsonResponse;

class HoppaController extends BaseController {

    public function index(Request $request) {

        echo 1;
        exiT; 
        $exData = array(
            "AccountId" => 6839514363,
            "Amount" => "100.00",
            "CardCvv" => "555",
            "CardExpireMonth" => "12",
            "CardExpireYear" => "2026",
            "CardNumber" => "9792100000000001",
            "CardOwnerTitle" => "Ad Soyad",
            "CustomerReferenceNumber" => "6B29FC40-CA47-1067-B31D-00DD010661D",
            "CommissionIsIn" => true,
            "ClientIp" => "127.0.0.1",
            "AccountNumber" => "6839514361",
            "CustomerResponseUrlFail" => "127.0.0.1",
            "CustomerResponseUrlSuccess" => "127.0.0.1"
        );

        $arrayKey = $this->arrayKey($exData);

        if ($arrayKey) {
            $this->JsonResponse($arrayKey, 'error');
        } else {
            $newArray = $this->dataMerge($exData);
            $CustomerReferenceNumber = $newArray['CustomerReferenceNumber'];
            $CustomerReferenceNumberQuery = $this->dataInsert($CustomerReferenceNumber);
            if (!$CustomerReferenceNumberQuery) {
                HoppaModel::insert($CustomerReferenceNumber);
            }
        }
    }

    private function dataInsert($CustomerReferenceNumber) {
        return HoppaModel::where('CustomerReferenceNumber', $CustomerReferenceNumber)->get()->count();
    }

    /**
     * 
     * @param type $param
     * @return type
     */
    private function dataMerge($param) {
        return $this->MergData($param);
    }

    /**
     * 
     * @param type $result
     * @param type $message
     */
    public function JsonResponse($result, $message) {

        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        print_r(json_encode($response));
        exit;
    }

    /**
     * 
     * @param type $param
     * @return string
     */
    private function arrayKey($param) {
        $ArrayDiff = $this->arrayToCompare($param);

        $arrayDifftText = '';
        if ($ArrayDiff) {
            foreach ($ArrayDiff as $key => $value) {
                $arrayDifftText = $key . ',';
            }
        }


        if (!$arrayDifftText) {
            return '';
        } else {
            return array('key' => $arrayDifftText);
        }
    }

    /**
     * 
     * @param array $mergData
     * @return type
     */
    private function MergData(array $mergData) {
        $data = array(
            'ErrorCode' => 0,
            'Result' => 0,
            'Messege' => 0,
            'status' => 0,
            'black_list' => 0
        );
        return array_merge($data, $mergData);
    }

    /**
     * 
     * @param array $data
     * @return type
     */
    private function hoppaCall(array $data) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apigw.elekse.com/api/hoppa/virtualpos/startpaymentanonymous',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    /**
     * 
     * @param array $data
     * @return type
     */
    private function arrayToCompare(array $data) {

        return array_diff($this->arrayFIX(), $data);
    }

    /**
     * 
     * @return array
     */
    private function arrayFIX() {
        return array(
            "AccountId" => 6839514363,
            "Amount" => "100.00",
            "CardCvv" => "555",
            "CardExpireMonth" => "12",
            "CardExpireYear" => "2026",
            "CardNumber" => "9792100000000001",
            "CardOwnerTitle" => "Ad Soyad",
            "CustomerReferenceNumber" => "6B29FC40-CA47-1067-B31D-00DD010661DA",
            "CommissionIsIn" => true,
            "ClientIp" => "127.0.0.1",
            "AccountNumber" => "6839514361",
            "CustomerResponseUrlFail" => "127.0.0.1",
            "CustomerResponseUrlSuccess" => "127.0.0.1"
        );
    }
}
