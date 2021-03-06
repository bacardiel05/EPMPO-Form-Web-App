<div class="card">
    <h3>Project Selection Process</h3>
    <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23410" target="_blank"> Click here for Project Selection
        Process diagram and presentation (PDF) </a>
    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_1" class="form-control" onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->psp_1 ?? ''}}
                <option value="1" {{ $temp == 1  ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2  ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Will this project achieve a significant reduction in traffic fatalities or serious injuries? If yes,
            please provide link or attachment with supporting data <i class="fa fa-asterisk"
                style="font-size:10px;color:red"></i>
                <textarea id="description_psp_1" name="description_psp_1" class="form-control"
                style="width: 30rem;{{ $project->psp_1 ?? '' == 1 ? '' : 'display: none;' }}"
                placeholder="Please provide link or attachment.">{{ $project->description_psp_1 ?? '' }}</textarea>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_2" class="form-control" onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->psp_2 ?? ''}}
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Is this project from an updated comprehensive plan, thoroughfare plan, resilience plan, feasibility or corridor study? 
            If yes, please provide link or attachment. <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            <textarea id="description_psp_2" name="description_psp_2" class="form-control"
                    style="width: 30rem;{{ $project->psp_2 ?? '' == 1 ? '' : 'display: none;' }}"
                    placeholder="Please provide link or attachment.">{{ $project->description_psp_2 ?? '' }}</textarea>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_3" class="form-control" onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->psp_3 ?? ''}}
                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Yes</option>
                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Is this project on the National Highway System NHS?<br>
            If not, please describe the project's relationship to the NHS (for example: it connects to or runs parallel to):<i class="fa fa-asterisk"
                style="font-size:10px;color:red"></i>
                <textarea id="description_psp_3" name="description_psp_3" class="form-control"
                    style="width: 30rem;{{ $project->psp_3 ?? '' == 1 ? '' : 'display: none;' }}"
                    placeholder="Please describe the project's relationship to the NHS.">{{ $project->description_psp_3 ?? '' }}</textarea>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
        </div>
        <div class="col">
            How does this project address congestion, mobility, accessibility, and reliability of NHS?
            <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            <textarea id ="description_psp_4" name="description_psp_4" class="form-control" style="width: 30rem;"
            placeholder="Explain.">{{ $project->description_psp_4 ?? '' }}</textarea>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_5" class="form-control" onchange="displayBox(this.name);">
                <option></option>
                {{$temp = $project->psp_5 ?? ''}}
                <option value="2" {{ $temp == 2  ? 'selected' : '' }}>Yes</option>
                <option value="1" {{ $temp == 1  ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Is this project part of TPB resolution for the <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23376" target="_blank">Active Transportation System?</a>
            <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                <textarea id="description_psp_5" name="description_psp_5" class="form-control"
                    style="width: 30rem;{{ $project->psp_5 ?? '' == 1 ? '' : 'display: none;' }}"
                    placeholder="Describe the project's relationship to the ATS:">{{ $project->description_psp_5 ?? '' }}</textarea>
        </div>
    </div>

    <div class="form-row mb-1">
        <div class="col-sm-1">
            <select disabled name="psp_6" class="form-control">
                <option></option>
                {{$temp = $project->psp_6 ?? ''}}
                <option value="1" {{ $temp == 1  ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ $temp == 2  ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col">
            Is this project part of TPB approved <a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?t=62130.51&BlobID=25024"
                target="_blank">Regional Mobility Strategy (RMS) 2020?</a>
                <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
        </div>
    </div>
    <br>
    {{-- Goals and Strategies --}}

    <div class="card">
        <div class="card-body">
            <div class="form-row mb-1 justify-content-center">
                <div class="col">
                    <h3>National Goals</h3>
                    <h6><a href="https://www.fhwa.dot.gov/tpm/about/goals.cfm" target="_blank">Helpful Link</a></h6>
                    <label>
                        <input type="checkbox" name="goal_1" onclick="toggleTA(this.name);" autocomplete="off"
                            {{ $project->goal_1 ?? '' == true ? 'checked' : '' }} disabled>
                        Safety
                    </label><br>
                    <textarea disabled id="description_goal_1" name="description_goal_1" class="form-control"
                        style="width: 22rem; {{ $project->goal_1 ?? '' == true ? '' : 'display: none;' }}"
                        placeholder="How does this project meet this goal?">{{ $project->description_goal_1 ?? '' }}</textarea>
                    <label>
                        <input type="checkbox" name="goal_2" onclick="toggleTA(this.name);" autocomplete="off"
                            {{ $project->goal_2 ?? '' == true ? 'checked' : '' }} disabled>
                        Infrastructure Condition
                    </label><br>
                    <textarea disabled id="description_goal_2" name="description_goal_2" class="form-control"
                        style="width: 22rem;{{ $project->goal_2 ?? '' == true ? '' : 'display: none;' }}"
                        placeholder="How does this project meet this goal?">{{ $project->description_goal_2 ?? '' }}</textarea>
                    <label>
                        <input type="checkbox" name="goal_3" onclick="toggleTA(this.name);" autocomplete="off"
                            {{ $project->goal_3 ?? '' == true ? 'checked' : '' }} disabled>
                        Congestion Reduction
                    </label><br>
                    <textarea disabled id="description_goal_3" name="description_goal_3" class="form-control"
                        style="width: 22rem;{{ $project->goal_3 ?? '' == true ? '' : 'display: none;' }}"
                        placeholder="How does this project meet this goal?">{{ $project->description_goal_3 ?? '' }}</textarea>
                    <label>
                        <input type="checkbox" name="goal_4" onclick="toggleTA(this.name);" autocomplete="off"
                            {{ $project->goal_4 ?? '' == true ? 'checked' : '' }} disabled>
                        System Reliability
                    </label><br>
                    <textarea disabled id="description_goal_4" name="description_goal_4" class="form-control"
                        style="width: 22rem;{{ $project->goal_4 ?? '' == true ? '' : 'display: none;' }}"
                        placeholder="How does this project meet this goal?">{{ $project->description_goal_4 ?? '' }}</textarea>
                    <label>
                        <input type="checkbox" name="goal_5" onclick="toggleTA(this.name);" autocomplete="off"
                            {{ $project->goal_5  ?? ''== true ? 'checked' : '' }} disabled>
                        Freight Movement and Economic Vitality
                    </label><br>
                    <textarea disabled id="description_goal_5" name="description_goal_5" class="form-control"
                        style="width: 22rem;{{ $project->goal_5 ?? '' == true ? '' : 'display: none;' }}"
                        placeholder="How does this project meet this goal?">{{ $project->description_goal_5 ?? '' }}</textarea>
                    <label>
                        <input type="checkbox" name="goal_6" onclick="toggleTA(this.name);" autocomplete="off"
                            {{ $project->goal_6 ?? '' == true ? 'checked' : '' }} disabled>
                        Environmental Sustainability
                    </label><br>
                    <textarea disabled id="description_goal_6" name="description_goal_6" class="form-control"
                        style="width: 22rem;{{ $project->goal_6 ?? '' == true ? '' : 'display: none;' }}"
                        placeholder="How does this project meet this goal?">{{ $project->description_goal_6 ?? '' }}</textarea>
                </div>
            </div>
            <div class="col">
                <div class="required_cmp">
                    <h3>Congestion Management Process</h3>
                    <h6><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375"
                            target="_blank">Helpful Link</a></h6>
                    <div class="form-row mb-1">
                        <div class="col">
                            1. Is the project exempt under <a
                                href="https://www.govinfo.gov/content/pkg/CFR-2012-title40-vol21/pdf/CFR-2012-title40-vol21-sec93-126.pdf"
                                target="_blank">40CFR 93.126?</a> <i class="fa fa-asterisk"
                                style="font-size:10px;color:red"></i>
                            <h6><a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23375"
                                    target="_blank">Helpful Link</a></h6>
                            ​A detailed analysis is required to justify the exemption of all individual projects being
                            proposed under 40CFR 93.126.
                            Example: If a project is being considered as exempt for safety due to the project being
                            proposed as a road diet:
                            Identify locations and limits of proposed road diet sections and the number of travel lanes
                            impacted. 
                            Include traffic counts, fatalities and serious injuries resulting from motorized and
                            non-motorized crashes and source of data. 
                            Distinguish between road diets for bicycle lanes and parking. 
                            Is this project consistent with MPO documents, project agreements and environmental
                            documents, El Paso MPO Travel Demand Model (TDM)?
                            <h6><a href="http://www.elpasompo.org/scroll_bar_area/conformity_/transportation_conformity_report_2015_naaqs_appendices.htm"
                                    target="_blank">Helpful link (TDM Shapefile Appendix H): </a></h6>
                            <textarea id="description_strategy_1" name="description_strategy_1" class="form-control"
                                style="width: 22rem;{{ $project->strategy_1 ?? '' == 1 ? '' : 'display: none;' }}"
                                placeholder="Please explain based on 40CFR 93.126.">{{ $project->description_strategy_1 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_1" class="form-control" onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_1 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                            <!-- Tool tip ---->
                            <div class="tip">
                                <div>
                                    <p>If “yes”, the project is exempt from further CMP analysis, please explain based
                                        on <a
                                            href="https://www.govinfo.gov/content/pkg/CFR-2012-title40-vol21/pdf/CFR-2012-title40-vol21-sec93-126.pdf"
                                            target="_blank">40CFR 93.126</a>.</p>
                                </div><svg style="color:blue" width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-question-circle" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col">
                            2. Is the project addressing congestion?
                            <br>
                            Instructions: Please provide analysis from corridor study or similar study that will show
                            the project will address congestion.
                            <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
                            <textarea id="description_strategy_2" name="description_strategy_2" class="form-control"
                                style="width: 22rem;{{ $project->strategy_2 ?? '' == 1 ? '' : 'display: none;' }}"
                                placeholder="Please provide analysis from corridor study or similar study that will show the project will address congestion.">{{ $project->description_strategy_2 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_2" class="form-control"
                                onchange="displayBox(this.name); display4To10(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_2 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                            <div class="tip">
                                <div>
                                    <p>If “yes”, please provide a quantitative analysis if existing for use in CMP.</p>
                                </div><svg style="color:blue" width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-question-circle" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row mb-1">
                    <div class="col">
                        3. Does the project add roadway capacity? <i class="fa fa-asterisk"
                            style="font-size:10px;color:red"></i>
                        <br>
                        Instructions: Significant SOV capacity-adding projects impact regional or corridor travel
                        patterns.
                        Project descriptions typically include a new roadway or bypass, major or minor road widening
                        to add additional through lanes on an existing highway,
                        major roadway reconstruction, adding capacity to a corridor by improving many related
                        intersections.
                        <textarea id="description_strategy_3" name="description_strategy_3" class="form-control"
                            style="width: 22rem;{{ $project->strategy_3 ?? '' == 1 ? '' : 'display: none;' }}"
                            placeholder="Please explain.">{{ $project->description_strategy_3 ?? '' }}</textarea>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="strategy_3" class="form-control"
                            onchange="displayBox(this.name);display4To10(this.name);">
                            <option></option>
                            {{$temp = $project->strategy_3 ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
                <div id="4To10Holder" hidden>
                    <p>If the answer is “Yes” for either question(s) 2 or 3 please answer the questions below </p>
                    <div class="form-row mb-1">
                        <div class="col">
                            4. Are there other congestion mitigation projects (e.g., transportation demand
                            management,
                            land use, public transportation, ITS and operations, pricing, bicycle and pedestrian,
                            and
                            bottleneck relief)
                            within the project corridor that are programmed into the current MTP?
                            <br>
                            Instructions: Check project list in EPMPO’s current MTP to identify committed projects.​
                            <h6><a href="http://www.elpasompo.org/scroll_bar_area/mtp/default.htm"
                                    target="_blank">Helpful link</a></h6>
                            <textarea id="description_strategy_4" name="description_strategy_4" class="form-control"
                                style="width: 22rem;{{ $project->strategy_4 ?? '' == 1 ? '' : 'display: none;' }}"
                                placeholder="If yes, identify the project name(s), state project identification number (CSJ number), and MPO ID.">{{ $project->description_strategy_4 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_4" id="strategy_4" class="form-control"
                                onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_4 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col">
                            5. Using the 2019 CMP Report, is the corridor identified as a congested segment?
                            <br>
                            Instructions: See congestion problems and needs section of the 2019 CMP Report (page 24)
                            to
                            identify congested segments.
                            <h6><a href="http://www.elpasompo.org/other/congestion_management_process_/default.htm"
                                    target="_blank">Helpful link</a></h6>
                            <textarea id="description_strategy_5" name="description_strategy_5" class="form-control"
                                style="width: 22rem;{{ $project->strategy_5 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_strategy_5 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_5" id="strategy_5" class="form-control"
                                onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_5 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col">
                            6. Can the congestion be addressed without building more road capacity?
                            <br>
                            Instructions: Using simulation or other appropriate analysis tool, conduct an
                            alternatives
                            analysis to determine whether
                            the problem/deficiency can be addressed without building more road capacity.
                            <textarea id="description_strategy_6" name="description_strategy_6" class="form-control"
                                style="width: 22rem;{{ $project->strategy_6 ?? '' == 1 ? '' : 'display: none;' }}">{{ $project->description_strategy_6 ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <select disabled name="strategy_6" id="strategy_6" class="form-control"
                                onchange="displayBox(this.name);">
                                <option></option>
                                {{$temp = $project->strategy_6 ?? ''}}
                                <option value="1" {{ $temp == 1 ? 'selected' : '' }}>Yes
                                </option>
                                <option value="2" {{ $temp == 2 ? 'selected' : '' }}>No
                                </option>
                            </select>
                        </div>
                    </div>
                    <p> 7. Describe any congestion mitigation alternatives to the proposed improvement that have
                        been
                        considered or will be evaluated to correct the deficiencies and manage the
                        facility effectively (or facilitate its management in the future).
                        <br>
                        Instructions: Using regional CMP Strategies identified in the 2019 CMP (pg. 27), identify
                        corridor-level congestion mitigation strategies that will be evaluated to address the
                        problems
                        and deficiencies in the corridor.
                        Consider strategies as an alternative to the added capacity project, and/or bundle
                        congestion
                        mitigation strategies into the added capacity project.</p>
                    <h6><a href="http://www.elpasompo.org/other/congestion_management_process_/default.htm"
                            target="_blank">Helpful link</a></h6>
                    <textarea id="description_strategy_7" name="description_strategy_7" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_7 ?? '' }}</textarea>
                    <p>8. Specify congestion mitigation strategies that will be implemented as part of the project.
                        <br>
                        Instructions: Identify which congestion mitigation strategies will be implemented as part of
                        the
                        project.
                        Using regional CMP Strategies identified in the 2019 CMP (pg. 27) (For example bike lanes,
                        ITS,
                        operational improvements, etc.)
                    </p>
                    <h6><a href="http://www.elpasompo.org/other/congestion_management_process_/default.htm"
                            target="_blank">Helpful link</a></h6>
                    <textarea id="description_strategy_8" name="description_strategy_8" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_8 ?? '' }}</textarea>
                    <p>9. What are the specific congestion reduction impacts of the implemented strategies?
                        <br>
                        Instructions: Based on the results of the congestion mitigation analysis, document the
                        benefits
                        in terms of specific CMP performance measures when possible.
                        To aid in responding question # 9 if there is no existing congestion mitigation analysis.
                        Complete the following qualitative criteria for the strategy type(s) encompassed by the project/program:
                        <button class="btn btn-info" id='toggeleSuppQ' type="button">Display Supplementary Questions</button>
                    </p>
                    <textarea id="description_strategy_9" name="description_strategy_9" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_9 ?? '' }}</textarea>
                        @include('projects.suplemental_questions')
                    <p>10. If not implementing a congestion mitigation strategy as part of the project, please
                        explain
                        reason.
                        <br>
                        Instructions: Include an explanation that highlights the reason why no congestion mitigation
                        strategies are feasible or warranted as part of the project.
                    </p>
                    <textarea id="description_strategy_10" name="description_strategy_10" class="form-control"
                        style="width: 22rem;">{{ $project->description_strategy_10 ?? '' }}</textarea>
                </div>
            </div>
            <!-------->
            <br>
            <div class="row">
                <div id="CMAQ_sectionHolder" class="col-6">
                    <div class="card" style="width: 22rem;">
                        <div class="card-body">

                            <h5 class="card-title text-center">CMAQ Analysis</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-center">*Air Quality Analysis MUST
                                accompany
                                request for CMAQ Funds.</h6>

                            <label>VOC (Kgs/day)</label>
                            <input type="text" name="voc" class="form-control" autocomplete="off"
                                value="{{ $project->voc ?? ''}}" disabled>
                            <label>C0 (Kgs/day)</label>
                            <input type="text" name="c0" class="form-control" autocomplete="off"
                                value="{{ $project->c0 ?? '' }}" disabled>
                            <label>NOX (Kgs/day)</label>
                            <input type="text" name="nox" class="form-control" autocomplete="off"
                                value="{{ $project->nox ?? ''}}" disabled>
                            <label>PM10 (Kgs/day)</label>
                            <input type="text" name="pm10" class="form-control" autocomplete="off"
                                value="{{ $project->pm10 ?? ''}}" disabled>
                            <label>Prepared By</label>
                            <input type="text" name="prepared_by" class="form-control" autocomplete="off"
                                value="{{ $project->prepared_by ?? '' }}" disabled>
                        </div>
                    </div>
                </div>

                <div id="Transit_sectionHolder" class="card col-6" style="width: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">**Transit Only</h5>
                        <label>Section 5309 ID</label>
                        <input type="text" name="section_5309" class="form-control" autocomplete="off"
                            value="{{ $project->section_5309 ?? '' }}" disabled>
                        <label>Apportionment Year</label>
                        <input type="text" name="appointment_year" class="form-control" autocomplete="off"
                            value="{{ $project->appointment_year ?? '' }}" disabled>
                        <label>TDC Award Amount</label>
                        <input onchange="addMoneySign(this.value,this.id)" id="tdc" type="text" name="tdc_award_amount" class="form-control" autocomplete="off"
                            value="{{ $project->tdc_award_amount ?? '' }}" disabled>
                        <label>TDC Award Date</label>
                        <input type="text" name="tdw_award_date" class="form-control" autocomplete="off"
                            value="{{ $project->tdw_award_date ?? '' }}" disabled>
                        <label>TDC Amount Requested</label>
                        <input onchange="addMoneySign(this.value, this.id)" id="tdca" type="text" name="tdc_amount_requested" class="form-control" autocomplete="off"
                            value="{{ $project->tdc_amount_requested ?? '' }}" disabled><br>

                        <h5>Project Type:</h5>

                        <label>
                            <input type="checkbox" name="type_capital" autocomplete="off"
                                {{ $project->type_capital ?? '' == true ? 'checked' : '' }} disabled>
                            Capital
                        </label><br>
                        <label>
                            <input type="checkbox" name="type_operating" autocomplete="off"
                                {{ $project->type_operating ?? '' == true ? 'checked' : '' }} disabled>
                            Operating
                        </label><br>
                        <label>
                            <input type="checkbox" name="type_planning" autocomplete="off"
                                {{ $project->type_planning ?? '' == true ? 'checked' : '' }} disabled>
                            Planning
                        </label><br>
                        <label>
                            <input type="checkbox" name="type_administration" autocomplete="off"
                                {{ $project->type_administration ?? '' == true ? 'checked' : '' }} disabled>
                            Administration
                        </label><br>
                    </div>
                </div>
                Projects will be examined at the corridor level to determine multimodal needs. Which best describes
                this
                projects.<a href="http://www.elpasompo.org/civicax/filebank/blobdload.aspx?BlobID=23409"
                    target="_blank">Block System:</a> <i class="fa fa-asterisk" style="font-size:10px;color:red"></i>
            </div>
            <br>
            <div class="row">
                <input type="hidden"{{$temp = $project->block_system ?? ''}}>
                <input class= "mx-1" type="radio" name="block_system" value="1"
                        {{ $temp == 1 ? 'checked' : '' }} autocomplete="off" disabled> Within Community
                <input class= "mx-1" type="radio" name="block_system" value="2"
                        {{ $temp == 2 ? 'checked' : '' }} autocomplete="off" disabled> Community to community
                <input class= "mx-1" type="radio" name="block_system" value="3"
                        {{ $temp == 3 ? 'checked' : '' }} autocomplete="off" disabled> Community to region
                <input class= "mx-1" type="radio" name="block_system" value="4"
                        {{ $temp == 4 ? 'checked' : '' }} autocomplete="off" disabled> Region to region
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $("#toggeleSuppQ").click(function(){
       $("#suppQ").toggle( 'slow', function(){
          $(".log").text('Toggle Transition Complete');
       });
    });
 });
</script> 