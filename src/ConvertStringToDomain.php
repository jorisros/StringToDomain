<?php
declare(strict_types=1);

namespace JorisRos\ConvertStringToDomain;

class ConvertStringToDomain
{
    public static function convert(string $inputString): string
    {
        // Convert the string to lowercase
        $inputString = strtolower($inputString);


        // Remove emojis
        $inputString = preg_replace('/[\x{1F600}-\x{1F6FF}]/u', '', $inputString); // Emoticons
        $inputString = preg_replace('/[\x{1F300}-\x{1F5FF}]/u', '', $inputString); // Misc Symbols and Pictographs
        $inputString = preg_replace('/[\x{1F900}-\x{1F9FF}]/u', '', $inputString); // Supplemental Symbols and Pictographs
        $inputString = preg_replace('/[\x{1F680}-\x{1F6FF}]/u', '', $inputString); // Transport and Map Symbols
        $inputString = preg_replace('/[\x{2600}-\x{26FF}]/u', '', $inputString);   // Miscellaneous Symbols
        $inputString = preg_replace('/[\x{2700}-\x{27BF}]/u', '', $inputString);   // Dingbats
        $inputString = preg_replace('/[\x{1F1E6}-\x{1F1FF}]/u', '', $inputString); // Flags (iOS)

        // Remove any 'http' or 'https' from the string
        $inputString = preg_replace('/https?:\/\//', '', $inputString);

        // Remove any invalid characters (only allow alphanumeric and hyphens)
        $inputString = preg_replace('/[^a-zA-Z0-9-]/', '', $inputString);

        // Ensure the subdomain starts and ends with an alphanumeric character
        $inputString = preg_replace('/^-+|-+$/', '', $inputString);


        // Truncate or pad the string to ensure it's between 1 and 63 characters
        if (strlen($inputString) > 63) {
            $inputString = substr($inputString, 0, 63);
        }

        return $inputString;
    }
}