<?php
class JSONReader {
    public static function ReadJSON($filePath) {
        $jsonData = file_get_contents($filePath);
        $data = json_decode($jsonData, true);
        return $data;
    }
}
