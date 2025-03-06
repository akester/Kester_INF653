<?php
include('view/header.php');
?>


<section class="assignment-container">
    <h2>Update Assignment</h2>

    <form action="." method="post">
        <input type="hidden" name="assignment_id" value="<?php echo $assignment_id ?>">

        <select name="course_id" required>
            <option value="">Please select</option>
            <?php foreach ($courses as $course) : ?>

                <option value="<?= $course['courseID'] ?>" <?php if ($course['courseID'] == $assignment['courseID']){ echo "selected";} ?>>
                    <?= htmlspecialchars($course['courseName']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="text" name="description" maxlength="120" placeholder="Description" required value="<?php echo $assignment['Description'] ?>">
        <button type="submit" name="action" value="update_assignment">Update</button>
    </form>
</section>


<p><a href=".?action=list_courses">View/Edit Courses</a></p>

<?php
include('view/footer.php');
?>