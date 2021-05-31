<?php
namespace App\Http\Erp\Finance\Services;
class EntriesHelper{
    
    public function getDefaults($for){
        if($for=='groups'){
            //main groups
            $default[0]['name']='Asstes';
            $default[1]['name']='Liabilities';
            $default[2]['name']='Revenues';
            $default[3]['name']='Expenses';
            $default[4]['name']='Equity';
            $default[5]['name']='Cost Of Sales';
            $default[6]['name']='Non-Operating Expenses';
            $default[7]['name']='Non-Operating Revenues';
            //sub groups
            $default[8]['name']='Non-Current Assets';
            $default[8]['parent_id']=1;
            $default[9]['name']='Current Assets';
            $default[9]['parent_id']=1;
            $default[10]['name']='Non-Current Liabilities';
            $default[10]['parent_id']=2;
            $default[11]['name']='Current Liabilities';
            $default[11]['parent_id']=2;
            $default[12]['name']='Sales';
            $default[12]['parent_id']=3;
            $default[13]['name']='Selling, General, Administrative';
            $default[13]['parent_id']=4; 
            $default[14]['name']='Stockholders Equity';
            $default[14]['parent_id']=5;
            $default[15]['name']='Cash And Cash Equivalents';
            $default[15]['parent_id']=9;
            $default[16]['name']='Retained Earnings';
            $default[16]['parent_id']=14;
        }elseif($for=='ledgers'){
            $default[0]['name']='Default Assets';
            $default[0]['group_id']=9;
            $default[1]['name']='Default Liabilities';
            $default[1]['group_id']=11;
            $default[2]['name']='Default Revenues';
            $default[2]['group_id']=12;
            $default[4]['name']='Retained Earnings';
            $default[4]['group_id']=16;
            $default[5]['name']='Cash on Hand';
            $default[5]['group_id']=15;
            $default[6]['name']='Bank';
            $default[6]['group_id']=15;
        }elseif($for=='entrytypes'){
            $default[0]['name']='Sales Invoice';
            $default[0]['modules']='sales';
            $default[1]['name']='Purchase Bill';
            $default[1]['modules']='purchase';
            $default[2]['name']='Opening Balance';
            $default[2]['modules']='accounts';
        }
        return $default;
    }

}
