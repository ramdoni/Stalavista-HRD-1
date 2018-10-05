<!-- sample modal content -->
<div id="modal_history_approval" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">History Approval</h4> </div>
                <div class="modal-body" id="modal_content_history_approval"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    function status_approval_exit(id)
    {
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.get-history-approval-exit') }}',
            data: {'id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {

                var el = '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                            if(data.data.is_approved_atasan == 1){
                                el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                            }

                            if(data.data.is_approved_atasan == 0){
                                el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                            }

                            if(data.data.is_approved_atasan === null){
                                el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                            }

                            el +='<div class="sl-right">'+
                                                '<div><a href="#">'+ data.data.nama_atasan +'</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                    
                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                            if(data.data.is_approve_hrd_actual_bill == 1){
                                el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                            }

                            if(data.data.is_approve_hrd_actual_bill == 0){
                                el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                            }
                            
                            if(data.data.is_approve_hrd_actual_bill === null){
                                el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                            }
                            
                                           
                                    el += '<div class="sl-right">'+
                                                '<div><a href="#">HRD</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                    if(data.data.is_approve_finance_actual_bill == 1){
                                        el +='<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                    }

                                    if(data.data.is_approve_finance_actual_bill == 0){
                                        el +='<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                    }

                                    if(data.data.is_approve_finance_actual_bill === null){
                                        el +='<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                    }
                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">FINANCE</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    
                    
                $("#modal_content_history_approval").html(el);
            }
        });

        $("#modal_history_approval").modal('show');
    }

    function status_approval_actual_bill(id)
    {
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.get-history-training-bill') }}',
            data: {'foreign_id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {

                var el = '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                        if(data.data.is_approve_atasan_actual_bill == 1){
                                            el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                        }

                                        if(data.data.is_approve_atasan_actual_bill == 0){
                                            el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                        }
                                        if(data.data.is_approve_atasan_actual_bill === null){
                                            el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                        }

                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">'+ data.data.atasan +'</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                    if(data.data.pengambilan_uang_muka == null)
                    {
                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                    if(data.data.is_approve_hrd_actual_bill == 1){
                                        el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                    }
                                    if(data.data.is_approve_hrd_actual_bill == 0){
                                        el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                    }
                                    if(data.data.is_approve_hrd_actual_bill === null){
                                        el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                    }
                                            
                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">HRD</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    }
                    else
                    {
                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                        if(data.data.is_approve_hrd_actual_bill == 1){
                                            el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                        }
                                        if(data.data.is_approve_hrd_actual_bill == 0){
                                            el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                        }
                                        if(data.data.is_approve_hrd_actual_bill === null){
                                            el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                        }

                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">HRD</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                        if(data.data.is_approve_finance_actual_bill == 1){
                                            el +='<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                        }
                                        if(data.data.is_approve_finance_actual_bill == 0){
                                            el +='<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                        }
                                        if(data.data.is_approve_finance_actual_bill ===null){
                                            el +='<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                        }
                                            
                                            el += '<div class="sl-right">'+
                                                '<div><a href="#">FINANCE</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    }
                    
                $("#modal_content_history_approval").html(el);
            }
        });

        $("#modal_history_approval").modal('show');
    }

    function status_approval_training(id)
    {
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.get-history-approval-training') }}',
            data: {'foreign_id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {

                var el = '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                    if(data.data.is_approved_atasan == 1){
                                        el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                    }
                                    if(data.data.is_approved_atasan == 0){
                                        el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                    }
                                    if(data.data.is_approved_atasan === null){
                                        el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                    }

                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">'+ data.data.atasan +'</a> </div>'+
                                                '<div class="desc">'+ (data.data.date_approved_atasan != null ? data.data.date_approved_atasan : '' ) +'<p>'+ (data.data.catatan_atasan != null ? data.data.catatan_atasan : '' )  +'</p></div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                    if(data.data.pengambilan_uang_muka === null)
                    {
                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                    if(data.data.approved_hrd == 1){
                                        el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                    }
                                    if(data.data.approved_hrd == 0){
                                        el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                    }
                                    if(data.data.approved_hrd === null){
                                        el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                    }
                                           
                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">HRD</a> </div>'+
                                                '<div class="desc">'+ (data.data.approved_hrd == 1 ? '<small>'+ data.data.approved_hrd_date +'</small>' : '')  +'</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    }
                    else
                    {
                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                    if(data.data.approved_hrd == 1){
                                        el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';   
                                    }
                                    if(data.data.approved_hrd == 0){
                                        el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';   
                                    }
                                    if(data.data.approved_hrd === null){
                                        el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';   
                                    }

                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">HRD</a> </div>'+
                                                '<div class="desc">'+ (data.data.approved_hrd == 1 ? '<small>'+ data.data.approved_hrd_date +'</small>' : '')  +'</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                        el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                        if(data.data.approved_finance == 1){
                                            el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                        }
                                        if(data.data.approved_finance == 0){
                                            el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                        }
                                        if(data.data.approved_finance === null){
                                            el += '<div class="sl-left bg-success"> <i class="fa fa-info"></i></div>';
                                        }
                                        
                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">FINANCE</a> </div>'+
                                                '<div class="desc">'+ (data.data.approved_finance == 1 ? '<small>'+ data.data.approved_finance_date +'</small>' : '')  +'</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    }
                    
                $("#modal_content_history_approval").html(el);
            }
        });

        $("#modal_history_approval").modal('show');
    }

    function status_approval_payment_request(id)
    {
         $.ajax({
            type: 'POST',
            url: '{{ route('ajax.get-history-approval-payment-request') }}',
            data: {'foreign_id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {

                var el = '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                    if(data.data.is_proposal_approved == 1){
                                        el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                    }
                                    if(data.data.is_proposal_approved == 0){
                                        el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                    }
                                    if(data.data.is_proposal_approved === null){
                                        el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                    }
                                        
                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">Proposal Approval</a></div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                     el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                        if(data.data.is_proposal_verification_approved == 1){
                                            el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                        }
                                        if(data.data.is_proposal_verification_approved == 0){
                                            el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                        }
                                        if(data.data.is_proposal_verification_approved === null){
                                            el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                        }

                                            el += '<div class="sl-right">'+
                                                '<div><a href="#">Proposal Verification</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                     el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                        if(data.data.is_payment_approved == 1){
                                            el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                        }
                                        if(data.data.is_payment_approved == 0){
                                            el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                        }
                                        if(data.data.is_payment_approved === null){
                                            el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                        }

                                        el +='<div class="sl-right">'+
                                                '<div><a href="#">Payment Approval</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                $("#modal_content_history_approval").html(el);
            }
        });

        $("#modal_history_approval").modal('show');
    }

    function status_approval_overtime(id)
    {
         $.ajax({
            type: 'POST',
            url: '{{ route('ajax.get-history-approval-overtime') }}',
            data: {'foreign_id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {

                var el = '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                        if(data.data.is_approved_atasan == 1){
                                            el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                        }
                                        if(data.data.is_approved_atasan == 0){
                                            el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                        }
                                        if(data.data.is_approved_atasan === null){
                                            el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                        }

                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">ATASAN</a> </div>'+
                                                '<div class="desc">'+ data.data.atasan.name +' / '+ data.data.atasan.nik + '<br />'+ (data.data.date_approved_atasan != null ? data.data.date_approved_atasan : '' ) +'<p>'+ (data.data.catatan_atasan != null ? data.data.catatan_atasan : '' )  +'</p></div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                el += '<div class="panel-body">'+
                            '<div class="steamline">'+
                                '<div class="sl-item">';

                                if(data.data.is_hr_manager == 1){
                                    el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                }
                                if(data.data.is_hr_manager == 0){
                                    el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                }
                                if(data.data.is_hr_manager === null){
                                    el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                }

                                el += '<div class="sl-right"><div><a href="#">DIREKTUR </a> </div>';

                                if(data.data.is_hr_manager !== null){
                                   el += '<div class="desc">'+ data.data.hr_manager.name +' / '+ data.data.hr_manager.nik +'<p>'+ data.data.hr_manager_date +'</p></div>'; 
                                }
                                
                                el += '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

                el += '<div class="panel-body">'+
                            '<div class="steamline">'+
                                '<div class="sl-item">';

                                if(data.data.is_hr_benefit_approved == 1){
                                    el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                }
                                if(data.data.is_hr_benefit_approved == 0){
                                    el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                }
                                if(data.data.is_hr_benefit_approved === null){
                                    el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                }

                                el += '<div class="sl-right">'+
                                        '<div><a href="#">HR BENEFIT</a> </div>';


                                if(data.data.is_hr_benefit_approved !== null){
                                   el += '<div class="desc">'+ data.data.hr_benefit.name +' / '+ data.data.hr_benefit.nik +'<p>'+ data.data.hr_benefit_date +'</p></div>'; 
                                }
                                
                                el +='</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

                

                $("#modal_content_history_approval").html(el);
            }
        });

        $("#modal_history_approval").modal('show');
    }

    function status_approval_medical(id)
    {
         $.ajax({
            type: 'POST',
            url: '{{ route('ajax.get-history-approval-medical') }}',
            data: {'foreign_id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {

                var  el = '<div class="panel-body">'+
                            '<div class="steamline">'+
                                '<div class="sl-item">';

                                if(data.data.is_approved_hr_benefit == 1){
                                    el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                }
                                if(data.data.is_approved_hr_benefit == 0){
                                    el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                }
                                if(data.data.is_approved_hr_benefit === null){
                                    el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                }

                                el += '<div class="sl-right">'+
                                        '<div><a href="#">HR BENEFIT</a> </div>';

                                if(data.data.is_approved_hr_benefit !== null){
                                    el += '<div class="desc">'+ data.data.hr_benefit.name +' / '+ data.data.hr_benefit.nik +'<p>'+ data.data.hr_benefit_date +'</p></div>'; 
                                }

                                el += '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

                el += '<div class="panel-body">'+
                            '<div class="steamline">'+
                                '<div class="sl-item">';

                                if(data.data.is_approved_manager_hr == 1){
                                    el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                }
                                if(data.data.is_approved_manager_hr == 0){
                                    el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                }
                                if(data.data.is_approved_manager_hr === null){
                                    el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                }

                                el += '<div class="sl-right">'+
                                        '<div><a href="#">MANAGER HR OPR </a> </div>';

                                if(data.data.is_approved_manager_hr !== null){
                                    el += '<div class="desc">'+ data.data.manager_hr.name +' / '+ data.data.manager_hr.nik +'<p>'+ data.data.manager_hr_date +'</p></div>'; 
                                }

                                el += '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

                if(data.data.show_gm_hr =='yes')
                {
                    el += '<div class="panel-body">'+
                            '<div class="steamline">'+
                                '<div class="sl-item">';

                                if(data.data.is_approved_gm_hr == 1){
                                    el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                }
                                if(data.data.is_approved_gm_hr == 0){
                                    el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                }
                                if(data.data.is_approved_gm_hr === null){
                                    el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                }

                                el += '<div class="sl-right">'+
                                        '<div><a href="#">GM HR </a> </div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                }

                $("#modal_content_history_approval").html(el);
            }
        });

        $("#modal_history_approval").modal('show');
    }

    function detail_approval_cuti(id)
    {
         $.ajax({
            type: 'POST',
            url: '{{ route('ajax.get-history-approval-cuti') }}',
            data: {'foreign_id' : id ,'_token' : $("meta[name='csrf-token']").attr('content')},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var el = '<section id="timeline" class="timeline-left timeline-wrapper">'+
                                '<h3 class="page-title text-center text-lg-left">Timeline</h3>'+
                                '<ul class="timeline">';

                            if(data.data.is_approved_atasan == 1){
                                el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                            }

                            if(data.data.is_approved_atasan == 0){
                                el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                            }
                            
                            if(data.data.is_approved_atasan === null){
                                el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                            }
                            
                                        
                                        el += '<div class="sl-right">'+
                                                '<div><a href="#">'+ data.data.atasan +'</a> </div>'+
                                                '<div class="desc">'+ (data.data.date_approved_atasan != null ? data.data.date_approved_atasan : ''  ) +'<p>'+ (data.data.catatan_atasan !=null ? data.data.catatan_atasan : '' ) +'</p></div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                    el += '<div class="panel-body">'+
                                    '<div class="steamline">'+
                                        '<div class="sl-item">';

                                if(data.data.is_approved_personalia == 1){
                                    el += '<div class="sl-left bg-success"> <i class="fa fa-check"></i></div>';
                                }

                                if(data.data.is_approved_personalia == 0){
                                    el += '<div class="sl-left bg-danger"> <i class="fa fa-close"></i></div>';
                                }

                                if(data.data.is_approved_personalia === null){
                                    el += '<div class="sl-left bg-warning"> <i class="fa fa-info"></i></div>';
                                }

                                    
                                    el += '<div class="sl-right">'+
                                                '<div><a href="#">Personalia</a> </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                    el += '<div class="timeline-badge">'+
                                '<span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="" data-original-title="Portfolio project work"><i class="la la-plane"></i></span>'+
                              '</div>';

                    el += '<div class="timeline-card card border-grey border-lighten-2">'+
                            '<div class="card-header">'+
                              '<h4 class="card-title"><a href="#">Portfolio project work</a></h4>'+
                              '<p class="card-subtitle text-muted pt-1">'+
                                '<span class="font-small-3">5 hours ago</span></p>';

                    el += '</ul></div>';


                $("#modal_content_history_approval").html(el);
            }
        });

        $("#modal_history_approval").modal('show');
    }
</script>