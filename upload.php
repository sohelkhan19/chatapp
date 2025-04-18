<?php
$targetDir = "uploads/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Create uploads folder if not exists
}

if (isset($_FILES["image"])) {
    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . time() . "_" . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo json_encode(["status" => "success", "url" => $targetFile]);
    } else {
        echo json_encode(["status" => "error", "message" => "Upload failed."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No image sent."]);
}
?>
