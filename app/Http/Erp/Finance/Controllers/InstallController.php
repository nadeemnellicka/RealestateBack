<?php

namespace App\Http\Erp\Finance\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Erp\Finance\Services\DefaultValues;
use App\Http\Erp\Finance\Models\FinGroups;
use App\Http\Erp\Finance\Models\FinLedgers;
use App\Http\Erp\Finance\Models\FinEntrytypes;
use Illuminate\Http\Request;
class InstallController extends Controller
{
    public function index(){
    	$defaultArray=[''=>'FinGroups','ledgers'=>'FinLedgers','entrytypes'=>'FinEntrytypes'];
    		$defaultObject=new DefaultValues();
    		$array=$defaultObject->getDefaults('groups');
    		foreach($array as $val){
    			$thisModel=new FinGroups;
    			$thisModel->name=$val['name'];
    			$thisModel->default_identifier=$val['default_identifier'];
    			$thisModel->parent_id=!empty($val['parent_id'])?$val['parent_id']:0;
    			$thisModel->code=0;
    			$thisModel->company_id=0;
    			$thisModel->branch_id=0;
    			$thisModel->save();
    		}
        	$array=$defaultObject->getDefaults('ledgers');
     		foreach($array as $val){
    			$thisModel=new FinLedgers;
    			$thisModel->name=$val['name'];
    			$thisModel->group_id=$val['group_id'];
    			$thisModel->default_identifier=$val['default_identifier'];
    			$thisModel->code=0;
    			$thisModel->company_id=0;
    			$thisModel->branch_id=0;
    			$thisModel->save();
    		}       	
        	$array=$defaultObject->getDefaults('entrytypes');
     		foreach($array as $val){
    			$thisModel=new FinEntrytypes;
    			$thisModel->name=$val['name'];
    			$thisModel->module=$val['modules'];
    			$thisModel->default_identifier=$val['default_identifier'];
    			$thisModel->save();
    		}       	

    }
  
}

