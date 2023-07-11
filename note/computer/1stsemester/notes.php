<?php
$folderPath = 'notes/computer/1stsemester';
$filenames = scandir($folderPath);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Notes </title>
</head>
<body>
    <h1>File List</h1>
    <?php foreach ($filenames as $filename): ?>
        <?php if ($filename !== '.' && $filename !== '..'): ?>
            <div>
                <a href="<?php echo $folderPath . '/' . $filename; ?>" download><?php echo $filename; ?></a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>