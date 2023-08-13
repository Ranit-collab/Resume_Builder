<form action="generate_resume.php" method="POST" enctype="multipart/form-data">

    <div class="form-row">
        <div class="photo-upload">
            <div class="profile-photo-circle">
                <img id="profile_photo_preview" src="" alt="Profile Photo">
            </div>
            <label for="profile_photo" class="upload-button">Upload Photo</label>
            <input type="file" id="profile_photo" name="profile_photo" accept="image/*" required>
        </div>


        <div class="editable-input">
            <span class="input-text" id="inputText">John Doe</span>
            <input type="text" class="edit-input" id="name" name="name" required>
            <button type="button" class="edit-button" id="editButton">Edit</button>
        </div>
    </div>

    <br>

    <div class="editable-input">
        <span class="input-text" id="objectiveText">Your objective goes here...</span>
        <textarea class="edit-input" id="objective" name="objective" rows="4" required></textarea>
        <button type="button" class="edit-button" id="editObjectiveButton">Edit</button>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <fieldset id="skills-container">
                    <legend>Skills</legend>
                    <div class="skill-entry">
                        <label for="skills[]">Skill:</label>
                        <input type="text" name="skills[]" value="Programming" readonly>
                        <button type="button" class="edit-button" data-editable="true">Edit</button>
                    </div>
                </fieldset>
                <button type="button" id="add_skill">Add Skill</button>


                <fieldset class="personal-info">
                    <legend>Personal Information</legend>
                    <div class="personal-info-entry">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="example@email.com" required>
                        <button type="button" class="edit-button" id="editEmailButton">Save</button>
                    </div>
                    <div class="personal-info-entry">
                        <label for="contact_number">Contact Number:</label>
                        <input type="tel" name="contact_number" value="123-456-7890" required>
                        <button type="button" class="edit-button" id="editContactButton">Save</button>
                    </div>
                    <div class="personal-info-entry">
                        <label for="linkedin">LinkedIn Profile:</label>
                        <input type="url" name="linkedin" value="https://www.linkedin.com/in/example">
                        <button type="button" class="edit-button" id="editLinkedinButton">Save</button>
                    </div>
                </fieldset>



            </div>

            <div class="col-md-8">
                <fieldset id="education-container">
                    <legend>Education</legend>

                    <label for="education_type[]">Education Type:</label>
                    <input type="text" name="education_type[]" value="Education Type" readonly>
                    <button type="button" class="edit-button" data-editable="type">Edit Type</button>
                    <label for="institute_name[]">Institute Name:</label>
                    <input type="text" name="institute_name[]" value="Institute Name" readonly>
                    <button type="button" class="edit-button" data-editable="institute">Edit Institute</button>

                </fieldset>

                <button type="button" id="add_education">Add Education</button>

                <fieldset id="experience-container">
                    <legend>Experience</legend>
                    <div class="experience-entry">
                        <label for="experience_level[]">Experience Level:</label>
                        <select name="experience_level[]" required>
                            <option value="Internship">Internship</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Contractual">Contractual</option>
                        </select>
                        <label for="job_title[]">Job Title:</label>
                        <input type="text" name="job_title[]" value="Job Title" readonly>
                        <button type="button" class="edit-button" data-editable="title">Edit Title</button>
                        <label for="company_name[]">Company Name:</label>
                        <input type="text" name="company_name[]" value="Company Name" readonly>
                        <button type="button" class="edit-button" data-editable="company">Edit Company</button>
                    </div>
                </fieldset>

                <button type="button" id="add_experience">Add Experience</button>


                <fieldset id="projects-container">
                    <legend>Projects</legend>
                    <div class="project-entry">
                        <label for="project_title[]">Project Title:</label>
                        <input type="text" name="project_title[]" value="My Project" readonly>
                        <button type="button" class="edit-button" data-editable="title">Edit Title</button>
                        <label for="project_description[]">Project Description:</label>
                        <textarea name="project_description[]" rows="4"
                            readonly>Project description goes here.</textarea>
                        <button type="button" class="edit-button" data-editable="description">Edit Description</button>
                    </div>
                </fieldset>

                <button type="button" id="add_project">Add Project</button>
            </div>
        </div>

    </div>




    <!-- Add more input fields for other resume sections (e.g., experience, skills) -->

    <button type="submit">Generate Resume</button>

</form>

<script>

    // for image
    const profilePhotoInput = document.getElementById('profile_photo');
    const profilePhotoPreview = document.getElementById('profile_photo_preview');

    profilePhotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profilePhotoPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });


    // For name
    document.addEventListener("DOMContentLoaded", function () {
        const nameInput = document.getElementById("name");
        const inputText = document.getElementById("inputText");
        const editButton = document.getElementById("editButton");

        editButton.addEventListener("click", function () {
            nameInput.style.display = "block";
            inputText.style.display = "none";
            editButton.style.display = "none";
        });

        nameInput.addEventListener("blur", function () {
            nameInput.style.display = "none";
            inputText.style.display = "block";
            editButton.style.display = "block";
            inputText.textContent = nameInput.value;
        });
    });

    // for objective
    document.addEventListener("DOMContentLoaded", function () {
        const objectiveInput = document.getElementById("objective");
        const objectiveText = document.getElementById("objectiveText");
        const editObjectiveButton = document.getElementById("editObjectiveButton");

        editObjectiveButton.addEventListener("click", function () {
            objectiveInput.style.display = "block";
            objectiveText.style.display = "none";
            editObjectiveButton.style.display = "none";
        });

        objectiveInput.addEventListener("blur", function () {
            objectiveInput.style.display = "none";
            objectiveText.style.display = "block";
            editObjectiveButton.style.display = "block";
            objectiveText.textContent = objectiveInput.value;
        });
    });

    // education edit
    const educationContainer = document.getElementById('education-container');
    const addEducationButton = document.getElementById('add_education');

    addEducationButton.addEventListener('click', function () {
        const educationEntry = document.createElement('div');
        educationEntry.className = 'education-entry';
        educationEntry.innerHTML = `
        <label for="education_type[]">Education Type:</label>
        <input type="text" name="education_type[]" value="Education Type" readonly>
        <button type="button" class="edit-button" data-editable="type">Edit Type</button>
        <label for="institute_name[]">Institute Name:</label>
        <input type="text" name="institute_name[]" value="Institute Name" readonly>
        <button type="button" class="edit-button" data-editable="institute">Edit Institute</button>
    `;

        educationContainer.appendChild(educationEntry);
    });

    educationContainer.addEventListener('click', function (event) {
        const target = event.target;
        const isEditButton = target.classList.contains('edit-button');
        if (isEditButton) {
            const inputField = target.previousElementSibling;
            const isEditable = inputField.hasAttribute('readonly');

            if (isEditable) {
                inputField.removeAttribute('readonly');
                target.textContent = 'Save';
            } else {
                inputField.setAttribute('readonly', 'readonly');
                target.textContent = target.getAttribute('data-editable') === 'type' ? 'Edit Type' : 'Edit Institute';
            }
        }
    });


    // skills edit
    const skillsContainer = document.getElementById('skills-container');
    const addSkillButton = document.getElementById('add_skill');
    const editSkillsButton = document.getElementById('editSkillsButton');

    addSkillButton.addEventListener('click', function () {
        const skillEntry = document.createElement('div');
        skillEntry.className = 'skill-entry';
        skillEntry.innerHTML = `
            <label for="skills[]">Skill:</label>
            <input type="text" name="skills[]" value="Programming" readonly>
            <button type="button" class="edit-button" data-editable="true">Edit</button>
        `;

        skillsContainer.appendChild(skillEntry);
    });

    skillsContainer.addEventListener('click', function (event) {
        const target = event.target;
        if (target.classList.contains('edit-button')) {
            const input = target.previousElementSibling;
            const isEditable = target.getAttribute('data-editable') === 'true';

            if (isEditable) {
                input.removeAttribute('readonly');
                target.textContent = 'Save';
            } else {
                input.setAttribute('readonly', 'readonly');
                target.textContent = 'Edit';
            }

            target.setAttribute('data-editable', !isEditable);
        }
    });

    // project edit
    const projectsContainer = document.getElementById('projects-container');
    const addProjectButton = document.getElementById('add_project');

    addProjectButton.addEventListener('click', function () {
        const projectEntry = document.createElement('div');
        projectEntry.className = 'project-entry';
        projectEntry.innerHTML = `
            <label for="project_title[]">Project Title:</label>
            <input type="text" name="project_title[]" value="My Project" readonly>
            <button type="button" class="edit-button" data-editable="title">Edit Title</button>
            <label for="project_description[]">Project Description:</label>
            <textarea name="project_description[]" rows="4" readonly>Project description goes here.</textarea>
            <button type="button" class="edit-button" data-editable="description">Edit Description</button>
        `;

        projectsContainer.appendChild(projectEntry);
    });

    projectsContainer.addEventListener('click', function (event) {
        const target = event.target;
        const isEditTitle = target.getAttribute('data-editable') === 'title';
        const isEditDescription = target.getAttribute('data-editable') === 'description';

        if (isEditTitle || isEditDescription) {
            const inputOrTextarea = target.parentElement.querySelector(isEditTitle ? 'input' : 'textarea');
            const isEditable = inputOrTextarea.hasAttribute('readonly');

            if (isEditable) {
                inputOrTextarea.removeAttribute('readonly');
                target.textContent = 'Save';
            } else {
                inputOrTextarea.setAttribute('readonly', 'readonly');
                target.textContent = isEditTitle ? 'Edit Title' : 'Edit Description';
            }
        }
    });

    // experience edit
    const experienceContainer = document.getElementById('experience-container');
    const addExperienceButton = document.getElementById('add_experience');

    addExperienceButton.addEventListener('click', function () {
        const experienceEntry = document.createElement('div');
        experienceEntry.className = 'experience-entry';
        experienceEntry.innerHTML = `
        <label for="experience_level[]">Experience Level:</label>
        <select name="experience_level[]" required>
            <option value="Internship">Internship</option>
            <option value="Full Time">Full Time</option>
            <option value="Contractual">Contractual</option>
        </select>
        <label for="job_title[]">Job Title:</label>
        <input type="text" name="job_title[]" value="Job Title" readonly>
        <button type="button" class="edit-button" data-editable="title">Edit Title</button>
        <label for="company_name[]">Company Name:</label>
        <input type="text" name="company_name[]" value="Company Name" readonly>
        <button type="button" class="edit-button" data-editable="company">Edit Company</button>
    `;

        experienceContainer.appendChild(experienceEntry);
    });

    experienceContainer.addEventListener('click', function (event) {
        const target = event.target;
        const isEditButton = target.classList.contains('edit-button');
        if (isEditButton) {
            const inputField = target.previousElementSibling;
            const isEditable = inputField.hasAttribute('readonly');

            if (isEditable) {
                inputField.removeAttribute('readonly');
                target.textContent = 'Save';
            } else {
                inputField.setAttribute('readonly', 'readonly');
                target.textContent = target.getAttribute('data-editable') === 'title' ? 'Edit Title' : 'Edit Company';
            }
        }
    });



    // personal info
    const emailInput = document.querySelector('input[name="email"]');
    const contactInput = document.querySelector('input[name="contact_number"]');
    const linkedinInput = document.querySelector('input[name="linkedin"]');

    const editEmailButton = document.getElementById('editEmailButton');
    const editContactButton = document.getElementById('editContactButton');
    const editLinkedinButton = document.getElementById('editLinkedinButton');

    editEmailButton.addEventListener('click', function () {
        emailInput.readOnly = !emailInput.readOnly;
        if (emailInput.readOnly) {
            editEmailButton.textContent = 'Edit';
        } else {
            editEmailButton.textContent = 'Save';
        }
    });

    editContactButton.addEventListener('click', function () {
        contactInput.readOnly = !contactInput.readOnly;
        if (contactInput.readOnly) {
            editContactButton.textContent = 'Edit';
        } else {
            editContactButton.textContent = 'Save';
        }
    });

    editLinkedinButton.addEventListener('click', function () {
        linkedinInput.readOnly = !linkedinInput.readOnly;
        if (linkedinInput.readOnly) {
            editLinkedinButton.textContent = 'Edit';
        } else {
            editLinkedinButton.textContent = 'Save';
        }
    });



</script>