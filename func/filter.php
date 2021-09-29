<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if(isset($_GET['type']) and isset($_GET['RentorSell'])){
    if (isset($_GET['Filter'])) {
        $data = array($_GET['Filter']);
        foreach($data as $data){
            $Filter = filter_var($data, FILTER_SANITIZE_STRING); //Sanitize and Filtering data
        }
    }   
        $house = new GetHouse();
        switch ($_GET['type']) {
        case ($_GET['type'] == 'Facilities'): 
            $result = $house->get_rent_Filter($Filter,0,0,'Facilities',$_GET['RentorSell']);
            print_r($result);
            break;
        case ($_GET['type'] == 'Area' and isset($_GET['min']) and isset($_GET['max'])):
            $result = $house->get_rent_Filter('none',$_GET['min'],$_GET['max'],'Area',$_GET['RentorSell']);
            print_r($result);
            break;
        case ($_GET['type'] == 'Price' and isset($_GET['min']) and isset($_GET['max'])):
            $result = $house->get_rent_Filter('none',$_GET['min'],$_GET['max'],'Price',$_GET['RentorSell']);
            print_r($result);
            break;
        case ($_GET['type'] == 'District'):
            $result = $house->get_rent_Filter($Filter,0,0,'District',$_GET['RentorSell']);
            print_r($result);
            break;
        case ($_GET['type'] == 'City'):
            $result = $house->get_rent_Filter($Filter,0,0,'City',$_GET['RentorSell']);
            print_r($result);
            break;   
        case ($_GET['type'] == 'WaterFacility' and isset($_GET['min']) and isset($_GET['max'])):
            $result = $house->get_rent_Filter('none',$_GET['min'],$_GET['max'],'WaterFacility',$_GET['RentorSell']);
            print_r($result);
            break;
        case ($_GET['type'] == 'HouseAddress'):
            $result = $house->get_rent_Filter($Filter,0,0,'HouseAddress',$_GET['RentorSell']);
            print_r($result);
            break; 
        default:
            break;
        //return $result;
        }
}
