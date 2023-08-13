<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $objective = $_POST["objective"];
    $education_types = $_POST["education_type"];
    $institute_names = $_POST["institute_name"];
    $skills = $_POST["skills"];
    $profile_photo_name = '';
    $projects = $_POST["project_title"];
    $project_descriptions = $_POST["project_description"];
    $experience_levels = $_POST["experience_level"];
    $job_titles = $_POST["job_title"];
    $company_names = $_POST["company_name"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $linkedin = $_POST["linkedin"];


    // Handle profile photo upload
    if (isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] === UPLOAD_ERR_OK) {
        $profile_photo = $_FILES["profile_photo"];
        $profile_photo_name = $profile_photo["name"];
        $profile_photo_temp = $profile_photo["tmp_name"];
        move_uploaded_file($profile_photo_temp, "profile_photos/$profile_photo_name");
    }

    // Generate education entries as HTML
    $education_entries = '';
    for ($i = 0; $i < count($education_types); $i++) {
        $education_entries .= "
        <div class=''>
            <p>
                <em>$education_types[$i]</em><br>
                <span>$institute_names[$i]</span>
            </p>
        </div>";
    }

    // Generate skills as HTML
    $skills_list = '<ul>';
    foreach ($skills as $skill) {
        $skills_list .= "<li>$skill</li>";
    }
    $skills_list .= '</ul>';

    // Generate projects as HTML
    $projects_list = '';
    for ($i = 0; $i < count($projects); $i++) {
        $projects_list .= "
        <div class=''>
            <p>
                <em>$projects[$i]</em><br>
                <span>$project_descriptions[$i]</span>
            </p>
        </div>";
    }

    // Generate experience as HTML
    $experience_list = '';
    for ($i = 0; $i < count($experience_levels); $i++) {
        $experience_list .= "
        <div class=''>
            <em>Level: $experience_levels[$i]</em><br>
            <span>$job_titles[$i] at $company_names[$i]</span>
        </div>";
    }

    // Display the resume content with styling
    include_once 'templates/header.php';
    ?>

    <link rel="stylesheet" type="text/css" href="css/resume-style.css">


    <!-- <main class="resume">
        <div class="row">
            <div class="col-md-4">
                <img src="profile_photos/<?php echo $profile_photo_name; ?>" alt="Profile Photo">
            </div>
            <div class="col-md-8">
                <h2><?php echo $name; ?></h2>
            </div>
        </div>

        <div class="resume-content">
            <p><strong>Objective:</strong><br><?php echo $objective; ?></p>
            <hr>
            <?php echo $education_entries; ?>
            <hr>
            <p><strong>Projects:</strong></p>
            <?php echo $projects_list; ?>
            <hr>
            <p><strong>Experience:</strong></p>
            <?php echo $experience_list; ?>
            <hr>
            <p><strong>Skills:</strong></p>
            <?php echo $skills_list; ?>
            <hr>
            <ul>
                <li>Email: <?php echo $email; ?></li>
                <li>Contact Number: <?php echo $contact_number; ?></li>
                <li>LinkedIn Profile: <a href="<?php echo $linkedin; ?>"><?php echo $linkedin; ?></a></li>
            </ul>
            
        </div>
    </main> -->

    <div class="row align-items-center">
        <div class="col-md-4 text-center">
            <div class="profile-photo-circle">
                <div class="circle-mask">
                    <img src="profile_photos/<?php echo $profile_photo_name; ?>" alt="Profile Photo">
                </div>
            </div>
        </div>
        <div class="col-md-8 name-container">
            <h2 class="name"><strong><?php echo $name; ?></strong></h2>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="section">
                
                <p><?php echo $objective; ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="section-1">
                <h3>Skills</h3>
                <?php echo $skills_list; ?>
            </div>
            <div class="section-1">
                <h3>Personal Info:</h3>
                <ul>
                    <li>Email: <?php echo $email; ?></li>
                    <li>Contact Number: <?php echo $contact_number; ?></li>
                    <li>LinkedIn Profile: <a href="<?php echo $linkedin; ?>"><?php echo $linkedin; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="section-1">
                <h3>Education</h3>
                <?php echo $education_entries; ?>
            </div>

            <div class="section-1">
                <h3>Experience:</h3>
                <?php echo $experience_list; ?>
            </div>
            <div class="section-1">
                <h3>Projects:</h3>
                <?php echo $projects_list; ?>
            </div>
        </div>
    </div>





    <?php
    include_once 'templates/footer.php';
}
?>
