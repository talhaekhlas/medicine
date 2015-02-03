<?php

class HomeController extends BaseController {

    public function investigation_summery() {
        $data['report'] = Report::getReport();
        return View::make('report.investigation_summery', $data);
    }

}
