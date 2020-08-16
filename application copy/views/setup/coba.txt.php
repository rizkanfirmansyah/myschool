
    	$folder = $this->data->getDataFolder();
    	  // http://stackoverflow.com/a/21409562/1163000
        function get_directory_size($path) {
            $size = 0;
            $path = realpath($path);
            if($path !== false) {
                foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
                    $size += $object->getSize();
                }
            }
            return $size; // in bytes
        }
	    foreach ($folder as $f) {
	        $data[$f['folder']] = number_format((get_directory_size('application/views/hosting/'.$f['folder']) / 1024),2);
	    $data['sizefolder'] = $data[$f['folder']];
	    }