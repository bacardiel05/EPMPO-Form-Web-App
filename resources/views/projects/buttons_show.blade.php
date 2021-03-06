<!--
    This is shared between TASA and 5310
-->
<style>
    #show_buttons,
    #select_Action {
        height: 40px;
        margin-top: 1%;
    }
</style>
<div id="show_buttons"class="row col-12">
    @include('projects.buttons_shared')
    <!-- Check if user is ADMIN and that in the automata is not on status 1-->
    @if(auth()->user()->type == 2 && $project->status != 1 && $infoCurrentProject["currentSubmission"] == 1)
    <select id="select_Action" class="mx-1" onchange="changeButtonText('select_Action','button_text_changer')"
        name="status" class="form-control" autocomplete="off">
        <option value="{{ $project->status }}" selected>---</option>
        @if(($project->status == 2 || $project->status == 3))
        <option value="3">Approve</option>
        <option value="4">Return for Revision</option>
        @endif
    </select>
    <button id="button_text_changer" class="btn btn-primary mx-1" type="submit"> --- </button>
    @endif
    <!-- Check if user is ADMIN and if is a submission -->
    @if(auth()->user()->type == 2 && $project->status == 2)
    <button id="logOfChanges" class="btn btn-primary mx-1" name="data" type="button" onclick="displayChanges(obj)">Log of changes</button>

    <a style="margin-top:1%; margin-left:1%; margin-right:1%" href="{{ route('projects.comments', $project->id) }}"> Add Comments</a>

    <button onclick="toggleComment()" class="btn btn-info" rows="5" id="toggleCommentsButton" type="button">Show
        Comments</button>
    <textarea name="comments" id="commentS" style="display:none;" class="form-control" rows="5" placeholder="Comments"
        readonly>{{$project->comments ?? '' }}</textarea>

    @endif
</div>
