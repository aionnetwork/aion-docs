<?php

// Find and replace any slashes `/` with dashes `-` in links, but not images.
function replaceSlashesWithDashes($filename) {
    $regex = '~!\[[^][]*]\([^()]*\)(*SKIP)(*F)|(?:\G(?!\A)|(?<=]\()/developers/)([^()/]*)/(?=[^()]*\))~';
    $new_text = preg_replace($regex, '$1-', file_get_contents($filename));

    // Save and overwrite the markdown file.
    file_put_contents($filename, $new_text);
}

// Find all links that include a hash `#` and add `section-` directly after the hash `#`
function fixSectionLinks($filename) {
    $regex = '/(\[.*\])(\(.*\#)(.*\))/';
    $new_text = preg_replace($regex, '$1$2section-$3', file_get_contents($filename));

    // Save and overwrite the markdown file.
    file_put_contents($filename, $new_text);
}

// Change ![](/developers/...) links to GitHub stored images.
function hardcodeImagesToGitHub() {

}

// Find all markdown files within this repo.
function findFiles() {
    $iterator = new RecursiveDirectoryIterator("developers");
    $display = ['md'];
    $return_array = [];
    foreach(new RecursiveIteratorIterator($iterator) as $file) {
        if (in_array(strtolower(array_pop(explode('.', $file))), $display)) {
            array_push($return_array, ($file->getPathname()));
        }
    }
    return $return_array;
}

// Call all other functions from here.
function main() {
    // Get list of files.
    $files = findFiles();

    // Readme-ify internal links.
    foreach($files as $file) {
        replaceSlashesWithDashes($file);
    }

    // // GitHub-ify images.
    // foreach($files as $file) {
    //     hardcodeImagesToGitHub($file);
    // }

    // // Readme-ify # sections.
    // foreach($files as $file) {
    //     fixSectionLinks($file);
    // }

}

main(); 