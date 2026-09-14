<?php

$files = [
    'app/Filament/Resources/Services/Schemas/ServiceForm.php' => 'services',
    'app/Filament/Resources/Projects/Schemas/ProjectForm.php' => 'projects',
    'app/Filament/Resources/Industries/Schemas/IndustryForm.php' => 'industries',
    'app/Filament/Resources/Equipment/Schemas/EquipmentForm.php' => 'equipment',
    'app/Filament/Resources/Certifications/Schemas/CertificationForm.php' => 'certifications'
];

foreach ($files as $file => $dir) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        
        // Add disk and directory to image uploads
        $content = preg_replace('/(FileUpload::make\([^)]+\))(.*?)->image\(\)/s', '$1$2->image()->disk(\'public\')->directory(\'' . $dir . '\')->acceptedFileTypes([\'image/jpeg\', \'image/png\', \'image/webp\', \'image/jpg\'])->maxSize(5120)', $content);
        
        // Ensure PDF fields for certifications also get disk and directory
        if ($dir === 'certifications') {
             $content = preg_replace('/(FileUpload::make\(\'pdf\'\)[^,]+),/s', '$1->disk(\'public\')->directory(\'certifications_pdf\')->acceptedFileTypes([\'application/pdf\']),', $content);
        }

        file_put_contents($file, $content);
        echo "Updated $file\n";
    }
}
