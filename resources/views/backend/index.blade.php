@extends('backend.layouts.main')
@section('main-container')
                    <!-- start dash info -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card dash-header-box shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="row row-cols-xxl-4 row-cols-md-3 row-cols-1 g-0">
                                        <div class="col">
                                            <div class="mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Total Balance </p>
                                                <h3 class="text-white mb-0">
                                                    @if(!empty($total_balance->total_deposit_amount))
                                                        {{  $total_balance->total_deposit_amount  }}
                                                    @else
                                                        0
                                                    @endif
                                                </h3>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col">
                                            <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Exchange Balance</p>
                                                <h3 class="text-white mb-0">
                                                    @if(!empty($total_withdraw->total_withdraw_amount))
                                                        {{  $total_withdraw->total_withdraw_amount  }}
                                                    @else
                                                        0
                                                    @endif
                                                </h3>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col">
                                            <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Deposit</p>
                                                <h3 class="text-white mb-0">
                                                    <button type="button" id="deposit_amount_seesion" class="btn btn-success btn-rounded">Deposit</button>
                                                </h3>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col">
                                            <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                                <p class="text-white-50 mb-2 text-truncate">Withdraw</p>
                                                <h3 class="text-white mb-0">
                                                    <button type="button" class="btn btn-purple btn-rounded">Withdraw</button>
                                                </h3>
                                            </div>
                                        </div><!-- end col -->

                                    </div><!-- end row -->
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>
                    <!-- end dash info -->
                </div>
            </div>

              <!-- start dash troggle-icon -->
              <div>
                <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle" aria-expanded="true" aria-controls="dashtoggle">
                    <i class="bx bx-up-arrow-alt"></i>
                </a>
            </div>
          <!-- end dash troggle-icon -->

        </header>
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
                <input type="text" class="form-control" name="name" id="createuser" placeholder="Type Username">
                <div id="notificationcreateuser" class="alert alert-success" style="display: none;"></div>
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
                <span>Amount</span>
                <input type="number" class="form-control" id="deposit_amountuser" placeholder="Type Amount">
                <input type="hidden" id="deposit_amountuser_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="deposit_save">Deposit</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="myModalwith" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Withdraw</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <span>Amount</span>
                <input type="number" class="form-control" id="withdraw_amountuser" placeholder="Type Amount">
                <input type="hidden" id="withdraw_amountuser_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="withdraw_save">Withdraw</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="myModalpass" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Password Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <span>New Password</span>
                <input type="text" class="form-control" id="passwordnew_amountuser" placeholder="Type New Password *">
                <span>Confirm Password</span>
                <input type="text" class="form-control" id="passwordcon_amountuser" placeholder="Type Confirm Password *">
                <input type="hidden" id="password_amountuser_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="password_save">Password Change</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="myModaldeposit_amount_seesion" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Select payment type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                
            
                <div class="form-group">
                    <select id="mySelect" class="form-control">
                    <option value="">Select payment type</option>
                    <option value="option1">UPI</option>
                    <option value="option2">Google Pay</option>
                    <option value="option3">Phone pay</option>
                    </select>
                </div>
                

                <div class="alert alert-info mt-3" id="message"></div>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="password_save">Submit</button>
            </div> -->

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
            
            var data = JSON.parse(response);
            if (data.error != null) {
                var notification = $("#notificationcreateuser");
                notification.text(data.error.name);
                notification.addClass("show alert-danger");
                notification.css("display", "block");
            } else {
                $("#myModal").modal("hide");
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
                $('#id_p').val("")
            }
            
           }

       });

        
    })


    function refreshUserAccountList() {
        $.ajax({
            url: 'create_user_after_account', // Replace with the URL to fetch updated data
            type: 'GET', // Adjust the HTTP method if needed
            dataType: 'json', // Specify the data type you expect
            success: function (data) {
                // Clear the existing user account list
                // $('#new_useraccounts').empty();
                var userList = document.getElementById('new_useraccounts');

                // Clear the current content inside the ul element
                userList.innerHTML = '';

                console.log(data);
                // Iterate over the updated data and append new list items
                // $.each(data, function (index, account) {
                //     var listItem = '<li class="active"><a href="#"><div class="d-flex align-items-start"><div class="flex-shrink-0 user-img online align-self-center me-3"><img src="' + account.parent_user_image + '" class="rounded-circle avatar-sm" alt=""><span class="user-status"></span></div><div class="flex-grow-1 overflow-hidden"><h5 class="text-truncate font-size-14 mb-1">' + account.user_name + '</h5><p class="text-truncate mb-0">' + account.url_web + '</p><br><button type="button" class="btn btn-success btn-rounded deposit_usera1" data-id="'+account.id+'">Deposit</button><button type="button" class="btn btn-purple btn-rounded withdraw_usera" data-id="'+account.id+'">Withdraw</button><button type="button" class="btn btn-warning btn-rounded password_userc" data-id="'+account.id+'">Password</button></div><div class="flex-shrink-0"><div class="font-size-11">' + account.create_at + '</div></div></div></a></li>';

                //     // Append the new list item to the user account list
                //     $('#new_useraccounts').append(listItem);
                // });

                data.forEach(function(account) {
                var listItem = document.createElement('li');
                listItem.classList.add('active');
                listItem.innerHTML = `
                    <a href="#">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0 user-img online align-self-center me-3">
                                <img src="${account.parent_user_image}" class="rounded-circle avatar-sm" alt="">
                                <span class="user-status"></span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">${account.user_name}</h5>
                                <p class="text-truncate mb-0">${account.url_web}</p><br>
                                <button type="button" class="btn btn-success btn-rounded deposit_usera" data-bs-target="#myModaldep" data-id="${account.id}">Deposit</button>
                                <button type="button" class="btn btn-purple btn-rounded withdraw_usera" data-bs-target="#myModalwith" data-id="${account.id}">Withdraw</button>
                                <button type="button" class="btn btn-warning btn-rounded password_userc" data-bs-target="#myModalpass" data-id="${account.id}">Password</button>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="font-size-11">${account.create_at}</div>
                            </div>
                        </div>
                    </a>
                `;
                userList.appendChild(listItem);
            });

            },
            error: function (error) {
                console.error('Error fetching user account data: ' + error);
            }
        });   
    }

    $(document).on("click", ".deposit_usera", function(event) {
        var id = $(this).data('id');
        $("#deposit_amountuser_id").val(id);
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
            } else if (data.message == 'User balance not found') {
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

    $(document).on("click", ".withdraw_usera", function(event) {
        var id = $(this).data('id');
        $("#withdraw_amountuser_id").val(id);
        $("#myModalwith").modal("show");
    });

    // withdraw_save
    $('#withdraw_save').click(function (event) {
        var withdraw_amount = $('#withdraw_amountuser').val();
        var sub_acount_id = $('#withdraw_amountuser_id').val();
        var myUrl = "{{url('withdraw_info')}}";
        $.ajax({
           url: myUrl,
           type: "POST",
           data: { 
               "_token": "{{ csrf_token() }}",
               withdraw_amount : withdraw_amount,
               sub_acount_id : sub_acount_id,
           },
           success: function (response) {
            $("#myModalwith").modal("hide");
            var data = JSON.parse(response);
            // insufficient balance
            if (data.message == 'insufficient balance') {
                var notification = $("#notification");
                notification.text(data.message);
                notification.addClass("show alert-danger");
                notification.css("display", "block");
            } else if (data.message == 'User balance not found') {
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
                        $('#withdraw_amountuser').val("");
            // $('#deposit_amountuser_id').val("");
           }



       });
    })

    $(document).on("click", ".password_userc", function(event) {
        var id = $(this).data('id');
        $("#password_amountuser_id").val(id);
        $("#myModalpass").modal("show");
    });

// password_save
    $('#password_save').click(function (event) {
        var passwordnew_amountuser = $('#passwordnew_amountuser').val();
        var passwordcon_amountuser = $('#passwordcon_amountuser').val();
        var sub_acount_id = $('#password_amountuser_id').val();
        if (passwordnew_amountuser == passwordcon_amountuser) {
            var myUrl = "{{url('password_change')}}";
            $.ajax({
            url: myUrl,
            type: "POST",
            data: { 
                "_token": "{{ csrf_token() }}",
                passwordnew_amountuser : passwordnew_amountuser,
                passwordcon_amountuser : passwordcon_amountuser,
                sub_acount_id : sub_acount_id,
            },
            success: function (response) {
                $("#myModalpass").modal("hide");
                var data = JSON.parse(response);
                // insufficient balance
                if (data.message == 'insufficient balance') {
                    var notification = $("#notification");
                    notification.text(data.message);
                    notification.addClass("show alert-danger");
                    notification.css("display", "block");
                } else if (data.message == 'User balance not found') {
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
                $('#withdraw_amountuser').val("");
                // $('#deposit_amountuser_id').val("");
            }



        });
        } else {
            $("#myModalpass").modal("hide");
            var notification = $("#notification");
                notification.text("Password Not Match");
                notification.addClass("show alert-danger");
                notification.css("display", "block");
        }
        
    })

    $(document).on("click", "#deposit_amount_seesion", function(event) {
        $("#myModaldeposit_amount_seesion").modal("show");
    });

    var select = document.getElementById("mySelect");
    var messageDiv = document.getElementById("message");

    select.addEventListener("change", function () {
        var selectedOption = select.value;

        if (selectedOption === "option1") {
            messageDiv.innerHTML = `
  <div class="container mt-2">
    <div class="wallet-box-main clearfix">
      <div class="wallet-balance">
        <h5>Make payment and upload screenshot</h5>
        <div class="payment-detail mt-2 row">
          <div class="col-md-8">
            <div class="payment-detail-box">
              <span>UPI Name</span>
              <span>tamashabook<i class="far fa-clone ml-2 c-ptr"></i></span>
            </div>
            <div class="payment-detail-box">
              <span>UPI Number</span>
              <span>tamashabook2@okicici<i class="far fa-clone ml-2 c-ptr"></i></span>
            </div>
            <div class="w-100 text-center mt-1 mb-1">
              <img src="https://sitedataprovider.com/api/upi_qr_code?name=tamashabook&amp;upi=tamashabook2@okicici" alt="Trulli" width="133" height="133">
            </div>
            <div class="wallet-trx-id w-100 mt-1 mb-1">
              <p class="theme-edit-note"><span><span>Note: upi</span></span></p>
            </div>
            <form method="post" action="{{ url('upi') }}" enctype="multipart/form-data">
                @csrf
                <div class="theme-input-box">
                    <input name="amount" class="theme-input" type="number" placeholder="Amount">
                    <input name="pay" class="theme-input" value="upi" type="hidden" placeholder="Amount">
                </div>
                <div class="mt-2 upload-ss">
                    <input type="file" id="upload-1132" name="photo" hidden accept="image/png, image/jpg, image/jpeg">
                    <label for="upload-1132">
                        <i class="fas fa-plus-circle mr-1"></i>Click here to upload payment screenshot
                    </label>
                </div>
                <div class="mt-2">
                    <small>Must have a valid image (PNG, JPG, JPEG) and not more than 5MB.</small>
                </div>
                <div class="mt-2">
                    <!-- Add more input fields here if needed -->
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        <span>Submit</span>
                    </button>
                </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>
`;

        // messageDiv.innerHTML = "You selected Option 1 - This is the message for Option 1.";
        } else if (selectedOption === "option2") {
        messageDiv.innerHTML = "You selected Option 2 - This is the message for Option 2.";
        } else if (selectedOption === "option3") {
        messageDiv.innerHTML = "You selected Option 3 - This is the message for Option 3.";
        } else {
        messageDiv.innerHTML = "";
        }
    });
</script>

@endsection 
