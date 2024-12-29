@extends('layout')

@section('content')

<section class="py-6 py-lg-8">
    <div class="container my-lg-5">
      <div class="row">
        <div class="offset-lg-1 col-lg-7 col-12">
          <!-- Content -->
          <div class="mb-8">
            <!-- heading -->
            <h1 class="mb-3 display-4 fw-bold">Find a Job &amp; grow your career</h1>
            <!-- lead -->
            <p class="mb-0 lead pe-lg-8">Build your profile and let recruiters find you. Get job postings delivered right to your email.</p>
          </div>
        </div>
      </div>
      <!-- row -->
      <div class="row">
        <div class="offset-lg-1 col-lg-10 col-12">
          <div class="row">
            <div class="col-md-8 col-12">
              <div id="stepperForm" class="bs-stepper">
                <!-- row -->
                <div class="row">
                  <div>
                    <!-- Stepper Button -->
                    <div class="bs-stepper-header bg-transparent d-flex justify-content-between px-0" role="tablist">
                      <div class="step active" data-target="#test-l-1">
                        <!-- button -->
                        <button type="button" class="step-trigger d-block" role="tab" id="courseFormtrigger1" aria-controls="test-l-1" aria-selected="true">
                          <div class="bs-stepper-circle d-block step-line">1</div>
                          <div class="bs-stepper-label">Basic Details</div>
                        </button>
                      </div>
                      <!-- button -->
                      <div class="step" data-target="#test-l-2">
                        <button type="button" class="step-trigger d-block" role="tab" id="courseFormtrigger2" aria-controls="test-l-2" aria-selected="false">
                          <span class="bs-stepper-circle d-block step-line">2</span>
                          <span class="bs-stepper-label">Employment</span>
                        </button>
                      </div>
                      <!-- button -->
                      <div class="step" data-target="#test-l-3">
                        <button type="button" class="step-trigger d-block" role="tab" id="courseFormtrigger3" aria-controls="test-l-3" aria-selected="false">
                          <span class="bs-stepper-circle d-block step-line">3</span>
                          <span class="bs-stepper-label">Education</span>
                        </button>
                      </div>
                      <!-- button -->
                      <div class="step" data-target="#test-l-4">
                        <button type="button" class="step-trigger d-block" role="tab" id="courseFormtrigger4" aria-controls="test-l-4" aria-selected="false">
                          <span class="bs-stepper-circle d-block">4</span>
                          <span class="bs-stepper-label">Job</span>
                        </button>
                      </div>
                    </div>
                    <!-- Stepper content -->

                    <div class="bs-stepper-content mt-5">
                      <form onsubmit="return false">
                        <!-- Content one -->
                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade dstepper-block active" aria-labelledby="courseFormtrigger1">
                          <!-- Card -->
                          <div class="card card-bordered shadow-none mb-3">
                            <!-- Card body -->
                            <div class="card-body p-6">
                              <div class="mb-4">
                                <h2 class="mb-0">Basic Information</h2>
                                <span>Add your personal details in the form.</span>
                              </div>
                              <!-- row -->

                              <div class="row gx-3">
                                <div class="mb-4 col-12 col-md-6">
                                  <!-- label -->

                                  <label class="form-label" for="fname">
                                    First Name
                                    <span class="text-danger">*</span>
                                  </label>
                                  <!-- input -->
                                  <input type="text" id="fname" class="form-control" placeholder="First Name">
                                </div>
                                <div class="mb-4 col-12 col-md-6">
                                  <!-- label -->
                                  <label class="form-label" for="lname">
                                    Last Name
                                    <span class="text-danger">*</span>
                                  </label>
                                  <!-- input -->
                                  <input type="text" id="lname" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="mb-4 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="email">
                                    Email
                                    <span class="text-danger">*</span>
                                  </label>
                                  <!-- input -->
                                  <input type="email" id="email" class="form-control" placeholder="Tell us your Email ID">
                                  <!-- label -->
                                  <span class="fs-6">We'll send you relevant jobs in your mail</span>
                                </div>
                                <div class="mb-4 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="phone">
                                    Phone
                                    <span class="text-danger">*</span>
                                  </label>
                                  <!-- input group -->
                                  <div class="input-group mb-1">
                                    <span class="input-group-text">+91</span>
                                    <!-- input -->
                                    <input type="text" class="form-control" placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="phone" id="phone">
                                  </div>
                                  <!-- text -->
                                  <span class="fs-6">Recruiters will call you on this number</span>
                                </div>

                                <div class="mb-4 col-12 col-md-12">
                                  <!-- text -->

                                  <div class="fs-5 text-dark mb-2">Gender</div>
                                  <!-- radio -->
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" value="option1">
                                    <label class="form-check-label" for="male">Male</label>
                                  </div>
                                  <!-- radio -->
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" value="option2">
                                    <label class="form-check-label" for="female">Female</label>
                                  </div>
                                </div>

                                <div class="mb-4 col-12 col-md-12">
                                  <!-- radio -->
                                  <label class="form-label" for="resume">Resume</label>
                                  <div class="input-group mb-1">
                                    <input type="file" class="form-control" id="resume">
                                    <label class="input-group-text" for="resume">Upload</label>
                                  </div>
                                  <!-- text -->
                                  <span class="fs-6">DOC, DOCx, PDF, RTF | Max: 2 MB. Recruiters give first preference to candidates who have a resume</span>
                                </div>
                                <div class="mb-4 col-12 col-md-12">
                                  <!-- chechbox -->
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="formId">
                                    <label class="form-check-label fs-6" for="formId">Send me important updates on email id.</label>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <!-- Button -->
                                  <button class="btn btn-primary" onclick="stepperForm.next()">Next</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Content two -->
                        <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade dstepper-block dstepper-none" aria-labelledby="courseFormtrigger2">
                          <!-- Card -->
                          <div class="card card-bordered shadow-none mb-3">
                            <!-- Card body -->
                            <div class="card-body p-6">
                              <div class="mb-4">
                                <h2 class="mb-0">Employment</h2>
                                <span>Add your Employment details like company, job title and salary.</span>
                              </div>
                              <!-- row -->
                              <div class="row gx-3">
                                <!-- col -->
                                <div class="mb-3 col-12">
                                  <label class="form-label" for="jobTitle">
                                    Job title
                                    <span class="text-danger">*</span>
                                  </label>
                                  <input type="text" id="jobTitle" class="form-control" placeholder="Write the Job Title">
                                </div>
                                <!-- col -->
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- text -->
                                  <div class="mb-2 text-dark">
                                    Job type
                                    <span class="text-danger">*</span>
                                  </div>
                                  <!-- btn group -->
                                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <!-- radio -->
                                    <input type="radio" class="btn-check" name="btnradio" id="FullTime" autocomplete="off" checked="">
                                    <!-- label -->
                                    <label class="btn btn-outline-primary" for="FullTime">Full Time</label>
                                    <!-- radio -->
                                    <input type="radio" class="btn-check" name="btnradio" id="freelance" autocomplete="off">

                                    <!-- label -->
                                    <label class="btn btn-outline-primary" for="freelance">Freelance</label>
                                    <!-- input -->
                                    <input type="radio" class="btn-check" name="btnradio" id="contract" autocomplete="off">

                                    <!-- label -->
                                    <label class="btn btn-outline-primary" for="contract">Contract</label>
                                  </div>
                                </div>

                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="companyName">Company Name</label>
                                  <!-- input -->
                                  <input type="text" class="form-control" placeholder="Company Name" id="companyName">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="companyAddress">Company Address</label>
                                  <!-- input -->
                                  <input type="text" class="form-control" placeholder="Company Address" id="companyAddress">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="companyCity">Company City</label>
                                  <!-- input -->
                                  <input type="text" class="form-control" placeholder="City" id="companyCity">
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                  <!-- label -->
                                  <label class="form-label" for="CompanyState">Company State</label>
                                  <!-- select menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="CompanyState" hidden="" tabindex="-1" data-choice="active"><option value="State" data-custom-properties="[object Object]">State</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="State" data-custom-properties="[object Object]" aria-selected="true">State</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--CompanyState-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Gujarat" data-select-text="" data-choice-selectable="" aria-selected="true">Gujarat</div><div id="choices--CompanyState-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Maharashtra" data-select-text="" data-choice-selectable="">Maharashtra</div><div id="choices--CompanyState-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="MP" data-select-text="" data-choice-selectable="">MP</div><div id="choices--CompanyState-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="State" data-select-text="" data-choice-selectable="">State</div></div></div></div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                  <!-- label -->
                                  <label class="form-label" for="PinCode">Pin code</label>
                                  <!-- input -->
                                  <input type="text" id="PinCode" class="form-control" placeholder="Pin code">
                                </div>

                                <div class="mb-3 col-12 col-md-6">
                                  <!-- label -->
                                  <label class="form-label" for="dateofjoining">Date of Joining</label>
                                  <!-- input -->
                                  <input type="text" class="form-control flatpickr flatpickr-input" placeholder="Date" id="dateofjoining" readonly="readonly">
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                  <!-- label -->
                                  <label class="form-label" for="dateofrelive">Date of relieving</label>
                                  <!-- input -->
                                  <input type="text" class="form-control flatpickr flatpickr-input" placeholder="Date" id="dateofrelive" readonly="readonly">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="annualSalary">Annual Salary</label>
                                  <!-- input -->
                                  <input type="text" class="form-control" placeholder="Eg. 5,64,000" id="annualSalary">
                                </div>

                                <div class="d-md-flex justify-content-between mb-3 col-12 col-md-12">
                                  <!-- button -->
                                  <button class="btn btn-outline-secondary" onclick="stepperForm.previous()">Go to Back</button>
                                  <div class="mt-2 mt-md-0">
                                    <!-- button -->
                                    <button class="btn btn-outline-secondary me-2" onclick="stepperForm.next()">Skip</button>
                                    <!-- button -->
                                    <button class="btn btn-primary" onclick="stepperForm.next()">Save and Continue</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Button -->
                        </div>
                        <!-- Content three -->
                        <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade dstepper-block dstepper-none" aria-labelledby="courseFormtrigger3">
                          <!-- Card -->
                          <div class="card card-bordered shadow-none mb-3">
                            <!-- Card body -->
                            <div class="card-body p-6">
                              <div class="mb-4">
                                <h2 class="mb-0">Education</h2>
                                <span>Add your education detail like school, degree and graduate.</span>
                              </div>
                              <!-- row -->
                              <div class="row gx-3">
                                <div class="mb-3 col-12">
                                  <!-- label -->
                                  <label class="form-label" for="school">
                                    School / University
                                    <span class="text-danger">*</span>
                                  </label>
                                  <!-- input -->
                                  <input type="text" id="school" class="form-control" placeholder="Ex: Boston University">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="Degree">Degree</label>
                                  <!-- input -->
                                  <input type="text" class="form-control" placeholder="Company Name" id="Degree">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="study">Fiels of study</label>
                                  <!-- input -->
                                  <input type="text" class="form-control" placeholder="Ex. Business" id="study">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <div class="mb-2 text-dark">Course Type</div>
                                  <!-- btn group -->
                                  <div class="btn-group" role="group" aria-label="Basic
                                radio toggle button group">
                                    <!-- input -->
                                    <input type="radio" class="btn-check" name="btnradio" id="fullTime1" autocomplete="off">
                                    <!-- label -->
                                    <label class="btn btn-outline-primary" for="fullTime1">Full Time</label>
                                    <!-- input -->
                                    <input type="radio" class="btn-check" name="btnradio" id="partTime2" autocomplete="off" checked="">
                                    <label class="btn btn-outline-primary" for="partTime2">Part Time</label>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <!-- label -->
                                  <label class="form-label">From</label>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                  <label for="Month" class="visually-hidden">Month</label>
                                  <!-- select menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="Month" hidden="" tabindex="-1" data-choice="active"><option value="Month" data-custom-properties="[object Object]">Month</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Month" data-custom-properties="[object Object]" aria-selected="true">Month</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--Month-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="April" data-select-text="" data-choice-selectable="" aria-selected="true">April</div><div id="choices--Month-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="August" data-select-text="" data-choice-selectable="">August</div><div id="choices--Month-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="December" data-select-text="" data-choice-selectable="">December</div><div id="choices--Month-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="February" data-select-text="" data-choice-selectable="">February</div><div id="choices--Month-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="January" data-select-text="" data-choice-selectable="">January</div><div id="choices--Month-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="July" data-select-text="" data-choice-selectable="">July</div><div id="choices--Month-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="June" data-select-text="" data-choice-selectable="">June</div><div id="choices--Month-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="March" data-select-text="" data-choice-selectable="">March</div><div id="choices--Month-item-choice-9" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="9" data-value="Month" data-select-text="" data-choice-selectable="">Month</div><div id="choices--Month-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="November" data-select-text="" data-choice-selectable="">November</div><div id="choices--Month-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="11" data-value="October" data-select-text="" data-choice-selectable="">October</div><div id="choices--Month-item-choice-12" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="12" data-value="September" data-select-text="" data-choice-selectable="">September</div></div></div></div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                  <label for="Year" class="visually-hidden">Year</label>
                                  <!-- selct menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="Year" hidden="" tabindex="-1" data-choice="active"><option value="Year" data-custom-properties="[object Object]">Year</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Year" data-custom-properties="[object Object]" aria-selected="true">Year</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--Year-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="2015" data-select-text="" data-choice-selectable="" aria-selected="true">2015</div><div id="choices--Year-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="2016" data-select-text="" data-choice-selectable="">2016</div><div id="choices--Year-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="2017" data-select-text="" data-choice-selectable="">2017</div><div id="choices--Year-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="2018" data-select-text="" data-choice-selectable="">2018</div><div id="choices--Year-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="2019" data-select-text="" data-choice-selectable="">2019</div><div id="choices--Year-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="2020" data-select-text="" data-choice-selectable="">2020</div><div id="choices--Year-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="2021" data-select-text="" data-choice-selectable="">2021</div><div id="choices--Year-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="2022" data-select-text="" data-choice-selectable="">2022</div><div id="choices--Year-item-choice-9" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="9" data-value="Year" data-select-text="" data-choice-selectable="">Year</div></div></div></div>
                                </div>
                                <div class="col-12">
                                  <!-- label -->
                                  <label class="form-label">To</label>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                  <label for="ToMonth" class="visually-hidden">Month</label>
                                  <!-- select menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="ToMonth" hidden="" tabindex="-1" data-choice="active"><option value="Month" data-custom-properties="[object Object]">Month</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Month" data-custom-properties="[object Object]" aria-selected="true">Month</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--ToMonth-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="April" data-select-text="" data-choice-selectable="" aria-selected="true">April</div><div id="choices--ToMonth-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="August" data-select-text="" data-choice-selectable="">August</div><div id="choices--ToMonth-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="December" data-select-text="" data-choice-selectable="">December</div><div id="choices--ToMonth-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="February" data-select-text="" data-choice-selectable="">February</div><div id="choices--ToMonth-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="January" data-select-text="" data-choice-selectable="">January</div><div id="choices--ToMonth-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="July" data-select-text="" data-choice-selectable="">July</div><div id="choices--ToMonth-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="June" data-select-text="" data-choice-selectable="">June</div><div id="choices--ToMonth-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="March" data-select-text="" data-choice-selectable="">March</div><div id="choices--ToMonth-item-choice-9" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="9" data-value="Month" data-select-text="" data-choice-selectable="">Month</div><div id="choices--ToMonth-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="November" data-select-text="" data-choice-selectable="">November</div><div id="choices--ToMonth-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="11" data-value="October" data-select-text="" data-choice-selectable="">October</div><div id="choices--ToMonth-item-choice-12" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="12" data-value="September" data-select-text="" data-choice-selectable="">September</div></div></div></div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                  <label for="ToYear" class="visually-hidden">Month</label>
                                  <!-- select menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="ToYear" hidden="" tabindex="-1" data-choice="active"><option value="Year" data-custom-properties="[object Object]">Year</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Year" data-custom-properties="[object Object]" aria-selected="true">Year</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--ToYear-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="2015" data-select-text="" data-choice-selectable="" aria-selected="true">2015</div><div id="choices--ToYear-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="2016" data-select-text="" data-choice-selectable="">2016</div><div id="choices--ToYear-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="2017" data-select-text="" data-choice-selectable="">2017</div><div id="choices--ToYear-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="2018" data-select-text="" data-choice-selectable="">2018</div><div id="choices--ToYear-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="2019" data-select-text="" data-choice-selectable="">2019</div><div id="choices--ToYear-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="2020" data-select-text="" data-choice-selectable="">2020</div><div id="choices--ToYear-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="2021" data-select-text="" data-choice-selectable="">2021</div><div id="choices--ToYear-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="2022" data-select-text="" data-choice-selectable="">2022</div><div id="choices--ToYear-item-choice-9" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="9" data-value="Year" data-select-text="" data-choice-selectable="">Year</div></div></div></div>
                                </div>

                                <div class="d-md-flex justify-content-between mb-3 col-12 col-md-12">
                                  <!-- button -->
                                  <button class="btn btn-outline-secondary mb-2 mb-md-0" onclick="stepperForm.previous()">Go to Back</button>

                                  <!-- button -->
                                  <button class="btn btn-primary" onclick="stepperForm.next()">Save and Continue</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Button -->
                        </div>
                        <!-- Content four -->
                        <div id="test-l-4" role="tabpanel" class="bs-stepper-pane fade dstepper-block dstepper-none" aria-labelledby="courseFormtrigger4">
                          <!-- Card -->
                          <div class="card card-bordered shadow-none mb-3">
                            <!-- Card body -->
                            <div class="card-body p-6">
                              <div class="mb-4">
                                <!-- heading -->
                                <h2 class="mb-0">What kind of job are you looking for?</h2>
                                <!-- text -->
                                <span>Add the details for are you looking for future opportunity.</span>
                              </div>
                              <div class="row">
                                <div class="mb-3 col-12">
                                  <!-- label -->
                                  <label class="form-label" for="rsumeHeadline">Resume Headline</label>
                                  <!-- input -->
                                  <input type="text" id="rsumeHeadline" class="form-control" placeholder="Ex:Figma Designer">
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="JobType">Job Type</label>
                                  <!-- select menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="JobType" hidden="" tabindex="-1" data-choice="active"><option value="Permanent" data-custom-properties="[object Object]">Permanent</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Permanent" data-custom-properties="[object Object]" aria-selected="true">Permanent</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--JobType-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Ahmedabad" data-select-text="" data-choice-selectable="" aria-selected="true">Contract</div><div id="choices--JobType-item-choice-2" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Permanent" data-select-text="" data-choice-selectable="">Permanent</div></div></div></div>
                                </div>

                                <div class="mb-3 col-12 col-md-12">
                                  <!-- title -->
                                  <div class="mb-2 text-dark">Employment Type</div>
                                  <!-- btn group -->
                                  <div class="btn-group" role="group" aria-label="Basic
                                    radio toggle button group">
                                    <!-- radio -->
                                    <input type="radio" class="btn-check" name="btnradio" id="fullTime2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="fullTime2">Full Time</label>
                                    <!-- radio -->
                                    <input type="radio" class="btn-check" name="btnradio" id="partTime3" autocomplete="off" checked="">
                                    <label class="btn btn-outline-primary" for="partTime3">Part Time</label>

                                    <!-- radio -->
                                    <input type="radio" class="btn-check" name="btnradio" id="contract2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="contract2">Contract</label>
                                  </div>
                                </div>

                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="Location">Location</label>
                                  <!-- select menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="Location" hidden="" tabindex="-1" data-choice="active"><option value="Select" data-custom-properties="[object Object]">Select</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Select" data-custom-properties="[object Object]" aria-selected="true">Select</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--Location-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Ahmedabad" data-select-text="" data-choice-selectable="" aria-selected="true">Ahmedabad</div><div id="choices--Location-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Bombay" data-select-text="" data-choice-selectable="">Bombay</div><div id="choices--Location-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Kerala" data-select-text="" data-choice-selectable="">Kerala</div><div id="choices--Location-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Pune" data-select-text="" data-choice-selectable="">Pune</div><div id="choices--Location-item-choice-5" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Select" data-select-text="" data-choice-selectable="">Select</div></div></div></div>
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                  <!-- label -->
                                  <label class="form-label" for="AvailabilityToJoin">Availability to Join</label>
                                  <!-- select menu -->
                                  <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select choices__input" data-choices="" id="AvailabilityToJoin" hidden="" tabindex="-1" data-choice="active"><option value="15 Days to less" data-custom-properties="[object Object]">15 Days to less</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="15 Days to less" data-custom-properties="[object Object]" aria-selected="true">15 Days to less</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--AvailabilityToJoin-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="15 Days to less" data-select-text="" data-choice-selectable="" aria-selected="true">15 Days to less</div><div id="choices--AvailabilityToJoin-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="One Month" data-select-text="" data-choice-selectable="">One Month</div><div id="choices--AvailabilityToJoin-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="within 15 days" data-select-text="" data-choice-selectable="">Within 15 days</div></div></div></div>
                                </div>

                                <div class="d-md-flex justify-content-between mb-3 col-12 col-md-12">
                                  <!-- button -->
                                  <button class="btn btn-outline-secondary mb-2 mb-md-0" onclick="stepperForm.previous()">Go to Back</button>

                                  <!-- button -->
                                  <button class="btn btn-primary" onclick="stepperForm.next()">Submit Application</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <!-- card -->
              <div class="card bg-light shadow-none">
                <!-- card  body -->
                <div class="card-body p-5">
                  <div class="mb-4">
                    <img src="../../assets/images/job/job-graphics.svg" alt="">
                  </div>
                  <h3 class="mb-3">On registering you can</h3>
                  <ul class="list-unstyled text-dark mb-0">
                    <li class="d-flex align-items-start mb-3">
                      <span class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>
                      </span>
                      <span>Build your profile and let recruiters find you.</span>
                    </li>
                    <li class="d-flex align-items-start mb-3">
                      <span class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>
                      </span>
                      <span>Get job postings delivered right to your email.</span>
                    </li>
                    <li class="d-flex align-items-start">
                      <span class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>
                      </span>
                      <span>Find a Job &amp; grow your career</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- col -->
      </div>
    </div>
  </section>

@endsection
