<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if(isset($_GET['type'])){
    if (isset($_GET['Filter'])) {
        $data = array($_GET['Filter']);
        foreach($data as $data){
            $Filter = filter_var($data, FILTER_SANITIZE_STRING); //Sanitize and Filtering data
        }
    }
        $house = new GetHouse();
        if($_GET['type'] == 'Facilities') {
            $result = $house->get_rent_Filter($Filter,0,0,'Facilities');
            print_r($result);
        }elseif ($_GET['type'] == 'Area' and isset($_GET['min']) and isset($_GET['max'])) {
            $result = $house->get_rent_Filter('none',$_GET['min'],$_GET['max'],'Area');
            print_r($result);
        }elseif ($_GET['type'] == 'Price' and isset($_GET['min']) and isset($_GET['max'])) {
            $result = $house->get_rent_Filter('none',$_GET['min'],$_GET['max'],'Price');
            print_r($result);
        }elseif ($_GET['type'] == 'HouseAddress') {
            $result = $house->get_rent_Filter($Filter,0,0,'HouseAddress');
            print_r($result);
        }elseif ($_GET['type'] == 'WaterFacility' and isset($_GET['min']) and isset($_GET['max'])) {
            $result = $house->get_rent_Filter('none',$_GET['min'],$_GET['max'],'WaterFacility');
            print_r($result);
        }else{}
        //return $result;
}
