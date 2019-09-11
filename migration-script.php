<?php
main(); 

// Call all other functions from here.
function main($single_file = null) {

    // If a single file argument is supplied...
    if($single_file) {
        // Make the files array just that one file.
        $files = [$single_file];
    } else {
        // Get list of files.
        $files = findFiles();
    }

    // Internal links.
    foreach($files as $file) {
        replaceSlashesWithDashes($file);
    }

    // Images.
    foreach($files as $file) {
        hardcodeImagesToGitHub($file);
    }

    // Sections.
    foreach($files as $file) {
        fixSectionLinks($file);
    }
}

// Find and replace any slashes `/` with dashes `-` in links, but not images.
function replaceSlashesWithDashes($filename) {
    $regex = '~!\[[^][]*]\([^()]*\)(*SKIP)(*F)|(?:\G(?!\A)|(?<=]\()/developers/)([^()/]*)/(?=[^()]*\))~';
    $new_text = preg_replace($regex, '$1-', file_get_contents($filename));

    // Save and overwrite the markdown file.
    file_put_contents($filename, $new_text);
}

// Find all links that include a hash `#` and add `section-` directly after the hash `#`
function fixSectionLinks($filename) {
    // There is currently a bug in this regex where any link, internal or external, with a hash `#` will be caught. External links still work, but do no jump to the correct section when visited.
    $regex = '/(\[.*\])(\(.*\#)(.*\))/';
    $new_text = preg_replace($regex, '$1$2section-$3', file_get_contents($filename));

    // Save and overwrite the markdown file.
    file_put_contents($filename, $new_text);
}

// Change ![](/developers/...) links to GitHub stored images.
function hardcodeImagesToGitHub($filename) {
    $regex = '/(\!\[.*\])(\(\/developers)(.*\))/';
    $new_text = preg_replace($regex, '$1(https://raw.githubusercontent.com/aionnetwork/docs/master/developers$3', file_get_contents($filename));

    // Save and overwrite the markdown file.
    file_put_contents($filename, $new_text);
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