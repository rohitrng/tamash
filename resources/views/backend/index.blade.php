@extends('backend.layouts.main')
@section('main-container')
    
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="d-lg-flex mb-4">
                            <div class="chat-leftsidebar card w-100 user-chat mt-4 mt-sm-0 ms-lg-3">
                                <div>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="chat">
                                            <div class="chat-message-list" data-simplebar>
                                                <div class="p-4">
                                                    <div>
                                                        <div id="notification" class="alert alert-success" style="display: none;"></div>

                                                        <h5 class="font-size-14 mb-9">My Accounts</h5>
                
                                                        <ul class="list-unstyled chat-list" id="new_useraccounts">
                                                            @foreach($user_accounts as $account)
                                                            <li class="active">
                                                                <a href="#">
                                                                    <div class="d-flex align-items-start">
                                                                        
                                                                        <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                                            <img src="<?php echo $account->parent_user_image ; ?>" class="rounded-circle avatar-sm" alt="">
                                                                            <span class="user-status"></span>
                                                                        </div>
                                                                        
                                                                        <div class="flex-grow-1 overflow-hidden">
                                                                            <h5 class="text-truncate font-size-14 mb-1"><?php echo $account->user_name ; ?></h5>
                                                                            <p class="text-truncate mb-0"><?php echo $account->url_web ; ?></p><br>
                                                                            <button type="button" class="btn btn-success btn-rounded deposit_usera" data-bs-target="#myModaldep" data-id="{{ $account->id }}">Deposit</button>
                                                                            <button type="button" class="btn btn-purple btn-rounded withdraw_usera" data-bs-target="#myModalwith" data-id="{{ $account->id }}">Withdraw</button>
                                                                            <button type="button" class="btn btn-warning btn-rounded password_userc" data-bs-target="#myModalpass" data-id="{{ $account->id }}">Password</button>
                                                                        </div>

                                                                        <div class="flex-shrink-0">
                                                                            <div class="font-size-11"><?php echo $account->create_at ; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                             <!-- end li -->
                                                        </ul>
                                                        <!-- end ul -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>

                            </div>
                            <!-- end chat-leftsidebar -->
                            <div class="chat-leftsidebar card w-100 user-chat mt-4 mt-sm-0 ms-lg-3">
                                <div class="tab-content">
                                        <div class="tab-pane show active" id="chat">
                                            <div class="chat-message-list" data-simplebar>
                                                <div class="p-4">
                                                    <div>
                                                        <h5 class="font-size-14 mb-9">Create Account</h5>
                
                                                        <ul class="list-unstyled chat-list">
                                                            @foreach($accounts as $account)
                                                            <li class="active">
                                                                <a href="#">
                                                                    <div class="d-flex align-items-start">
                                                                        
                                                                        <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                                            <img src="{{ $account->image_url }}" class="rounded-circle avatar-sm" alt="">
                                                                            <span class="user-status"></span>
                                                                        </div>
                                                                        
                                                                        <div class="flex-grow-1 overflow-hidden">
                                                                            <h5 class="text-truncate font-size-14 mb-1"> {{ $account->name }}</h5>
                                                                            <p class="text-truncate mb-0"> {{ $account->url_web }}</p>
                                                                        </div>
                                                                        <div class="flex-shrink-0">
                                                                            <!-- <button type="button" class="btn btn-dark btn-rounded">Create</button> -->
                                                                            <!-- <button type="button" class="btn btn-dark btn-rounded" data-id="{{ $account->id }}" data-bs-toggle="modal" data-bs-target="#myModal">Create</button> -->
                                                                            <button type="button" class="btn btn-dark btn-rounded create-button" data-bs-toggle="modal" data-bs-target="#myModal" data-id="{{ $account->id }}">Create</button>

                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <!-- end ul -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                        </div>
                        <!-- End d-lg-flex  -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Vuesy.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        <!-- end main content-->
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center p-3">

                <h5 class="m-0 me-2">Theme Customizer</h5>

                <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="m-0" />

            <div class="p-4">
                <h6 class="mb-3">Layout</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout"
                        id="layout-vertical" value="vertical">
                    <label class="form-check-label" for="layout-vertical">Vertical</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout"
                        id="layout-horizontal" value="horizontal">
                    <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                </div>

                <h6 class="mt-4 mb-3">Layout Mode</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode"
                        id="layout-mode-light" value="light">
                    <label class="form-check-label" for="layout-mode-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode"
                        id="layout-mode-dark" value="dark">
                    <label class="form-check-label" for="layout-mode-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3">Layout Width</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width"
                        id="layout-width-fluid" value="fluid" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                    <label class="form-check-label" for="layout-width-fluid">Fluid</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width"
                        id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                </div>

                <h6 class="mt-4 mb-3">Topbar Color</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color"
                        id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                    <label class="form-check-label" for="topbar-color-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color"
                        id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                </div>

                <div id="sidebar-setting">
                <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Size</h6>

                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-size"
                        id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                    <label class="form-check-label" for="sidebar-size-default">Default</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-size"
                        id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                    <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-size"
                        id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                </div>

                <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Color</h6>

                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-color"
                        id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-color"
                        id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-color"
                        id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                    <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                </div>
            </div>

                <h6 class="mt-4 mb-3">Direction</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction"
                        id="layout-direction-ltr" value="ltr">
                    <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction"
                        id="layout-direction-rtl" value="rtl">
                    <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                </div>

            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Create Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="createuser" placeholder="Type Username">
                <input type="hidden" id="id_p" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="myModaldep" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <input type="number" class="form-control" id="deposit_amountuser" placeholder="Amount">
                <input type="text" id="deposit_amountuser_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="deposit_save">Deposit</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Use modal-lg to make it larger if needed -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Account Created</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="theme-popup-scroll">
          <div class="wallet-balance-area clearfix m-0">
            <div class="wallet-balance-box w-100 m-0">
              <div class="wallet-balance-ico">
                <!-- <a href="https://timex247.com" target="_blank">
                  <img src="https://wallet.sprintstaticdata.com/wallettheme/td/timex247.com/logo.png">
                </a> -->
                <!-- <label>Username:</label> -->
                  
              </div>
              <div class="w-100">
                <img src="" alt="Image" id="responseImage" />
                <p><b id="url_web"></b><i class="far fa-copy ml-1"></i></p>
              </div>
              <div class="w-100 d-flex justify-content-between align-items-center">
                <div class="text-left">
                  <label>Username:</label>
                  <p><b id="responseName"></b><i class="far fa-copy ml-1"></i></p>
                </div>
                <div class="text-right">
                  <label>Password:</label>
                  <p><b id="responsePassword"></b><i class="far fa-copy ml-1"></i></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script>
    $('.create-button').click(function (event) {
        var id = $(this).data('id');
        $('#id_p').val(id)
    })
    $('#save').click(function (event) {
        var name = $('#createuser').val();
        var id_p = $('#id_p').val();
        var myUrl = "{{url('account_create')}}";

        $.ajax({
           url: myUrl,
           type: "POST",
           data: { 
               "_token": "{{ csrf_token() }}",
               name : name,
               id : id_p,
           },
           success: function (response) {
            $("#myModal").modal("hide");
            console.log(response.user_name);
            var data = JSON.parse(response);

            $("#myModal2").on("shown.bs.modal", function () {
                // Set the text values and image source here
                $("#responseName").text(data.user_name);
                $("#url_web").text(data.url_web);
                $("#responsePassword").text(data.user_password);
                $("#responseImage").attr("src", data.parent_user_image);
            });
            refreshUserAccountList();
            // Show the modal
            $("#myModal2").modal("show");
           }

       });

        $('#id_p').val("")
    })


    function refreshUserAccountList() {
        $.ajax({
            url: 'create_user_after_account', // Replace with the URL to fetch updated data
            type: 'GET', // Adjust the HTTP method if needed
            dataType: 'json', // Specify the data type you expect
            success: function (data) {
                // Clear the existing user account list
                $('#new_useraccounts').empty();
                console.log(data);
                // Iterate over the updated data and append new list items
                $.each(data, function (index, account) {
                    var listItem = '<li class="active"><a href="#"><div class="d-flex align-items-start"><div class="flex-shrink-0 user-img online align-self-center me-3"><img src="' + account.parent_user_image + '" class="rounded-circle avatar-sm" alt=""><span class="user-status"></span></div><div class="flex-grow-1 overflow-hidden"><h5 class="text-truncate font-size-14 mb-1">' + account.user_name + '</h5><p class="text-truncate mb-0">' + account.url_web + '</p><br><button type="button" class="btn btn-success btn-rounded deposit_usera" data-id="'+account.id+'">Deposit</button><button type="button" class="btn btn-purple btn-rounded withdraw_usera" data-id="'+account.id+'">Withdraw</button><button type="button" class="btn btn-warning btn-rounded password_userc" data-id="'+account.id+'">Password</button></div><div class="flex-shrink-0"><div class="font-size-11">' + account.create_at + '</div></div></div></a></li>';

                    // Append the new list item to the user account list
                    $('#new_useraccounts').append(listItem);
                });
            },
            error: function (error) {
                console.error('Error fetching user account data: ' + error);
            }
        });   
    }

    $(".deposit_usera").click(function(event){
        var id = $(this).data('id');
        $("#deposit_amountuser_id").val(id)
        $("#myModaldep").modal("show");
    });

    // deposit_save
    $('#deposit_save').click(function (event) {
        var deposit_amount = $('#deposit_amountuser').val();
        var sub_acount_id = $('#deposit_amountuser_id').val();
        var myUrl = "{{url('deposit_info')}}";

        $.ajax({
           url: myUrl,
           type: "POST",
           data: { 
               "_token": "{{ csrf_token() }}",
               deposit_amount : deposit_amount,
               sub_acount_id : sub_acount_id,
           },
           success: function (response) {
            $("#myModaldep").modal("hide");
            var data = JSON.parse(response);
            // insufficient balance
            if (data.message == 'insufficient balance') {
                var notification = $("#notification");
                notification.text(data.message);
                notification.addClass("show alert-danger");
                notification.css("display", "block");
            } else {
                var notification = $("#notification");
                notification.text(data.message);
                notification.addClass("show alert-success");
                notification.css("display", "block");
            }

            setTimeout(function () {
                notification.removeClass("show");
                notification.css("display", "none");
            }, 3000);

            // refreshUserAccountList();
                        $('#deposit_amountuser').val("");
            // $('#deposit_amountuser_id').val("");
           }



       });
    })

    $(".withdraw_usera").click(function(event){
        var id = $(this).data('id')
        alert(id)
    });

    $(".password_userc").click(function(event){
        var id = $(this).data('id')
        alert(id)
    });

</script>


@endsection 
