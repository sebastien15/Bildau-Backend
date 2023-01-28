<?php

class ReportModel {
    private $filePath;

    public function __construct() {
        $this->filePath = 'reports.json';
    }

    

    public function getReports() {

        $jsonData = file_get_contents($this->filePath);
        return json_decode($jsonData, true);
    }


    public function updateReport($id, $data) {

        $allReports = $this->getReports();
        $elements = $allReports['elements'];
        for($i=0; $i<count($elements); $i++){
            
            // json_encode($elements[$i]['id']);

            if($elements[$i]['id']==$id){
                
                $elements[$i] = array_merge($elements[$i], $data);
                break;
            }
        }
        $allReports['elements'] = $elements;
        file_put_contents($this->filePath, json_encode($allReports));
    }


    public function deleteReport($id) {

        $allReports = $this->getReports();
        $elements = $allReports['elements'];
        $indexremoved = -1;
        for($i=0; $i<count($elements); $i++){
            

            if($elements[$i]['id']==$id){
                
                $indexremoved = $i;
                break;
            }
        }
        if($indexremoved==-1) return;
        $allReports['size'] =  $allReports['size'] - 1;
        array_splice($elements, $indexremoved, 1);
        $allReports['elements'] = $elements;
        file_put_contents($this->filePath, json_encode($allReports));
    }

}

?>
