<?php

$path = "path/to/dir";
$dir = Files::getInstance($path);

// get count of files and folders in directory
$count = $dir->count("directory");
echo "This directory has {$count['files']} files and {$count['folders']} folders. Total is {$count['total']} files and folders.<br/>";

// get size of directory
$size = $dir->size("directory"); // get raw size of directory in bytes
$formatted_size = $dir->size("directory",true); // get formatted size of directory (eg. 256 GB)
echo "This folder is exactly $size bytes; sorry does that not make sense? This folder is about $formatted_size.";

// list files in this directory
echo "<ul>";
foreach ($dir->list() as $file) {
  echo "<li>Name: {$file['name']}, Type: {$file['type']}</li>";
}
echo "</ul>";

// files
$dir->file("file.txt","set file content"); // create a file within this directory, optional: set file content
$dir->file("file.txt","update file content"); // if the file already exists, you can use the same method to update a files contents
$dir->file("file.txt"); // get contents of file within this directory, you can also use this to check if a file exists in the current directory

// directories
$dir->dir("directory"); // create a directory within this directory
$dir->dir("directory"); // if the directory already exists, returns array of files within specified directory
$dir->dir(); // returns array of files within current path

$dir->delete(); // deletes the directory WARNING: deletes files and subdirectories within the directory, this will unset the instance.
$dir->delete("file.txt"); // deletes specified file within the path
$dir->delete("directory"); // deletes specified directory within the path
$dir->delete("directory/subdirectory"); // you can obviously just keep going deeper if you'd like
