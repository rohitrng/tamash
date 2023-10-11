@extends('backend.layouts.main')
@section('main-container')

<style type="text/css">
   .validation_err {
      color: red !important;
   }

   input[type="number"] {
      appearance: textfield;
      -webkit-appearance: textfield;
      -moz-appearance: textfield;
   }

   input {
      position: relative;
   }

   input[type="date"]::-webkit-calendar-picker-indicator {
      background-position: right;
      background-size: auto;
      cursor: pointer;
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      top: 7px;
      width: auto;
   }

   .s1 {
      background-color: #ff4c51;
   }

   .uperletter {
      text-transform: capitalize;
   }

   .sw-theme-default .sw-toolbar-top {
      display: none;
   }

   .mb-3 {
      margin-bottom: 0.4rem !important;
   }

   .error_msg2 {
      color: green;
   }

   .validation_err2 {
      color: green !important;
   }

   .ui-menu .ui-menu-item {
      font-size: 0.813rem;
      width: 646px;

   }

   .ui-autocomplete {
      max-height: 150px;
      overflow-y: auto;
      overflow-x: hidden;

      padding-right: 20px;
   }

   html .ui-autocomplete {
      height: 150px;
   }
</style>

<div class="main-content pt-4">
   <div class="breadcrumb">
      <h1 class="me-2">Edit Student Registration</h1>
   </div>
   <div class="separator-breadcrumb border-top"></div>
   <div class="row">
      @if(!empty($all_inquiry))
      @foreach($all_inquiry as $each_inq)
      <?php $notificationData1 = json_decode($each_inq->json_str, true); ?>
      <div class="col-md-12">
         <!--  SmartWizard html -->
         <div id="smartwizard">
            <ul>
               <li><a href="#step-1">Step 1<br /><small>Student Details</small></a></li>
               <li>
                  <a href="#step-2">Step 2<br /><small>Personal Details</small></a>
               </li>
               <!--  <li>
                  <a href="#step-3"
                     >Step 3<br /><small>Details of Siblings</small></a
                     >
                  </li>
                  <li>
                  <a href="#step-4"
                     >Step 4<br /><small>Bank Details</small></a
                     >
                  </li> -->
            </ul>
            <div>

               <div id="step-1">
                  <h3 class="border-bottom border-gray pb-2">
                     Student Registration Form
                  </h3>
                  <div class="form_section1_div">
                     <form novalidate="novalidate" method="post" action="{{url('saveeditregistration')}}" class="rg_form" id="form-id" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <input type="hidden" name="id" value="<?php echo $each_inq->id; ?>">
                           <div class="col-md-6 form-group mb-3">
                              <label for="firstName1">Application Type<b class="validation_err">*</b></label>
                              <select id="application_for" class="form-control" name="application_for" autocomplete="shipping address-level1" required>
                                 <option value="" disabled selected>Please select</option>
                                 @foreach(config('global.admission_type') as $each)
                                 <option <?php if ($each_inq->application_for == $each) {
                                             echo "selected";
                                          } ?>value="{{$each}}">{{$each}}</option>
                                 @endforeach
                              </select>
                              <span class="application_for_msg validation_err"></span>
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="studentname">Form Number</label>
                              <input name="form_number" class="form-control" id="studentname" placeholder="Form Number" readonly value="<?php if (!empty($each_inq->form_number)) {
                                                                                                                                             echo $each_inq->form_number;
                                                                                                                                          } ?>" />
                           </div>
                           <!-- <div class="col-md-4 form-group mb-3">
                              <label for="studentname">Student Name<b class="validation_err">*</b></label>
                              <input name="student_name" 
                                 class="form-control"
                                 id="studentname"
                                 placeholder="Enter Student Name"
                                 />
                                 <span class="student_name_msg validation_err"></span>
                           </div> -->
                           <div class="col-lg-6 form-group mb-3">

                              <label for="studentname">Student Name<b class="validation_err">*</b></label>
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <select id="studentname_prefix" class="form-control btn btn-outline-primary dropdown-toggle" name="studentname_prefix" autocomplete="shipping address-level1">
                                       <option <?php if (!empty($notificationData1['studentname_prefix'])) {
                                                   if ($notificationData1['studentname_prefix'] == "Master") {
                                                      echo "select";
                                                   }
                                                } ?> value="Master">Master</option>
                                       <option <?php if (!empty($notificationData1['studentname_prefix'])) {
                                                   if ($notificationData1['studentname_prefix'] == "Mr.") {
                                                      echo "select";
                                                   }
                                                } ?> value="Mr.">Mr.</option>
                                       <option <?php if (!empty($notificationData1['studentname_prefix'])) {
                                                   if ($notificationData1['studentname_prefix'] == "Miss") {
                                                      echo "select";
                                                   }
                                                } ?> value="Miss">Miss</option>
                                    </select>
                                 </div>
                                 <input type="text" class="form-control uperletter" id="studentname" placeholder="Enter Student Name" name="studentname" required value="<?php if (!empty($notificationData1['studentname'])) {
                                                                                                                                                      echo $notificationData1['studentname'];
                                                                                                                                                   } ?>" />
                                 <span class="student_name_msg validation_err"></span>
                              </div>
                                                                                                                                                                          
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="studentname">Student DOB<b class="validation_err">*</b></label>
                              <input type="date" name="student_dob" class="form-control" id="student_dob" placeholder="Enter Student DOB" value="<?php if (!empty($notificationData1['student_dob'])) {
                                                                                                                                                      echo $notificationData1['student_dob'];
                                                                                                                                                   } ?>" />
                              <span class="student_dob_msg validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="studentname">Nationality<b class="validation_err">*</b></label>
                              <input name="nationality" class="form-control" id="nationality" placeholder="Enter Nationality" value="<?php if (!empty($notificationData1['nationality'])) {
                                                                                                                                          echo $notificationData1['nationality'];
                                                                                                                                       } ?>" />
                              <span class="student_dob_msg validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="firstName1">Gender</label>
                              <select id="gender" class="form-control" name="gender" required>
                                 <option value="" disabled selected>Please select</option>
                                 @foreach(config('global.gender') as $each)
                                 <option <?php if ($notificationData1['gender'] == $each) {
                                             echo "selected";
                                          } ?> value="{{$each}}">{{$each}}</option>
                                 @endforeach
                              </select>
                              <span class="gender_msg validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="Caste">Caste<b class="validation_err">*</b></label>
                              <!-- <input class="form-control Caste" id="Caste" placeholder="Student Caste" name="student_caste" /> -->
                              <select id="Caste" class="form-control Caste" name="student_caste" autocomplete="">
                                 <option value="" disabled selected>Please select</option>
                                 @foreach(config('global.caste') as $each)
                                 <option <?php if (!empty($notificationData1['student_caste'])) {
                                             if ($notificationData1['student_caste'] == $each) {
                                                echo "selected";
                                             }
                                          } ?> value="{{$each}}">{{$each}}</option>
                                 @endforeach
                              </select>
                              <span class="student_caste_msg validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="religion">Religion<b class="validation_err">*</b></label>
                              <select id="religion" class="form-control" name="religion" required>
                                 <option value="" disabled selected>Please select</option>
                                 @foreach(config('global.religion') as $each)
                                 <option <?php if (!empty($notificationData1['religion'])) {
                                             if ($notificationData1['religion'] == $each) {
                                                echo "selected";
                                             }
                                          } ?> value="{{$each}}">{{$each}}</option>
                                 @endforeach
                              </select>
                              <span class="religion validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="category">Category<b class="validation_err">*</b></label>
                              <select id="category" class="form-control" name="category" autocomplete="" required>
                                 <option value="" disabled selected>Please select</option>
                                 @foreach(config('global.cate') as $each)
                                 <option <?php if ($notificationData1['category'] == $each) {
                                             echo "selected";
                                          } ?> value="{{$each}}">{{$each}}</option>
                                 @endforeach
                              </select>
                              <span class="category_msg validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="firstName1">Class Name<b class="validation_err">*</b></label>
                              <select id="classname" class="form-control" name="classname" autocomplete="" required>
                                 <option disabled selected>Please select</option>
                                 @foreach(config('global.class_name') as $each)
                                 <option <?php if ($each_inq->class_name == $each) {
                                             echo "selected";
                                          } ?> value="{{$each}}">{{$each}}</option>
                                 @endforeach
                              </select>
                              <span class="classname_msg validation_err"></span>

                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="firstName1">Session Name<b class="validation_err">*</b></label>
                              <select id="session_name" class="form-control" name="session_name" autocomplete="" required>
                                 <option disabled selected>Please select</option>
                                 @foreach(config('global.session_name') as $each)
                                 <option <?php if ($each_inq->session_name == $each) {
                                             echo "selected";
                                          } ?> value="{{$each}}">{{$each}}</option>
                                 @endforeach
                              </select>
                              <span class="session_name_msg validation_err"></span>

                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="address">Present Address :</label>
                              <input class="form-control" id="address" type="text" placeholder="Enter address" name="present_address" value="<?php if (!empty($notificationData1['present_address'])) {
                                                                                                                                                echo $notificationData1['present_address'];
                                                                                                                                             } ?>" />
                              <span class="present_address_msg validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="address">Permanent Address :</label>
                              <input class="form-control" id="address" type="text" placeholder="Enter address" name="permanent_address" value="<?php if (!empty($notificationData1['permanent_address'])) {
                                                                                                                                                   echo $notificationData1['permanent_address'];
                                                                                                                                                } ?>" />
                              <span class="permanent_address_msg validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="address">Phone Number :</label>
                              <input class="form-control" id="phone number" type="text" placeholder="Enter phone number" name="phone_number" value="<?php if (!empty($notificationData1['phone_number'])) {
                                                                                                                                                         echo $notificationData1['phone_number'];
                                                                                                                                                      } ?>" />
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="address">Mobile Number :</label>
                              <input class="form-control" id="phonenumber" type="text" placeholder="Enter phone number" name="mobile_number" value="<?php if (!empty($notificationData1['mobile_number'])) {
                                                                                                                                                         echo $notificationData1['mobile_number'];
                                                                                                                                                      } ?>" maxlength="10" pattern="\d{3}-\d{3}-\d{4}" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');check();" name="fathermobile" return false; /><span class="phonenumber_for_msg validation_err" id="validation_err"></span>
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="firstName1">Mother tongue</label>
                              <input name="mother_tongue" class="form-control" id="mother_tongue" type="text" placeholder="Enter Mother tongue" value="<?php if (!empty($notificationData1['mother_tongue'])) {
                                                                                                                                                            echo $notificationData1['mother_tongue'];
                                                                                                                                                         } ?>" />
                           </div>
                           <div class="col-md-4 form-group mb-3">
                              <label for="remark">Remarks</label>
                              <input name="remarks" class="form-control" id="remarks" type="text" placeholder="Enter remark" value="<?php if (!empty($notificationData1['remarks'])) {
                                                                                                                                       echo $notificationData1['remarks'];
                                                                                                                                    } ?>" />
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="remark">Vaccaination</label>
                              <input name="vaccaination" class="form-control" id="vaccaination" type="text" placeholder="Enter vaccaination" value="<?php if (!empty($notificationData1['vaccaination'])) {
                                                                                                                                                         echo $notificationData1['vaccaination'];
                                                                                                                                                      } ?>" />
                           </div>
                           <div class="col-md-6 form-group mb`-3">
                              <label for="remark">Medical Conserns (any)</label>
                              <input name='student_medical_conserns' class="form-control" id="Medical Conserns (any)" type="text" placeholder="Enter Medical Conserns (any)" value="<?php if (!empty($notificationData1['student_medical_conserns'])) {
                                                                                                                                                                                       echo $notificationData1['student_medical_conserns'];
                                                                                                                                                                                    } ?>" />
                           </div>

                           <div class="col-md-12 form-group mb-3">
                              <label for="remark">Name of Present Play School / Day Care (if any)</label>
                              <input name="present_school_name" class="form-control" id="Medical Conserns (any)" type="text" placeholder="Enter Name of Present Play School / Day Care (if any)" value="<?php if (!empty($notificationData1['present_school_name'])) {
                                                                                                                                                                                                            echo $notificationData1['present_school_name'];
                                                                                                                                                                                                         } ?>" />

                              <div class="mt-1 form__field">
                                 <label class="form__choice-wrapper">
                                    <input type="checkbox" class="is_sibling_applied" name="is_sibling_applied_for_admission" <?php if (!empty($notificationData1['is_sibling_applied_for_admission'])) {
                                                                                                                                 echo "checked";
                                                                                                                              } ?>>
                                    <span>If a Sibling (real Brother / Sister ) also applying for addmission
                                       into the school. Please give Details.</span>
                                      
                                 </label>

                                 <div class="row has_siblings_div" style="display:none;">
                                    <div class="customer_records">
                                       <div class="row">
                                          <div class="col-md-3 form-group mb-3">
                                             <label for="remark">Sibling Name</label>
                                             <select name="sibling_name[]" id="sibling_name" class="form-control sibling_selection" style="width:100%;">
                                                @if(!empty($notificationData1))
                                                <option>Select Sibling</option><?php print_r($stutdentsArr); ?>

                                                @foreach($stutdentsArr as $eachStudent)
                                                @if($notificationData1['sibling_name'][0] == $eachStudent->student_name)
                                                <option selected value="{{$eachStudent->student_name}}">{{$eachStudent->student_name}}</option>
                                                @else
                                                <option value="{{$eachStudent->student_name}}">{{$eachStudent->student_name}}</option>
                                                @endif
                                                @endforeach
                                                @else
                                                <option>Select Sibling</option><?php print_r($stutdentsArr); ?>
                                                @foreach ($stutdentsArr as $eachStudent)
                                                <option value="{{ $eachStudent->student_name }}" data-form_number="{{ $eachStudent->form_number }}" data-class_name="{{ $eachStudent->class_name }}">
                                                   {{ $eachStudent->student_name }}
                                                </option>
                                                @endforeach
                                                @endif

                                             </select>
                                          </div>
                                          <div class="col-md-3 form-group mb-3">
                                             <label for="remark">Serial Number </label>
                                             <input name='sibling_serial_number[]' id="serial_number" class="form-control serial_number" value="<?php echo $notificationData1['sibling_serial_number'][0]; ?>" type="text" readonly />
                                          </div>

                                          <div class="col-md-3 form-group mb-3">
                                             <label for="remark">Class Name</label>
                                             <input name='sibling_class_name[]' id="sibling_class_name" class="form-control sibling_class_name" value="<?php echo $notificationData1['sibling_class_name'][0]; ?>" type="text" readonly />
                                          </div>

                                          <div class="col-md-3 form-group mb-3">
                                             <label for="remark">Scholar Number</label>
                                             <input name='scholar_number[]' id="scholar_number" class="form-control scholar_number" value="<?php echo $notificationData1['scholar_number'][0]; ?>" type="text" readonly />
                                          </div>

                                          <div class="col-md-6 form-group mb`-3">
                                             <label for="remark">This student is :</label><br>
                                             <label for="remark">Younger sibling :</label>
                                             <input name='sibling_is_elder_or_younger[]' id="sibling_younger" value="younger" type="radio" <?php echo (!empty($notificationData1['sibling_is_elder_or_younger']) && $notificationData1['sibling_is_elder_or_younger'][0] === 'younger') ? 'checked' : ''; ?>>
                                             <label for="remark">Elder Sibling :</label>
                                             <input name='sibling_is_elder_or_younger[]' id="sibling_elder" value="elder" type="radio" <?php echo (!empty($notificationData1['sibling_is_elder_or_younger']) && $notificationData1['sibling_is_elder_or_younger'][0] === 'elder') ? 'checked' : ''; ?>>

                                          </div>
                                       </div>
                                       <a class="extra-fields-customer add_button btn  btn-primary" href="javascript:void(0)">+ Add More Siblings</a>
                                    </div>
                                    <div class="customer_records_dynamic p-3">Delete Row</div>
                                 </div>

                              </div>
                              <div class="mt-1 form__field">
                                 <label class="form__choice-wrapper">
                                    <input type="checkbox" class="is_driver_applied" name="required_school_transport" <?php if (!empty($notificationData1['required_school_trasnport'])) {
                                                                                                                           echo "checked";
                                                                                                                        } ?>>


                                    <span>School Transport </span>
                                 </label>

                                 <div class="row has_diver_div" style="display:none;">
                                    <div class="customer_records">
                                       <div class="row">

                                          <div class="col-md-3 form-group mb-3">
                                             <label for="remark">Driver Name</label>
                                             <select name="driver_name" id="driver_name" class="form-control staff_selection" style="width:100%;">
                                                @if(!empty($notificationData1))
                                                <option value=""> -- Please select -- </option>

                                                @foreach($drivername as $eachStudent)
                                                @if($notificationData1['driver_name'] == $eachStudent->ename)
                                                <option selected value="{{$eachStudent->ename}}">{{$eachStudent->ename}}</option>
                                                @else
                                                <option value="{{$eachStudent->ename}}">{{$eachStudent->ename}}</option>
                                                @endif
                                                @endforeach
                                                @else
                                                <option value="" selected> -- Please select -- </option>
                                                @foreach($drivername as $eachStudent)
                                                <option value="{{$eachStudent->ename}}">{{$eachStudent->ename}}</option>
                                                @endforeach
                                                @endif
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>


                              <div class="mt-1 form__field">
                                 <label class="form__choice-wrapper">
                                    <input id="birth-certificate" class="checked_birth_certificate" type="checkbox" name="birth_certificate_chk" value="yes">
                                    <span>Birth Certificate</span>
                                 </label>
                                 <div style="display:none;" class="birth_certificate_input_div">
                                    <input type="file" name="birth_Certificate" class="form-control ">
                                 </div>
                              </div>
                              <div class="mt-1 form__field">
                                 <label class="form__choice-wrapper">
                                    <input id="birth-certificate" class="transfer_certificate" type="checkbox" name="transfer_certificate_chk" value="yes">
                                    <span>Transfer Certificate</span>
                                 </label>
                                 <div style="display:none;" class="transfer_certificate_input_div">
                                    <input type="file" name="transfer_certificate" class="form-control ">
                                 </div>
                              </div>
                              <div class="mt-1 form__field">
                                 <label class="form__choice-wrapper">
                                    <input id="birth-certificate" class="address_proof" type="checkbox" name="address_proof_chk" value="yes">
                                    <span>Address Proff</span>
                                 </label>
                                 <div style="display:none;" class="address_proof_input_div">
                                    <input type="file" name="address_proof" class="form-control ">
                                 </div>
                              </div>
                              <div class="mt-1 form__field">
                                 <label class="form__choice-wrapper">
                                    <input id="birth-certificate" class="last_report_card" type="checkbox" name="last_report_card_chk" value="yes">
                                    <span>Last Report Card</span>
                                 </label>
                                 <div style="display:none;" class="last_report_card_input_div">
                                    <input type="file" name="last_report_card" class="form-control ">
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
               <div id="step-2">
                  <h3 class="border-bottom border-gray pb-2">
                     Father's Details
                  </h3>
                  <div>
                     <div class="row">

                        <div class="col-lg-4 form-group mb-3">
                           <label for="fathername">Father Name</label>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <select id="fathername_prefix" class="form-control btn btn-outline-primary dropdown-toggle" name="fathername_prefix" autocomplete="shipping address-level1">
                                    <option <?php if (!empty($notificationData1['fathername_prefix'])) {
                                                if ($notificationData1['fathername_prefix'] == "Mr.") {
                                                   echo "select";
                                                }
                                             } ?> value="Mr.">Mr.</option>
                                    <option <?php if (!empty($notificationData1['fathername_prefix'])) {
                                                if ($notificationData1['fathername_prefix'] == "Dr.") {
                                                   echo "select";
                                                }
                                             } ?> value="Dr">Dr.</option>
                                    <option <?php if (!empty($notificationData1['fathername_prefix'])) {
                                                if ($notificationData1['fathername_prefix'] == "Late") {
                                                   echo "select";
                                                }
                                             } ?> value="Late">Late</option>
                                 </select>
                              </div>
                              <input class="form-control uperletter" id="fathername" type="text" placeholder="Enter your father name" name="fathername" value="<?php if (!empty($notificationData1['fathername'])) {
                                                                                                                                                                  echo $notificationData1['fathername'];
                                                                                                                                                               } ?>" />
                           </div>

                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Date Of Birth</label>
                           <input name="father_dob" class="form-control date4" id="picker2-" type="date" placeholder="dd-mm-yyyy" name="siblings_bod" value="<?php if (!empty($notificationData1['father_dob'])) {
                                                                                                                                                                  echo $notificationData1['father_dob'];
                                                                                                                                                               } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Education</label>
                           <input name="father_education" class="form-control date4" id="picker2-" type="text" placeholder="Enter Education" name="father_education" value="<?php if (!empty($notificationData1['father_education'])) {
                                                                                                                                                                                 echo $notificationData1['father_education'];
                                                                                                                                                                              } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Organization</label>
                           <input name="father_organization" class="form-control date4" id="picker2-" type="text" placeholder="Enter Organization" name="father_education" value="<?php if (!empty($notificationData1['father_organization'])) {
                                                                                                                                                                                       echo $notificationData1['father_organization'];
                                                                                                                                                                                    } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="mothername">Designation</label>
                           <input name="father_designation" class="form-control" id="fatheroccupation" type="text" placeholder="Enter father occupation" value="<?php if (!empty($notificationData1['father_designation'])) {
                                                                                                                                                                     echo $notificationData1['father_designation'];
                                                                                                                                                                  } ?>" />
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Office Telephone</label>
                           <input name="father_office_telephone" class="form-control date4" id="picker2-" type="text" placeholder="Enter Organization" name="father_education" value="<?php if (!empty($notificationData1['father_office_telephone'])) {
                                                                                                                                                                                          echo $notificationData1['father_office_telephone'];
                                                                                                                                                                                       } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Email id</label>
                           <input name="father_email_id" class="form-control date4" id="picker2-" type="email" placeholder="Enter Email" value="<?php if (!empty($notificationData1['father_email_id'])) {
                                                                                                                                                   echo $notificationData1['father_email_id'];
                                                                                                                                                } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Mobile No.</label>
                           <input name="father_mobile" class="form-control date4" id="fathermobile" type="text" placeholder="Enter Mobile No" maxlength="10" pattern="\d{3}-\d{3}-\d{4}" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');check2();" return false; value="<?php if (!empty($notificationData1['father_mobile'])) {
                                                                                                                                                                                                                                                                                       echo $notificationData1['father_mobile'];
                                                                                                                                                                                                                                                                                    } ?>" /><span class="fathermobile_for_msg validation_err" id="validation_err2"></span>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Residental Address</label>
                           <input class="form-control date4" id="picker2-" type="email" placeholder="Enter Residental Address" name="father_res_address" value="<?php if (!empty($notificationData1['father_res_address'])) {
                                                                                                                                                                     echo $notificationData1['father_res_address'];
                                                                                                                                                                  } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Emergency contact No.</label>
                           <input class="form-control date4" id="picker2-" type="email" placeholder="Enter Emergency contact No." name="father_emergency_contact" value="<?php if (!empty($notificationData1['father_emergency_contact'])) {
                                                                                                                                                                              echo $notificationData1['father_emergency_contact'];
                                                                                                                                                                           } ?>">
                        </div>
                        <h4>Mother's Details</h4>
                        <!-- <div class="col-md-4 form-group mb-3">
               <label for="pincode">Mother Name</label>
               <input class="form-control" id="exampleInputEmail1" type="email" placeholder="Enter Mother Name" fdprocessedid="csh6vi" name="mother_name">
               </div> -->
                        <div class="col-lg-4 form-group mb-3">
                           <label for="mothername">Mother Name</label>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <select id="mothername_prefix" class="form-control btn btn-outline-primary dropdown-toggle" name="mothername_prefix" autocomplete="shipping address-level1">
                                    <option <?php if (!empty($notificationData1['mothername_prefix'])) {
                                                if ($notificationData1['mothername_prefix'] == "Mrs.") {
                                                   echo "selected";
                                                }
                                             } ?> value="Mrs">Mrs.</option>
                                    <option <?php if (!empty($notificationData1['mothername_prefix'])) {
                                                if ($notificationData1['mothername_prefix'] == "Dr.") {
                                                   echo "selected";
                                                }
                                             } ?> value="Dr">Dr.</option>
                                    <option <?php if (!empty($notificationData1['mothername_prefix'])) {
                                                if ($notificationData1['mothername_prefix'] == "Late") {
                                                   echo "selected";
                                                }
                                             } ?> value="Late">Late</option>
                                 </select>
                              </div>
                              <input class="form-control uperletter" id="mother_name" name="mothername" type="text" placeholder="Enter your mother name" value="<?php if (!empty($notificationData1['mothername'])) {
                                                                                                                                                                     echo $notificationData1['mothername'];
                                                                                                                                                                  } ?>" />
                           </div>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Date of Birth</label>
                           <input class="form-control" id="exampleInputEmail1" type="date" name="mother_dob" value="<?php if (!empty($notificationData1['mother_dob'])) {
                                                                                                                        echo $notificationData1['mother_dob'];
                                                                                                                     } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Education</label>
                           <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter Education" name="mother_education" value="<?php if (!empty($notificationData1['mother_education'])) {
                                                                                                                                                            echo $notificationData1['mother_education'];
                                                                                                                                                         } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Occupation</label>
                           <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter Mother Occupation" name="mother_ocupation" value="<?php if (!empty($notificationData1['mother_ocupation'])) {
                                                                                                                                                                     echo $notificationData1['mother_ocupation'];
                                                                                                                                                                  } ?>">
                        </div>

                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Designation</label>
                           <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter Mother Designation" name="mother_organization" value="<?php if (!empty($notificationData1['mother_organization'])) {
                                                                                                                                                                        echo $notificationData1['mother_organization'];
                                                                                                                                                                     } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Office Telephone</label>
                           <input class="form-control date4" id="picker2-" type="text" placeholder="Enter Mother Organization" name="mother_office_telephone" value="<?php if (!empty($notificationData1['mother_office_telephone'])) {
                                                                                                                                                                        echo $notificationData1['mother_office_telephone'];
                                                                                                                                                                     } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Email id</label>
                           <input class="form-control date4" id="picker2-" type="email" placeholder="Enter Mother Email" name="mother_email" value="<?php if (!empty($notificationData1['mother_email'])) {
                                                                                                                                                         echo $notificationData1['mother_email'];
                                                                                                                                                      } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="phone">Mobile No.</label>
                           <input class="form-control" id="mothermobile" placeholder="Enter mobile no" name="mother_mobile" maxlength="10" pattern="\d{3}-\d{3}-\d{4}" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');check3();" return false; value="<?php if (!empty($notificationData1['mother_mobile'])) {
                                                                                                                                                                                                                                                                     echo $notificationData1['mother_mobile'];
                                                                                                                                                                                                                                                                  } ?>" /><span class="mothermobile_for_msg validation_err" id="validation_err3"></span>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Residental Address</label>
                           <input class="form-control date4" id="picker2-" type="text" placeholder="Enter Residental Address" name="mother_res_address" value="<?php if (!empty($notificationData1['mother_res_address'])) {
                                                                                                                                                                  echo $notificationData1['mother_res_address'];
                                                                                                                                                               } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Emergency contact No.</label>
                           <input class="form-control date4" id="picker2-" type="text" placeholder="Enter Emergency contact No" name="mother_emergency_contact" value="<?php if (!empty($notificationData1['mother_emergency_contact'])) {
                                                                                                                                                                           echo $notificationData1['mother_emergency_contact'];
                                                                                                                                                                        } ?>">
                        </div>
                        <h4>Guardian Details</h4>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Guardian Name</label>
                           <input class="form-control date4" id="picker2-" type="email" placeholder="Enter Guardian Name" name="guardian_name" value="<?php if (!empty($notificationData1['guardian_name'])) {
                                                                                                                                                         echo $notificationData1['guardian_name'];
                                                                                                                                                      } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Office Telephone</label>
                           <input class="form-control date4" id="picker2-" type="text" placeholder="Enter Office Telephone" name="guardian_office_telephone" value="<?php if (!empty($notificationData1['guardian_office_telephone'])) {
                                                                                                                                                                        echo $notificationData1['guardian_office_telephone'];
                                                                                                                                                                     } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Email id</label>
                           <input class="form-control date4" id="picker2-" type="email" placeholder="Enter Email id" name="guardian_email_id" value="<?php if (!empty($notificationData1['guardian_email_id'])) {
                                                                                                                                                         echo $notificationData1['guardian_email_id'];
                                                                                                                                                      } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="phone">Mobile No.</label>
                           <input name="guardian_mobile" class="form-control" placeholder="Enter mobile no" name="guardian_mobile" maxlength="10" id="guardianmobile" pattern="\d{3}-\d{3}-\d{4}" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');check4();" return false; value="<?php if (!empty($notificationData1['guardian_mobile'])) {
                                                                                                                                                                                                                                                                                                echo $notificationData1['guardian_mobile'];
                                                                                                                                                                                                                                                                                             } ?>" /><span class="guardianmobile_for_msg validation_err" id="validation_err4"></span>

                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="address">Permanent Address :</label>
                           <input class="form-control" id="address" type="text" placeholder="Enter Permanent address" name="guardian_permanent_address" value="<?php if (!empty($notificationData1['guardian_permanent_address'])) {
                                                                                                                                                                  echo $notificationData1['guardian_permanent_address'];
                                                                                                                                                               } ?>" />
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Emergency contact No.</label>
                           <input class="form-control date4" id="picker2-" type="email" placeholder="Emergency contact No." name="guardian_emergency_contact" value="<?php if (!empty($notificationData1['guardian_emergency_contact'])) {
                                                                                                                                                                        echo $notificationData1['guardian_emergency_contact'];
                                                                                                                                                                     } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="siblings_school">Guardian Relation.</label>
                           <input class="form-control date4" id="picker2-" type="email" placeholder="Enter Guardian Relation" name="guardian_relation" value="<?php if (!empty($notificationData1['guardian_relation'])) {
                                                                                                                                                                  echo $notificationData1['guardian_relation'];
                                                                                                                                                               } ?>">
                        </div>
                        <h4>Others Details</h4>
                        <div class="col-md-4 form-group mb-3">
                           <label for="enquiryno">Parents Are</label>
                           <select id="admission-type" class="form-control" name="parents_are" autocomplete="" required>
                              <option disabled selected>Please select</option>
                              <option value="parents">Parents</option>
                           </select>
                           <input id="adopted" type="checkbox" name="is_child_adopted" value="yes">
                           <span>Child is an Adopted Child</span>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="enquiryno">Child Live With</label>
                           <select id="admission-type" class="form-control" name="child_live_with" autocomplete="" required>
                              <option disabled selected>Please select</option>
                              <option value="parents">Parents</option>
                           </select>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Local Guardian</label>
                           <input class="form-control" id="" type="text" placeholder="Enter email" fdprocessedid="csh6vi" name="local_guardian" value="<?php if (!empty($notificationData1['local_guardian'])) {
                                                                                                                                                            echo $notificationData1['local_guardian'];
                                                                                                                                                         } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Local Address</label>
                           <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter Local Address" fdprocessedid="csh6vi" name="local_address" value="<?php if (!empty($notificationData1['local_address'])) {
                                                                                                                                                                                    echo $notificationData1['local_address'];
                                                                                                                                                                                 } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Phone No.</label>
                           <input class="form-control" id="phoneno" type="text" placeholder="Enter Phone No." fdprocessedid="csh6vi" name="guradian_phone" maxlength="10" pattern="\d{3}-\d{3}-\d{4}" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');check6();" return false; value="<?php if (!empty($notificationData1['guradian_phone'])) {
                                                                                                                                                                                                                                                                                                   echo $notificationData1['guradian_phone'];
                                                                                                                                                                                                                                                                                                } ?>" />
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Mobile No.</label>
                           <input class="form-control" id="localmobile" type="text" placeholder="Enter Mobile No" fdprocessedid="csh6vi" name="guradian_mobile" placeholder="Enter Mobile No" maxlength="10" pattern="\d{3}-\d{3}-\d{4}" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');check5();" return false; value="<?php if (!empty($notificationData1['guradian_mobile'])) {
                                                                                                                                                                                                                                                                                                                                       echo $notificationData1['guradian_mobile'];
                                                                                                                                                                                                                                                                                                                                    } ?>" /><span class="fathermobile_for_msg validation_err" id="validation_err5"></span>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">Parents Category</label>
                           <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter Parents Category" fdprocessedid="csh6vi" name="guradian_parent_category" value="<?php if (!empty($notificationData1['guradian_parent_category'])) {
                                                                                                                                                                                                   echo $notificationData1['guradian_parent_category'];
                                                                                                                                                                                                } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">New Category</label>
                           <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter New Category" fdprocessedid="csh6vi" name="guradian_new_category" value="<?php if (!empty($notificationData1['guradian_new_category'])) {
                                                                                                                                                                                          echo $notificationData1['guradian_new_category'];
                                                                                                                                                                                       } ?>">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">House</label>
                           <select id="admission-type" class="form-control" name="guradian_house" autocomplete="" required>
                              <option disabled selected>Please select</option>
                              <option value="house">house</option>
                           </select>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                           <label for="pincode">New House</label>
                           <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter New House" fdprocessedid="csh6vi" name="guradian_new_house" value="<?php if (!empty($notificationData1['guradian_new_house'])) {
                                                                                                                                                                                    echo $notificationData1['guradian_new_house'];
                                                                                                                                                                                 } ?>">
                        </div>
                     </div>
                     <span class="allinput_msg validation_err"></span>
                     <div class="col-md-12">
                        <button class="btn btn-primary submit_btn">Submit</button>
                     </div>
                     </form>

                  </div>

               </div>
               <div id="step-3">
               </div>
               <div id="step-4">
               </div>
            </div>
            @endforeach
            @endif
         </div>
      </div>
   </div>
   <!-- end of main-content -->
</div>

<script src="{{url('assets/backend')}}/js/plugins/jquery-3.3.1.min.js"></script>


<script type="text/javascript">
   function getValAndAssign(selectOption) {
      var form_number = selectOption.value;
      $('.pick_inq_data').attr('data-form_number', form_number);
   }

   /*Ajax for pick data from form no*/
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(".pick_inq_data").on('click', function() {

      var form_number = $('.pick_inq_data').attr('data-form_number');

      $.ajax({
         url: '{{ url("getDataByFormNumber") }}',
         type: 'post',
         data: {
            _token: CSRF_TOKEN,
            form_number: form_number
         },
         // dataType: 'json',
         success: function(response) {

            console.log(response);
            if (response.inq_data) {
               /*assign value on pick data*/
               // $('select[name="application_for"] option[value='+response.inq_str_data.admission_type+']').attr("selected","selected");
               $('select[name="application_for"]').val(response.inq_str_data.admission_type);
               $('input[name="form_number"]').val(response.inq_data.form_number);
               $('select[name="studentname_prefix"]').val(response.inq_str_data.studentname_prefix);
               $('input[name="studentname"]').val(response.inq_data.student_name);
               $('input[name="student_dob"]').val(response.inq_data.date_of_birth);
               $('select[name="gender"]').val(response.inq_str_data.gender);
               $('select[name="student_caste"]').val(response.inq_str_data.caste);
               $('select[name="religion"]').val(response.inq_str_data.religion);
               $('select[name="category"]').val(response.inq_str_data.category);
               $('select[name="classname"]').val(response.inq_data.class_name);
               $('select[name="session_name"]').val(response.inq_data.session_name);
               $('input[name="present_address"]').val(response.inq_str_data.address);
               $('input[name="permanent_address"]').val(response.inq_str_data.address);
               $('input[name="phone_number"]').val(response.inq_str_data.fathermobile);
               $('input[name="mobile_number"]').val(response.inq_str_data.fathermobile);
               $('select[name="fathername_prefix"]').val(response.inq_str_data.fathername_prefix);
               $('input[name="fathername"]').val(response.inq_str_data.fathername);
               $('input[name="fathermobile"]').val(response.inq_str_data.father_mobile);
               $('input[name="father_res_address"]').val(response.inq_str_data.father_resi);
               $('select[name="mothername_prefix"]').val(response.inq_str_data.mothername_prefix);
               $('input[name="mothername"]').val(response.inq_str_data.mothername);
               $('input[name="mother_res_address"]').val(response.inq_str_data.mother_resi);
               $('input[name="mother_emergency_contact"]').val(response.inq_str_data.mother_mobile);
               $('input[name="remarks"]').val(response.inq_str_data.remarks);
               $('input[name="father_email_id"]').val(response.inq_str_data.email);
               $('input[name="father_mobile"]').val(response.inq_str_data.father_mobile);




            }

         }
      });

   });

   /*validate form*/
   $(".submit_btn").on('click', function(e) {

      e.preventDefault();

      var application_for = $('select[name="application_for"]').val();
      var student_name = $('input[name="student_name"]').val();
      var student_dob = $('input[name="student_dob"]').val();
      var student_caste = $('input[name="student_caste"]').val();
      var religion = $('select[name="religion"]').val();
      var classname = $('select[name="classname"]').val();
      var session_name = $('select[name="session_name"]').val();

      if (application_for == null) {
         $('.application_for_msg').text("This field is required*");
         allinputmsg = '1';
      } else {

         $('.application_for_msg').text("");
      }

      if (student_name == null) {
         $('.student_name_msg').text("This field is required*");
         allinputmsg = '1';
      } else {

         $('.student_name_msg').text("");
      }

      if (student_dob == '') {
         $('.student_dob_msg').text("This field is required*");
      } else {
         $('.student_dob_msg').text("");

      }

      if (student_caste == '') {
         $('.student_caste_msg').text("This field is required*");
      } else {
         $('.student_caste_msg').text("");

      }

      if (religion == '') {
         $('.religion_msg').text("This field is required*");
      } else {
         $('.religion_msg').text("");

      }

      if (classname == null) {

         $('.classname_msg').text("This field is required*");
      } else {
         $('.classname_msg').text("");

      }

      if (session_name == null) {
         $('.session_name_msg').text("This field is required*");
      } else {
         $('.session_name_msg').text("");

      }

      if (category == null) {
         $('.category_msg').text("This field is required*");
      } else {
         $('.category_msg').text("");

      }

      if (application_for !== null && student_name !== '' && student_dob !== '' && student_caste !== '' && religion !== '' && classname !== null && session_name !== null && category !== null) {
         var myForm = document.getElementById("form-id");
         event.preventDefault();
         myForm.submit();
         $('.rg_form').submit();
      } else {
         $('.allinput_msg').text("All required fields must be completed before you submit the form*");
         if (allinputmsg == "1") {
            $("#step1").addClass('s1');

         } else {
            $("#step1").removeClass('s1');
         }
         console.log("invalid form");
      }


   });
   /*checkbox Actions*/
   // DOM ready checkbox actions
   if ($(this).is(":checked")) {

      $('.has_siblings_div').show();

   } else {

      $('.has_siblings_div').hide();
   }
   if ($(this).is(":checked")) {

      $('.birth_certificate_input_div').show();

   } else {

      $('.birth_certificate_input_div').hide();
   }
   if ($(this).is(":checked")) {

      $('.transfer_certificate_input_div').show();

   } else {

      $('.transfer_certificate_input_div').hide();
   }
   if ($(this).is(":checked")) {

      $('.address_proof_input_div').show();

   } else {

      $('.address_proof_input_div').hide();
   }
   if ($(this).is(":checked")) {

      $('.last_report_card_input_div').show();

   } else {

      $('.last_report_card_input_div').hide();
   }

   // on check actions
   $('.is_sibling_applied').click(function() {

      if ($(this).is(":checked")) {

         $('.has_siblings_div').show();

      } else {

         $('.has_siblings_div').hide();
      }

   });
   $('.is_staff_applied').click(function() {

      if ($(this).is(":checked")) {

         $('.has_staff_div').show();

      } else {

         $('.has_staff_div').hide();
      }

   });



   $('.is_transport_applied').click(function() {

      if ($(this).is(":checked")) {

         $('.has_transport_div').show();

      } else {

         $('.has_transport_div').hide();
      }

   });









   $('.is_driver_applied').click(function() {

      if ($(this).is(":checked")) {

         $('.has_diver_div').show();

      } else {

         $('.has_diver_div').hide();
      }

   });

   $('.checked_birth_certificate').click(function() {

      if ($(this).is(":checked")) {

         $('.birth_certificate_input_div').show();

      } else {

         $('.birth_certificate_input_div').hide();
      }

   });

   $('.transfer_certificate').click(function() {

      if ($(this).is(":checked")) {

         $('.transfer_certificate_input_div').show();

      } else {

         $('.transfer_certificate_input_div').hide();
      }

   });

   $('.address_proof').click(function() {

      if ($(this).is(":checked")) {

         $('.address_proof_input_div').show();

      } else {

         $('.address_proof_input_div').hide();
      }

   });

   $('.last_report_card').click(function() {

      if ($(this).is(":checked")) {

         $('.last_report_card_input_div').show();

      } else {

         $('.last_report_card_input_div').hide();
      }

   });

   /*checkbox*/



   var abc = 1;
   $('#sibling_name').on('change', function() {
      var name = $(this).val();
      // var save_status = $(this).val();
      //alert(name);

      var form_number = $(this).find("option:selected").data('form_number');
      $('#serial_number').val(form_number);
      // alert(form_number);
      var class_name = $(this).find("option:selected").data('class_name');
      $('#sibling_class_name').val(class_name);
      var scholar_number = $(this).find("option:selected").data('form_number');
      $('#scholar_number').val(scholar_number);

   });

   $('#staff_name').on('change', function() {
      var name = $(this).val();
      // var save_status = $(this).val();
      //alert(name);

      var form_number = $(this).find("option:selected").data('form_number');
      $('#serial_number').val(form_number);
      // alert(form_number);
      var class_name = $(this).find("option:selected").data('class_name');
      $('#sibling_class_name').val(class_name);
      var scholar_number = $(this).find("option:selected").data('form_number');
      $('#scholar_number').val(scholar_number);

   });
   $('#driver_name').on('change', function() {
      var name = $(this).val();
      // var save_status = $(this).val();
      //alert(name);

      var form_number = $(this).find("option:selected").data('form_number');
      $('#serial_number').val(form_number);
      // alert(form_number);
      var class_name = $(this).find("option:selected").data('class_name');
      $('#sibling_class_name').val(class_name);
      var scholar_number = $(this).find("option:selected").data('form_number');
      $('#scholar_number').val(scholar_number);

   });

   $('.extra-fields-customer').click(function() {
      $('.customer_records').clone().appendTo('.customer_records_dynamic');
      $('.customer_records_dynamic .customer_records').addClass('single remove');
      $('.single .extra-fields-customer').remove();
      $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Row</a>');
      $('.customer_records_dynamic > .single').attr("class", "remove");

      $('.customer_records_dynamic :input').each(function() {
         $('#sibling_name' + abc).on('change', function() {
            var name = $(this).val();
            var form_number = $(this).find("option:selected").data('form_number');
            $('#serial_number' + abc).val(form_number);
            var sibling_class_name = $(this).find("option:selected").data('class_name');
            $('#sibling_class_name').val(sibling_class_name);
            var scholar_number = $(this).find("option:selected").data('scholar_number');
            $('#scholar_number').val(scholar_number);


         });
         var count = 0;
         var fieldname = $(this).attr("id");
         $(this).attr('id', fieldname + abc);
         count++;
      });
      //   abc++;
   });

   $(document).on('click', '.remove-field', function(e) {
      $(this).parent('.remove').remove();
      e.preventDefault();
   });



   /*Show date*/
   $('.date').datepicker({
      format: 'dd-mm-yyyy'
   });
   $('.date1').datepicker({
      format: 'dd-mm-yyyy'
   });
   $('.date2').datepicker({
      format: 'dd-mm-yyyy'
   });
   $('.date3').datepicker({
      format: 'dd-mm-yyyy'
   });
   $('.date4').datepicker({
      format: 'dd-mm-yyyy'
   });
   $('.date5').datepicker({
      format: 'dd-mm-yyyy'
   });

   function check() {
      var mobile = document.getElementById('phonenumber');
      var message = document.getElementById('validation_err');
      if (mobile.value.length != 10) {
         message.innerHTML = "required 10 digits, match requested format!"
      } else {
         message.innerHTML = "";
      }
   }

   function check2() {
      var mobile = document.getElementById('fathermobile');
      var message2 = document.getElementById('validation_err2');
      if (mobile.value.length != 10) {
         message2.innerHTML = "required 10 digits, match requested format!"
      } else {
         message2.innerHTML = "";
      }
   }

   function check3() {
      var mobile = document.getElementById('mothermobile');
      var message3 = document.getElementById('validation_err3');
      if (mobile.value.length != 10) {
         message3.innerHTML = "required 10 digits, match requested format!"
      } else {
         message3.innerHTML = "";
      }
   }

   function check4() {
      var mobile = document.getElementById('guardianmobile');
      var message4 = document.getElementById('validation_err4');
      if (mobile.value.length != 10) {
         message4.innerHTML = "required 10 digits, match requested format!"
      } else {
         message4.innerHTML = "";
      }
   }

   function check5() {
      var mobile = document.getElementById('localmobile');
      var message5 = document.getElementById('validation_err5');
      if (mobile.value.length != 10) {
         message5.innerHTML = "required 10 digits, match requested format!"
      } else {
         message5.innerHTML = "";
      }
   }

   function check6() {
      var mobile = document.getElementById('phoneno');
      var message6 = document.getElementById('validation_err6');
      if (mobile.value.length != 10) {
         message6.innerHTML = "required 10 digits, match requested format!"
      } else {
         message6.innerHTML = "";
      }
   }

   function check7() {
      var mobile = document.getElementById('sssmid');
      var message = document.getElementById('validation_err7');
      if (mobile.value.length != 9) {
         message.innerHTML = "required 9 digits, match requested format!"
      } else {
         message.innerHTML = "";
      }
   }

   function check9() {
      var mobile = document.getElementById('AadharNo');
      var message = document.getElementById('validation_err9');
      if (mobile.value.length != 12) {
         message.innerHTML = "required 12 digits, match requested format!"
      } else {
         message.innerHTML = "";
      }
   }
   $(window).ready(function() {
      $("#form-id").on("keypress", function(event) {
         console.log("aaya");
         var keyPressed = event.keyCode || event.which;
         if (keyPressed === 13) {
            //alert("You pressed the Enter key!!");
            event.preventDefault();
            return false;
         }
      });
   });
</script>
<script type="text/javascript">
   $.noConflict();
   jQuery(document).ready(function($) {
      $("#inq-form-no").select2();
      $("#sibling_name").select2();
   });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />
<style type="text/css"></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script type="text/javascript">
   $.noConflict();
</script>
@endsection