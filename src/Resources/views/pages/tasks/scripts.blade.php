<div class="modal fade" id="task-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border:0px;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Task Details</h5>
                <a data-dismiss="modal" href="javascript:(0);" modal-dismiss="modal" class="pull-right modal-title text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-icon-white text-white text-light" style="color:#ffffff">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                            <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" id="Oval-25" fill="#FFFFFF" fill-rule="nonzero"/>
                            <rect id="Rectangle" fill="#FFFFFF" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="modal-body text-back" id="printArea">

            </div>
            <div class="modal-footer">
                <small class="text-light font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Task Details</small>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-task-progress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-mg" role="document">
        <div class="modal-content" style="border:0px;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Task Progress</h5>
                <a data-dismiss="modal" href="javascript:(0);" modal-dismiss="modal" class="pull-right modal-title text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-icon-white text-white text-light" style="color:#ffffff">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                            <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" id="Oval-25" fill="#FFFFFF" fill-rule="nonzero"/>
                            <rect id="Rectangle" fill="#FFFFFF" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="modal-body text-back">
                <form class="kt-form row" method="post" id="add-task-progress-form">
                    @csrf
                    <input type="hidden" name="team" id="team_team_id">
                    <input type="hidden" name="task" id="team_task_id">

                    <div class="form-group col-12">
                        <label>Description</label>
                        <textarea required class="form-control" name="progress_description" placeholder="Progress description"></textarea>
                    </div>
                    <div class="form-group col-12">
                        <label>Action Time</label>
                        <input  required type="datetime-local" name="progress_time" class="form-control">
                    </div>
                    <div class="form-group col-12">
                        <label>Progress Done (in percentage)</label>
                        <input id="progress-percentage" max="100" required type="number" name="progress_done" class="form-control" placeholder="e.g 5%">
                    </div>
                    <div class="col-md-8"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="active btn btn-block btn-default pull-right ">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <small class="text-light font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Add Task Progress</small>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-task-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-mg" role="document">
        <div class="modal-content" style="border:0px;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Task Comment</h5>
                <a data-dismiss="modal" href="javascript:(0);" modal-dismiss="modal" class="pull-right modal-title text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-icon-white text-white text-light" style="color:#ffffff">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                            <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" id="Oval-25" fill="#FFFFFF" fill-rule="nonzero"/>
                            <rect id="Rectangle" fill="#FFFFFF" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="modal-body text-back">
                <form class="kt-form row" method="post" id="add-task-comment-form">
                    @csrf
                    <input type="hidden" name="team" id="team_team_id_comment">
                    <input type="hidden" name="task" id="team_task_id_comment">
                    <div class="form-group col-12">
                        <label>Action Time</label>
                        <input  required type="datetime-local" name="comment_time" class="form-control">
                    </div>
                    <div class="form-group col-12">
                        <label>Comment</label>
                        <textarea required class="form-control" name="comment_description" placeholder="Comment content"></textarea>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="active btn btn-block btn-default pull-right ">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <small class="text-light font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Add Task Comment</small>
            </div>
        </div>
    </div>
</div>

<script>
    $("select").select2({placeholder:"Select Option"});
    $( function(){
        var oldClass ="";
        $('#task-details').on('show.bs.modal', function (event) {
            const handler = $(event.relatedTarget) // Button that triggered the modal
            const team = handler.data('team');
            const task = handler.data('task');
            const colorClass = handler.data('colorclass');
            const modal = $(this)
            modal.find(".modal-header").removeClass(oldClass);
            modal.find(".modal-footer").removeClass(oldClass);
            modal.find(".modal-header").addClass("bg-"+colorClass);
            modal.find(".modal-footer").addClass("bg-"+colorClass);
            oldClass = "bg-"+colorClass;
            modal.find(".modal-body").text("Please wait ... ");

            const url = "/lmteams/taskdetails/" + team + "/" + task;

            modal.find(".modal-body").load(url,function( response, status, xhr ) {
                if ( status == "error" ) {
                    var msg = "Sorry but there was an error: ";
                    modal.find('.modal-body').html( msg + xhr.status + " " + xhr.statusText );
                }
            });

        })

        var oldClassProgress ="";
        $('#add-task-progress').on('show.bs.modal', function (event) {
            const handler = $(event.relatedTarget) // Button that triggered the modal
            const team = handler.data('team');
            const task = handler.data('task');
            const progress = handler.data('progress');
            const colorClass = handler.data('colorclass');
            const modal = $(this)
            modal.find(".modal-header").removeClass(oldClassProgress);
            modal.find(".modal-footer").removeClass(oldClassProgress);
            modal.find(".modal-header").addClass("bg-"+colorClass);
            modal.find(".modal-footer").addClass("bg-"+colorClass);
            modal.find('#team_task_id').val(task);
            modal.find('#team_team_id').val(team);
            modal.find('#progress-percentage').attr("min",progress);
            modal.find('#progress-percentage').val(progress);
            oldClassProgress = "bg-"+colorClass;

        })

        var oldClassComment ="";
        $('#add-task-comment').on('show.bs.modal', function (event) {
            const handler = $(event.relatedTarget) // Button that triggered the modal
            const team = handler.data('team');
            const task = handler.data('task');
            const colorClass = handler.data('colorclass');
            const modal = $(this)
            modal.find(".modal-header").removeClass(oldClassComment);
            modal.find(".modal-footer").removeClass(oldClassComment);
            modal.find(".modal-header").addClass("bg-"+colorClass);
            modal.find(".modal-footer").addClass("bg-"+colorClass);
            modal.find('#team_task_id_comment').val(task);
            modal.find('#team_team_id_comment').val(team);
            oldClassComment = "bg-"+colorClass;

        })

        $("form#add-task-progress-form").submit( function(event){
            event.preventDefault();
            const url = "{{route('lmteams-team-task-addprogress')}}";
            const  formData = $(this).serialize();
            $.ajax({
                url: url,
                type: "get",
                data:formData,
                beforeSend: function(){
                    KTApp.blockPage({
                        overlayColor: 'red',
                        state: 'warning', // a bootstrap color
                        size: 'lg', //available custom sizes: sm|lg
                        message: 'Please wait...'
                    })
                },
                success: function(getResult){
                    KTApp.unblockPage();
                    const result = JSON.parse(getResult);
                    if(result.status == true){
                        Swal.fire("", result.message, "success");
                        window.location.reload();
                    }else {
                        Swal.fire("", result.message, "warning");
                    }

                },
                error: function(xhr){
                    KTApp.unblockPage();
                    Swal.fire("",xhr.statusText,"error");
                }
            })
        });

        $("form#add-task-comment-form").submit( function(event){
            event.preventDefault();
            const url = "{{route('lmteams-team-task-addcomment')}}";
            const  formData = $(this).serialize();
            $.ajax({
                url: url,
                type: "get",
                data:formData,
                beforeSend: function(){
                    KTApp.blockPage({
                        overlayColor: 'red',
                        state: 'warning', // a bootstrap color
                        size: 'lg', //available custom sizes: sm|lg
                        message: 'Please wait...'
                    })
                },
                success: function(getResult){
                    KTApp.unblockPage();
                    const result = JSON.parse(getResult);
                    if(result.status == true){
                        Swal.fire("", result.message, "success");
                        window.location.reload();
                    }else {
                        Swal.fire("", result.message, "warning");
                    }

                },
                error: function(xhr){
                    KTApp.unblockPage();
                    Swal.fire("",xhr.statusText,"error");
                }
            })
        });
    })

</script>
