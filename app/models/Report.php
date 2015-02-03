<?php

class Report extends Eloquent {

    protected $table = 'hms_investigation_list';

    public static function getReport() {
        return DB::table('hms_investigation_group')
                        ->join('hms_investigation_list', 'hms_investigation_group.id', '=', 'hms_investigation_list.investigation_group_id')
                        ->join('hms_outdoor_details', 'hms_investigation_list.id', '=', 'hms_outdoor_details.investigation_list_id')
                        //->select('*', 'hms_outdoor_details.created_at as created_at')
                        ->select('*')->orderby('group_name')
                        ->get();
    }

}
