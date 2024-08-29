<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .form-section {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
        }

            .modal-content {
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .modal-header {
                border-bottom: none;
                background: linear-gradient(135deg, #007bff, #00aaff);
                color: white;
            }
            .modal-body {
                background: #f0f4f8;
                padding: 2rem;
                text-align: center;
            }
            .modal-footer {
                border-top: none;
                justify-content: center;
            }
            .btn-category {
                border: 1px solid #ddd;
                border-radius: 12px;
                padding: 1rem;
                font-size: 1.2rem;
                margin: 0.5rem;
                width: 100%;
                transition: background-color 0.3s, color 0.3s;
            }
            .btn-category i {
                margin-right: 10px;
            }
            .btn-category:hover {
                background-color: #00aaff;
                color: white;
                border-color: #00aaff;
            }
            .selected {
                background-color: #00aaff;
                color: white;
                border-color: #00aaff;
            }
            #formContainer {
                display: none; /* Initially hide the form container */
            }
        </style>
    </style>
</head>
<body>
    <!-- Category Selection Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Select Your Category</h5>
                </div>
                <div class="modal-body">
                    <p class="lead">Choose a category to proceed:</p>
                    <button type="button" class="btn btn-category" data-category="academic" onclick="selectCategory('academic')">
                        <i class="fas fa-university"></i> Academic
                    </button>
                    <button type="button" class="btn btn-category" data-category="administrative" onclick="selectCategory('administrative')">
                        <i class="fas fa-user-tie"></i> Administrative
                    </button>

                    <button type="button" class="btn btn-category" data-category="student" onclick="selectCategory('student')">
                        <i class="fas fa-user-graduate"></i> Student
                    </button>

                    <button type="button" class="btn btn-category" data-category="non-academic" onclick="selectCategory('non-academic')">
                        <i class="fas fa-briefcase"></i> Non-Academic
                    </button>

                    <button type="button" class="btn btn-category" data-category="external" onclick="selectCategory('external')">
                        <i class="fas fa-external-link-alt"></i> External
                    </button>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary w-100" id="confirmCategoryBtn" disabled>Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <section class="container py-5" id="form" style="display: none;">
        <div class="card border-0 shadow-sm">
            <div class="row g-0">
                <!-- Left Side (Promotional Text) -->
                <div class="col-lg-6 col-md-6 text-bg-primary d-flex align-items-center justify-content-center">
                    <div class="text-center text-white p-4">
                        <h2 class="h1 mb-3">Register to Reserve Your Space</h2>
<p class="lead mb-0">Join our system today and easily book halls for your events.</p>

                    </div>
                </div>

                <!-- Right Side (Registration Form) -->
                <div class="col-lg-6 col-md-6" id="formContainer" style="display: none;">



                    <div class="form-section">
                        <div class="col-12 mb-5">
                            <h2 class="h3">Register</h2>
                            <h3 id="categoryText" class="fs-6 fw-normal text-secondary m-0">
                                Create Your account as
                            </h3>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row gy-3 gy-md-4">
                                <!-- Common Fields -->
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  placeholder="First Name">
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  placeholder="Last Name">
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nic_number" class="form-label">NIC Number <span class="text-danger">*</span></label>
                                    <input type="text" id="nic_number" class="form-control @error('nic_number') is-invalid @enderror" name="nic_number" value="{{ old('nic_number') }}"  placeholder="NIC Number">
                                    @error('nic_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                    <input type="tel" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  placeholder="Phone Number">
                                    @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Conditional Fields -->
                                <div id="studentNoField" class="col-md-6" style="display: none;">
                                    <label for="student_no" class="form-label">Student Registration No</label>
                                    <input type="text" id="student_no" class="form-control @error('student_no') is-invalid @enderror" name="student_no" value="{{ old('student_no') }}"  placeholder="Student Number">
                                    @error('student_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div id="facultyField" class="col-md-6" style="display: none;">
                                    <label for="faculty" id="Otherl">Name of the Faculty</label>
                                    <select class="form-control @error('faculty') is-invalid @enderror" id="faculty" name="faculty">
                                        <option value="">select</option>
                                        <option id="Other" style="display: none;" value="none">None</option>
                                        <!-- Add more options as needed -->
                                        <option value="Faculty of Agricultural Sciences">Faculty of Agricultural Sciences</option>
                                        <option value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                                        <option value="Faculty of Computing">Faculty of Computing</option>
                                        <option value="Faculty of Geomatics">Faculty of Geomatics</option>
                                        <option value="Faculty of Graduate Studies">Faculty of Graduate Studies</option>
                                        <option value="Faculty of Management Studies">Faculty of Management Studies</option>
                                        <option value="Faculty of Medicine">Faculty of Medicine</option>
                                        <option value="Faculty of Social Sciences and Languages">Faculty of Social Sciences and Languages</option>
                                        <option value="Faculty of Technology">Faculty of Technology</option>
                                    </select>
                                    @error('faculty')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="departmentField" class="col-md-6" style="display: none;">
                                    <label for="department">Name of the Department</label>
                                    <select class="form-control @error('department') is-invalid @enderror" id="department" name="department">
                                        <option value="">select</option>
                                        <option id="Other1" value="none" style="display:none;">None</option>
                                        <!-- Faculty of Agricultural Sciences -->
                                        <optgroup label="Faculty of Agricultural Sciences">
                                            <option value="Department of Agribusiness Management">Department of Agribusiness Management</option>
                                            <option value="Department of Export Agriculture" >Department of Export Agriculture</option>
                                            <option value="Department of Livestock Production" >Department of Livestock Production</option>
                                        </optgroup>

                                        <!-- Faculty of Applied Sciences -->
                                        <optgroup label="Faculty of Applied Sciences">
                                            <option value="Department of Food Science & Technology" >Department of Food Science & Technology</option>
                                            <option value="Department of Physical Sciences & Technology" >Department of Physical Sciences & Technology</option>
                                            <option value="Department of Sports Sciences & Physical Education" >Department of Sports Sciences & Physical Education</option>
                                        </optgroup>

                                        <!-- Faculty of Computing -->
                                        <optgroup label="Faculty of Computing">
                                            <option value="Department of Software Engineering" >Department of Software Engineering</option>
                                            <option value="Department of Computing and Information Systems">Department of Computing and Information Systems</option>
                                            <option value="Department of Data Science" >Department of Data Science</option>
                                        </optgroup>

                                        <!-- Faculty of Geomatics -->
                                        <optgroup label="Faculty of Geomatics">
                                            <option value="Department of Surveying & Geodesy">Department of Surveying & Geodesy</option>
                                            <option value="Department of Remote Sensing & GIS" >Department of Remote Sensing & GIS</option>
                                        </optgroup>

                                        <!-- Faculty of Graduate Studies -->
                                        <optgroup label="Faculty of Graduate Studies">
                                            <option value="Agricultural Sciences">Agricultural Sciences</option>
                                            <option value="Computing & Information Systems">Computing & Information Systems</option>
                                            <option value="Geomatics">Geomatics</option>
                                            <option value="Humanities" >Humanities</option>
                                            <option value="Management" >Management</option>
                                            <option value="Physical & Natural Sciences" >Physical & Natural Sciences</option>
                                            <option value="Social Sciences" >Social Sciences</option>
                                            <option value="Sports Science & Physical Education" >Sports Science & Physical Education</option>
                                            <option value="Medicine" >Medicine</option>
                                            <option value="Technology" >Technology</option>
                                            <option value="Indigenous Knowledge & Community Studies">Indigenous Knowledge & Community Studies</option>
                                        </optgroup>

                                        <!-- Faculty of Management Studies -->
                                        <optgroup label="Faculty of Management Studies">
                                            <option value="Department of Business Management" >Department of Business Management</option>
                                            <option value="Department of Tourism Management" >Department of Tourism Management</option>
                                            <option value="Department of Accountancy & Finance" >Department of Accountancy & Finance</option>
                                            <option value="Department of Marketing Management" >Department of Marketing Management</option>
                                        </optgroup>

                                        <!-- Faculty of Medicine -->
                                        <optgroup label="Faculty of Medicine">
                                            <option value="Anatomy" >Anatomy</option>
                                            <option value="Biochemistry" >Biochemistry</option>
                                            <option value="Community Medicine" >Community Medicine</option>
                                            <option value="Forensic Medicine & Toxicology" >Forensic Medicine & Toxicology</option>
                                            <option value="Medicine" >Medicine</option>
                                            <option value="Microbiology" >Microbiology</option>
                                            <option value="Obstetrics and Gynaecology" >Obstetrics and Gynaecology</option>
                                            <option value="Paediatrics" >Paediatrics</option>
                                            <option value="Parasitology" >Parasitology</option>
                                            <option value="Pathology" >Pathology</option>
                                            <option value="Pharmacology" >Pharmacology</option>
                                            <option value="Physiology" >Physiology</option>
                                            <option value="Primary Care & Family Medicine">Primary Care & Family Medicine</option>
                                            <option value="Psychiatry" >Psychiatry</option>
                                            <option value="Surgery" >Surgery</option>
                                        </optgroup>

                                        <!-- Faculty of Social Sciences and Languages -->
                                        <optgroup label="Faculty of Social Sciences and Languages">
                                            <option value="Department of Social Sciences">Department of Social Sciences</option>
                                            <option value="Department of English Language Teaching" >Department of English Language Teaching</option>
                                            <option value="Department of Geography & Environmental Management" >Department of Geography & Environmental Management</option>
                                            <option value="Department of Information Technology" >Department of Information Technology</option>
                                            <option value="Department of Languages">Department of Languages</option>
                                        </optgroup>

                                        <!-- Faculty of Technology -->
                                        <optgroup label="Faculty of Technology">
                                            <option value="Department of Engineering Technology" >Department of Engineering Technology</option>
                                            <option value="Department of Biosystems Technology" >Department of Biosystems Technology</option>
                                        </optgroup>
                                    </select>
                                    @error('department')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="institutionField" class="col-md-6" style="display: none;">
                                    <label for="institution" class="form-label">Name of the institution</label>
                                    <input type="text" id="institution" class="form-control @error('institution') is-invalid @enderror" name="institution" value="{{ old('institution') }}"  placeholder="Institution">
                                    @error('institution')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="divisionField" class="col-md-6" style="display: none;">
                                    <label for="division">Name of the Division/Centre/Unit</label>
                                    <input type="text" class="form-control @error('division') is-invalid @enderror" id="division" name="division"  value="{{ old('division') }}"
                                        placeholder="If not, please mention that as 'None'">
                                        @error('division')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="societyField" class="col-md-6" style="display: none;">
                                    <label for="society" id="societyL" class="form-label">Society</label>
                                    <input type="text" id="society" class="form-control @error('society') is-invalid @enderror" name="society"  value="{{ old('society') }}" placeholder="Society">
                                    @error('society')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="postField" class="col-md-6" style="display: none;">
                                    <label for="post" class="form-label">Designation</label>
                                    <input type="text" id="post" class="form-control @error('post') is-invalid @enderror" name="post"  value="{{ old('post') }}" placeholder="Designation">
                                    @error('post')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="addressField" class="col-md-12" style="display: none;">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address"  value="{{ old('address') }}" placeholder="Address">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Additional Information -->
                                <input type="hidden" name="selectedCategory" id="selectedCategory" value="{{ old('selectedCategory') }}">
    <input type="hidden" name="formSubmitted" id="formSubmitted" value="1">
                                <input type="hidden" name="category" id="Category">
                                {{--  <input type="hidden" name="selectedCategory1" id="selectedCategory1" value="{{ isset($selectedCategory) ? $selectedCategory : '' }}">  --}}


                                <div class="col-6">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" type="submit">Create an account</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <p class="m-0 text-secondary text-center">Already have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        let selectedCategory = document.getElementById('selectedCategory').value;



        function selectCategory(category) {
            selectedCategory = category;
            document.getElementById('selectedCategory').value = category;
            $('.btn-category').removeClass('selected');
            $(`.btn-category[data-category="${category}"]`).addClass('selected');
            $('#confirmCategoryBtn').prop('disabled', false);
        }

        $('#confirmCategoryBtn').click(function() {
            if (selectedCategory) {
                document.getElementById('Category').value = selectedCategory;
                $('#categoryModal').modal('hide');
                $('#formContainer').show(); // Show form container
                $('#form').show();

                showConditionalFields(selectedCategory);

            } else {
                alert('Please select a category.');
            }
        });

        // Function to show fields based on selected category
        function showConditionalFields(category) {
            // Hide all fields initially
            $('#studentNoField, #facultyField, #idNoField, #institutionField, #societyField, #postField, #departmentField, #divisionField, #addressField, #fileInputl, #Other, #Other1').hide();

            // Show fields based on selected category
            if (category === 'student') {
                $('#studentNoField').show();
                $('#facultyField').show();
                $('#departmentField').show();
                $('#societyL').text('Society/Association');
            } else if (category === 'external') {
                $('#idNoField').show();
                $('#institutionField').show();
                $('#postField').show();
                $('#addressField').show();
            } else if (category === 'academic') {
                $('#idNoField').show();
                $('#facultyField').show();
                $('#postField').show();
                $('#departmentField').show();
                $('#Other').show();
            } else if (category === 'non-academic') {
                $('#idNoField').show();
                $('#facultyField').show();
                $('#divisionField').show();
            } else {
                $('#idNoField').show();
                $('#facultyField').show();
                $('#postField').show();
                $('#divisionField').show();
            }
        }

        // Show the category selection modal on page load if no category is selected
        $(document).ready(function() {
            if (!selectedCategory) {
                var categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'), {
                    backdrop: 'static',
                    keyboard: false
                });
                categoryModal.show();
            } else {
                $('#formContainer').show();
                $('#form').show();

                // Show conditional fields based on selected category
                showConditionalFields(selectedCategory);
            }
        });

        document.getElementById('faculty').addEventListener('change', function () {
            var divisionFieldField = document.getElementById('divisionField');
            if (selectedCategory !== 'administrative' && selectedCategory !== 'non-academic' && selectedCategory !== 'student') {
                if (this.value === 'none') {
                    divisionFieldField.style.display = 'block';
                    document.getElementById('division').setAttribute('required', 'required');
                    document.getElementById('departmentField').style.display = 'none';
                    document.getElementById('department').value = 'none';
                } else {
                    divisionFieldField.style.display = 'none';
                    document.getElementById('division').removeAttribute('required');
                    document.getElementById('departmentField').style.display = 'block';
                }
            }
        });
    </script>



</body>
</html>
