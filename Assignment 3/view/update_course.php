<?php
include('view/header.php');
?>


<section class="assignment-container">
    <h2>Update course</h2>

    <form action="." method="post">
        <input type="hidden" name="course_id" value="<?php echo $course_id ?>">

        <input type="text" name="course_name" maxlength="30" placeholder="Name" value=<?php echo $course['courseName']; ?>>
        <button type="submit" name="action" value="update_course">Update</button>
    </form>
</section>


<p><a href=".?action=list_courses">View/Edit Courses</a></p>

<?php
include('view/footer.php');
?>