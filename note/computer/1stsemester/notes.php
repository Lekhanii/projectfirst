<?php
$folderPath = '../../../notes/computer/1stsemester';
$filenames = scandir($folderPath);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Notes </title>

</head>
<style>
    .card {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }

    .card a {
        text-decoration: none;
        color: #333;
    }
</style>
<body>
    <h1>1st Semester</h1>
    
<div class="card">
    <?php foreach ($filenames as $filename): ?>
        <?php if ($filename !== '.' && $filename !== '..'): ?>
            <div>
                <a href="<?php echo $folderPath . '/' . $filename; ?>" download><?php echo $filename; ?></a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

</body>
</html>