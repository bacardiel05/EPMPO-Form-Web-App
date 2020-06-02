<?php

namespace App\Http\Controllers;

use App\BProject;
use App\Agency;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class BProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = BProject::all()->where('parent_id', null);
        $agencies = Agency::all();
        $statuses = ['In Progress','PM Pending Review','Submitted', 'Approved','In Progress [Returned for Revision]'];
        return view('projects.index2', compact('projects', 'statuses','agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $bProject = new BProject();
        
        $bProject->agency_id = auth()->user()->agency_id;
        $bProject->parent_id = request('parent_id');
        $bProject->mpo_id = request('mpo_id');
        $bProject->csj_cn = request('csj_cn');
        $bProject->author = auth()->user()->name;
        $bProject->name = request('name');
        $bProject->description = request('description');
        $bProject->limit_from = request('limit_from');
        $bProject->limit_to = request('limit_to');
        $bProject->need_purpose = request('need_purpose');
        $bProject->agency_comments = request('agency_comments');
        $bProject->transit_funds_request = request('transit_funds_request') == 'on' ? 1 : null;
        $bProject->fiscal_year = request('fiscal_year');
        $bProject->network_year = request('network_year');
        $bProject->psp_1 = request('psp_1') == '----' ? null : request('psp_1');
        $bProject->psp_1 = request('psp_2') == '----' ? null : request('psp_2');
        $bProject->psp_1 = request('psp_3') == '----' ? null : request('psp_3');
        $bProject->psp_1 = request('psp_4') == '----' ? null : request('psp_4');
        $bProject->psp_1 = request('psp_5') == '----' ? null : request('psp_5');
        $bProject->goal_1 = request('goal_1') == 'on' ? true : false;
        $bProject->goal_2 = request('goal_2') == 'on' ? true : false;
        $bProject->goal_3 = request('goal_3') == 'on' ? true : false;
        $bProject->goal_4 = request('goal_4') == 'on' ? true : false;
        $bProject->goal_6 = request('goal_5') == 'on' ? true : false;
        $bProject->goal_5 = request('goal_6') == 'on' ? true : false;
        $bProject->description_goal_1 = request('description_goal_1');
        $bProject->description_goal_2 = request('description_goal_2');
        $bProject->description_goal_3 = request('description_goal_3');
        $bProject->description_goal_4 = request('description_goal_4');
        $bProject->description_goal_5 = request('description_goal_5');
        $bProject->description_goal_6 = request('description_goal_6');
        $bProject->strategy_1 = request('strategy_1') == '----' ? null : request('strategy_1');
        $bProject->strategy_2 = request('strategy_2') == '----' ? null : request('strategy_1');
        $bProject->strategy_3 = request('strategy_3') == '----' ? null : request('strategy_1');
        $bProject->strategy_4 = request('strategy_4') == '----' ? null : request('strategy_1');
        $bProject->strategy_5 = request('strategy_5') == '----' ? null : request('strategy_1');
        $bProject->strategy_6 = request('strategy_6') == '----' ? null : request('strategy_1');
        $bProject->description_strategy_1 = request('description_strategy_1');
        $bProject->description_strategy_2 = request('description_strategy_2');
        $bProject->description_strategy_3 = request('description_strategy_3');
        $bProject->description_strategy_4 = request('description_strategy_4');
        $bProject->description_strategy_7 = request('description_strategy_7');
        $bProject->description_strategy_8 = request('description_strategy_8');
        $bProject->description_strategy_9 = request('description_strategy_9');
        $bProject->description_strategy_10 = request('description_strategy_10');
        $bProject->block_system = request('block_system');
        $bProject->reviewed_dates = request('reviewed_dates');
        $bProject->capital = request('capital') == 'on' ? 1 : null;
        $bProject->operations = request('operations') == 'on' ? 1 : null;
        $bProject->c = request('c') == 'on' ? 1 : null;
        $bProject->nonc = request('nonc') == 'on' ? 1 : null;
        $bProject->pe = request('pe') == 'on' ? 1 : null;
        $bProject->env = request('env') == 'on' ? 1 : null;
        $bProject->eng = request('eng') == 'on' ? 1 : null;
        $bProject->r = request('r') == 'on' ? 1 : null;
        $bProject->acq = request('acq') == 'on' ? 1 : null;
        $bProject->utl = request('utl') == 'on' ? 1 : null;
        $bProject->appointment_year = request('appointment_year');
        $bProject->tdc_award_amount = request('tdc_award_amount');
        $bProject->tdw_award_date = request('tdw_award_date');
        $bProject->tdc_amount_requested = request('tdc_amount_requested');
        $bProject->type_capital = request('type_capital') == 'on' ? 1 : null;
        $bProject->type_operating = request('type_operating') == 'on' ? 1 : null;
        $bProject->type_planning = request('type_planning') == 'on' ? 1 : null;
        $bProject->mpo_funds = request('mpo_funds') == 'on' ? 1 : null;
        $bProject->yoe_cost_vehicles = request('yoe_cost_vehicles');
        $bProject->funding_category_vehicles = request('funding_category_vehicles');
        $bProject->funding_federal_vehicles = request('funding_federal_vehicles');
        $bProject->funding_local_vehicles = request('funding_local_vehicles');
        $bProject->funding_local_beyond_vehicles = request('funding_local_beyond_vehicles');
        $bProject->funding_total_vehicles = request('funding_total_vehicles');
        $bProject->funding_tdc_vehicles = request('funding_tdc_vehicles');
        $bProject->funding_federal_vehicles_total = request('funding_federal_vehicles_total');
        $bProject->funding_local_vehicles_total = request('funding_local_vehicles_total');
        $bProject->funding_local_beyond_vehicles_total = request('funding_local_beyond_vehicles_total');
        $bProject->funding_total_vehicles_total = request('funding_total_vehicles_total');
        $bProject->funding_tdc_vehicles_total = request('funding_tdc_vehicles_total');
        $bProject->yoe_cost_bus = request('yoe_cost_bus');
        $bProject->funding_category_bus = request('funding_category_bus');
        $bProject->funding_federal_bus = request('funding_federal_bus');
        $bProject->funding_local_bus = request('funding_local_bus');
        $bProject->funding_local_beyond_bus = request('funding_local_beyond_bus');
        $bProject->funding_total_bus = request('funding_total_bus');
        $bProject->funding_tdc_bus = request('funding_tdc_bus');
        $bProject->funding_federal_bus_total = request('funding_federal_bus_total');
        $bProject->funding_local_bus_total = request('funding_local_bus_total');
        $bProject->funding_local_beyond_bus_total = request('funding_local_beyond_bus_total');
        $bProject->funding_total_bus_total = request('funding_total_bus_total');
        $bProject->yoe_cost_operations = request('yoe_cost_operations');
        $bProject->funding_category_operations = request('funding_category_operations');
        $bProject->funding_federal_operations = request('funding_federal_operations');
        $bProject->funding_local_operations = request('funding_local_operations');
        $bProject->funding_local_beyond_operations = request('funding_local_beyond_operations');
        $bProject->funding_total_operations = request('funding_total_operations');
        $bProject->funding_federal_operations_total = request('funding_federal_operations_total');
        $bProject->funding_local_operations_total = request('funding_local_operations_total');
        $bProject->funding_local_beyond_operations_total = request('funding_local_beyond_operations_total');
        $bProject->funding_total_operations_total = request('funding_total_operations_total');
        $bProject->sponsor = request('sponsor');
        $bProject->contact_name = request('contact_name');
        $bProject->contact_phone = request('contact_phone');
        $bProject->contact_email = request('contact_email');
        $bProject->contact_agency = request('contact_agency');
        $bProject->contact_title = request('contact_title');
        $bProject->signature = request('signature');
        $bProject->comments_1 = request('comments_1');
        $bProject->comments_2 = request('comments_2');
        $bProject->comments_1 = request('comments_3');
        $bProject->comments_1 = request('comments_4');
        $bProject->comments_1 = request('comments_5');

        $bProject->save();

        return redirect(route('projects.index2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function show(BProject $bProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function edit(BProject $bProject)
    {
        return view('projects.edit2', compact('bProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BProject $bProject)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $bProject->agency_id = auth()->user()->agency_id;
        $bProject->parent_id = request('parent_id');
        $bProject->mpo_id = request('mpo_id');
        $bProject->csj_cn = request('csj_cn');
        $bProject->author = auth()->user()->name;
        $bProject->name = request('name');
        $bProject->description = request('description');
        $bProject->limit_from = request('limit_from');
        $bProject->limit_to = request('limit_to');
        $bProject->need_purpose = request('need_purpose');
        $bProject->agency_comments = request('agency_comments');
        $bProject->transit_funds_request = request('transit_funds_request') == 'on' ? 1 : null;
        $bProject->fiscal_year = request('fiscal_year');
        $bProject->network_year = request('network_year');
        $bProject->psp_1 = request('psp_1') == '----' ? null : request('psp_1');
        $bProject->psp_1 = request('psp_2') == '----' ? null : request('psp_2');
        $bProject->psp_1 = request('psp_3') == '----' ? null : request('psp_3');
        $bProject->psp_1 = request('psp_4') == '----' ? null : request('psp_4');
        $bProject->psp_1 = request('psp_5') == '----' ? null : request('psp_5');
        $bProject->goal_1 = request('goal_1') == 'on' ? true : false;
        $bProject->goal_2 = request('goal_2') == 'on' ? true : false;
        $bProject->goal_3 = request('goal_3') == 'on' ? true : false;
        $bProject->goal_4 = request('goal_4') == 'on' ? true : false;
        $bProject->goal_6 = request('goal_5') == 'on' ? true : false;
        $bProject->goal_5 = request('goal_6') == 'on' ? true : false;
        $bProject->description_goal_1 = request('description_goal_1');
        $bProject->description_goal_2 = request('description_goal_2');
        $bProject->description_goal_3 = request('description_goal_3');
        $bProject->description_goal_4 = request('description_goal_4');
        $bProject->description_goal_5 = request('description_goal_5');
        $bProject->description_goal_6 = request('description_goal_6');
        $bProject->strategy_1 = request('strategy_1') == '----' ? null : request('strategy_1');
        $bProject->strategy_2 = request('strategy_2') == '----' ? null : request('strategy_1');
        $bProject->strategy_3 = request('strategy_3') == '----' ? null : request('strategy_1');
        $bProject->strategy_4 = request('strategy_4') == '----' ? null : request('strategy_1');
        $bProject->strategy_5 = request('strategy_5') == '----' ? null : request('strategy_1');
        $bProject->strategy_6 = request('strategy_6') == '----' ? null : request('strategy_1');
        $bProject->description_strategy_1 = request('description_strategy_1');
        $bProject->description_strategy_2 = request('description_strategy_2');
        $bProject->description_strategy_3 = request('description_strategy_3');
        $bProject->description_strategy_4 = request('description_strategy_4');
        $bProject->description_strategy_7 = request('description_strategy_7');
        $bProject->description_strategy_8 = request('description_strategy_8');
        $bProject->description_strategy_9 = request('description_strategy_9');
        $bProject->description_strategy_10 = request('description_strategy_10');
        $bProject->block_system = request('block_system');
        $bProject->reviewed_dates = request('reviewed_dates');
        $bProject->capital = request('capital') == 'on' ? 1 : null;
        $bProject->operations = request('operations') == 'on' ? 1 : null;
        $bProject->c = request('c') == 'on' ? 1 : null;
        $bProject->nonc = request('nonc') == 'on' ? 1 : null;
        $bProject->pe = request('pe') == 'on' ? 1 : null;
        $bProject->env = request('env') == 'on' ? 1 : null;
        $bProject->eng = request('eng') == 'on' ? 1 : null;
        $bProject->r = request('r') == 'on' ? 1 : null;
        $bProject->acq = request('acq') == 'on' ? 1 : null;
        $bProject->utl = request('utl') == 'on' ? 1 : null;
        $bProject->appointment_year = request('appointment_year');
        $bProject->tdc_award_amount = request('tdc_award_amount');
        $bProject->tdw_award_date = request('tdw_award_date');
        $bProject->tdc_amount_requested = request('tdc_amount_requested');
        $bProject->type_capital = request('type_capital') == 'on' ? 1 : null;
        $bProject->type_operating = request('type_operating') == 'on' ? 1 : null;
        $bProject->type_planning = request('type_planning') == 'on' ? 1 : null;
        $bProject->mpo_funds = request('mpo_funds') == 'on' ? 1 : null;
        $bProject->yoe_cost_vehicles = request('yoe_cost_vehicles');
        $bProject->funding_category_vehicles = request('funding_category_vehicles');
        $bProject->funding_federal_vehicles = request('funding_federal_vehicles');
        $bProject->funding_local_vehicles = request('funding_local_vehicles');
        $bProject->funding_local_beyond_vehicles = request('funding_local_beyond_vehicles');
        $bProject->funding_total_vehicles = request('funding_total_vehicles');
        $bProject->funding_tdc_vehicles = request('funding_tdc_vehicles');
        $bProject->funding_federal_vehicles_total = request('funding_federal_vehicles_total');
        $bProject->funding_local_vehicles_total = request('funding_local_vehicles_total');
        $bProject->funding_local_beyond_vehicles_total = request('funding_local_beyond_vehicles_total');
        $bProject->funding_total_vehicles_total = request('funding_total_vehicles_total');
        $bProject->funding_tdc_vehicles_total = request('funding_tdc_vehicles_total');
        $bProject->yoe_cost_bus = request('yoe_cost_bus');
        $bProject->funding_category_bus = request('funding_category_bus');
        $bProject->funding_federal_bus = request('funding_federal_bus');
        $bProject->funding_local_bus = request('funding_local_bus');
        $bProject->funding_local_beyond_bus = request('funding_local_beyond_bus');
        $bProject->funding_total_bus = request('funding_total_bus');
        $bProject->funding_tdc_bus = request('funding_tdc_bus');
        $bProject->funding_federal_bus_total = request('funding_federal_bus_total');
        $bProject->funding_local_bus_total = request('funding_local_bus_total');
        $bProject->funding_local_beyond_bus_total = request('funding_local_beyond_bus_total');
        $bProject->funding_total_bus_total = request('funding_total_bus_total');
        $bProject->yoe_cost_operations = request('yoe_cost_operations');
        $bProject->funding_category_operations = request('funding_category_operations');
        $bProject->funding_federal_operations = request('funding_federal_operations');
        $bProject->funding_local_operations = request('funding_local_operations');
        $bProject->funding_local_beyond_operations = request('funding_local_beyond_operations');
        $bProject->funding_total_operations = request('funding_total_operations');
        $bProject->funding_federal_operations_total = request('funding_federal_operations_total');
        $bProject->funding_local_operations_total = request('funding_local_operations_total');
        $bProject->funding_local_beyond_operations_total = request('funding_local_beyond_operations_total');
        $bProject->funding_total_operations_total = request('funding_total_operations_total');
        $bProject->sponsor = request('sponsor');
        $bProject->contact_name = request('contact_name');
        $bProject->contact_phone = request('contact_phone');
        $bProject->contact_email = request('contact_email');
        $bProject->contact_agency = request('contact_agency');
        $bProject->contact_title = request('contact_title');
        $bProject->signature = request('signature');
        $bProject->comments_1 = request('comments_1');
        $bProject->comments_2 = request('comments_2');
        $bProject->comments_1 = request('comments_3');
        $bProject->comments_1 = request('comments_4');
        $bProject->comments_1 = request('comments_5');
        $bProject->save();

        return redirect(route('projects.index2'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BProject  $bProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(BProject $bProject)
    {
        $bProject->delete();
        return redirect(route('projects.index2'));
    }

    public function updateMPO(Request $request, BProject $bProject)
    {
        $bProject->mpo_id = request('mpo_id');
        $bProject->csj_cn = request('csj_cn');
        $bProject->name = request('name');
        $bProject->save();

        return redirect(route('projects.index2'));
    }
}
