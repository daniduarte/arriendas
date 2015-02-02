<?php

/**
 * RegionesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RegionesTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object RegionesTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Regiones');
    }
    
    public function generateSlugs() {
        
        $regiones = Doctrine_Core::getTable('Regiones')->findAll();

        foreach($regiones as $region){
                $slug = strtolower($this->scape_url($region->getNombre()));
                $region->setSlug($slug);
                $region->save();
        }
        
        return;
    }
    
    /**
    * Scapes a string to url
    * @param  string $string
    * @return string
    */
    private function scape_url($string){
        $string = $this->remove_accents($string);
        $string = trim(strtolower($string));
        $string = preg_replace('/[^a-z0-9\-\/ ]+/', '', $string);
        $string = preg_replace('/  /', ' ', $string);
        $string = preg_replace('/( |\/)/', '-', $string);
        $string = preg_replace('/-{2,}/', '-', $string);
        return $string;
    }

    /**
    * Replaces all accents from an string
    * @param  string $string
    * @return string
    */
    private function remove_accents($string){
        $replaces = array('/á/' => 'a', '/é/' => 'e', '/í/' => 'i', '/ó/' => 'o', '/ú/' => 'u',
                         '/Á/' => 'A', '/É/' => 'E', '/Í/' => 'I', '/Ó/' => 'O', '/Ú/' => 'U',
                         '/Ä/' => 'A', '/Ë/' => 'E', '/Ï/' => 'I', '/Ö/' => 'O', '/Ü/' => 'U',
                         '/ä/' => 'a', '/ë/' => 'e', '/ï/' => 'i', '/ö/' => 'o', '/ü/' => 'u',
                         '/à/' => 'a', '/è/' => 'e', '/ì/' => 'i', '/ò/' => 'o', '/ù/' => 'u',
                         '/À/' => 'A', '/È/' => 'E', '/Ì/' => 'I', '/Ò/' => 'O', '/Ù/' => 'U',
                         '/Â/' => 'A', '/Ê/' => 'E', '/Î/' => 'I', '/Ô/' => 'O', '/Û/' => 'U',
                         '/â/' => 'a', '/ê/' => 'e', '/î/' => 'i', '/ô/' => 'o', '/û/' => 'u',
                         '/Ñ/' => 'N', '/ñ/' => 'n', '/ç/' => 'c', '/Ç/' => 'C');
        return preg_replace(array_keys($replaces), array_values($replaces), $string);
    }

}