<?php

class ReportsController {

    private $report;

    

    public function __construct() {
        
        $this->report = new ReportModel();
    }

    public function getAllReports() {
        
        return $this->report->getReports();
    }

    public function updateReport($id, $data) {

        $this->report->updateReport($id, $data);
    }

    public function deleteReport($id) {

        $this->report->deleteReport($id);
    }

}
?>
