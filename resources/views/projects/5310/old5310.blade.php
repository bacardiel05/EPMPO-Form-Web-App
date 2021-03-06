@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Electronic Project Request Form (5310 ePRF)
                </div>
                <div class="card-body">
                    <form action="{{ route('bprojects.store') }}" method="POST">
                        @csrf
                        <label>
                            MPO ID
                        </label>
                        <input type="text" class="form-control" name="mpo_id" autocomplete="off" readonly>
                        <label>
                            CSJ or CN
                        </label>
                        <input type="text" class="form-control" name="csj_cn" autocomplete="off" readonly>
                        <label>
                            Project Name
                        </label>
                        <input type="text" class="form-control" name="name" autocomplete="off">
                        <label>
                            Project Description
                        </label>
                        <input type="text" class="form-control" name="description" autocomplete="off">
                        <label>
                            Limit From
                        </label>
                        <input type="text" class="form-control" name="limit_from" autocomplete="off">
                        <label>
                            Limit To
                        </label>
                        <input type="text" class="form-control" name="limit_to" autocomplete="off">
                        <label>
                            Need and Purpose:
                        </label>
                        <textarea name="need_purpose" class="form-control"></textarea>
                        <label>
                            Agency Comments:
                        </label>
                        <textarea name="agency_comments" class="form-control"></textarea>
                        <hr>
                        <label>
                            <input type="checkbox" name="transit_funds_request" autocomplete="off">
                            Requesting Transit funds for his project/program (FTA, State and/or Local Funds)
                        </label>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label class="font-weight-bold">
                                    Federal Fiscal Year(FY):
                                </label>
                                <input type="number" name="fiscal_year" class="form-control" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>
                                    Network Year
                                </label>
                                <select name="network_year" class="form-control">
                                    <option></option>
                                    <option value="2020">2020</option>
                                    <option value="2030">2030</option>
                                    <option value="2040">2040</option>
                                    <option value="2045">2045</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        {{--Project Selection Process--}}
                        <h3>Project Selection Process</h3>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_1" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Will this project achieve goals as identified in the Regional Transportation Plan?
                                If yes, please provide attachment with supporting information:
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_2" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project from an updated comprehensive plan, thoroughfare plan, feasibility or corridor study? 
                                If yes, please provide link or attachment: How does this project address congestion, mobility, accessibility, and reliability of NHS?
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_3" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this project part of TPB resolution for a Comprehensive Mobility Plan (CMP)?
                            </div>            
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_4" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Is this decision making/governing body committed to the local/state share (match)? 
                                Attach documentation. E.g. Resolution, Financial Plan, etc.
                            </div>            
                        </div>

                        <div class="form-row mb-1">
                            <div class="col-sm-1">
                                <select name="psp_5" class="form-control">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col">
                                Sponsor's investment to construction cost. (Excluding required local/state share)
                            </div>            
                        </div>
                        <br>

                        {{--Goals and Strategies--}}

                        <div class="form-row mb-1 justify-content-center">
                            <div class="col">
                                <h3><a href="https://www.fhwa.dot.gov/tpm/about/goals.cfm" target="_blank">National Goals</a></h3>
                                <label>
                                    <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off">
                                    Safety
                                </label><br>
                                <textarea name="description_goal_1" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off">
                                    Infrastructure Condition
                                </label><br>
                                <textarea name="description_goal_2" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off">
                                    Congestion Reduction
                                </label><br>
                                <textarea name="description_goal_3" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off">
                                    System Reliability
                                </label><br>
                                <textarea name="description_goal_4" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off">
                                    Freight Movement and Economic Vitality
                                </label><br>
                                <textarea name="description_goal_5" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                                <label>
                                    <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off">
                                    Environmental Sustainability
                                </label><br>
                                <textarea name="description_goal_6" class="form-control" style="width: 22rem; display: none;" placeholder="How does this project meet this goal?"></textarea>
                            </div>
                            <div class="col">
                                <h3><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375" target="_blank">Congestion Management Project Strategies</a></h3>
                                <div class="form-row mb-1">
                                    <div class="col">
                                        1. Project exempt under 40CFR 93.126?
                                    </div> 
                                    <div class="col-sm-2">
                                        <select name="strategy_1" class="form-control" onchange="displayBox(this.name)">
                                            <option></option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <textarea name="description_strategy_1" class="form-control" style="width: 22rem; display: none;" placeholder="Please explain based on 40CFR 93.126."></textarea>           
                                <div class="form-row mb-1">
                                    <div class="col">
                                        2. Project addressing congestion
                                    </div> 
                                    <div class="col-sm-2">
                                        <select name="strategy_2" class="form-control" onchange="displayBox(this.name)">
                                            <option></option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>           
                                </div>
                                <textarea name="description_strategy_2" class="form-control" style="width: 22rem; display: none;" placeholder="Please provide analysis from corridor study or similar study that will show the project will address congestion."></textarea>
                                <div class="form-row mb-1">
                                    <div class="col">
                                        3. Project adds roadway capacity
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="strategy_3" class="form-control" onchange="displayBox(this.name)">
                                            <option></option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <textarea name="description_strategy_3" class="form-control" style="width: 22rem; display: none;" placeholder="Please explain."></textarea>

                                <p>If either question 2 or 3 is YES, please answer the questions below.</p>
                                <div class="form-row mb-1">
                                    <div class="col">
                                        4. Are there other congestion mitigation projects (e.g., transportation demand management, land use, public transportation, ITS and operations, pricing, bicycle and pedestrian, and bottleneck relief) 
                                        within the project corridor that are programmed into the current MTP?
                                    </div>   
                                    <div class="col-sm-2">
                                        <select name="strategy_4" class="form-control" onchange="displayBox(this.name)">
                                            <option></option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <textarea name="description_strategy_4" class="form-control" style="width: 22rem; display: none;" placeholder="If yes, identify the project name(s), state project identification number (CSJ number), and MPO ID."></textarea>
                                <div class="form-row mb-1">
                                    <div class="col">
                                        5. Using the 2019 CMP Report, is the corridor identified as a congested segment?
                                    </div>    
                                    <div class="col-sm-2">
                                        <select name="strategy_5" class="form-control">
                                            <option></option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col">
                                        6. Can the congestion be addressed without building more road capacity?
                                    </div> 
                                    <div class="col-sm-2">
                                        <select name="strategy_6" class="form-control">
                                            <option></option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>           
                                </div>
                                <p> 7. Describe any congestion mitigation alternatives to the proposed improvement that have been considered or will be evaluated to correct the deficiencies and manage the 
                                    facility effectively (or facilitate its management in the future).</p>
                                <textarea name="description_strategy_7" class="form-control" style="width: 22rem;"></textarea>
                                <p>8. Specify congestion mitigation strategies that will be implemented as part of the project.</p>
                                <textarea name="description_strategy_8" class="form-control" style="width: 22rem;"></textarea>
                                <p>9. What are the specific congestion reduction impacts of the implemented strategies?</p>
                                <textarea name="description_strategy_9" class="form-control" style="width: 22rem;"></textarea>
                                <p>10. If not implementing a congestion mitigation strategy as part of the project, please explain reason.</p>
                                <textarea name="description_strategy_10" class="form-control" style="width: 22rem;"></textarea>
                            </div>
                        </div>

                        Projects will be examined at the corridor level to determine multimodal needs. Which best describes this projects. <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409" target="_blank">Block System:</a><br>
                        <label><input type="radio" name="block_system" value="1"> Within Community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="2"> Community to community</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="3"> Community to region</label autocomplete="off">
                        <label><input type="radio" name="block_system" value="4"> Region to region</label autocomplete="off">
                        <hr>

                        Have the above dates been reviewed by TXDOT or NMDOT?
                        <label><input type="radio" name="reviewed_dates" value="1"> Yes</label autocomplete="off">
                        <label><input type="radio" name="reviewed_dates" value="2"> No</label autocomplete="off">
                        <label><input type="radio" name="reviewed_dates" value="3"> N/A</label autocomplete="off">
                        <br>

                        {{--Project Phases and Transit only--}}
                        <div class="form-row mb-1">
                            <div class="col">
                                <h3>Project Phase(s)</h3>
                                <p>**Only checked phase(s) will be consider for funding (Year of Expenditure (YOE)
                                    Cost). If a phase has been or will be completed with local funds or resources,
                                    please do not check. Please enter cost information for each Phase checked.</p>
                                <label>
                                    <input type="checkbox" name="capital" autocomplete="off">
                                    Capital
                                </label><br>
                                <label>
                                    <input type="checkbox" name="operations" autocomplete="off">
                                    Operations
                                </label><br>
                                <label>
                                    <input type="checkbox" name="c" autocomplete="off">
                                    C
                                </label><br>
                                <label>
                                    <input type="checkbox" name="nonc" autocomplete="off">
                                    Non-C
                                </label><br>
                                <label>
                                    <input type="checkbox" name="pe" autocomplete="off">
                                    PE
                                <label>
                                    <input type="checkbox" name="env" autocomplete="off">
                                    E:Env
                                </label><br>
                                <label>
                                    <input type="checkbox" name="eng" autocomplete="off">
                                    E:Eng
                                </label><br>
                                <label>
                                    <input type="checkbox" name="r" autocomplete="off">
                                    R
                                </label><br>
                                <label>
                                    <input type="checkbox" name="acq" autocomplete="off">
                                    R:Acq
                                </label><br>
                                <label>
                                    <input type="checkbox" name="utl" autocomplete="off">
                                    R:Utl
                                </label><br>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">**Transit Only</h5>

                                        <label>Apportionment Year</label>
                                        <input type="number" name="appointment_year" class="form-control" autocomplete="off">
                                        <label>TDC Award Amount</label>
                                        <input type="number" name="tdc_award_amount" class="form-control" autocomplete="off">
                                        <label>TDC Award Date</label>
                                        <input type="date" name="tdw_award_date" class="form-control" autocomplete="off">
                                        <label>TDC Amount Requested</label>
                                        <input type="number" name="tdc_amount_requested" class="form-control" autocomplete="off"><br>

                                        <h4>Project Type:</h4>

                                        <label>
                                            <input type="checkbox" name="type_capital" autocomplete="off">
                                            Capital
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_operating" autocomplete="off">
                                            Operating
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="type_planning" autocomplete="off">
                                            Planning
                                        </label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Project Funding--}}
                        <h3>Project Funding</h3>
                        <label>
                            <input type="checkbox" name="mpo_funds" autocomplete="off">
                            Requesting MPO Funds
                        </label><br>
                        <label>
                            <input type="number" name="yoe_cost_vehicles" id = "yoe_check_vehicles" sautocomplete="off" readonly>
                            YOE Cost
                        </label><br>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Capital(Refurnishing of Vehicles & Soft.)
                                    </div>
                                    <div class="col-sm-2">
                                        Federal Share Usually 80%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Share Usually 20%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Contribution
                                        Beyond Local Share
                                    </div>
                                    <div class="col-sm-2">
                                        Total Share
                                    </div>
                                    <div class="col-sm-2">
                                        TDC Amount Requested
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id = "funding_vehicles">
                                    <div class="form-row mb-1">
                                        <table id="fundingVehiclesTable">
                                            <tr id="fvtrow" class="fvt1">                                            
                                                <td><input type="text" name="funding_category_vehicles" class="form-control">
                                                </td>
                                                <td><input onchange="funding_vehicles_table()" id="federal_vehicles" type="number" name="funding_federal_vehicles" class="form-control">
                                                </td>
                                                <td><input onchange="funding_vehicles_table()" id = "local_vehicles" type="number" name="funding_local_vehicles" class="form-control">
                                                </td>
                                                <td><input onchange="funding_vehicles_table()" id = "local_beyond_vehicles" type="number" name="funding_local_beyond_vehicles" class="form-control">
                                                </td>    
                                                <td><input type="number" name="funding_total_vehicles" id="fvt1_tot0" class="form-control" readonly>
                                                </td>
                                                <td><input onchange="funding_vehicles_table()" id = "tdc_vehicles" type="number" name="funding_tdc_vehicles" class="form-control">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        Total Funding By Share
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_federal_vehicles_total" id = "federal_vehicles_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_local_vehicles_total" id = "local_vehicles_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_local_beyond_vehicles_total" id = "local_beyond_vehicles_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_total_vehicles_total" id = "total_vehicles_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="funding_tdc_vehicles_total" id = "tdc_vehicles_total" class="form-control" readonly>
                                    </div>
                                </div>
                                <a onclick = "addRow_1()" class="btn btn-primary" role="button">Add Funding</a>
                                <a class="btn btn-primary" role="button">Remove Funding</a>
                            </div>
                        </div>
                        <br>
                        <label>
                            <input type="number" id="yoe_check_bus" name="yoe_cost_bus" autocomplete="off" readonly>
                            YOE Cost
                        </label><br>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Capital(New Bus Purchase)
                                    </div>
                                    <div class="col-sm-2">
                                        Federal Share Usually 85%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Share Usually 15%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Contribution
                                        Beyond Local Share
                                    </div>
                                    <div class="col-sm-2">
                                        Total Share
                                    </div>
                                    <div class="col-sm-2">
                                        TDC Amount Requested
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id = "funding_bus">
                                    <div class="form-row mb-1">
                                        <table id="fundingBusTable">
                                            <tr id="fbtrow" class="fbt1">   
                                                <td><input type="text" name="funding_category_bus" class="form-control">
                                                </td>                                            
                                                <td><input onchange="funding_bus_table()" id = "federal_bus" type="number" name="funding_federal_bus" class="form-control">
                                                </td>                                               
                                                <td><input onchange="funding_bus_table()" id = "local_bus" type="number" name="funding_local_bus" class="form-control">
                                                </td>                                                
                                                <td><input onchange="funding_bus_table()" id = "local_beyond_bus" type="number" name="funding_local_beyond_bus" class="form-control">
                                                </td>                                                
                                                <td><input type="number" id="fbt1_tot0" name="funding_total_bus" class="form-control" readonly>
                                                </td>
                                                <td><input onchange="funding_bus_table()" id = "tdc_bus" type="number" name="funding_tdc_bus" class="form-control">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        Total Funding By Share
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id = "federal_bus_total" name="funding_federal_bus_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="local_bus_total" name="funding_local_bus_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="local_beyond_bus_total" name="funding_local_beyond_bus_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="total_bus_total" name="funding_total_bus_total" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" id="tdc_bus_total" name="funding_tdc_bus_total" class="form-control" readonly>
                                    </div>
                                </div>
                                <a onclick = "addRow_2()" class="btn btn-primary" role="button">Add Funding</a>
                                <a class="btn btn-primary" role="button">Remove Funding</a>
                            </div>
                        </div>
                        <br>
                        <label>
                            <input type="number" id="yoe_check_operations" name="yoe_cost_operations" autocomplete="off" readonly>
                            YOE Cost
                        </label><br>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Operations
                                    </div>
                                    <div class="col-sm-2">
                                        Federal Share Usually 50%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Share Usually 50%
                                    </div>
                                    <div class="col-sm-2">
                                        Local Contribution
                                        Beyond Local Share
                                    </div>
                                    <div class="col-sm-2">
                                        Total Share
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="funding_operations">
                                    <div class="form-row mb-1">
                                        <table id="fundingOperationsTable">
                                            <tr id="fotrow" class="fot1"> 
                                                <td><input type="text" name="funding_category_operations" class="form-control">
                                                </td>
                                                <td><input onchange="funding_operations_table()" id = "federal_operations" type="number" name="funding_federal_operations" class="form-control">
                                                </td>
                                                <td><input onchange="funding_operations_table()" id = "local_operations" type="number" name="funding_local_operations" class="form-control">
                                                </td>
                                                <td><input onchange="funding_operations_table()" id = "local_beyond_operations" type="number" name="funding_local_beyond_operations" class="form-control">
                                                </td>
                                                <td><input type="number" id="fot1_tot0" name="funding_total_operations" class="form-control" readonly>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-row mb-1">
                                    <table>
                                        <td>Total Funding By Share&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>              
                                        <td><input type="number" id="federal_operations_total" name="funding_federal_operations_total" class="form-control" readonly>
                                        </td>
                                        <td><input type="number" id="local_operations_total" name="funding_local_operations_total" class="form-control" readonly>
                                        </td>
                                        <td><input type="number" id="local_beyond_operations_total" name="funding_local_beyond_operations_total" class="form-control" readonly>
                                        </td>
                                        <td><input type="number" id="total_operations_total" name="funding_total_operations_total" class="form-control" readonly>
                                        </td>
                                    </table>
                                </div>
                                <a onclick = "addRow_3()" class="btn btn-primary" role="button">Add Funding</a>
                                <a class="btn btn-primary" role="button">Remove Funding</a>
                            </div>
                        </div>
                        <br>
                        {{--Contact Information--}}
                        <h3>Contact information</h3>
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        Sponsor
                                    </div>
                                    <div class="col-sm-2">
                                        Name
                                    </div>
                                    <div class="col-sm-2">
                                        Phone Number
                                    </div>
                                    <div class="col-sm-2">
                                        eMail
                                    </div>
                                    <div class="col-sm-2">
                                        Agency
                                    </div>
                                    <div class="col-sm-2">
                                        Title
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row mb-1">
                                    <div class="col-sm-2">
                                        <input type="text" name="sponsor" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="contact_name" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="tel" name="contact_phone" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="email" name="contact_email" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="contact_agency" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="contact_title" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{--Attachments--}}
                        <h3>Attachments (Include a map of your service area or other documents).</h3>
                        <div class="form-group">
                            <textarea class="form-control" id="attachments_textarea" rows="5" readonly></textarea>
                        </div>
                        <div class="form-row">
                            <p>Files Attached&nbsp;</p>
                            <button class="btn btn-primary mt-1 float-right">
                                Add File
                            </button>
                            <button class="btn btn-primary mt-1 float-right">
                                Open File
                            </button>
                            <button class="btn btn-primary mt-1 float-right">
                                Remove File
                            </button>
                            <button class="btn btn-primary mt-1 float-right">
                                Show Attachment Name and Size
                            </button>
                        </div>
                        <p>*Only Adobe Acrobat users may be able to attach files to this form. If you are not able to attach files, please send them via e-mail.
                            <br>
                            *This form does not guarantee the funds requested nor the approval of the project in the MTP/TIP.
                            <br>
                            *By signing this Project Request Form you certify that the project Description and limits are within the scope of work of the project.
                        </p>
                        <p>*Please fill out this form entirely, and sign (digital signature). If "Signed By" field is blank, the form will not be accepted.</p>
                        <h4>Signed By</h4>
                        @auth
                            @if(auth()->user()->type == 1)
                                <div class="form-group">
                                    <textarea class="form-control" id="signed_textarea" name = "signature" rows="2"></textarea>
                                </div>
                            @else
                                <div class="form-group">
                                    <textarea class="form-control" id="signed_textarea" name = "signature" title="Only a submitter can sign this form." rows="2" readonly></textarea>
                                </div>
                            @endif                            
                        @endauth
                        <p>Save your form before signing, all fields will be locked after signature is provided.</p>
                        <br>
                        @auth
                            @if (auth()->user()->type == 1)
                            <button class="btn btn-primary mt-1 float-right" type="submit">
                                Submit
                            </button>
                            @else
                                <button class="btn btn-primary mt-1 float-right" type="submit">
                                    Save
                                </button>
                            @endif
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // const toggleTA = (name) => {
    //     if($('input[name="'+ name +'"]').is(':checked')) {
    //         console.log('checked');
    //         $('textarea[name="description_'+ name +'"]').show();
    //     }else{
    //         console.log('not checked');
    //         $('textarea[name="description_'+ name +'"]').hide();
    //     }
    // };
</script>

<script>
    const displayBox = (name) => {
        if($('select[name="'+name +'"]').val() == 1) {
            console.log("displaying");
            $('textarea[name="description_' + name +'"]').show();
        }
    };
</script>

<script src="{{ asset('docs/js/form2FrontEndLogic.js')}}"></script>

@endsection