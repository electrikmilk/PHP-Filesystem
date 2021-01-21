<?php
/* THIS IS ALL SUBJECT TO CHANGE AS THIS CLASS IS WIP */

// Basic instantiate
$files = new Filesystem("path/to/files"); // This will create a new Filesystem instance and set the path (current working directory).

/*
Instantiate using getInstance (recommended).
This will create a new Filesystem instance and set the path (current working directory),
but will return the existing instance if we have already created an instance for this path.
*/
$files = new Filesystem::getInstance("path/to/files");

// specifying a non-existant path/cwd will die(), specifying no path will default to __DIR__.
// all functions below are set to return data, bool, or if something you are trying to create already exists or does not exist; NULL.

$files->path("set/new/path"); // change the path for this instance.
$files->info(); // returns array of info about file or directory, eg. {name:"filename",base:"basename.ext",ext:".extension",dir:"directory",mime:"mime_content_type",type:"file|folder"}.
$files->size($format); // byte count of current file or directory. $format (bool): true will return formatted byte count (eg. 256 KB), false will return raw byte count.
$files->count(); // numbers of files and folder in a directory, this includes subfolders and files.
$files->list(); // returns array of files list at set directory, returns NULL if directory is empty.
$files->empty($name); // if $name, returns true|false based on if directory at path/$name is empty, if no $name, returns true|false based on if path is empty.
$files->file($name); // if file does not exist, creates file at path/$name; if file does exist, returns file content.
$files->dir($name); // creates directory at path/$name if it does not already exist.
$files->delete($name); // deletes file or directory at path/$name, deletes any sub-directories if directory; the $name argument only applies if the path is a directory.