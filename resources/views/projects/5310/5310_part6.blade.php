<div class="card">
    <div class="card-body">
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
                        <input type="text" name="sponsor" class="form-control" value="{{ $bProject->sponsor ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="contact_name" class="form-control" value="{{ $bProject->contact_name ?? ''  }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="tel" name="contact_phone" class="form-control" value="{{ $bProject->contact_phone ?? ''  }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="email" name="contact_email" class="form-control" value="{{ $bProject->contact_email ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="contact_agency" class="form-control" value="{{ $bProject->contact_agency ?? ''  }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="contact_title" class="form-control" value="{{ $bProject->contact_title ?? ''  }}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{--Attachments--}}
        <h3>Attachments (Include a map of your service area or other documents).</h3>
        <div class="form-group">
            <textarea class="form-control" id="attachments_textarea" rows="5" disabled></textarea>
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
                    <textarea disabled class="form-control" id="signed_textarea" name = "signature" rows="2"  value="{{ $bProject->signature ?? ''  }}"></textarea>
                </div>
            @else
                <div class="form-group">
                    <textarea class="form-control" id="signed_textarea" name = "signature" title="Only a submitter can sign this form." rows="2"  value="{{ $bProject->contact_title ?? ''  }}" disabled></textarea>
                </div>
            @endif                            
        @endauth
        <p>Save your form before signing, all fields will be locked after signature is provided.</p>
        <br>
    </div>
</div>