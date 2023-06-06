<div class="main-message">
    <h1> My Experiences </h1>
    <p> Here are my experiences, feel free to contact me regarding any project. </p>


    Want to ask a question? <a class="btn btn-large" href="contact.php"> Contact Me </a>
</div>

<div class="experiences">
    <?php 
    require_once PROJECT_HOME . '/lib/experience_model.php';
    $experiences = Experience::all();
    foreach($experiences as $experience) :
        ?>
        <div class="experience">
            <h2> <?php echo $experience['title']; ?> </h2>
            <h3> <?php echo $experience['company']; ?> </h3>
            <h4> <?php echo $experience['location']; ?> </h4>
            <h5> <?php echo $experience['start_date']; ?> - <?php echo $experience['end_date']; ?> </h5>
            <p> <?php echo $experience['description']; ?> </p>
        </div>
        <?php endforeach; ?>
</div>